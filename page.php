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
	$is_legal_page = false;

	while ( have_posts() ) :
		the_post();

		$page_slug         = get_post_field( 'post_name', get_the_ID() );
		$is_privacy_page   = in_array( $page_slug, array( 'privacy-policy', 'privacy-policy-2' ), true );
		$breadcrumb_items  = nika_get_breadcrumb_items();
		$is_contacts_page  = 'contacts' === $page_slug;
		$is_doctors_page   = 'doctors' === $page_slug;
		$is_blog_page      = nika_is_blog_page();
		$is_prices_page    = 'prices' === $page_slug;
		$is_documents_page = 'documents' === $page_slug;
		$show_page_content = ! $is_contacts_page && ! $is_doctors_page && ! $is_blog_page;

		if ( $is_privacy_page ) {
			$is_legal_page = true;

			get_template_part(
				'template-parts/sections/legal-document',
				null,
				array(
					'document_text' => nika_get_privacy_policy_text(),
					'page_title'    => 'Политика в отношении обработки персональных данных',
				)
			);

			continue;
		}

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
		<?php elseif ( $is_blog_page ) : ?>
			<?php get_template_part( 'template-parts/sections/blog-page' ); ?>
		<?php elseif ( $is_prices_page ) : ?>
			<?php get_template_part( 'template-parts/sections/prices' ); ?>
		<?php elseif ( $is_documents_page ) : ?>
			<?php get_template_part( 'template-parts/sections/documents-requisites' ); ?>
		<?php endif; ?>
	<?php endwhile; ?>

	<?php if ( $is_legal_page ) : ?>
	<?php elseif ( is_page( 'doctors' ) ) : ?>
		<?php get_template_part( 'template-parts/sections/contacts' ); ?>
	<?php elseif ( is_page( 'prices' ) ) : ?>
		<?php get_template_part( 'template-parts/sections/contacts' ); ?>
	<?php elseif ( nika_is_blog_page() ) : ?>
		<?php get_template_part( 'template-parts/sections/cta-main' ); ?>
		<?php get_template_part( 'template-parts/sections/contacts' ); ?>
	<?php elseif ( ! is_page( 'contacts' ) && ! is_page( array( 'privacy-policy', 'personal-data-consent', 'documents' ) ) ) : ?>
		<?php get_template_part( 'template-parts/sections/doctors' ); ?>
		<?php get_template_part( 'template-parts/sections/ratings' ); ?>
		<?php get_template_part( 'template-parts/sections/reviews' ); ?>
		<?php get_template_part( 'template-parts/sections/contacts' ); ?>
	<?php elseif ( is_page( 'documents' ) ) : ?>
		<?php get_template_part( 'template-parts/sections/contacts' ); ?>
	<?php endif; ?>
</main>
<?php
get_footer();
?>
