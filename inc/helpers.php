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
