<?php
/**
 * Comment restrictions.
 *
 * @package Nika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function nika_disable_post_comments_support() {
	remove_post_type_support( 'post', 'comments' );
	remove_post_type_support( 'post', 'trackbacks' );
	remove_post_type_support( 'page', 'comments' );
	remove_post_type_support( 'page', 'trackbacks' );
}
add_action( 'init', 'nika_disable_post_comments_support', 20 );

function nika_filter_comments_open( $open, $post_id ) {
	$post = get_post( $post_id );

	if ( $post instanceof WP_Post && in_array( $post->post_type, array( 'post', 'page' ), true ) ) {
		return false;
	}

	return $open;
}
add_filter( 'comments_open', 'nika_filter_comments_open', 20, 2 );
add_filter( 'pings_open', 'nika_filter_comments_open', 20, 2 );

function nika_hide_existing_comments( $comments ) {
	if ( is_singular( array( 'post', 'page' ) ) ) {
		return array();
	}

	return $comments;
}
add_filter( 'comments_array', 'nika_hide_existing_comments', 10, 1 );

function nika_remove_comments_menu() {
	remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'nika_remove_comments_menu' );

function nika_redirect_comments_admin_page() {
	global $pagenow;

	if ( 'edit-comments.php' === $pagenow ) {
		wp_safe_redirect( admin_url() );
		exit;
	}
}
add_action( 'admin_init', 'nika_redirect_comments_admin_page' );
