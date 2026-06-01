<?php
/**
 * Asset loading.
 *
 * @package Nika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function nika_enqueue_assets() {
	$theme_version = wp_get_theme()->get( 'Version' );
	$theme_uri     = get_template_directory_uri();

	wp_enqueue_style(
		'nika-fonts',
		'https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&family=Ubuntu+Mono:wght@400;700&family=Golos+Text:wght@400;500;600;700&display=swap',
		array(),
		null
	);

	wp_enqueue_style(
		'nika-base',
		$theme_uri . '/assets/css/base.css',
		array( 'nika-fonts' ),
		$theme_version
	);

	wp_enqueue_style(
		'nika-components',
		$theme_uri . '/assets/css/components.css',
		array( 'nika-base' ),
		$theme_version
	);

	if ( is_front_page() ) {
		wp_enqueue_style(
			'nika-front-page',
			$theme_uri . '/assets/css/front-page.css',
			array( 'nika-components' ),
			$theme_version
		);
	}

	if ( is_page() && ! is_front_page() ) {
		wp_enqueue_style(
			'nika-pages',
			$theme_uri . '/assets/css/pages.css',
			array( 'nika-components' ),
			$theme_version
		);
	}

	wp_enqueue_script(
		'nika-theme',
		$theme_uri . '/assets/js/theme.js',
		array(),
		$theme_version,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'nika_enqueue_assets' );
