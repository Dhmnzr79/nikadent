<?php
/**
 * FAQ section.
 *
 * @package Nika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$kicker = isset( $args['kicker'] ) ? (string) $args['kicker'] : 'FAQ';
$title  = isset( $args['title'] ) ? (string) $args['title'] : 'Коротко о том, что обычно спрашивают';
$lead   = isset( $args['lead'] ) ? (string) $args['lead'] : 'Без медицинской энциклопедии — только ответы, которые нужны перед первым визитом.';
$items  = isset( $args['items'] ) && is_array( $args['items'] ) ? $args['items'] : array();

if ( empty( $items ) ) {
	return;
}
?>
<section class="rp-section rp-faq">
	<div class="container rp-faq__grid">
		<div class="rp-faq__head">
			<div class="rp-kicker"><?php echo esc_html( $kicker ); ?></div>
			<h2 class="rp-title"><?php echo esc_html( $title ); ?></h2>
			<?php if ( '' !== $lead ) : ?>
				<p class="rp-faq__lead"><?php echo esc_html( $lead ); ?></p>
			<?php endif; ?>
		</div>
		<div class="rp-faq__list">
			<?php foreach ( $items as $index => $item ) : ?>
				<details class="rp-faq__item"<?php echo ( ! empty( $item['open'] ) || 0 === $index ) ? ' open' : ''; ?>>
					<summary class="rp-faq__question">
						<?php echo esc_html( $item['question'] ); ?>
						<span class="rp-faq__icon" aria-hidden="true">+</span>
					</summary>
					<p class="rp-faq__answer"><?php echo esc_html( $item['answer'] ); ?></p>
				</details>
			<?php endforeach; ?>
		</div>
	</div>
</section>
