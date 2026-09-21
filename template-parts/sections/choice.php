<?php
/**
 * Choice table.
 *
 * @package Nika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$title = isset( $args['title'] ) ? (string) $args['title'] : '';
$items = isset( $args['items'] ) && is_array( $args['items'] ) ? $args['items'] : array();

if ( '' === $title || empty( $items ) ) {
	return;
}
?>
<section class="rp-section rp-choice">
	<div class="container">
		<h2 class="rp-title rp-choice__title"><?php echo esc_html( $title ); ?></h2>
		<div class="rp-choice__list">
			<div class="rp-choice__head">
				<div class="rp-choice__grid">
					<span class="rp-choice__label">Вид</span>
					<span class="rp-choice__label">Особенности</span>
					<span class="rp-choice__label">Цена</span>
					<span class="rp-choice__label rp-choice__label--icon" aria-hidden="true"></span>
				</div>
			</div>
			<?php foreach ( $items as $item ) : ?>
				<?php
				$name  = isset( $item['name'] ) ? (string) $item['name'] : '';
				$text  = isset( $item['text'] ) ? (string) $item['text'] : '';
				$price = isset( $item['price'] ) ? (string) $item['price'] : '';
				$label = sprintf( 'Записаться: %s', $name );
				?>
				<button
					class="rp-choice__row"
					type="button"
					data-popup-trigger
					data-popup-label="<?php echo esc_attr( $label ); ?>"
					aria-label="<?php echo esc_attr( $label ); ?>"
				>
					<span class="rp-choice__grid">
						<span class="rp-choice__name"><?php echo esc_html( $name ); ?></span>
						<span class="rp-choice__text"><?php echo esc_html( $text ); ?></span>
						<span class="rp-choice__price"><?php echo esc_html( $price ); ?></span>
						<span class="rp-choice__icon" aria-hidden="true">
							<svg width="20" height="20" viewBox="0 0 24 24" fill="none">
								<path d="M7 17L17 7M17 7H9M17 7V15" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</span>
					</span>
				</button>
			<?php endforeach; ?>
		</div>
	</div>
</section>
