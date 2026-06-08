<?php
/**
 * Privacy policy page template.
 *
 * @package Nika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>
<main class="site-main site-main--inner">
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<?php $breadcrumb_items = nika_get_breadcrumb_items(); ?>

		<section class="page-top page-top--compact">
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

				<h1 class="page-top__title"><?php the_title(); ?></h1>
			</div>
		</section>

		<section class="page-section legal-page">
			<div class="container">
				<article class="legal-page__content">
					<?php echo wp_kses_post( nika_render_legal_document( nika_get_privacy_policy_text() ) ); ?>
				</article>
			</div>
		</section>
	<?php endwhile; ?>
</main>
<?php
get_footer();
