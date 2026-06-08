<?php
/**
 * Blog archive template.
 *
 * @package Nika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$breadcrumb_items = nika_get_breadcrumb_items();
?>
<main class="site-main site-main--inner">
	<section class="page-top">
		<div class="container">
			<?php if ( ! empty( $breadcrumb_items ) ) : ?>
				<nav class="breadcrumbs" aria-label="<?php esc_attr_e( 'Хлебные крошки', 'nika' ); ?>">
					<?php foreach ( $breadcrumb_items as $index => $breadcrumb_item ) : ?>
						<?php $is_last = $index === count( $breadcrumb_items ) - 1; ?>
						<span class="breadcrumbs__item">
							<?php if ( ! $is_last && ! empty( $breadcrumb_item['url'] ) ) : ?>
								<a href="<?php echo esc_url( $breadcrumb_item['url'] ); ?>" class="breadcrumbs__link"><?php echo esc_html( $breadcrumb_item['label'] ); ?></a>
							<?php else : ?>
								<span class="breadcrumbs__current"><?php echo esc_html( $breadcrumb_item['label'] ); ?></span>
							<?php endif; ?>
						</span>
					<?php endforeach; ?>
				</nav>
			<?php endif; ?>

			<h1 class="page-top__title"><?php echo esc_html( nika_get_blog_archive_title() ); ?></h1>
		</div>
	</section>

	<?php get_template_part( 'template-parts/sections/blog-page', null, array( 'query' => $wp_query ) ); ?>
	<?php get_template_part( 'template-parts/sections/cta-main' ); ?>
	<?php get_template_part( 'template-parts/sections/contacts' ); ?>
</main>
<?php
get_footer();
?>
