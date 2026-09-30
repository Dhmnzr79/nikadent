<?php
/**
 * All-on-4 service page.
 *
 * Template Name: Имплантация All-on-4
 * @package Nika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>
<main class="site-main site-main--prosthetics site-main--all-on-4">
	<?php get_template_part( 'template-parts/sections/all-on-4', null, nika_get_all_on_4_content() ); ?>
	<?php get_template_part( 'template-parts/sections/doctors' ); ?>
	<?php get_template_part( 'template-parts/sections/ratings' ); ?>
	<?php get_template_part( 'template-parts/sections/reviews' ); ?>
	<?php get_template_part( 'template-parts/sections/contacts' ); ?>
</main>
<?php get_footer(); ?>
