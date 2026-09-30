<?php
/**
 * Indications section.
 *
 * @package Nika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$kicker = isset( $args['kicker'] ) ? (string) $args['kicker'] : '';
$title  = isset( $args['title'] ) ? (string) $args['title'] : '';
$text   = isset( $args['text'] ) ? (string) $args['text'] : '';
$items  = isset( $args['items'] ) && is_array( $args['items'] ) ? $args['items'] : array();
$note   = isset( $args['note'] ) ? (string) $args['note'] : '';

if ( '' === $title || empty( $items ) ) {
	return;
}

$grid_class = 'rp-intro__grid reveal';

if ( 4 === count( $items ) ) {
	$grid_class .= ' rp-intro__grid--four';
}
?>
<section class="rp-section rp-intro">
	<div class="container">
		<?php if ( '' !== $kicker ) : ?>
			<div class="rp-kicker"><?php echo esc_html( $kicker ); ?></div>
		<?php endif; ?>
		<div class="rp-intro__head">
			<h2 class="rp-intro__title"><?php echo esc_html( $title ); ?></h2>
			<?php if ( '' !== $text ) : ?>
				<p class="rp-intro__text"><?php echo esc_html( $text ); ?></p>
			<?php endif; ?>
		</div>
		<div class="<?php echo esc_attr( $grid_class ); ?>">
			<?php foreach ( $items as $item ) : ?>
				<?php
				$item_class = 'rp-indication';
				if ( ! empty( $item['wide'] ) ) {
					$item_class .= ' rp-indication--wide';
				}
				if ( ! empty( $item['half'] ) ) {
					$item_class .= ' rp-indication--half';
				}
				$item_text = isset( $item['text'] ) ? (string) $item['text'] : '';
				?>
				<article class="<?php echo esc_attr( $item_class ); ?>">
					<?php if ( ! empty( $item['num'] ) ) : ?>
						<span class="rp-indication__num"><?php echo esc_html( $item['num'] ); ?></span>
					<?php endif; ?>
					<h3 class="rp-indication__title"><?php echo esc_html( $item['title'] ); ?></h3>
					<?php if ( '' !== $item_text ) : ?>
						<p class="rp-indication__text"><?php echo esc_html( $item_text ); ?></p>
					<?php endif; ?>
				</article>
			<?php endforeach; ?>
		</div>
		<?php if ( '' !== $note ) : ?>
			<p class="rp-intro__note"><?php echo esc_html( $note ); ?></p>
		<?php endif; ?>
	</div>
</section>
