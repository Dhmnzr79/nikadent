<?php
/**
 * Reviews section.
 *
 * @package Nika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$reviews = nika_get_home_reviews();
?>
<section class="section">
	<div class="container">
		<div class="section-head">
			<h2 class="section-title">Отзывы пациентов</h2>
		</div>

		<div class="slider slider--reviews js-slider" data-desktop="3" data-tablet="2" data-mobile="1">
			<div class="slider__viewport">
				<div class="slider__track reviews-grid">
					<?php foreach ( $reviews as $review ) : ?>
						<article class="slider__slide review-card reveal">
							<div class="review-quote-mark">“</div>
							<div class="review-text review-text--placeholder"><?php echo esc_html( $review['text'] ); ?></div>
							<div class="review-author">
								<div class="review-avatar review-avatar--placeholder">фото</div>
								<div class="review-author-info">
									<div class="review-name"><?php echo esc_html( $review['name'] ); ?></div>
									<div class="review-meta"><?php echo esc_html( $review['meta'] ); ?></div>
								</div>
							</div>
						</article>
					<?php endforeach; ?>
				</div>
			</div>

			<div class="slider__controls slider__controls--light">
				<button class="slider__arrow slider__arrow--prev" type="button" aria-label="Предыдущий отзыв">
					<svg width="20" height="20" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M15 18l-6-6 6-6" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
				</button>
				<button class="slider__arrow slider__arrow--next" type="button" aria-label="Следующий отзыв">
					<svg width="20" height="20" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M9 18l6-6-6-6" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
				</button>
			</div>

			<div class="slider__dots"></div>
		</div>
	</div>
</section>
