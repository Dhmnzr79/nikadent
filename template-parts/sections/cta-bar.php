<?php
/**
 * Compact consultation CTA bar.
 *
 * @package Nika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$title        = isset( $args['title'] ) ? (string) $args['title'] : 'Не уверены, что подойдёт?';
$text         = isset( $args['text'] ) ? (string) $args['text'] : 'Запишитесь на бесплатную консультацию — врач посмотрит, подскажет, подберёт';
$button_label = isset( $args['button'] ) ? (string) $args['button'] : 'Записаться на бесплатную консультацию';
?>
<section class="cta-bar">
	<div class="container cta-bar__inner">
		<div class="cta-bar__copy">
			<h2 class="cta-bar__title"><?php echo esc_html( $title ); ?></h2>
			<p class="cta-bar__text"><?php echo esc_html( $text ); ?></p>
		</div>
		<button type="button" class="btn btn-accent btn-lg cta-bar__button" data-popup-trigger data-popup-label="<?php echo esc_attr( $button_label ); ?>">
			<?php echo esc_html( $button_label ); ?>
		</button>
	</div>
</section>
