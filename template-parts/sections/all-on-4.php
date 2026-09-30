<?php
/**
 * All-on-4 service sections.
 *
 * @package Nika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hero     = $args['hero'];
$method   = $args['method'];
$benefits = $args['benefits'];
$title_prefix = substr( $hero['title'], 0, -strlen( $hero['title_accent'] ) );
$icons    = array(
	'M12 3l7 3v5c0 5-7 10-7 10S5 16 5 11V6l7-3z M8 12l3 3 5-6',
	'M12 3a9 9 0 1 0 9 9 M12 7v5l4 2 M17 3h4v4 M21 3l-6 6',
	'M4 12a8 8 0 1 0 16 0 8 8 0 0 0-16 0 M8 14c2 3 6 3 8 0 M8 9h.01 M16 9h.01',
	'M5 5h4v4H5z M15 5h4v4h-4z M5 15h4v4H5z M15 15h4v4h-4z M9 7h6 M7 9v6 M17 9v6 M9 17h6',
);
?>
<section class="hero">
	<div class="hero-inner">
		<div class="hero-content">
			<span class="hero-eyebrow rise"><?php echo esc_html( $hero['eyebrow'] ); ?></span>
			<h1 class="hero-h1 rise" data-delay="1"><?php echo esc_html( $title_prefix ); ?><span class="accent"><?php echo esc_html( $hero['title_accent'] ); ?></span></h1>
			<p class="hero-summary rise" data-delay="2"><?php echo esc_html( $hero['lead'] ); ?></p>
			<?php get_template_part( 'template-parts/sections/hero-markers', null, array( 'items' => $hero['markers'] ) ); ?>
			<div class="hero-btns rise" data-delay="4">
				<button type="button" class="btn btn-primary btn-lg" data-popup-trigger data-popup-label="<?php echo esc_attr( $hero['button'] ); ?>"><?php echo esc_html( $hero['button'] ); ?></button>
			</div>
		</div>
		<?php get_template_part( 'template-parts/sections/hero-visual', null, array( 'show_note' => false ) ); ?>
	</div>
</section>

<?php get_template_part( 'template-parts/sections/trust' ); ?>

<section class="section service-method">
	<div class="container service-method__grid">
		<div class="service-method__copy reveal">
			<h2 class="section-title"><?php echo esc_html( $method['title'] ); ?></h2>
			<?php foreach ( $method['paragraphs'] as $paragraph ) : ?>
				<p class="service-method__text"><?php echo esc_html( $paragraph ); ?></p>
			<?php endforeach; ?>
		</div>
		<div class="service-method__photos reveal" data-service-photos>
			<img class="service-method__photo service-method__photo--primary" src="<?php echo esc_url( nika_asset_url( 'images/all-on-4.jpg' ) ); ?>" width="800" height="800" alt="" loading="lazy" data-scroll-shift="14">
			<img class="service-method__photo service-method__photo--secondary" src="<?php echo esc_url( nika_asset_url( 'images/bg-07.jpg' ) ); ?>" width="477" height="477" alt="" loading="lazy" data-scroll-shift="28">
		</div>
	</div>
</section>

<?php get_template_part( 'template-parts/sections/indications', null, $args['indications'] ); ?>

<section class="section section-brand">
	<div class="container">
		<div class="section-head reveal">
			<h2 class="section-title"><?php echo esc_html( $benefits['title'] ); ?></h2>
			<p class="section-subtitle"><?php echo esc_html( $benefits['lead'] ); ?></p>
		</div>
		<div class="why-cards">
			<?php foreach ( $benefits['items'] as $index => $item ) : ?>
				<article class="why-card service-benefit reveal">
					<div class="why-icon service-benefit__icon" aria-hidden="true">
						<svg width="34" height="34" viewBox="0 0 24 24" fill="none"><path d="<?php echo esc_attr( $icons[ $index ] ); ?>" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
					</div>
					<h3 class="why-card-title"><?php echo esc_html( $item['title'] ); ?></h3>
					<p class="why-card-text"><?php echo esc_html( $item['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
		<div class="service-action">
			<button type="button" class="btn btn-accent btn-lg" data-popup-trigger data-popup-label="<?php echo esc_attr( $benefits['button'] ); ?>"><?php echo esc_html( $benefits['button'] ); ?></button>
		</div>
	</div>
</section>

<?php
get_template_part( 'template-parts/sections/journey', null, array_merge( $args['journey'], array( 'collapsible' => true ) ) );
get_template_part( 'template-parts/sections/cta-main', null, $args['consultation'] );
?>
