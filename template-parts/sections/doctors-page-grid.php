<?php
/**
 * Doctors page grid.
 *
 * @package Nika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$doctors = nika_get_all_doctors();
?>
<section class="section doctors-page">
	<div class="container">
		<?php if ( ! empty( $doctors ) ) : ?>
			<div class="doctors-page__grid">
				<?php foreach ( $doctors as $doctor ) : ?>
					<article class="doctor-card doctor-card--page reveal">
						<a href="<?php echo esc_url( $doctor['url'] ); ?>" class="doctor-card__link" aria-label="<?php echo esc_attr( $doctor['name'] ); ?>">
							<?php if ( ! empty( $doctor['image'] ) ) : ?>
								<div class="doctor-photo">
									<img src="<?php echo esc_url( $doctor['image'] ); ?>" alt="<?php echo esc_attr( $doctor['name'] ); ?>">
								</div>
							<?php endif; ?>

							<div class="doctor-info">
								<div class="doctor-name"><?php echo esc_html( $doctor['name'] ); ?></div>

								<?php if ( ! empty( $doctor['speciality'] ) ) : ?>
									<div class="doctor-spec"><?php echo esc_html( $doctor['speciality'] ); ?></div>
								<?php endif; ?>

								<?php if ( ! empty( $doctor['experience'] ) ) : ?>
									<div class="doctor-exp"><?php echo esc_html( $doctor['experience'] ); ?></div>
								<?php endif; ?>
							</div>
						</a>
					</article>
				<?php endforeach; ?>
			</div>
		<?php else : ?>
			<div class="page-empty">
				<h2 class="page-empty__title"><?php esc_html_e( 'Список врачей скоро появится', 'nika' ); ?></h2>
				<p class="page-empty__text"><?php esc_html_e( 'Сейчас мы наполняем страницу специалистами клиники.', 'nika' ); ?></p>
			</div>
		<?php endif; ?>
	</div>
</section>
