<?php
/**
 * Theme helper functions.
 *
 * @package Nika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function nika_asset_url( $path ) {
	return get_template_directory_uri() . '/assets/' . ltrim( $path, '/' );
}

function nika_get_page_url( $path ) {
	$path = trim( $path, '/' );
	$page = get_page_by_path( $path );

	if ( ! $page ) {
		$segments = explode( '/', $path );
		$slug     = end( $segments );
		$matches  = get_posts(
			array(
				'post_type'      => 'page',
				'name'           => $slug,
				'post_status'    => 'publish',
				'posts_per_page' => 1,
				'orderby'        => 'ID',
				'order'          => 'ASC',
			)
		);

		if ( ! empty( $matches ) ) {
			$page = $matches[0];
		}
	}

	if ( $page ) {
		return home_url( '/index.php?pagename=' . $path );
	}

	return home_url( '/' . $path . '/' );
}

function nika_get_doctor_permalink( $post ) {
	$post = get_post( $post );

	if ( ! $post instanceof WP_Post || 'nika_doctor' !== $post->post_type ) {
		return home_url( '/' );
	}

	return add_query_arg(
		array(
			'post_type' => 'nika_doctor',
			'p'         => (int) $post->ID,
		),
		home_url( '/' )
	);
}

function nika_filter_doctor_permalink( $post_link, $post ) {
	if ( $post instanceof WP_Post && 'nika_doctor' === $post->post_type ) {
		return nika_get_doctor_permalink( $post );
	}

	return $post_link;
}
add_filter( 'post_type_link', 'nika_filter_doctor_permalink', 10, 2 );

function nika_disable_canonical_for_query_pages( $redirect_url ) {
	if ( isset( $_GET['pagename'] ) || isset( $_GET['page_id'] ) ) {
		return false;
	}

	return $redirect_url;
}
add_filter( 'redirect_canonical', 'nika_disable_canonical_for_query_pages' );

function nika_filter_document_title( $title ) {
	if ( is_front_page() ) {
		return 'НикаДент — Стоматология в Елизово';
	}

	return $title;
}
add_filter( 'pre_get_document_title', 'nika_filter_document_title' );

function nika_get_menu_items() {
	return array(
		array(
			'label'    => 'Главная',
			'url'      => home_url( '/' ),
			'children' => array(),
		),
		array(
			'label' => 'Протезирование',
			'url'   => nika_get_page_url( 'protezirovanie' ),
			'children' => array(
				array(
					'label' => 'Съемное протезирование',
					'url'   => nika_get_page_url( 'protezirovanie/semnoe-protezirovanie' ),
				),
				array(
					'label' => 'Коронки и несъемное протезирование',
					'url'   => nika_get_page_url( 'protezirovanie/koronki-i-nesemnoe-protezirovanie' ),
				),
			),
		),
		array(
			'label'    => 'Врачи',
			'url'      => nika_get_page_url( 'doctors' ),
			'children' => array(),
		),
		array(
			'label'    => 'Цены',
			'url'      => nika_get_page_url( 'prices' ),
			'children' => array(),
		),
		array(
			'label'    => 'Блог',
			'url'      => nika_get_page_url( 'blog' ),
			'children' => array(),
		),
		array(
			'label'    => 'Контакты',
			'url'      => nika_get_page_url( 'contacts' ),
			'children' => array(),
		),
	);
}

function nika_get_footer_links() {
	return array(
		array(
			'label' => 'Протезирование зубов',
			'url'   => nika_get_page_url( 'protezirovanie' ),
		),
		array(
			'label' => 'Съёмные протезы',
			'url'   => nika_get_page_url( 'protezirovanie/semnoe-protezirovanie' ),
		),
		array(
			'label' => 'Коронки',
			'url'   => nika_get_page_url( 'protezirovanie/koronki-i-nesemnoe-protezirovanie' ),
		),
		array(
			'label' => 'Врачи',
			'url'   => nika_get_page_url( 'doctors' ),
		),
		array(
			'label' => 'Цены',
			'url'   => nika_get_page_url( 'prices' ),
		),
		array(
			'label' => 'Блог',
			'url'   => nika_get_page_url( 'blog' ),
		),
		array(
			'label' => 'Контакты',
			'url'   => nika_get_page_url( 'contacts' ),
		),
	);
}

function nika_get_primary_phone() {
	$branches = nika_get_contact_branches();

	foreach ( $branches as $branch ) {
		if ( empty( $branch['phones'] ) || ! is_array( $branch['phones'] ) ) {
			continue;
		}

		foreach ( $branch['phones'] as $phone_label => $phone_link ) {
			return array(
				'label' => $phone_label,
				'link'  => $phone_link,
			);
		}
	}

	return null;
}

function nika_get_branches_label() {
	$count = count( nika_get_contact_branches() );

	if ( 1 === $count ) {
		return '1 филиал в Елизово';
	}

	if ( $count >= 2 && $count <= 4 ) {
		return sprintf( '%d филиала в Елизово', $count );
	}

	return sprintf( '%d филиалов в Елизово', $count );
}

function nika_get_breadcrumb_items() {
	$items = array(
		array(
			'label' => 'Главная',
			'url'   => home_url( '/' ),
		),
	);

	if ( is_singular( 'nika_doctor' ) ) {
		$items[] = array(
			'label' => 'Врачи',
			'url'   => nika_get_page_url( 'doctors' ),
		);

		$items[] = array(
			'label' => get_the_title(),
			'url'   => '',
		);

		return $items;
	}

	if ( ! is_page() ) {
		return $items;
	}

	$page = get_queried_object();

	if ( ! $page instanceof WP_Post ) {
		return $items;
	}

	$ancestor_ids = array_reverse( get_post_ancestors( $page ) );

	foreach ( $ancestor_ids as $ancestor_id ) {
		$items[] = array(
			'label' => get_the_title( $ancestor_id ),
			'url'   => get_permalink( $ancestor_id ),
		);
	}

	$items[] = array(
		'label' => get_the_title( $page ),
		'url'   => '',
	);

	return $items;
}

function nika_allow_svg_uploads( $mimes ) {
	if ( current_user_can( 'manage_options' ) ) {
		$mimes['svg'] = 'image/svg+xml';
	}

	return $mimes;
}
add_filter( 'upload_mimes', 'nika_allow_svg_uploads' );

function nika_fix_svg_filetype( $data, $file, $filename, $mimes ) {
	$filetype = wp_check_filetype( $filename, $mimes );

	if ( 'svg' === $filetype['ext'] ) {
		$data['ext']  = 'svg';
		$data['type'] = 'image/svg+xml';
	}

	return $data;
}
add_filter( 'wp_check_filetype_and_ext', 'nika_fix_svg_filetype', 10, 4 );

function nika_fix_svg_media_response( $response, $attachment, $meta ) {
	if ( 'image/svg+xml' !== get_post_mime_type( $attachment ) ) {
		return $response;
	}

	$default_size = array(
		'url'         => $response['url'],
		'width'       => 512,
		'height'      => 512,
		'orientation' => 'portrait',
	);

	if ( ! isset( $response['sizes'] ) || ! is_array( $response['sizes'] ) ) {
		$response['sizes'] = array();
	}

	$response['sizes']['full']      = $default_size;
	$response['sizes']['thumbnail'] = $default_size;

	return $response;
}
add_filter( 'wp_prepare_attachment_for_js', 'nika_fix_svg_media_response', 10, 3 );

function nika_fix_svg_admin_preview_styles() {
	echo '<style>
		.attachment img[src$=".svg"],
		.attachment img[src*=".svg?"],
		.components-responsive-wrapper img[src$=".svg"],
		.components-responsive-wrapper img[src*=".svg?"],
		.thumbnail img[src$=".svg"],
		.thumbnail img[src*=".svg?"] {
			width: 100% !important;
			height: auto !important;
		}
	</style>';
}
add_action( 'admin_head', 'nika_fix_svg_admin_preview_styles' );
