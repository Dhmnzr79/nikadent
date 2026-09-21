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
		'label' => 'Лицензия',
		'value' => '№ Л041-01025-41/03166063 от 12.09.2025',
	),
	array(
		'label' => 'Лицензирующий орган',
		'value' => 'Министерство здравоохранения Камчатского края',
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

$document_groups = array(
	array(
		'title'       => 'Лицензия на медицинскую деятельность',
		'description' => 'Документы, подтверждающие право ООО «ВИКА ДЕНТ» на осуществление медицинской деятельности.',
		'documents'   => array(
			array(
				'title'       => 'Уведомление о предоставлении лицензии на осуществление медицинской деятельности',
				'description' => 'ООО «ВИКА ДЕНТ», лицензия № Л041-01025-41/03166063.',
				'format'      => 'PDF',
				'file'        => 'uvedomlenie-ooo-vika-dent-o-predostavlenii-licenzii-na-osushchestvlenie-medicinskoj-deyatelnosti.pdf',
			),
			array(
				'title'       => 'Выписка из реестра лицензий ООО «ВИКА ДЕНТ»',
				'description' => 'Сведения о лицензии, адресах и разрешённых видах медицинской деятельности.',
				'format'      => 'PDF',
				'path'        => '2026/06/vypiska-iz-reestra-ooo-vika-dent.pdf',
				'page_url'    => 'https://roszdravnadzor.gov.ru/services/licenses',
				'page_label'  => 'Проверить в реестре',
			),
		),
	),
	array(
		'title'       => 'Информация для пациентов',
		'description' => 'Порядок обращения в клинику и условия оказания платных медицинских услуг.',
		'documents'   => array(
			array(
				'title'       => 'Правила, порядки, условия и формы оказания платных медицинских услуг',
				'description' => 'Основной документ об условиях предоставления и оплаты медицинских услуг.',
				'format'      => 'DOC',
				'file'        => 'pravila-poryadki-usloviya-formy-okazaniya-platnykh-uslug.doc',
			),
			array(
				'title'       => 'Правила записи на приём',
				'description' => 'Способы записи, порядок обращения и отмены визита.',
				'format'      => 'DOCX',
				'file'        => 'pravila-zapisi-na-priem.docx',
			),
			array(
				'title'       => 'Прайс-лист на медицинские услуги',
				'description' => 'Стоимость услуг клиники. Цены также доступны в удобном формате на странице сайта.',
				'format'      => 'XLS',
				'file'        => 'price_26.08.26.xls',
				'page_url'    => home_url( '/prices/' ),
				'page_label'  => 'Цены на сайте',
			),
		),
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

		<?php foreach ( $document_groups as $group ) : ?>
			<div class="documents-page__card">
				<div class="documents-page__head">
					<h2 class="documents-page__title"><?php echo esc_html( $group['title'] ); ?></h2>
					<p class="documents-page__subtitle"><?php echo esc_html( $group['description'] ); ?></p>
				</div>

				<div class="documents-page__files">
					<?php foreach ( $group['documents'] as $document ) : ?>
						<?php
						$document_format = strtoupper( (string) $document['format'] );
						$document_url    = ! empty( $document['file'] )
							? nika_get_content_document_url( $document['file'] )
							: nika_get_uploaded_document_url( isset( $document['path'] ) ? $document['path'] : '' );
						$action_label    = 'PDF' === $document_format
							? 'Открыть PDF'
							: sprintf( 'Скачать %s', $document_format );
						?>
						<article class="documents-page__file">
							<div class="documents-page__file-type" aria-hidden="true"><?php echo esc_html( $document_format ); ?></div>
							<div class="documents-page__file-content">
								<h3 class="documents-page__file-title"><?php echo esc_html( $document['title'] ); ?></h3>
								<p class="documents-page__file-description"><?php echo esc_html( $document['description'] ); ?></p>
							</div>
							<div class="documents-page__file-actions">
								<?php if ( ! empty( $document['page_url'] ) ) : ?>
									<a href="<?php echo esc_url( $document['page_url'] ); ?>" class="documents-page__file-link"><?php echo esc_html( $document['page_label'] ); ?></a>
								<?php endif; ?>
								<?php if ( '' !== $document_url ) : ?>
									<a
										href="<?php echo esc_url( $document_url ); ?>"
										class="btn btn-secondary"
										data-popup-ignore
										<?php if ( 'PDF' === $document_format ) : ?>
											target="_blank" rel="noopener noreferrer"
										<?php else : ?>
											download
										<?php endif; ?>
									><?php echo esc_html( $action_label ); ?></a>
								<?php else : ?>
									<span class="documents-page__file-status">Файл готовится</span>
								<?php endif; ?>
							</div>
						</article>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</section>
