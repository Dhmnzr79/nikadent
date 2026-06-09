<?php
/**
 * Standalone thank-you page template.
 *
 * @package Nika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'thanks-page-template' ); ?>>
<?php wp_body_open(); ?>
<main class="thanks-page">
	<div class="thanks-page__inner">
		<img src="<?php echo esc_url( nika_asset_url( 'images/logo.svg' ) ); ?>" alt="<?php esc_attr_e( 'Вика Дент', 'nika' ); ?>" class="thanks-page__logo">
		<h1 class="thanks-page__title">Спасибо за заявку</h1>
		<p class="thanks-page__text">Мы получили вашу заявку и скоро свяжемся с вами, чтобы подтвердить удобное время консультации.</p>
		<div class="thanks-page__actions">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary btn-lg">Вернуться на главную</a>
		</div>
	</div>
</main>
<?php wp_footer(); ?>
</body>
</html>
