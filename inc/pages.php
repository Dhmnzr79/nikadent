<?php
/**
 * Default pages.
 *
 * @package Nika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function nika_get_seed_pages() {
	return array(
		array(
			'path'   => 'protezirovanie',
			'title'  => 'Протезирование',
			'parent' => '',
		),
		array(
			'path'   => 'protezirovanie/semnoe-protezirovanie',
			'title'  => 'Съемное протезирование',
			'parent' => 'protezirovanie',
		),
		array(
			'path'   => 'protezirovanie/koronki-i-nesemnoe-protezirovanie',
			'title'  => 'Коронки и несъемное протезирование',
			'parent' => 'protezirovanie',
		),
		array(
			'path'   => 'doctors',
			'title'  => 'Врачи',
			'parent' => '',
		),
		array(
			'path'   => 'prices',
			'title'  => 'Цены',
			'parent' => '',
		),
		array(
			'path'   => 'blog',
			'title'  => 'Блог',
			'parent' => '',
		),
		array(
			'path'   => 'contacts',
			'title'  => 'Контакты',
			'parent' => '',
		),
		array(
			'path'   => 'privacy-policy',
			'title'  => 'Политика конфиденциальности',
			'parent' => '',
		),
		array(
			'path'   => 'licenses',
			'title'  => 'Лицензии',
			'parent' => '',
		),
		array(
			'path'   => 'legal-info',
			'title'  => 'Юридическая информация',
			'parent' => '',
		),
		array(
			'path'   => 'personal-data-consent',
			'title'  => 'Согласие на обработку персональных данных',
			'parent' => '',
		),
	);
}

function nika_get_seed_page_placeholder_text() {
	return 'Раздел находится в разработке и будет наполнен на следующем этапе.';
}

function nika_is_seed_page_placeholder( $page ) {
	return trim( wp_strip_all_tags( $page->post_content ) ) === nika_get_seed_page_placeholder_text();
}

function nika_has_working_apache_rewrite_rules() {
	$server_software = isset( $_SERVER['SERVER_SOFTWARE'] ) ? (string) $_SERVER['SERVER_SOFTWARE'] : '';

	if ( false === stripos( $server_software, 'Apache' ) ) {
		return true;
	}

	$htaccess_path = ABSPATH . '.htaccess';

	if ( ! file_exists( $htaccess_path ) ) {
		return false;
	}

	$contents = (string) file_get_contents( $htaccess_path );

	return false !== strpos( $contents, 'RewriteEngine On' )
		&& false !== strpos( $contents, 'RewriteRule . /index.php [L]' );
}

function nika_maybe_fallback_to_plain_permalinks() {
	$permalink_structure = (string) get_option( 'permalink_structure' );

	if ( '' === $permalink_structure ) {
		return;
	}

	if ( nika_has_working_apache_rewrite_rules() ) {
		return;
	}

	update_option( 'permalink_structure', '' );
	flush_rewrite_rules( false );
}
add_action( 'init', 'nika_maybe_fallback_to_plain_permalinks', 5 );

function nika_maybe_enable_pretty_permalinks() {
	$rewrite_version = 'v2';
	$needs_flush     = false;

	if ( ! nika_has_working_apache_rewrite_rules() ) {
		return;
	}

	if ( '/%postname%/' !== get_option( 'permalink_structure' ) ) {
		update_option( 'permalink_structure', '/%postname%/' );
		$needs_flush = true;
	}

	if ( $rewrite_version !== get_option( 'nika_pretty_permalinks_version' ) ) {
		update_option( 'nika_pretty_permalinks_version', $rewrite_version );
		$needs_flush = true;
	}

	if ( $needs_flush ) {
		flush_rewrite_rules( false );
	}
}
add_action( 'init', 'nika_maybe_enable_pretty_permalinks', 20 );

function nika_maybe_seed_pages() {
	if ( get_option( 'nika_seed_pages_v7' ) ) {
		return;
	}

	$definitions     = nika_get_seed_pages();
	$all_pages       = get_posts(
		array(
			'post_type'      => 'page',
			'post_status'    => array( 'publish', 'draft', 'pending', 'private' ),
			'posts_per_page' => -1,
			'orderby'        => 'ID',
			'order'          => 'ASC',
		)
	);
	$known_titles    = wp_list_pluck( $definitions, 'title' );
	$canonical_paths = array();
	$canonical_ids   = array();

	foreach ( $definitions as $definition ) {
		$path        = $definition['path'];
		$title       = $definition['title'];
		$segments    = explode( '/', $path );
		$slug        = end( $segments );
		$parent_path = $definition['parent'];
		$parent_id   = $parent_path && isset( $canonical_paths[ $parent_path ] ) ? $canonical_paths[ $parent_path ] : 0;
		$candidate   = null;

		foreach ( $all_pages as $page ) {
			if ( $page->post_title !== $title || ! nika_is_seed_page_placeholder( $page ) ) {
				continue;
			}

			if ( (int) $page->post_parent === (int) $parent_id ) {
				$candidate = $page;
				break;
			}

			if ( null === $candidate ) {
				$candidate = $page;
			}
		}

		if ( $candidate ) {
			$page_id = (int) $candidate->ID;

			if ( (int) $candidate->post_parent !== (int) $parent_id || $candidate->post_name !== $slug ) {
				wp_update_post(
					array(
						'ID'          => $page_id,
						'post_parent' => $parent_id,
						'post_name'   => $slug,
					)
				);
			}
		} else {
			$page_id = wp_insert_post(
				array(
					'post_title'   => $title,
					'post_name'    => $slug,
					'post_type'    => 'page',
					'post_status'  => 'publish',
					'post_parent'  => $parent_id,
					'post_content' => sprintf(
						'<p>%s</p>',
						esc_html( nika_get_seed_page_placeholder_text() )
					),
				),
				true
			);

			if ( is_wp_error( $page_id ) ) {
				continue;
			}

			$all_pages[] = get_post( $page_id );
		}

		$canonical_paths[ $path ] = (int) $page_id;
		$canonical_ids[]          = (int) $page_id;
	}

	foreach ( $all_pages as $page ) {
		if ( in_array( (int) $page->ID, $canonical_ids, true ) ) {
			continue;
		}

		if ( ! in_array( $page->post_title, $known_titles, true ) ) {
			continue;
		}

		if ( ! nika_is_seed_page_placeholder( $page ) ) {
			continue;
		}

		wp_trash_post( $page->ID );
	}

	update_option( 'nika_seed_pages_v7', 1 );
	flush_rewrite_rules( false );
}
add_action( 'init', 'nika_maybe_seed_pages' );
