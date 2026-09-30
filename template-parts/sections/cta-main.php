<?php
/**
 * Shared consultation CTA section.
 *
 * @package Nika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$title  = isset( $args['title'] ) ? (string) $args['title'] : __( 'Запишитесь на бесплатную консультацию по протезированию', 'nika' );
$text   = isset( $args['text'] ) ? (string) $args['text'] : __( 'Врач посмотрит, подскажет варианты и назовет точную цену. Без давления и обязательств.', 'nika' );
$items  = isset( $args['items'] ) && is_array( $args['items'] ) ? $args['items'] : array();
$button = isset( $args['button'] ) ? (string) $args['button'] : '';
?>
<section class="cta-main" id="cta">
	<div class="cta-main__deco" aria-hidden="true">
		<div class="cta-main__shape cta-main__shape--primary">
			<svg width="210" height="210" viewBox="0 0 234 234" fill="none" xmlns="http://www.w3.org/2000/svg">
				<rect width="234" height="234" rx="20" fill="url(#cta-grad-1)"/>
				<defs>
					<linearGradient id="cta-grad-1" x1="194" y1="-34" x2="-15" y2="216" gradientUnits="userSpaceOnUse">
						<stop stop-color="white" stop-opacity="0.15"/>
						<stop offset="1" stop-color="white" stop-opacity="0"/>
					</linearGradient>
				</defs>
			</svg>
		</div>
		<div class="cta-main__shape cta-main__shape--secondary">
			<svg width="160" height="160" viewBox="0 0 234 234" fill="none" xmlns="http://www.w3.org/2000/svg">
				<rect width="234" height="234" rx="20" fill="url(#cta-grad-2)"/>
				<defs>
					<linearGradient id="cta-grad-2" x1="194" y1="-34" x2="-15" y2="216" gradientUnits="userSpaceOnUse">
						<stop stop-color="white" stop-opacity="0.15"/>
						<stop offset="1" stop-color="white" stop-opacity="0"/>
					</linearGradient>
				</defs>
			</svg>
		</div>
	</div>

	<div class="container">
		<div class="cta-main__content">
			<h2 class="cta-main__title"><?php echo esc_html( $title ); ?></h2>
			<p class="cta-main__text"><?php echo esc_html( $text ); ?></p>
			<?php if ( ! empty( $items ) ) : ?>
				<div class="consultation-points">
					<?php foreach ( $items as $item ) : ?>
						<article class="consultation-points__item reveal">
							<h3 class="consultation-points__title"><?php echo esc_html( $item['title'] ); ?></h3>
							<p class="consultation-points__text"><?php echo esc_html( $item['text'] ); ?></p>
						</article>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>

			<div class="cta-main__actions">
				<?php if ( '' !== $button ) : ?>
					<button type="button" class="btn btn-accent btn-lg" data-popup-trigger data-popup-label="<?php echo esc_attr( $button ); ?>"><?php echo esc_html( $button ); ?></button>
				<?php else : ?>
				<a href="#" class="btn btn-accent btn-lg"><?php esc_html_e( 'Записаться онлайн', 'nika' ); ?></a>
				<a href="tel:+79004446997" class="btn btn-outline-white btn-lg" data-popup-ignore><?php esc_html_e( 'Позвонить', 'nika' ); ?></a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
