<?php
/**
 * Ratings section.
 *
 * @package Nika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$ratings = nika_get_home_ratings();
?>
<div class="ratings-strip">
	<div class="ratings-inner">
		<div class="rating-item rating-item--intro">
			<div class="rating-intro">
				<div class="rating-intro__eyebrow">Независимые рейтинги</div>
				<div class="rating-intro__text">Пациенты чаще всего находят нас и делятся впечатлениями именно на внешних площадках.</div>
			</div>
		</div>

		<?php foreach ( $ratings as $rating ) : ?>
			<div class="rating-item">
				<div class="rating-source-wrap">
					<div class="rating-source"><?php echo esc_html( $rating['source'] ); ?></div>
				</div>
				<div class="rating-score-wrap">
					<div class="rating-score"><?php echo esc_html( $rating['score'] ); ?></div>
					<div class="rating-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>
