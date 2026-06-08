<?php
/**
 * SEO-related theme helpers.
 *
 * @package Nika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function nika_filter_404_document_title( $title ) {
	if ( is_404() ) {
		return __( 'Страница не найдена | НикаДент', 'nika' );
	}

	return $title;
}
add_filter( 'pre_get_document_title', 'nika_filter_404_document_title', 20 );

function nika_filter_404_robots( $robots ) {
	if ( is_404() ) {
		$robots['noindex']  = true;
		$robots['nofollow'] = false;
	}

	return $robots;
}
add_filter( 'wp_robots', 'nika_filter_404_robots' );
