<?php
/**
 * Fallback template.
 *
 * @package Nika
 */

get_header();
?>
<main class="site-main">
	<section class="page-hero page-hero--fallback">
		<div class="container">
			<h1 class="page-hero__title"><?php esc_html_e( 'Материалы сайта', 'nika' ); ?></h1>
		</div>
	</section>

	<section class="page-section">
		<div class="container">
			<?php if ( have_posts() ) : ?>
				<div class="posts">
					<?php
					while ( have_posts() ) :
						the_post();
						?>
						<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card' ); ?>>
							<h2 class="post-card__title">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h2>
							<div class="post-card__excerpt">
								<?php the_excerpt(); ?>
							</div>
						</article>
					<?php endwhile; ?>
				</div>
			<?php else : ?>
				<div class="page-empty">
					<h2 class="page-empty__title"><?php esc_html_e( 'Пока здесь пусто', 'nika' ); ?></h2>
					<p class="page-empty__text"><?php esc_html_e( 'Контент для этого раздела появится позже.', 'nika' ); ?></p>
				</div>
			<?php endif; ?>
		</div>
	</section>
</main>
<?php
get_footer();
?>
