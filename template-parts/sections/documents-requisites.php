<?php
/**
 * Documents page requisites section.
 *
 * @package Nika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$requisites = array(
	array(
		'label' => 'Полное наименование',
		'value' => 'Общество с ограниченной ответственностью "ВИКА ДЕНТ"',
	),
	array(
		'label' => 'Сокращенное наименование',
		'value' => 'ООО "ВИКА ДЕНТ"',
	),
	array(
		'label' => 'ИНН',
		'value' => '4100055346',
	),
	array(
		'label' => 'КПП',
		'value' => '410001001',
	),
	array(
		'label' => 'ОГРН',
		'value' => '1254100001968',
	),
	array(
		'label' => 'Юридический адрес',
		'value' => '684000, Камчатский край, м.р-н Елизовский, г.п. Елизовское, г Елизово, ул. Рябикова, дом 49, помещение 50',
	),
	array(
		'label' => 'Генеральный директор',
		'value' => 'Сабурова Виктория Викторовна',
	),
	array(
		'label' => 'Номер счета',
		'value' => '40702810236710000253',
	),
	array(
		'label' => 'Банк',
		'value' => 'СЕВЕРО-ВОСТОЧНОЕ ОТДЕЛЕНИЕ N8645 ПАО СБЕРБАНК',
	),
	array(
		'label' => 'БИК',
		'value' => '044442607',
	),
	array(
		'label' => 'Корр. счет',
		'value' => '30101810300000000607',
	),
);
?>
<section class="page-section documents-page">
	<div class="container">
		<div class="documents-page__card">
			<div class="documents-page__head">
				<h2 class="documents-page__title">Реквизиты</h2>
				<p class="documents-page__subtitle">ООО "ВИКА ДЕНТ"</p>
			</div>

			<div class="documents-page__list">
				<?php foreach ( $requisites as $item ) : ?>
					<div class="documents-page__row">
						<div class="documents-page__label"><?php echo esc_html( $item['label'] ); ?></div>
						<div class="documents-page__value"><?php echo esc_html( $item['value'] ); ?></div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>

		<div class="documents-page__card documents-page__card--cta">
			<div class="documents-page__cta">
				<div class="documents-page__cta-content">
					<h2 class="documents-page__title">Выписка из реестра ООО Вика Дент</h2>
				</div>
				<div class="documents-page__cta-actions">
					<a href="http://localhost:8086/wp-content/uploads/2026/06/vypiska-iz-reestra-ooo-vika-dent.pdf" class="btn btn-secondary btn-lg" target="_blank" rel="noopener noreferrer">Посмотреть</a>
				</div>
			</div>
		</div>
	</div>
</section>
