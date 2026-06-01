<?php
/**
 * Site header.
 *
 * @package Nika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$menu_items = nika_get_menu_items();
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

		<button class="nav-toggle" type="button" aria-expanded="false" aria-controls="site-navigation">
			<span class="nav-toggle__line"></span>
			<span class="nav-toggle__line"></span>
			<span class="nav-toggle__line"></span>
			<span class="screen-reader-text"><?php esc_html_e( 'Открыть меню', 'nika' ); ?></span>
		</button>

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

		<div class="header-actions">
			<div class="header-right">
				<div class="header-addresses">2 филиала в Елизово</div>
				<div class="header-phone">+7 (4152) 20-XX-XX</div>
			</div>
			<a href="<?php echo esc_url( home_url( '/#cta' ) ); ?>" class="btn btn-primary btn-sm">Записаться</a>
		</div>
	</div>
</header>
