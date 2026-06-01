<?php
/**
 * Single doctor template.
 *
 * @package Nika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>
<main class="site-main site-main--inner">
	<?php
	while ( have_posts() ) :
		the_post();

		$breadcrumb_items = nika_get_breadcrumb_items();
		$doctor           = nika_get_doctor_entry_data( get_post() );
		?>
		<section class="page-top page-top--compact">
			<div class="container">
				<?php if ( ! empty( $breadcrumb_items ) ) : ?>
					<nav class="breadcrumbs" aria-label="<?php esc_attr_e( 'Хлебные крошки', 'nika' ); ?>">
						<?php foreach ( $breadcrumb_items as $index => $breadcrumb_item ) : ?>
							<?php $is_last = $index === count( $breadcrumb_items ) - 1; ?>
							<span class="breadcrumbs__item">
								<?php if ( ! $is_last && ! empty( $breadcrumb_item['url'] ) ) : ?>
									<a href="<?php echo esc_url( $breadcrumb_item['url'] ); ?>" class="breadcrumbs__link"><?php echo esc_html( $breadcrumb_item['label'] ); ?></a>
								<?php else : ?>
									<span class="breadcrumbs__current"><?php echo esc_html( $breadcrumb_item['label'] ); ?></span>
								<?php endif; ?>
							</span>
						<?php endforeach; ?>
					</nav>
				<?php endif; ?>
			</div>
		</section>

		<section class="section doctor-single">
			<div class="container">
				<div class="doctor-single__layout">
					<div class="doctor-single__media">
						<?php if ( ! empty( $doctor['image'] ) ) : ?>
							<img src="<?php echo esc_url( $doctor['image'] ); ?>" alt="<?php echo esc_attr( $doctor['name'] ); ?>" class="doctor-single__image">
						<?php endif; ?>
					</div>

					<div class="doctor-single__content">
						<h1 class="doctor-single__title"><?php echo esc_html( $doctor['name'] ); ?></h1>

						<?php if ( ! empty( $doctor['speciality'] ) ) : ?>
							<div class="doctor-single__spec"><?php echo esc_html( $doctor['speciality'] ); ?></div>
						<?php endif; ?>

						<?php if ( ! empty( $doctor['experience'] ) ) : ?>
							<div class="doctor-single__exp"><?php echo esc_html( $doctor['experience'] ); ?></div>
						<?php endif; ?>

						<?php if ( ! empty( $doctor['description'] ) ) : ?>
							<div class="doctor-single__description">
								<?php echo wpautop( wp_kses_post( $doctor['description'] ) ); ?>
							</div>
						<?php endif; ?>

						<?php if ( ! empty( $doctor['quote'] ) ) : ?>
							<blockquote class="doctor-single__quote">
								<p><?php echo esc_html( $doctor['quote'] ); ?></p>
							</blockquote>
						<?php endif; ?>

						<?php if ( ! empty( $doctor['education'] ) ) : ?>
							<div class="doctor-single__education">
								<h2 class="doctor-single__section-title"><?php esc_html_e( 'Образование', 'nika' ); ?></h2>
								<div class="doctor-single__education-text">
									<?php echo wpautop( esc_html( $doctor['education'] ) ); ?>
								</div>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</section>
	<?php endwhile; ?>
</main>
<?php
get_footer();
?>
