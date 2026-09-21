<?php
/**
 * Temporary site-wide notice.
 *
 * @package Nika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<aside class="site-notice" aria-label="<?php esc_attr_e( 'Важная информация о работе филиала', 'nika' ); ?>">
	<div class="site-notice__inner">
		<span class="site-notice__icon" aria-hidden="true">!</span>
		<p class="site-notice__text">
			<span class="site-notice__title">Временные изменения в работе:</span>
			с <span class="site-notice__emphasis">1 августа по 30 сентября</span> филиал на
			<span class="site-notice__emphasis">ул. Рябикова, 49</span> не работает. Будем рады принять вас
			на <span class="site-notice__emphasis">ул. Пограничной, 27</span> — запись ведётся по прежним
			номерам телефонов.
		</p>
	</div>
</aside>
