<?php
/**
 * Removable prosthetics landing sections.
 *
 * @package Nika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hero_image = nika_asset_url( 'images/main-bg.png' );
$type_images = array(
	'full'    => nika_asset_url( 'images/protez-01.jpg' ),
	'partial' => nika_asset_url( 'images/protez-02.jpg' ),
	'temp'    => nika_asset_url( 'images/protez-03.jpg' ),
	'clasp'   => nika_asset_url( 'images/protez-04.jpg' ),
);

$prosthetics_types = array(
	array(
		'id'     => 'full',
		'label'  => 'Полные',
		'num'    => '01 / 04',
		'title'  => 'Полные съёмные протезы',
		'text'   => 'Когда зубов на челюсти совсем не осталось. Доступное решение, которое помогает восстановить жевание и внешний вид.',
		'price'  => 'от 40 000 ₽',
		'image'  => $type_images['full'],
		'facts'  => array(
			'Пластиночный — от 40 000 ₽',
			'С армированием — от 45 000 ₽',
			'Acry Free — от 55 000 ₽',
		),
		'note'   => 'Acry Free может подойти, если важны меньший вес и эстетика или есть чувствительность к классическому акрилу.',
	),
	array(
		'id'     => 'partial',
		'label'  => 'Частичные',
		'num'    => '02 / 04',
		'title'  => 'Частичные съёмные протезы',
		'text'   => 'Когда часть своих зубов сохранена, но нужно закрыть большие промежутки и вернуть нормальную жевательную функцию.',
		'price'  => 'от 35 000 ₽',
		'image'  => $type_images['partial'],
		'facts'  => array(
			'Пластиночный — от 35 000 ₽',
			'Нейлоновый / ацеталовый — от 40 000 ₽',
			'Подбор опорных зубов после осмотра',
		),
		'note'   => 'Гибкие материалы могут ощущаться комфортнее, но выбор зависит не только от желания — важны прикус и состояние опорных зубов.',
	),
	array(
		'id'     => 'temp',
		'label'  => 'Временные',
		'num'    => '03 / 04',
		'title'  => 'Иммедиат-протез',
		'text'   => 'Временная конструкция на период, пока изготавливается постоянный протез. Помогает не оставаться без зубов после удаления.',
		'price'  => 'от 10 000 ₽',
		'image'  => $type_images['temp'],
		'facts'  => array(
			'Обычно на 1–3 зуба',
			'Временное решение',
			'Срок ношения определяет врач',
		),
		'note'   => 'Иммедиат-протез не заменяет постоянную конструкцию, но делает переходный период психологически и функционально проще.',
	),
	array(
		'id'     => 'clasp',
		'label'  => 'Бюгельные',
		'num'    => '04 / 04',
		'title'  => 'Бюгельные протезы',
		'text'   => 'Прочная конструкция на тонкой металлической дуге. Подходит, когда есть собственные зубы, которые можно использовать как опору.',
		'price'  => 'по плану лечения',
		'image'  => $type_images['clasp'],
		'facts'  => array(
			'Кламмерная фиксация',
			'Замковая фиксация',
			'Меньше закрывает нёбо',
		),
		'note'   => 'Цена рассчитывается индивидуально: она зависит от фиксации, состояния опорных зубов и необходимости подготовки коронок.',
	),
);

$active_type = $prosthetics_types[0];

$indications = array(
	array(
		'num'   => '01',
		'title' => 'Нет всех зубов',
		'text'  => 'На одной или обеих челюстях.',
		'wide'  => true,
	),
	array(
		'num'   => '02',
		'title' => 'Не хватает 3+ зубов подряд',
		'text'  => '',
		'wide'  => false,
	),
	array(
		'num'   => '03',
		'title' => 'Импланты не подходят',
		'text'  => 'По здоровью, возрасту или бюджету.',
		'wide'  => false,
	),
	array(
		'num'   => '04',
		'title' => 'Нужно решить проблему быстрее',
		'text'  => '',
		'half'  => true,
	),
	array(
		'num'   => '05',
		'title' => 'Старый протез пора заменить',
		'text'  => '',
		'half'  => true,
	),
);

$hero_points = array(
	'Бесплатная консультация',
	'Без боли и давления',
	'Цена после осмотра',
	'Коррекция после установки',
);

$fears = array(
	array(
		'num'   => '01',
		'title' => '«Это больно»',
		'text'  => 'Подготовка проходит под местной анестезией. Снятие слепков и примерки сами по себе безболезненны.',
	),
	array(
		'num'   => '02',
		'title' => '«Будет неудобно и заметно»',
		'text'  => 'Современные материалы легче и аккуратнее, а конструкцию подгоняют по вашей анатомии.',
	),
	array(
		'num'   => '03',
		'title' => '«Это надолго»',
		'text'  => 'Обычно от первого визита до готового протеза проходит около 2–3 недель.',
	),
);

$journey_steps = array(
	array(
		'num'   => '01',
		'title' => 'Бесплатная консультация и план',
		'text'  => 'Врач смотрит ситуацию, объясняет варианты и называет ориентир по стоимости.',
	),
	array(
		'num'   => '02',
		'title' => 'Подготовка полости рта',
		'text'  => 'Если нужно — лечим воспаления, удаляем разрушенные зубы, готовим опорные.',
	),
	array(
		'num'   => '03',
		'title' => 'Снятие слепков',
		'text'  => 'Безболезненный этап, обычно один визит.',
	),
	array(
		'num'   => '04',
		'title' => 'Изготовление',
		'text'  => 'Чаще 1–2 недели, для отдельных конструкций — до 2–3 недель.',
	),
	array(
		'num'   => '05',
		'title' => 'Примерка и подгонка',
		'text'  => 'Проверяем фиксацию, речь, смыкание и комфорт.',
	),
	array(
		'num'   => '06',
		'title' => 'Можно снова есть и улыбаться',
		'text'  => 'Показываем уход и остаёмся на связи для коррекции.',
	),
);

$numbers = array(
	array(
		'value' => '2–3',
		'unit'  => 'недели',
		'text'  => 'обычно от первого визита до готового протеза',
	),
	array(
		'value' => '1',
		'unit'  => 'год',
		'text'  => 'гарантия на работу',
	),
	array(
		'value' => '5–10',
		'unit'  => 'лет',
		'text'  => 'может служить съёмный протез при правильном уходе',
	),
	array(
		'value' => '7–10',
		'unit'  => 'лет',
		'text'  => 'ориентир для бюгельного протеза',
	),
);

$prices = array(
	array(
		'label' => 'Съёмный протез',
		'value' => 'от 35 000 ₽',
	),
	array(
		'label' => 'Полный пластиночный, 1 челюсть',
		'value' => 'от 40 000 ₽',
	),
	array(
		'label' => 'С армированием, 1 челюсть',
		'value' => 'от 45 000 ₽',
	),
	array(
		'label' => 'Acry Free / термопластмасса',
		'value' => 'от 55 000 ₽',
	),
	array(
		'label' => 'Частичный пластиночный',
		'value' => 'от 35 000 ₽',
	),
	array(
		'label' => 'Нейлоновый / ацеталовый',
		'value' => 'от 40 000 ₽',
	),
	array(
		'label' => 'Иммедиат-протез, 1–3 зуба',
		'value' => 'от 10 000 ₽',
	),
);
?>
<section class="rp-hero">
	<div class="container rp-hero__grid">
		<div class="rp-hero__copy reveal is-visible">
			<div class="rp-hero__eyebrow"><span class="rp-hero__dot" aria-hidden="true"></span>Стоматология в Елизово · с 2009 года</div>
			<h1 class="rp-hero__title">Съёмные протезы <span class="rp-hero__title-accent">нового поколения</span></h1>
			<p class="rp-hero__lead">Современные протезы возвращают не только зубы — они возвращают возможность спокойно есть, говорить и улыбаться. Подберём решение под вашу ситуацию и бюджет.</p>
			<div class="rp-hero__points">
				<?php foreach ( $hero_points as $point ) : ?>
					<span class="rp-hero__point">
						<span class="rp-hero__check" aria-hidden="true">
							<svg width="14" height="14" viewBox="0 0 16 16" fill="none">
								<path d="M3 8.5L6.5 12L13 4.5" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</span>
						<?php echo esc_html( $point ); ?>
					</span>
				<?php endforeach; ?>
			</div>
			<div class="rp-hero__actions">
				<button type="button" class="btn btn-primary btn-lg" data-popup-trigger data-popup-label="Записаться на консультацию">Записаться на консультацию</button>
				<a class="rp-hero__link" href="#rp-types">Посмотреть варианты <span class="rp-hero__link-arrow">↓</span></a>
			</div>
		</div>
		<div class="rp-hero__visual reveal is-visible">
			<div class="rp-hero__blob rp-hero__blob--1" aria-hidden="true"></div>
			<div class="rp-hero__blob rp-hero__blob--2" aria-hidden="true"></div>
			<div class="rp-hero__blob rp-hero__blob--3" aria-hidden="true"></div>
			<img src="<?php echo esc_url( $hero_image ); ?>" alt="Пациенты стоматологии" class="rp-hero__people">
			<div class="rp-hero__note">
				<span class="rp-hero__note-icon">
					<svg width="44" height="44" viewBox="0 0 66 64" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
						<g clip-path="url(#rp-hf-clip)">
							<mask id="rp-hf-mask" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="66" height="64">
								<path d="M65.9104 0H0V64H65.9104V0Z" fill="white"/>
							</mask>
							<g mask="url(#rp-hf-mask)">
								<path d="M58.126 7.20028C67.0252 16.0995 67.915 49.6318 58.126 57.5418C48.337 65.4519 17.5733 65.4519 7.78445 57.5418C-2.00441 49.6318 -1.11475 16.0995 7.78445 7.20028C16.6836 -1.69892 49.2268 -1.69892 58.126 7.20028Z" fill="url(#rp-hf-grad)"/>
							</g>
						</g>
						<path d="M25.1735 15.5215C27.4622 15.5215 29.0839 16.4209 30.3323 17.1954C30.984 17.5998 31.4486 17.913 31.9343 18.1552C32.3894 18.3821 32.7473 18.4826 33.0882 18.4826C33.5485 18.4826 34.0261 18.3014 34.7228 17.8915C35.3313 17.5336 36.2771 16.8797 37.2296 16.4165C37.869 16.1056 38.6395 16.3719 38.9504 17.0113C39.2613 17.6507 38.9951 18.4211 38.3556 18.732C37.5039 19.1462 36.9133 19.5902 36.0284 20.1108C35.2319 20.5793 34.2594 21.0573 33.0882 21.0574C32.2064 21.0574 31.4436 20.7876 30.7853 20.4594C30.1577 20.1464 29.5162 19.7193 28.9748 19.3834C27.8369 18.6774 26.7239 18.0963 25.1735 18.0963C21.7557 18.0963 19.1437 20.8701 19.1846 24.3996C19.2174 27.2265 19.9428 31.1784 21.0475 35.0886C22.1346 38.9364 23.5514 42.611 24.9333 45.0121L24.9991 45.1255L25.0127 45.1492C25.0171 45.1572 25.0215 45.1652 25.0257 45.1733C25.2119 45.525 25.4012 45.6826 25.5513 45.7648C25.711 45.8523 25.9186 45.9042 26.2043 45.9042C26.5682 45.9042 26.8117 45.787 27.0165 45.5743C27.2514 45.3305 27.4906 44.8966 27.6508 44.1997L27.6582 44.1691C27.8334 43.4841 27.9665 42.6131 28.132 41.5882C28.2918 40.5991 28.4783 39.4951 28.7591 38.474C29.0358 37.4682 29.4358 36.4176 30.0915 35.5995C30.7885 34.7297 31.7804 34.1245 33.0881 34.1245C34.3959 34.1245 35.3876 34.7297 36.0847 35.5995C36.7403 36.4176 37.1404 37.4682 37.417 38.474C37.6979 39.4951 37.8843 40.5992 38.0441 41.5883C38.2045 42.5811 38.3344 43.4295 38.5016 44.1044L38.5179 44.1692L38.5253 44.1997C38.6855 44.8966 38.9248 45.3305 39.1597 45.5743C39.3645 45.787 39.608 45.9042 39.9718 45.9042C40.2575 45.9042 40.4652 45.8523 40.6249 45.7648C40.7749 45.6826 40.9643 45.525 41.1504 45.1733C41.159 45.1571 41.1679 45.1412 41.1771 45.1255C43.5253 41.111 45.9611 33.4717 46.7517 27.6432C46.8473 26.9386 47.4959 26.4449 48.2004 26.5405C48.905 26.636 49.3987 27.2847 49.3032 27.9892C48.4799 34.0587 45.9662 42.0255 43.4119 46.4042C43.0204 47.1333 42.4974 47.6749 41.8621 48.023C41.2287 48.37 40.5677 48.479 39.9718 48.479C38.9142 48.479 37.9994 48.0813 37.3052 47.3606C36.6448 46.6749 36.245 45.7635 36.0198 44.7929C35.8101 43.9678 35.6566 42.9541 35.5023 41.9989C35.3413 41.0027 35.1737 40.0267 34.9345 39.1569C34.691 38.2719 34.4049 37.6207 34.0755 37.2097C33.7876 36.8505 33.4956 36.6993 33.0881 36.6993C32.6806 36.6993 32.3886 36.8505 32.1007 37.2097C31.7714 37.6207 31.4852 38.2719 31.2418 39.1569C31.0025 40.0267 30.8348 41.0026 30.6739 41.9989C30.5195 42.9545 30.3659 43.9686 30.156 44.794C29.9308 45.7641 29.5311 46.6751 28.8709 47.3606C28.1767 48.0813 27.262 48.479 26.2043 48.479C25.6085 48.479 24.9475 48.37 24.3141 48.023C23.6788 47.675 23.1558 47.1334 22.7644 46.4044C21.2114 43.7422 19.7003 39.7905 18.5697 35.7886C17.4541 31.8402 16.6713 27.7102 16.6123 24.5779L16.61 24.4295C16.5538 19.578 20.2128 15.5215 25.1735 15.5215ZM37.342 31.1635V29.8761H36.0546C35.3436 29.8761 34.7672 29.2997 34.7672 28.5887C34.7672 27.8776 35.3436 27.3012 36.0546 27.3012H37.342V26.0139C37.342 25.3029 37.9184 24.7264 38.6294 24.7264C39.3404 24.7264 39.9168 25.3029 39.9168 26.0139V27.3012H41.2042C41.9152 27.3012 42.4916 27.8776 42.4916 28.5887C42.4916 29.2997 41.9152 29.8761 41.2042 29.8761H39.9168V31.1635C39.9168 31.8745 39.3404 32.4509 38.6294 32.4509C37.9184 32.4509 37.342 31.8745 37.342 31.1635ZM43.4571 23.8896V21.6367H41.2042C40.4932 21.6367 39.9168 21.0603 39.9168 20.3493C39.9168 19.6383 40.4932 19.0619 41.2042 19.0619H43.4571V16.8089C43.4571 16.0979 44.0336 15.5215 44.7446 15.5215C45.4556 15.5215 46.0319 16.0979 46.0319 16.8089V19.0619H48.2849C48.9959 19.0619 49.5723 19.6383 49.5723 20.3493C49.5723 21.0603 48.9959 21.6367 48.2849 21.6367H46.0319V23.8896C46.0319 24.6006 45.4556 25.177 44.7446 25.177C44.0336 25.177 43.4571 24.6006 43.4571 23.8896Z" fill="white"/>
						<defs>
							<linearGradient id="rp-hf-grad" x1="7.76591" y1="57.5973" x2="58.1444" y2="7.21869" gradientUnits="userSpaceOnUse">
								<stop stop-color="#CD38DA"/>
								<stop offset="1" stop-color="#FF9A35"/>
							</linearGradient>
							<clipPath id="rp-hf-clip">
								<rect width="66" height="64" fill="white"/>
							</clipPath>
						</defs>
					</svg>
				</span>
				<div class="rp-hero__note-text">Начинаем с простого. Сначала сохраняем то, что можно сохранить</div>
			</div>
		</div>
	</div>
</section>

<?php get_template_part( 'template-parts/sections/trust' ); ?>

<?php
get_template_part(
	'template-parts/sections/indications',
	null,
	array(
		'kicker' => 'Когда это ваш вариант',
		'title'  => 'Съёмное протезирование подходит не только когда зубов совсем нет',
		'text'   => 'Есть несколько сценариев, в которых это разумное, быстрое и финансово комфортное решение. На консультации врач посмотрит, что можно сохранить, и предложит варианты без навязывания имплантации.',
		'items'  => $indications,
	)
);
?>

<section class="rp-section rp-confidence">
	<div class="container rp-confidence__grid">
		<div class="rp-confidence__photo reveal">
			<img src="<?php echo esc_url( nika_asset_url( 'images/bg-08.jpg' ) ); ?>" alt="Работа с моделью зубов">
			<div class="rp-confidence__label">Современная ортопедия</div>
		</div>
		<div class="rp-confidence__copy reveal">
			<div class="rp-kicker">Не как раньше</div>
			<h2 class="rp-title">Забудьте о стеснении</h2>
			<p class="rp-confidence__lead">Современный протез — это не громоздкая конструкция «из прошлого». Он может быть тоньше, легче и естественнее, чем многие представляют.</p>
			<p class="rp-confidence__text">Врач подбирает конструкцию под вашу анатомию, объясняет период привыкания и приглашает на коррекцию, если что-то давит или натирает.</p>
			<blockquote class="rp-confidence__quote">«Задача не просто поставить протез. Задача — чтобы с ним можно было нормально жить».</blockquote>
		</div>
	</div>
</section>

<section class="rp-section rp-types" id="rp-types">
	<div class="container">
		<div class="rp-types__head">
			<div>
				<div class="rp-kicker">Виды протезов</div>
				<h2 class="rp-title">Подберём протез под вашу ситуацию, комфорт и бюджет</h2>
			</div>
			<p class="rp-types__lead">Точный материал и конструкция выбираются после осмотра. Здесь — логика выбора простым языком.</p>
		</div>
		<div class="rp-types__shell reveal" data-prosthetics-types>
			<div class="rp-types__tabs" role="tablist" aria-label="Виды протезов">
				<?php foreach ( $prosthetics_types as $index => $type ) : ?>
					<button
						class="rp-types__tab<?php echo 0 === $index ? ' is-active' : ''; ?>"
						type="button"
						role="tab"
						aria-selected="<?php echo 0 === $index ? 'true' : 'false'; ?>"
						data-prosthetics-tab
						data-num="<?php echo esc_attr( $type['num'] ); ?>"
						data-title="<?php echo esc_attr( $type['title'] ); ?>"
						data-text="<?php echo esc_attr( $type['text'] ); ?>"
						data-price="<?php echo esc_attr( $type['price'] ); ?>"
						data-image="<?php echo esc_url( $type['image'] ); ?>"
						data-note="<?php echo esc_attr( $type['note'] ); ?>"
						data-facts="<?php echo esc_attr( wp_json_encode( $type['facts'] ) ); ?>"
					>
						<span class="rp-types__tab-num"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span>
						<?php echo esc_html( $type['label'] ); ?>
					</button>
				<?php endforeach; ?>
			</div>
			<div class="rp-types__stage">
				<div class="rp-types__visual">
					<img data-prosthetics-image src="<?php echo esc_url( $active_type['image'] ); ?>" alt="Пример ортопедической конструкции">
					<div class="rp-types__price">
						<span class="rp-types__price-label">ориентир</span>
						<strong class="rp-types__price-value" data-prosthetics-price><?php echo esc_html( $active_type['price'] ); ?></strong>
					</div>
				</div>
				<div class="rp-types__content">
					<div class="rp-types__num" data-prosthetics-num><?php echo esc_html( $active_type['num'] ); ?></div>
					<h3 class="rp-types__title" data-prosthetics-title><?php echo esc_html( $active_type['title'] ); ?></h3>
					<p class="rp-types__text" data-prosthetics-text><?php echo esc_html( $active_type['text'] ); ?></p>
					<div class="rp-types__facts" data-prosthetics-facts>
						<?php foreach ( $active_type['facts'] as $fact ) : ?>
							<span class="rp-types__fact"><?php echo esc_html( $fact ); ?></span>
						<?php endforeach; ?>
					</div>
					<p class="rp-types__note" data-prosthetics-note><?php echo esc_html( $active_type['note'] ); ?></p>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="rp-section rp-clasp">
	<div class="rp-clasp__glow rp-clasp__glow--1" aria-hidden="true"></div>
	<div class="rp-clasp__glow rp-clasp__glow--2" aria-hidden="true"></div>
	<div class="container rp-clasp__grid">
		<div class="rp-clasp__title-block reveal">
			<div class="rp-kicker rp-kicker--light">Бюгельные протезы</div>
			<h2 class="rp-clasp__title">Когда хочется <span class="rp-clasp__accent">крепче</span> и удобнее</h2>
			<p class="rp-clasp__lead">Тонкая металлическая дуга делает конструкцию прочнее и помогает уменьшить объём протеза во рту.</p>
		</div>
		<div class="rp-clasp__info reveal">
			<div class="rp-clasp__benefits">
				<span class="rp-clasp__benefit">Меньше закрывает нёбо</span>
				<span class="rp-clasp__benefit">Стабильнее держится</span>
				<span class="rp-clasp__benefit">Часто быстрее привыкают</span>
			</div>
			<div class="rp-clasp__fixation">
				<article class="rp-clasp__card">
					<span class="rp-clasp__card-label">01 / Кламмеры</span>
					<h3 class="rp-clasp__card-title">Практично и надёжно</h3>
					<p class="rp-clasp__card-text">Металлические крючки крепятся за свои зубы. Функционально, но иногда заметно при широкой улыбке.</p>
				</article>
				<article class="rp-clasp__card">
					<span class="rp-clasp__card-label">02 / Замки</span>
					<h3 class="rp-clasp__card-title">Эстетичнее</h3>
					<p class="rp-clasp__card-text">Крепления спрятаны внутри коронок. Протез держится стабильнее, но опорные зубы требуют подготовки.</p>
				</article>
			</div>
		</div>
	</div>
</section>

<section class="rp-section rp-fears">
	<div class="container">
		<div class="rp-fears__head">
			<div class="rp-kicker">Частые страхи</div>
			<h2 class="rp-title">Что пугает — и почему зря</h2>
		</div>
		<div class="rp-fears__list">
			<?php foreach ( $fears as $fear ) : ?>
				<article class="rp-fears__row reveal">
					<div class="rp-fears__index"><?php echo esc_html( $fear['num'] ); ?></div>
					<h3 class="rp-fears__title"><?php echo esc_html( $fear['title'] ); ?></h3>
					<p class="rp-fears__text"><?php echo esc_html( $fear['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<?php
get_template_part(
	'template-parts/sections/journey',
	null,
	array(
		'kicker' => 'Пошагово',
		'title'  => 'От первого визита до новых зубов',
		'lead'   => 'Вся логика лечения на одной линии — без ощущения «непонятного процесса».',
		'steps'  => $journey_steps,
	)
);
?>

<section class="rp-numbers">
	<div class="container rp-numbers__grid">
		<?php foreach ( $numbers as $number ) : ?>
			<div class="rp-numbers__card">
				<strong class="rp-numbers__value"><?php echo esc_html( $number['value'] ); ?></strong>
				<span class="rp-numbers__unit"><?php echo esc_html( $number['unit'] ); ?></span>
				<p class="rp-numbers__text"><?php echo esc_html( $number['text'] ); ?></p>
			</div>
		<?php endforeach; ?>
	</div>
</section>

<section class="rp-section rp-prices">
	<div class="container rp-prices__grid">
		<div class="rp-prices__head reveal">
			<div class="rp-kicker">Стоимость</div>
			<h2 class="rp-title">Сначала понятный план. Потом лечение.</h2>
			<p class="rp-prices__lead">Цена зависит от конструкции, материала и подготовки полости рта. Точную сумму фиксируем после осмотра.</p>
			<div class="rp-prices__zero">
				<span class="rp-prices__zero-label">консультация</span>
				<strong class="rp-prices__zero-value">0 ₽</strong>
			</div>
			<button type="button" class="btn btn-primary btn-lg" data-popup-trigger data-popup-label="Записаться бесплатно">Записаться бесплатно</button>
		</div>
		<div class="rp-prices__list reveal">
			<?php foreach ( $prices as $price ) : ?>
				<div class="rp-prices__row">
					<span class="rp-prices__label"><?php echo esc_html( $price['label'] ); ?></span>
					<strong class="rp-prices__value"><?php echo esc_html( $price['value'] ); ?></strong>
				</div>
			<?php endforeach; ?>
			<div class="rp-prices__foot">
				<p class="rp-prices__foot-text">Бюгельный протез рассчитывается индивидуально после выбора типа фиксации.</p>
			</div>
		</div>
	</div>
</section>
