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
					<img src="<?php echo esc_url( nika_asset_url( 'images/logo-footer.svg' ) ); ?>" alt="<?php esc_attr_e( 'Вика Дент', 'nika' ); ?>" class="footer-logo__image">
				</a>
				<p class="footer-about">Стоматология в Елизово. 16 лет помогаем пациентам Камчатки восстанавливать зубы без страха и переплат.</p>
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
				<span>ООО «Вика Дент» &nbsp;|&nbsp; ИНН: 4100055346 &nbsp;|&nbsp; ОГРН: 1254100001968</span>
				<span>Лицензия № Л041-01025-41/03166063</span>
			</div>
			<div class="footer-legal__links">
				<a href="<?php echo esc_url( nika_get_page_url( 'privacy-policy' ) ); ?>" class="footer-legal__link" target="_blank" rel="noopener noreferrer">Политика конфиденциальности</a>
				<a href="<?php echo esc_url( nika_get_page_url( 'personal-data-consent' ) ); ?>" class="footer-legal__link" target="_blank" rel="noopener noreferrer">Согласие на обработку персональных данных</a>
			</div>
		</div>

		<div class="footer-disclaimer">
			<p class="footer-disclaimer__text">Имеются противопоказания, необходима консультация специалиста.</p>
		</div>
	</div>
</footer>

<div class="cookie-banner" data-cookie-consent hidden>
	<div class="cookie-banner__inner">
		<p class="cookie-banner__text">
			Мы используем необходимые cookies для работы сайта и подключаем внешние сервисы, например карту Яндекса, только после вашего согласия.
			<a href="<?php echo esc_url( nika_get_page_url( 'privacy-policy' ) ); ?>" target="_blank" rel="noopener noreferrer">Политика конфиденциальности</a>
			<a href="<?php echo esc_url( nika_get_page_url( 'personal-data-consent' ) ); ?>" target="_blank" rel="noopener noreferrer">Согласие на использование cookies</a>
		</p>
		<div class="cookie-banner__actions">
			<button class="btn btn-primary btn-sm cookie-banner__button" type="button" data-cookie-accept data-popup-ignore>Принять cookies</button>
			<button class="btn btn-secondary btn-sm cookie-banner__button" type="button" data-cookie-decline data-popup-ignore>Только необходимые</button>
		</div>
	</div>
</div>

<div class="site-popup" id="site-popup" aria-hidden="true">
	<div class="site-popup__backdrop" data-popup-close></div>
	<div class="site-popup__dialog" role="dialog" aria-modal="true" aria-labelledby="site-popup-title">
		<button class="site-popup__close" type="button" aria-label="<?php esc_attr_e( 'Закрыть окно', 'nika' ); ?>" data-popup-close>
			<span></span>
			<span></span>
		</button>

		<div class="site-popup__body">
			<h2 class="site-popup__title" id="site-popup-title">Оставьте заявку</h2>
			<p class="site-popup__text">Мы перезвоним вам в ближайшее время, разберем вашу ситуацию и запишем на консультацию, если захотите.</p>

			<form class="popup-form" id="popup-form" novalidate>
				<div class="popup-form__field">
					<label class="popup-form__label" for="popup-name">Имя</label>
					<input class="popup-form__input" id="popup-name" name="name" type="text" autocomplete="name" required>
				</div>

				<div class="popup-form__field">
					<label class="popup-form__label" for="popup-phone">Телефон</label>
					<input class="popup-form__input" id="popup-phone" name="phone" type="tel" inputmode="tel" autocomplete="tel" placeholder="+7(___) ___-__-__" required>
				</div>

				<input type="hidden" name="company" value="">
				<input type="hidden" name="page_url" value="">
				<input type="hidden" name="trigger_label" value="">

				<label class="popup-form__checkbox">
					<input class="popup-form__checkbox-input" name="privacy" type="checkbox" value="1" checked required>
					<span class="popup-form__checkbox-box" aria-hidden="true"></span>
					<span class="popup-form__checkbox-text">
						Я даю согласие на обработку
						<a href="<?php echo esc_url( nika_get_page_url( 'personal-data-consent' ) ); ?>" target="_blank" rel="noopener noreferrer">персональных данных</a>.
					</span>
				</label>

				<div class="popup-form__status" id="popup-form-status" aria-live="polite"></div>

				<button class="btn btn-primary btn-lg popup-form__submit" type="submit" data-popup-ignore>
					Отправить заявку
				</button>
			</form>
		</div>
	</div>
</div>

<?php wp_footer(); ?>
</body>
</html>
