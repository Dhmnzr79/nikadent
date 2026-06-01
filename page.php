<?php
/**
 * Generic page template.
 *
 * @package Nika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>
<main class="site-main">
	<?php
	while ( have_posts() ) :
		the_post();
		?>
		<section class="page-hero">
			<div class="container">
				<span class="page-hero__eyebrow">Раздел сайта</span>
				<h1 class="page-hero__title"><?php the_title(); ?></h1>
				<div class="page-hero__text">
					<?php the_content(); ?>
				</div>
			</div>
		</section>
	<?php endwhile; ?>

	<?php get_template_part( 'template-parts/sections/doctors' ); ?>
	<?php get_template_part( 'template-parts/sections/ratings' ); ?>
	<?php get_template_part( 'template-parts/sections/reviews' ); ?>
	<?php get_template_part( 'template-parts/sections/contacts' ); ?>
</main>
<?php
get_footer();
?>
