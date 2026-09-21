<?php
/**
 * Removable prosthetics page.
 *
 * @package Nika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>
<main class="site-main site-main--prosthetics">
	<?php get_template_part( 'template-parts/sections/removable-prosthetics' ); ?>
	<?php get_template_part( 'template-parts/sections/doctors' ); ?>
	<?php get_template_part( 'template-parts/sections/ratings' ); ?>
	<?php get_template_part( 'template-parts/sections/reviews' ); ?>
	<?php get_template_part( 'template-parts/sections/removable-faq' ); ?>
	<?php get_template_part( 'template-parts/sections/contacts' ); ?>
</main>
<?php
get_footer();
?>
