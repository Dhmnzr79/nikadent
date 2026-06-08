<?php
/**
 * Blog page section.
 *
 * @package Nika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$blog_query = isset( $args['query'] ) && $args['query'] instanceof WP_Query ? $args['query'] : nika_get_blog_posts_query();
$intro_html = nika_get_blog_intro_html();
$pagination = '';

if ( $blog_query->max_num_pages > 1 ) {
	$pagination = paginate_links(
		array(
			'current'   => max( 1, nika_get_blog_current_page() ),
			'total'     => $blog_query->max_num_pages,
			'type'      => 'list',
			'prev_text' => __( 'Назад', 'nika' ),
			'next_text' => __( 'Вперёд', 'nika' ),
		)
	);
}
?>
<section class="page-section blog-page">
	<div class="container">
		<?php if ( ! empty( trim( wp_strip_all_tags( $intro_html ) ) ) ) : ?>
			<div class="blog-page__intro">
				<?php echo wp_kses_post( $intro_html ); ?>
			</div>
		<?php endif; ?>

		<?php if ( $blog_query->have_posts() ) : ?>
			<div class="posts posts--blog">
				<?php
				while ( $blog_query->have_posts() ) :
					$blog_query->the_post();
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card post-card--blog' ); ?>>
						<a href="<?php the_permalink(); ?>" class="post-card__inner">
							<?php if ( has_post_thumbnail() ) : ?>
								<div class="post-card__media">
									<?php the_post_thumbnail( 'medium_large', array( 'class' => 'post-card__image' ) ); ?>
								</div>
							<?php endif; ?>

							<div class="post-card__body">
								<div class="post-card__meta">
									<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
								</div>

								<h2 class="post-card__title"><?php the_title(); ?></h2>
								<p class="post-card__excerpt"><?php echo esc_html( nika_get_post_preview_text( get_the_ID() ) ); ?></p>
								<span class="post-card__link"><?php esc_html_e( 'Читать статью', 'nika' ); ?></span>
							</div>
						</a>
					</article>
				<?php endwhile; ?>
			</div>

			<?php if ( $pagination ) : ?>
				<nav class="blog-pagination" aria-label="<?php esc_attr_e( 'Навигация по статьям', 'nika' ); ?>">
					<?php echo wp_kses_post( $pagination ); ?>
				</nav>
			<?php endif; ?>
		<?php else : ?>
			<div class="page-empty page-empty--blog">
				<h2 class="page-empty__title"><?php esc_html_e( 'Первые статьи скоро появятся', 'nika' ); ?></h2>
				<p class="page-empty__text"><?php esc_html_e( 'Раздел уже готов. Как только вы добавите записи в WordPress, они автоматически появятся на этой странице.', 'nika' ); ?></p>
			</div>
		<?php endif; ?>
	</div>
</section>
<?php
wp_reset_postdata();
?>
