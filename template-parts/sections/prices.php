<?php
/**
 * Prices section for the prices page.
 *
 * @package Nika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$price_sections = nika_get_price_sections();
$has_prices     = false;

foreach ( $price_sections as $price_section ) {
	if ( ! empty( $price_section['services'] ) ) {
		$has_prices = true;
		break;
	}
}

if ( ! $has_prices ) {
	return;
}
?>
<section class="page-section prices-page">
	<div class="container">
		<div class="prices-page__card">
			<div class="prices-page__list">
				<?php foreach ( $price_sections as $price_section ) : ?>
					<?php if ( empty( $price_section['services'] ) ) : ?>
						<?php continue; ?>
					<?php endif; ?>

					<?php $group_classes = empty( $price_section['title'] ) ? 'prices-page__group prices-page__group--untitled' : 'prices-page__group'; ?>
					<div class="<?php echo esc_attr( $group_classes ); ?>">
						<?php if ( ! empty( $price_section['title'] ) ) : ?>
							<h2 class="prices-page__group-title"><?php echo esc_html( $price_section['title'] ); ?></h2>
						<?php endif; ?>

						<div class="prices-page__rows">
							<?php foreach ( $price_section['services'] as $service ) : ?>
								<div class="prices-page__row">
									<div class="prices-page__service"><?php echo esc_html( $service['name'] ); ?></div>
									<div class="prices-page__price">
										<?php if ( '' !== $service['price'] ) : ?>
											<?php echo esc_html( $service['price'] ); ?>
										<?php else : ?>
											&mdash;
										<?php endif; ?>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
