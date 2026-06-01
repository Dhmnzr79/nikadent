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
		<?php foreach ( $ratings as $rating ) : ?>
			<div class="rating-item">
				<div class="rating-source-wrap">
					<div class="rating-source"><?php echo esc_html( $rating['source'] ); ?></div>
					<div class="rating-count"><?php echo esc_html( $rating['count'] ); ?></div>
				</div>
				<div class="rating-score-wrap">
					<div class="rating-score"><?php echo esc_html( $rating['score'] ); ?></div>
					<div class="rating-stars">★★★★★</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>
