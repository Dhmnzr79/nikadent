<?php
/**
 * Site footer.
 *
 * @package Nika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$footer_links = nika_get_footer_links();
?>
<footer class="site-footer">
	<div class="footer-inner">
		<div class="footer-top">
			<div>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-logo">
					<img src="<?php echo esc_url( nika_asset_url( 'images/logo-footer.svg' ) ); ?>" alt="<?php esc_attr_e( 'НикаДент', 'nika' ); ?>" class="footer-logo__image">
				</a>
				<p class="footer-about">Стоматология в Елизово. 16 лет помогаем пациентам Камчатки восстанавливать зубы — без страха и переплат.</p>
			</div>

			<nav class="footer-nav" aria-label="<?php esc_attr_e( 'Навигация в подвале', 'nika' ); ?>">
				<?php foreach ( $footer_links as $footer_link ) : ?>
					<a href="<?php echo esc_url( $footer_link['url'] ); ?>"><?php echo esc_html( $footer_link['label'] ); ?></a>
				<?php endforeach; ?>
			</nav>

			<div class="footer-contacts">
				<div class="f-phone">+7 (900) 444-69-97<br>+7 (984) 164-52-89</div>
				<p>г. Елизово, ул. Рябикова, д. 49, помещ. 50</p>
				<div class="f-phone footer-contacts__phone-block">+7 (914) 995-78-82<br>+7 (900) 437-57-46</div>
				<p>г. Елизово, ул. Пограничная, д. 27</p>
			</div>
		</div>

		<div class="footer-legal">
			<div class="footer-legal__stack">
				<span>ООО «НикаДент» &nbsp;|&nbsp; ИНН ХХХХХХХХХХ &nbsp;|&nbsp; ОГРН ХХХХХХХХХХХХ</span>
				<span>Лицензия № ЛО-41-01-ХХХХ от ХХ.ХХ.ХХХХ</span>
			</div>
			<a href="<?php echo esc_url( nika_get_page_url( 'legal' ) ); ?>" class="footer-legal__link">Политика конфиденциальности</a>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
