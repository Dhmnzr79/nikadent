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
<main class="site-main site-main--inner">
	<?php
	while ( have_posts() ) :
		the_post();

		$breadcrumb_items = nika_get_breadcrumb_items();
		$is_contacts_page = 'contacts' === get_post_field( 'post_name', get_the_ID() );
		$is_doctors_page  = 'doctors' === get_post_field( 'post_name', get_the_ID() );
		$is_prices_page   = 'prices' === get_post_field( 'post_name', get_the_ID() );
		$show_page_content = ! $is_contacts_page && ! $is_doctors_page;

		if ( function_exists( 'nika_is_seed_page_placeholder' ) && nika_is_seed_page_placeholder( get_post() ) ) {
			$show_page_content = false;
		}
		?>
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

				<h1 class="page-top__title"><?php the_title(); ?></h1>

				<?php if ( $show_page_content ) : ?>
					<div class="page-top__content">
						<?php the_content(); ?>
					</div>
				<?php endif; ?>
			</div>
		</section>

		<?php if ( $is_contacts_page ) : ?>
			<?php get_template_part( 'template-parts/sections/contacts', null, array( 'show_title' => false ) ); ?>
		<?php elseif ( $is_doctors_page ) : ?>
			<?php get_template_part( 'template-parts/sections/doctors-page-grid' ); ?>
		<?php elseif ( $is_prices_page ) : ?>
			<?php get_template_part( 'template-parts/sections/prices' ); ?>
		<?php endif; ?>
	<?php endwhile; ?>

	<?php if ( is_page( 'doctors' ) ) : ?>
		<?php get_template_part( 'template-parts/sections/contacts' ); ?>
	<?php elseif ( is_page( 'prices' ) ) : ?>
		<?php get_template_part( 'template-parts/sections/contacts' ); ?>
	<?php elseif ( ! is_page( 'contacts' ) ) : ?>
		<?php get_template_part( 'template-parts/sections/doctors' ); ?>
		<?php get_template_part( 'template-parts/sections/ratings' ); ?>
		<?php get_template_part( 'template-parts/sections/reviews' ); ?>
		<?php get_template_part( 'template-parts/sections/contacts' ); ?>
	<?php endif; ?>
</main>
<?php
get_footer();
?>
