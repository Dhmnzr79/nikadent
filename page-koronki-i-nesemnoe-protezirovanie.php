<?php
/**
 * Crowns and fixed prosthetics page.
 *
 * @package Nika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>
<main class="site-main site-main--prosthetics">
	<?php get_template_part( 'template-parts/sections/fixed-prosthetics' ); ?>
	<?php get_template_part( 'template-parts/sections/doctors' ); ?>
	<?php get_template_part( 'template-parts/sections/ratings' ); ?>
	<?php get_template_part( 'template-parts/sections/reviews' ); ?>
	<?php
	get_template_part(
		'template-parts/sections/faq',
		null,
		array(
			'items' => array(
				array(
					'question' => 'Сколько служит коронка?',
					'answer'   => 'Металлокерамика — 10–15 лет, цирконий — 15–20 лет при нормальном уходе. Многое зависит от того, как ухаживаете за полостью рта.',
				),
				array(
					'question' => 'Не отвалится ли?',
					'answer'   => 'Коронка фиксируется специальным стоматологическим цементом. Если правильно установлена и нормально нагружается — держится очень надёжно.',
				),
				array(
					'question' => 'Что если зуб под коронкой заболит?',
					'answer'   => 'Приходите сразу. Боль под коронкой — сигнал, что нужен осмотр. Коронку при необходимости снимем, вылечим и поставим новую.',
				),
				array(
					'question' => 'Чем металлокерамика отличается от циркония?',
					'answer'   => 'Металлокерамика — металлический каркас, покрытый керамикой. Надёжна, проверена годами, чуть дешевле. Цирконий — полностью белый материал, прочнее, не просвечивает серым у основания. Для передних зубов лучше смотрится цирконий.',
				),
				array(
					'question' => 'Гарантия?',
					'answer'   => '1 год на работу. Если коронка скололась или выпала по нашей вине — переделаем бесплатно.',
				),
			),
		)
	);
	?>
	<?php get_template_part( 'template-parts/sections/contacts' ); ?>
</main>
<?php
get_footer();
?>
