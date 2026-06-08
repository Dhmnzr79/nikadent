<?php
/**
 * Shared consultation CTA section.
 *
 * @package Nika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
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
			<h2 class="cta-main__title"><?php esc_html_e( 'Запишитесь на бесплатную консультацию', 'nika' ); ?></h2>
			<p class="cta-main__text"><?php esc_html_e( 'Врач посмотрит, подскажет варианты и назовет точную цену. Без давления и обязательств.', 'nika' ); ?></p>

			<div class="cta-main__actions">
				<a href="#" class="btn btn-accent btn-lg"><?php esc_html_e( 'Записаться онлайн', 'nika' ); ?></a>
				<a href="<?php echo esc_url( nika_get_page_url( 'contacts' ) ); ?>" class="btn btn-outline-white btn-lg"><?php esc_html_e( 'Позвонить', 'nika' ); ?></a>
			</div>
		</div>
	</div>
</section>
