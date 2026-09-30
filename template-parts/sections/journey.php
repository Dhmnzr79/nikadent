<?php
/**
 * Journey timeline section.
 *
 * @package Nika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$kicker = isset( $args['kicker'] ) ? (string) $args['kicker'] : '';
$title  = isset( $args['title'] ) ? (string) $args['title'] : '';
$lead   = isset( $args['lead'] ) ? (string) $args['lead'] : '';
$steps  = isset( $args['steps'] ) && is_array( $args['steps'] ) ? $args['steps'] : array();
$button = isset( $args['button'] ) ? (string) $args['button'] : '';
$collapsible = ! empty( $args['collapsible'] );

if ( '' === $title || empty( $steps ) ) {
	return;
}
?>
<section class="rp-section rp-journey">
	<div class="container rp-journey__grid">
		<div class="rp-journey__head">
			<?php if ( '' !== $kicker ) : ?>
				<div class="rp-kicker"><?php echo esc_html( $kicker ); ?></div>
			<?php endif; ?>
			<h2 class="rp-title"><?php echo esc_html( $title ); ?></h2>
			<?php if ( '' !== $lead ) : ?>
				<p class="rp-journey__lead"><?php echo esc_html( $lead ); ?></p>
			<?php endif; ?>
		</div>
		<div class="rp-journey__timeline">
			<?php foreach ( $steps as $step ) : ?>
				<article class="rp-journey__item reveal">
					<span class="rp-journey__num"><?php echo esc_html( $step['num'] ); ?></span>
					<div>
						<?php if ( $collapsible ) : ?>
							<details class="treatment-step" open>
								<summary class="treatment-step__trigger">
									<h3 class="rp-journey__title treatment-step__title"><?php echo esc_html( $step['title'] ); ?></h3>
									<span class="treatment-step__icon" aria-hidden="true"></span>
								</summary>
								<p class="rp-journey__text"><?php echo esc_html( $step['text'] ); ?></p>
							</details>
						<?php else : ?>
						<h3 class="rp-journey__title"><?php echo esc_html( $step['title'] ); ?></h3>
						<p class="rp-journey__text"><?php echo esc_html( $step['text'] ); ?></p>
						<?php endif; ?>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
	<?php if ( '' !== $button ) : ?>
		<div class="container rp-journey__action">
			<button type="button" class="btn btn-primary btn-lg" data-popup-trigger data-popup-label="<?php echo esc_attr( $button ); ?>">
				<?php echo esc_html( $button ); ?>
			</button>
		</div>
	<?php endif; ?>
</section>
