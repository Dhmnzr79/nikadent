<?php
/**
 * Contacts section.
 *
 * @package Nika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$branches = nika_get_contact_branches();
?>
<section class="section section-soft">
	<div class="container">
		<div class="section-head">
			<h2 class="section-title">Наши контакты</h2>
		</div>

		<div class="contacts-grid">
			<?php foreach ( $branches as $branch ) : ?>
				<div class="branch-card reveal">
					<div class="branch-num"><?php echo esc_html( $branch['number'] ); ?></div>
					<span class="branch-title"><?php echo esc_html( $branch['title'] ); ?></span>
					<div class="branch-address"><?php echo esc_html( $branch['address'] ); ?></div>
					<div class="branch-hours"><?php echo wp_kses_post( $branch['hours'] ); ?></div>
					<span class="branch-phone">
						<?php foreach ( $branch['phones'] as $phone_label => $phone_link ) : ?>
							<a href="<?php echo esc_url( $phone_link ); ?>"><?php echo esc_html( $phone_label ); ?></a>
						<?php endforeach; ?>
					</span>
				</div>
			<?php endforeach; ?>
		</div>

		<div class="map-wrap">
			<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Aa533e1bb71583d62829bee7a415c9abccf2ba133139f6a291c78b16eb74d9743&amp;width=100%25&amp;height=560&amp;lang=ru_RU&amp;scroll=false"></script>
		</div>

		<div class="contacts-final-cta">
			<a href="<?php echo esc_url( home_url( '/#cta' ) ); ?>" class="btn btn-primary btn-lg">Записаться на бесплатную консультацию</a>
		</div>
	</div>
</section>
