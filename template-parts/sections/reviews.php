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

if ( empty( $reviews ) ) {
	return;
}
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
						<?php
						$has_avatar        = ! empty( $review['avatar'] );
						$source_name       = ! empty( $review['source_name'] ) ? $review['source_name'] : '';
						$source_url        = ! empty( $review['source_url'] ) ? $review['source_url'] : '';
						$source_link_text  = ! empty( $review['source_link_text'] ) ? $review['source_link_text'] : '';
						$source_link_label = $source_link_text;

						if ( '' === $source_link_label && '' !== $source_url ) {
							$source_link_label = '' !== $source_name ? sprintf( 'Смотреть отзыв на %s', $source_name ) : 'Смотреть отзыв';
						}

						$has_source = '' !== $source_name || ( '' !== $source_link_label && '' !== $source_url );
						$has_date   = ! empty( $review['date'] );
						$has_meta   = $has_date || $has_source;
						$has_author = $has_avatar || ! empty( $review['name'] ) || $has_meta;
						?>
						<article class="slider__slide review-card reveal">
							<div class="review-quote-mark">“</div>

							<?php if ( ! empty( $review['text'] ) ) : ?>
								<div class="review-text"><?php echo wp_kses_post( wpautop( $review['text'] ) ); ?></div>
							<?php endif; ?>

							<?php if ( $has_author ) : ?>
								<div class="review-author">
									<?php if ( $has_avatar ) : ?>
										<div class="review-avatar">
											<img src="<?php echo esc_url( $review['avatar'] ); ?>" alt="<?php echo esc_attr( $review['name'] ); ?>">
										</div>
									<?php endif; ?>

									<div class="review-author-info">
										<?php if ( ! empty( $review['name'] ) ) : ?>
											<div class="review-name"><?php echo esc_html( $review['name'] ); ?></div>
										<?php endif; ?>

										<?php if ( $has_date ) : ?>
											<div class="review-meta">
												<?php if ( ! empty( $review['date'] ) ) : ?>
													<span><?php echo esc_html( $review['date'] ); ?></span>
												<?php endif; ?>
											</div>
										<?php endif; ?>

										<?php if ( $has_source ) : ?>
											<div class="review-source-meta">
												<?php if ( '' !== $source_name ) : ?>
													<span class="review-source-meta__label">Источник:</span>
													<span class="review-source-meta__value"><?php echo esc_html( $source_name ); ?></span>
												<?php endif; ?>

												<?php if ( '' !== $source_name && '' !== $source_link_label && '' !== $source_url ) : ?>
													<span class="review-meta__sep">·</span>
												<?php endif; ?>

												<?php if ( '' !== $source_link_label && '' !== $source_url ) : ?>
													<a class="review-source" href="<?php echo esc_url( $source_url ); ?>" target="_blank" rel="noopener noreferrer">
														<?php echo esc_html( $source_link_label ); ?> <span aria-hidden="true">↗</span>
													</a>
												<?php endif; ?>
											</div>
										<?php endif; ?>
									</div>
								</div>
							<?php endif; ?>
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
