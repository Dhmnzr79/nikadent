<?php
/**
 * Static data for theme sections.
 *
 * @package Nika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function nika_get_home_doctors() {
	return array(
		array(
			'name'        => 'Иванов Иван Иванович',
			'speciality'  => 'Врач-стоматолог-ортопед',
			'experience'  => '25 лет опыта',
			'quote'       => '«Делаю так, чтобы пациенту было удобно носить протез каждый день, а не первые две недели»',
			'image'       => nika_asset_url( 'images/doc-02.jpg' ),
			'show_slider' => true,
		),
		array(
			'name'        => 'Петрова Мария Сергеевна',
			'speciality'  => 'Врач-стоматолог-ортопед',
			'experience'  => '18 лет опыта',
			'quote'       => '«Я всегда объясняю, что и зачем делаю. Пациент должен понимать каждый шаг»',
			'image'       => nika_asset_url( 'images/doc-01.jpg' ),
			'show_slider' => true,
		),
		array(
			'name'        => 'Сидоров Александр Николаевич',
			'speciality'  => 'Врач-стоматолог-хирург',
			'experience'  => '22 года опыта',
			'quote'       => '«Основная задача — чтобы пациент вышел из кабинета без боли и со спокойствием»',
			'image'       => nika_asset_url( 'images/doc-03.jpg' ),
			'show_slider' => true,
		),
		array(
			'name'        => 'Кадиев Хамид Хасанович',
			'speciality'  => 'Врач-стоматолог-хирург',
			'experience'  => '5 лет опыта',
			'quote'       => '«Боятся все. Но когда объясняешь — становится гораздо легче»',
			'image'       => nika_asset_url( 'images/doc-04.jpg' ),
			'show_slider' => true,
		),
	);
}

function nika_get_home_reviews() {
	return array(
		array(
			'name'       => 'Имя пациента',
			'text'       => 'Реальный отзыв пациента №1 — текст согласовать с заказчиком.',
			'meta'       => 'Источник · дата',
			'avatar'     => '',
			'show_slider'=> true,
		),
		array(
			'name'       => 'Имя пациента',
			'text'       => 'Реальный отзыв пациента №2 — текст согласовать с заказчиком.',
			'meta'       => 'Источник · дата',
			'avatar'     => '',
			'show_slider'=> true,
		),
		array(
			'name'       => 'Имя пациента',
			'text'       => 'Реальный отзыв пациента №3 — текст согласовать с заказчиком.',
			'meta'       => 'Источник · дата',
			'avatar'     => '',
			'show_slider'=> true,
		),
	);
}

function nika_get_home_ratings() {
	return array(
		array(
			'source' => 'Яндекс Карты',
			'count'  => 'уточнить кол-во отзывов',
			'score'  => '4.8',
		),
		array(
			'source' => 'ПроДокторов',
			'count'  => 'уточнить кол-во отзывов',
			'score'  => '4.9',
		),
		array(
			'source' => '2ГИС',
			'count'  => 'уточнить кол-во отзывов',
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
			'hours'   => 'Пн–Пт: 9:00 – 18:00<br>Сб: 9:00 – 15:00 &nbsp;·&nbsp; Вс: выходной',
			'phones'  => array(
				'+7 (900) 444-69-97' => 'tel:+79004446997',
				'+7 (984) 164-52-89' => 'tel:+79841645289',
			),
		),
		array(
			'number'  => '02',
			'title'   => 'Филиал 2',
			'address' => 'г. Елизово, ул. Пограничная, д. 27',
			'hours'   => 'Пн–Пт: 9:00 – 18:00<br>Сб: 9:00 – 15:00 &nbsp;·&nbsp; Вс: выходной',
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
