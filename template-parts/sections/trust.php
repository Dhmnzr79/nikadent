<?php
/**
 * Trust stats strip.
 *
 * @package Nika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$items = isset( $args['items'] ) && is_array( $args['items'] ) ? $args['items'] : array(
	array(
		'value' => '16',
		'unit'  => ' лет',
		'label' => 'на Камчатке',
	),
	array(
		'value' => '2',
		'unit'  => '',
		'label' => 'филиала в городе',
	),
	array(
		'value' => '10 000',
		'unit'  => '+',
		'label' => 'пациентов',
	),
	array(
		'value' => '0',
		'unit'  => ' ₽',
		'label' => 'консультация по протезированию',
	),
);

if ( empty( $items ) ) {
	return;
}
?>
<section class="trust">
	<div class="container trust__grid">
		<?php foreach ( $items as $item ) : ?>
			<div class="trust__item">
				<span class="trust__value"><?php echo esc_html( $item['value'] ); ?><?php if ( ! empty( $item['unit'] ) ) : ?><span class="trust__unit"><?php echo esc_html( $item['unit'] ); ?></span><?php endif; ?></span>
				<span class="trust__label"><?php echo esc_html( $item['label'] ); ?></span>
			</div>
		<?php endforeach; ?>
	</div>
</section>
