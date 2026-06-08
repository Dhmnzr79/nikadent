<?php
/**
 * Blog helper functions.
 *
 * @package Nika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function nika_get_blog_page_id() {
	$posts_page_id = (int) get_option( 'page_for_posts' );

	if ( $posts_page_id > 0 ) {
		return $posts_page_id;
	}

	$page = get_page_by_path( 'blog' );

	return $page instanceof WP_Post ? (int) $page->ID : 0;
}

function nika_get_blog_page() {
	$page_id = nika_get_blog_page_id();

	if ( $page_id <= 0 ) {
		return null;
	}

	$page = get_post( $page_id );

	return $page instanceof WP_Post ? $page : null;
}

function nika_get_blog_page_url() {
	$page = nika_get_blog_page();

	if ( $page instanceof WP_Post ) {
		return home_url( user_trailingslashit( get_page_uri( $page ) ) );
	}

	return home_url( '/blog/' );
}

function nika_get_blog_post_url( $post ) {
	$post = get_post( $post );

	if ( ! $post instanceof WP_Post || 'post' !== $post->post_type ) {
		return home_url( '/' );
	}

	return home_url( user_trailingslashit( $post->post_name ) );
}

function nika_is_blog_page() {
	if ( is_home() ) {
		return true;
	}

	if ( ! is_page() ) {
		return false;
	}

	return 'blog' === get_post_field( 'post_name', get_queried_object_id() );
}

function nika_get_blog_archive_title() {
	$page = nika_get_blog_page();

	if ( $page instanceof WP_Post ) {
		return get_the_title( $page );
	}

	return __( 'Блог', 'nika' );
}

function nika_get_blog_intro_html() {
	$page = nika_get_blog_page();

	if ( $page instanceof WP_Post && ! nika_is_seed_page_placeholder( $page ) ) {
		return apply_filters( 'the_content', $page->post_content );
	}

	return '';
}

function nika_get_blog_current_page() {
	return max(
		1,
		(int) get_query_var( 'paged' ),
		(int) get_query_var( 'page' )
	);
}

function nika_get_blog_posts_query() {
	return new WP_Query(
		array(
			'post_type'           => 'post',
			'post_status'         => 'publish',
			'posts_per_page'      => (int) get_option( 'posts_per_page' ),
			'paged'               => nika_get_blog_current_page(),
			'ignore_sticky_posts' => true,
		)
	);
}

function nika_get_post_preview_text( $post = null, $word_count = 28 ) {
	$post = get_post( $post );

	if ( ! $post instanceof WP_Post ) {
		return '';
	}

	if ( has_excerpt( $post ) ) {
		return trim( (string) get_the_excerpt( $post ) );
	}

	$content = strip_shortcodes( (string) $post->post_content );
	$content = wp_strip_all_tags( $content );

	return wp_trim_words( $content, $word_count );
}

function nika_filter_blog_post_permalink( $post_link, $post ) {
	if ( $post instanceof WP_Post && 'post' === $post->post_type ) {
		return nika_get_blog_post_url( $post );
	}

	return $post_link;
}
add_filter( 'post_link', 'nika_filter_blog_post_permalink', 10, 2 );
