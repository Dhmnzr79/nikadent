<?php
/**
 * Site header.
 *
 * @package Nika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$menu_items     = nika_get_menu_items();
$branches_label = nika_get_branches_label();
$primary_phone  = nika_get_primary_phone();
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="site-header">
	<div class="header-inner">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo" aria-label="<?php esc_attr_e( 'НикаДент', 'nika' ); ?>">
			<img src="<?php echo esc_url( nika_asset_url( 'images/logo.svg' ) ); ?>" alt="<?php esc_attr_e( 'НикаДент', 'nika' ); ?>" class="logo-img">
		</a>

		<div class="header-actions">
			<div class="header-right">
				<div class="header-addresses"><?php echo esc_html( $branches_label ); ?></div>
				<?php if ( $primary_phone ) : ?>
					<a href="<?php echo esc_url( $primary_phone['link'] ); ?>" class="header-phone" aria-label="<?php echo esc_attr( sprintf( 'Позвонить: %s', $primary_phone['label'] ) ); ?>">
						<span class="header-phone__label"><?php echo esc_html( $primary_phone['label'] ); ?></span>
						<span class="header-phone__icon" aria-hidden="true">
							<svg viewBox="0 0 24 24" focusable="false">
								<path fill="currentColor" d="M6.62 10.79a15.54 15.54 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 1.01-.24c1.11.37 2.3.56 3.58.56a1 1 0 0 1 1 1V20a1 1 0 0 1-1 1C10.61 21 3 13.39 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.28.19 2.47.56 3.58a1 1 0 0 1-.25 1.01l-2.19 2.2Z"></path>
							</svg>
						</span>
					</a>
				<?php endif; ?>
			</div>

			<a href="<?php echo esc_url( home_url( '/#cta' ) ); ?>" class="btn btn-primary btn-sm header-cta">Записаться</a>

			<button class="nav-toggle" type="button" aria-expanded="false" aria-controls="site-navigation">
				<span class="nav-toggle__line"></span>
				<span class="nav-toggle__line"></span>
				<span class="nav-toggle__line"></span>
				<span class="screen-reader-text"><?php esc_html_e( 'Открыть меню', 'nika' ); ?></span>
			</button>
		</div>

		<nav class="main-nav" id="site-navigation" aria-label="<?php esc_attr_e( 'Основное меню', 'nika' ); ?>">
			<?php foreach ( $menu_items as $menu_item ) : ?>
				<?php if ( ! empty( $menu_item['children'] ) ) : ?>
					<div class="nav-dropdown">
						<a class="nav-trigger" href="<?php echo esc_url( $menu_item['url'] ); ?>">
							<?php echo esc_html( $menu_item['label'] ); ?>
							<span class="nav-trigger-arrow">▾</span>
						</a>
						<div class="nav-dropdown-menu">
							<?php foreach ( $menu_item['children'] as $child_item ) : ?>
								<a href="<?php echo esc_url( $child_item['url'] ); ?>"><?php echo esc_html( $child_item['label'] ); ?></a>
							<?php endforeach; ?>
						</div>
					</div>
				<?php else : ?>
					<a href="<?php echo esc_url( $menu_item['url'] ); ?>"><?php echo esc_html( $menu_item['label'] ); ?></a>
				<?php endif; ?>
			<?php endforeach; ?>
		</nav>
	</div>
</header>
