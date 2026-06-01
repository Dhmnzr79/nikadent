<?php
/**
 * Doctors section.
 *
 * @package Nika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$doctors = nika_get_home_doctors();
?>
<section class="section section-brand doctors-section">
	<div class="doctors-deco">
		<div class="doctors-deco-sq1">
			<svg width="200" height="200" viewBox="0 0 234 234" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
				<rect width="234" height="234" rx="20" fill="url(#doc-grad-1)"/>
				<defs>
					<linearGradient id="doc-grad-1" x1="194" y1="-34" x2="-15" y2="216" gradientUnits="userSpaceOnUse">
						<stop stop-color="white" stop-opacity="0.15"/>
						<stop offset="1" stop-color="white" stop-opacity="0"/>
					</linearGradient>
				</defs>
			</svg>
		</div>
		<div class="doctors-deco-sq2">
			<svg width="150" height="150" viewBox="0 0 234 234" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
				<rect width="234" height="234" rx="20" fill="url(#doc-grad-2)"/>
				<defs>
					<linearGradient id="doc-grad-2" x1="194" y1="-34" x2="-15" y2="216" gradientUnits="userSpaceOnUse">
						<stop stop-color="white" stop-opacity="0.15"/>
						<stop offset="1" stop-color="white" stop-opacity="0"/>
					</linearGradient>
				</defs>
			</svg>
		</div>
		<div class="doctors-deco-sq3">
			<svg width="190" height="190" viewBox="0 0 234 234" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
				<rect width="234" height="234" rx="20" fill="url(#doc-grad-3)"/>
				<defs>
					<linearGradient id="doc-grad-3" x1="194" y1="-34" x2="-15" y2="216" gradientUnits="userSpaceOnUse">
						<stop stop-color="white" stop-opacity="0.15"/>
						<stop offset="1" stop-color="white" stop-opacity="0"/>
					</linearGradient>
				</defs>
			</svg>
		</div>
	</div>

	<div class="container">
		<div class="doctors-head">
			<div>
				<h2 class="section-title">Кто будет с вами работать</h2>
				<p class="section-subtitle">Команда из X специалистов. Опыт от 10 до 30 лет.</p>
			</div>
			<a href="<?php echo esc_url( nika_get_page_url( 'doctors' ) ); ?>" class="btn btn-outline-white btn-sm doctors-head__link">Все врачи →</a>
		</div>

		<div class="slider slider--doctors js-slider" data-desktop="4" data-tablet="2" data-mobile="1">
			<div class="slider__viewport">
				<div class="slider__track doctors-grid">
					<?php foreach ( $doctors as $doctor ) : ?>
						<article class="slider__slide doctor-card reveal">
							<div class="doctor-photo">
								<img src="<?php echo esc_url( $doctor['image'] ); ?>" alt="<?php echo esc_attr( $doctor['name'] ); ?>">
							</div>
							<div class="doctor-info">
								<div class="doctor-name"><?php echo esc_html( $doctor['name'] ); ?></div>
								<div class="doctor-spec"><?php echo esc_html( $doctor['speciality'] ); ?></div>
								<div class="doctor-exp"><?php echo esc_html( $doctor['experience'] ); ?></div>
								<div class="doctor-quote"><?php echo esc_html( $doctor['quote'] ); ?></div>
							</div>
						</article>
					<?php endforeach; ?>
				</div>
			</div>

			<div class="slider__controls">
				<button class="slider__arrow slider__arrow--prev" type="button" aria-label="Предыдущий слайд">
					<svg width="20" height="20" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M15 18l-6-6 6-6" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
				</button>
				<button class="slider__arrow slider__arrow--next" type="button" aria-label="Следующий слайд">
					<svg width="20" height="20" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M9 18l6-6-6-6" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
				</button>
			</div>

			<div class="slider__dots"></div>
		</div>
	</div>
</section>
