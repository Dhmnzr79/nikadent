<?php
/**
 * Default single post template.
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
				<div class="blog-single__lead">
					<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
				</div>
			</div>
		</section>

		<section class="page-section blog-single">
			<div class="container">
				<article class="blog-single__article">
					<?php if ( has_post_thumbnail() ) : ?>
						<div class="blog-single__media">
							<?php the_post_thumbnail( 'large', array( 'class' => 'blog-single__image' ) ); ?>
						</div>
					<?php endif; ?>

					<div class="blog-single__content">
						<?php the_content(); ?>
					</div>
				</article>

				<div class="blog-single__footer">
					<a href="<?php echo esc_url( nika_get_blog_page_url() ); ?>" class="btn btn-secondary btn-sm"><?php esc_html_e( 'Все статьи', 'nika' ); ?></a>
				</div>
			</div>
		</section>
	<?php endwhile; ?>

	<?php get_template_part( 'template-parts/sections/contacts' ); ?>
</main>
<?php
get_footer();
?>
