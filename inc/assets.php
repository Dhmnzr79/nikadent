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
	$theme_path    = get_template_directory();
	$get_version   = static function ( $relative_path ) use ( $theme_path, $theme_version ) {
		$file_path = $theme_path . $relative_path;

		if ( file_exists( $file_path ) ) {
			return (string) filemtime( $file_path );
		}

		return $theme_version;
	};

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
		$get_version( '/assets/css/base.css' )
	);

	wp_enqueue_style(
		'nika-components',
		$theme_uri . '/assets/css/components.css',
		array( 'nika-base' ),
		$get_version( '/assets/css/components.css' )
	);

	if ( is_front_page() ) {
		wp_enqueue_style(
			'nika-front-page',
			$theme_uri . '/assets/css/front-page.css',
			array( 'nika-components' ),
			$get_version( '/assets/css/front-page.css' )
		);
	}

	if ( ( is_page() && ! is_front_page() ) || is_home() || is_singular( 'post' ) || is_singular( 'nika_doctor' ) ) {
		wp_enqueue_style(
			'nika-pages',
			$theme_uri . '/assets/css/pages.css',
			array( 'nika-components' ),
			$get_version( '/assets/css/pages.css' )
		);
	}

	wp_enqueue_script(
		'nika-theme',
		$theme_uri . '/assets/js/theme.js',
		array(),
		$get_version( '/assets/js/theme.js' ),
		true
	);

	wp_localize_script(
		'nika-theme',
		'nikaTheme',
		array(
			'ajaxUrl'   => admin_url( 'admin-ajax.php' ),
			'leadNonce' => wp_create_nonce( 'nika_submit_lead' ),
		)
	);
}
add_action( 'wp_enqueue_scripts', 'nika_enqueue_assets' );
