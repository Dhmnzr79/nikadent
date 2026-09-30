<?php
/**
 * Shared hero check markers.
 *
 * @package Nika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$items = isset( $args['items'] ) && is_array( $args['items'] ) ? $args['items'] : array();

if ( empty( $items ) ) {
	return;
}
?>
<div class="hero-markers rise" data-delay="3">
	<?php foreach ( $items as $item ) : ?>
		<div class="hero-marker">
			<span class="check" aria-hidden="true">
				<svg width="14" height="14" viewBox="0 0 16 16" fill="none">
					<path d="M3 8.5L6.5 12L13 4.5" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/>
				</svg>
			</span>
			<?php echo esc_html( $item ); ?>
		</div>
	<?php endforeach; ?>
</div>
