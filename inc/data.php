<?php
/**
 * Theme data providers.
 *
 * @package Nika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function nika_get_home_doctors() {
	return nika_get_doctor_entries( true );
}

function nika_get_all_doctors() {
	return nika_get_doctor_entries();
}

function nika_get_home_reviews() {
	$reviews = nika_get_review_entries( true );

	foreach ( $reviews as &$review ) {
		if ( ! empty( $review['preview_text'] ) ) {
			$review['text'] = $review['preview_text'];
		}
	}
	unset( $review );

	return $reviews;
}

function nika_get_home_ratings() {
	return array(
		array(
			'source' => 'Яндекс Карты',
			'score'  => '4.8',
		),
		array(
			'source' => '2ГИС',
			'score'  => '4.8',
		),
	);
}

function nika_get_contact_branches() {
	return array(
		array(
			'number'  => '01',
			'title'   => 'Филиал 1',
			'address' => 'г. Елизово, ул. Рябикова, д. 49, помещ. 50',
			'hours'   => 'Пн-Пт: 9:00 - 18:00<br>Сб: 9:00 - 15:00 &nbsp;·&nbsp; Вс: выходной',
			'phones'  => array(
				'+7 (900) 444-69-97' => 'tel:+79004446997',
				'+7 (984) 164-52-89' => 'tel:+79841645289',
			),
		),
		array(
			'number'  => '02',
			'title'   => 'Филиал 2',
			'address' => 'г. Елизово, ул. Пограничная, д. 27',
			'hours'   => 'Пн-Пт: 9:00 - 18:00<br>Сб: 9:00 - 15:00 &nbsp;·&nbsp; Вс: выходной',
			'phones'  => array(
				'+7 (914) 995-78-82' => 'tel:+79149957882',
				'+7 (900) 437-57-46' => 'tel:+79004375746',
			),
		),
	);
}

function nika_get_gallery_images() {
	return array(
		array(
			'src' => nika_asset_url( 'images/gallery-01.jpg' ),
			'alt' => 'Команда НикаДент',
		),
		array(
			'src' => nika_asset_url( 'images/gallery-02.jpg' ),
			'alt' => 'Зубное протезирование',
		),
		array(
			'src' => nika_asset_url( 'images/gallery-03.jpg' ),
			'alt' => 'Медицинская сестра',
		),
		array(
			'src' => nika_asset_url( 'images/gallery-04.jpg' ),
			'alt' => 'Врач за работой',
		),
	);
}
