<?php
/**
 * Front page template.
 *
 * @package Nika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$gallery_images = nika_get_gallery_images();

get_header();
?>
<main class="site-main site-main--front">
	<section class="hero">
		<div class="hero-inner">
			<div class="hero-content">
				<span class="hero-eyebrow rise">Стоматология в Елизово · с 2009 года</span>
				<h1 class="hero-h1 rise" data-delay="1">Стремимся сохранить <span class="accent">каждый зуб</span></h1>

				<p class="hero-summary rise" data-delay="2">Коронки, мосты и протезы на имплантах — прочность, естественность и полное восстановление жевания.</p>
				<?php
				get_template_part(
					'template-parts/sections/hero-markers',
					null,
					array(
						'items' => array(
							'Протезирование без стресса',
							'Протез от 30 000 ₽',
							'Консультация по ортопедии и имплантации бесплатная',
							'Возврат 13% через вычет',
						),
					)
				);
				?>

				<div class="hero-btns rise" data-delay="4">
					<a href="#cta" class="btn btn-primary btn-lg">Записаться на приём</a>
					<a href="<?php echo esc_url( nika_get_page_url( 'prices' ) ); ?>" class="btn btn-secondary btn-lg" data-popup-ignore>Посмотреть цены</a>
				</div>
			</div>

			<?php get_template_part( 'template-parts/sections/hero-visual' ); ?>
		</div>
	</section>

	<?php get_template_part( 'template-parts/sections/trust' ); ?>

	<section class="section">
		<div class="container">
			<div class="section-head">
				<h2 class="section-title">Чем можем помочь?</h2>
				<p class="section-subtitle">Выберите то, что вам нужно — расскажем про варианты и назовём точную цену</p>
			</div>

			<div class="services-cards">
				<button type="button" class="service-card reveal" data-popup-trigger data-popup-label="Восстановить зубы">
					<span class="service-card-num">01</span>
					<div class="service-card-title">Восстановить зубы</div>
					<div class="service-card-text">Подберём протез под ваш бюджет: съёмный, бюгельный или коронки — без давления на дорогие решения.</div>
					<span class="service-card-link">Подробнее <span class="arr">→</span></span>
				</button>
				<button type="button" class="service-card reveal" data-popup-trigger data-popup-label="Вылечить зуб">
					<span class="service-card-num">02</span>
					<div class="service-card-title">Вылечить зуб</div>
					<div class="service-card-text">Лечим от кариеса до сложных каналов под анестезией — стараемся сохранить зуб, а не удалить.</div>
					<span class="service-card-link">Подробнее <span class="arr">→</span></span>
				</button>
				<button type="button" class="service-card reveal" data-popup-trigger data-popup-label="Удалить зуб">
					<span class="service-card-num">03</span>
					<div class="service-card-title">Удалить зуб</div>
					<div class="service-card-text">Удалим зуб любой сложности без боли — анестезию подбираем под каждого пациента.</div>
					<span class="service-card-link">Подробнее <span class="arr">→</span></span>
				</button>
				<button type="button" class="service-card reveal" data-popup-trigger data-popup-label="Поставить имплант">
					<span class="service-card-num">04</span>
					<div class="service-card-title">Поставить имплант</div>
					<div class="service-card-text">Имплантат и коронка под ключ — восстановим зуб так, чтобы служил десятки лет.</div>
					<span class="service-card-link">Подробнее <span class="arr">→</span></span>
				</button>
			</div>
		</div>
	</section>

	<section class="section section-brand why-section">
		<div class="why-deco">
			<div class="why-deco-sq1">
				<svg width="230" height="230" viewBox="0 0 234 234" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
					<rect width="234" height="234" rx="20" fill="url(#why-grad-1)"/>
					<defs>
						<linearGradient id="why-grad-1" x1="194" y1="-34" x2="-15" y2="216" gradientUnits="userSpaceOnUse">
							<stop stop-color="white" stop-opacity="0.15"/>
							<stop offset="1" stop-color="white" stop-opacity="0"/>
						</linearGradient>
					</defs>
				</svg>
			</div>
			<div class="why-deco-sq2">
				<svg width="180" height="180" viewBox="0 0 234 234" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
					<rect width="234" height="234" rx="20" fill="url(#why-grad-2)"/>
					<defs>
						<linearGradient id="why-grad-2" x1="194" y1="-34" x2="-15" y2="216" gradientUnits="userSpaceOnUse">
							<stop stop-color="white" stop-opacity="0.15"/>
							<stop offset="1" stop-color="white" stop-opacity="0"/>
						</linearGradient>
					</defs>
				</svg>
			</div>
		</div>

		<div class="container">
			<div class="section-head">
				<h2 class="section-title">Почему приходят к нам</h2>
				<p class="section-subtitle">Клиника близкая к людям — без лишнего пафоса и переплат</p>
			</div>

			<div class="why-cards">
				<div class="why-card reveal">
					<div class="why-icon"><img src="<?php echo esc_url( nika_asset_url( 'images/icon-01.svg' ) ); ?>" alt="" aria-hidden="true"></div>
					<div class="why-card-title">Без боли</div>
					<div class="why-card-text">Все процедуры — под анестезией. Подбираем препарат под пациента. Многие приходят с тревогой, а после первого визита говорят, что боялись больше, чем стоило.</div>
				</div>
				<div class="why-card reveal">
					<div class="why-icon"><img src="<?php echo esc_url( nika_asset_url( 'images/icon-02.svg' ) ); ?>" alt="" aria-hidden="true"></div>
					<div class="why-card-title">Доступные цены</div>
					<div class="why-card-text">Съёмный протез от 35 000 ₽, коронка от 22 000 ₽. Не давим дорогими решениями. Делаем то, что нужно именно вам.</div>
				</div>
				<div class="why-card reveal">
					<div class="why-icon">
						<svg width="64" height="64" viewBox="0 0 66 64" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
							<g clip-path="url(#wc3-clip0)">
								<mask id="wc3-mask" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="66" height="64">
									<path d="M65.9104 0H0V64H65.9104V0Z" fill="white"/>
								</mask>
								<g mask="url(#wc3-mask)">
									<path d="M58.126 7.20028C67.0252 16.0995 67.915 49.6318 58.126 57.5418C48.337 65.4519 17.5733 65.4519 7.78445 57.5418C-2.00441 49.6318 -1.11475 16.0995 7.78445 7.20028C16.6836 -1.69892 49.2268 -1.69892 58.126 7.20028Z" fill="url(#wc3-grad)"/>
								</g>
								<g clip-path="url(#wc3-clip1)">
									<path d="M38.3446 34.6488L34.1617 31.5117V25.1214C34.1617 24.4788 33.6423 23.9595 32.9998 23.9595C32.3573 23.9595 31.8379 24.4788 31.8379 25.1214V32.0928C31.8379 32.4587 32.0099 32.8038 32.3027 33.0223L36.9502 36.508C37.1508 36.659 37.3951 36.7406 37.6462 36.7404C38.0005 36.7404 38.3491 36.5812 38.5769 36.2744C38.9627 35.762 38.8581 35.0335 38.3446 34.6488Z" fill="white"/>
									<path d="M33 17C24.7285 17 18 23.7285 18 32C18 40.2715 24.7285 47 33 47C41.2715 47 48 40.2715 48 32C48 23.7285 41.2715 17 33 17ZM33 44.6762C26.0112 44.6762 20.3238 38.9888 20.3238 32C20.3238 25.0112 26.0112 19.3238 33 19.3238C39.9899 19.3238 45.6762 25.0112 45.6762 32C45.6762 38.9888 39.9888 44.6762 33 44.6762Z" fill="white"/>
								</g>
							</g>
							<defs>
								<linearGradient id="wc3-grad" x1="7.76591" y1="57.5973" x2="58.1444" y2="7.21869" gradientUnits="userSpaceOnUse">
									<stop stop-color="#CD38DA"/>
									<stop offset="1" stop-color="#FF9A35"/>
								</linearGradient>
								<clipPath id="wc3-clip0"><rect width="66" height="64" fill="white"/></clipPath>
								<clipPath id="wc3-clip1"><rect width="30" height="30" fill="white" transform="translate(18 17)"/></clipPath>
							</defs>
						</svg>
					</div>
					<div class="why-card-title">Быстро</div>
					<div class="why-card-text">От первого визита до готового протеза — 2–3 недели. Временный протез дадим сразу, пока делается постоянный.</div>
				</div>
				<div class="why-card reveal">
					<div class="why-icon">
						<svg width="64" height="64" viewBox="0 0 66 64" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
							<g clip-path="url(#wc4-clip)">
								<mask id="wc4-mask" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="66" height="64">
									<path d="M65.9104 0H0V64H65.9104V0Z" fill="white"/>
								</mask>
								<g mask="url(#wc4-mask)">
									<path d="M58.126 7.20028C67.0252 16.0995 67.915 49.6318 58.126 57.5418C48.337 65.4519 17.5733 65.4519 7.78445 57.5418C-2.00441 49.6318 -1.11475 16.0995 7.78445 7.20028C16.6836 -1.69892 49.2268 -1.69892 58.126 7.20028Z" fill="url(#wc4-grad)"/>
								</g>
								<path d="M32.9183 47L32.4001 46.6812C27.3685 43.5884 20.7777 38.6671 17.953 32.7786C14.1123 24.7698 16.9185 19.7719 20.4879 17.9255C24.0969 16.0593 29.4612 16.8626 32.9289 21.745C35.782 17.8885 40.8724 15.5661 45.4768 17.9908C49.0462 19.8696 51.8155 24.8728 47.8758 32.7912C44.7494 39.0757 37.4872 44.1918 33.4359 46.6805L32.9183 47ZM24.3867 18.9804C23.3488 18.9734 22.3244 19.2149 21.3989 19.6847C18.6158 21.1238 16.5119 25.1923 19.7393 31.9231C22.2624 37.1811 28.1891 41.707 32.9183 44.6723C36.862 42.1935 43.3235 37.4999 46.1046 31.9099C48.8231 26.4452 48.2151 21.6698 44.5559 19.7435C41.4176 18.0912 36.5755 19.0451 33.7844 24.0668L32.9183 25.6227L32.0536 24.0661C30.0731 20.5053 27.0695 18.9804 24.3867 18.9804Z" fill="white"/>
							</g>
							<defs>
								<linearGradient id="wc4-grad" x1="7.76591" y1="57.5973" x2="58.1444" y2="7.21869" gradientUnits="userSpaceOnUse">
									<stop stop-color="#CD38DA"/>
									<stop offset="1" stop-color="#FF9A35"/>
								</linearGradient>
								<clipPath id="wc4-clip"><rect width="66" height="64" fill="white"/></clipPath>
							</defs>
						</svg>
					</div>
					<div class="why-card-title">Без сюрпризов</div>
					<div class="why-card-text">Называем точную цену на консультации. Никаких «доплат в процессе». Помогаем вернуть 13% через налоговый вычет.</div>
				</div>
			</div>
		</div>
	</section>

	<section class="section">
		<div class="container">
			<div class="protez-grid">
				<div>
					<h2 class="section-title protez-title">Вернём возможность нормально есть и улыбаться</h2>
					<div class="protez-text">
						<p>16 лет помогаем восстановить зубы — без навязывания дорогого там, где подходит простое. Не давим имплантацией, если подходит съёмный протез. Сначала смотрим, что есть, — потом честно говорим, что лучше в вашей ситуации. Цену называем на консультации и не меняем.</p>
						<p>Многие приходят к нам после долгих лет без зубов. Уходят с протезом через две-три недели — и говорят, что наконец-то можно нормально поесть.</p>
					</div>

					<div class="protez-cards">
						<div class="protez-card reveal">
							<div class="protez-card-ico protez-card-ico--plain">
								<svg width="48" height="48" viewBox="0 0 66 64" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
									<g clip-path="url(#pc1-clip0)">
										<mask id="pc1-mask" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="66" height="64"><path d="M65.9104 0H0V64H65.9104V0Z" fill="white"/></mask>
										<g mask="url(#pc1-mask)"><path d="M58.126 7.20028C67.0252 16.0995 67.915 49.6318 58.126 57.5418C48.337 65.4519 17.5733 65.4519 7.78445 57.5418C-2.00441 49.6318 -1.11475 16.0995 7.78445 7.20028C16.6836 -1.69892 49.2268 -1.69892 58.126 7.20028Z" fill="#DEC3E0"/></g>
										<g clip-path="url(#pc1-clip1)">
											<path d="M37.6 32.0976L31.5282 38.1694L28.4007 35.0408C28.3019 34.9385 28.1836 34.8569 28.0529 34.8007C27.9222 34.7446 27.7816 34.715 27.6393 34.7138C27.4971 34.7125 27.356 34.7396 27.2243 34.7935C27.0926 34.8474 26.973 34.9269 26.8724 35.0275C26.7718 35.1281 26.6923 35.2478 26.6384 35.3794C26.5845 35.5111 26.5574 35.6522 26.5586 35.7945C26.5599 35.9367 26.5894 36.0773 26.6456 36.208C26.7017 36.3388 26.7834 36.457 26.8857 36.5558L30.7707 40.4419C30.87 40.5417 30.988 40.621 31.118 40.675C31.248 40.7291 31.3874 40.7569 31.5282 40.7569C31.669 40.7569 31.8084 40.7291 31.9384 40.675C32.0684 40.621 32.1864 40.5417 32.2857 40.4419L39.115 33.6126C39.2173 33.5138 39.2989 33.3955 39.3551 33.2648C39.4112 33.1341 39.4408 32.9935 39.442 32.8512C39.4433 32.709 39.4162 32.5679 39.3623 32.4362C39.3084 32.3045 39.2289 32.1849 39.1283 32.0843C39.0277 31.9837 38.908 31.9042 38.7764 31.8503C38.6447 31.7964 38.5036 31.7693 38.3613 31.7705C38.2191 31.7718 38.0785 31.8013 37.9478 31.8575C37.817 31.9136 37.6988 31.9953 37.6 32.0976Z" fill="#662482"/>
											<path d="M42.6429 19.1H41.0357V18.0714C41.0357 17.7873 40.9228 17.5147 40.7219 17.3138C40.521 17.1129 40.2484 17 39.9643 17C39.6801 17 39.4076 17.1129 39.2067 17.3138C39.0057 17.5147 38.8929 17.7873 38.8929 18.0714V19.1H27.1071V18.0714C27.1071 17.7873 26.9943 17.5147 26.7933 17.3138C26.5924 17.1129 26.3199 17 26.0357 17C25.7516 17 25.479 17.1129 25.2781 17.3138C25.0772 17.5147 24.9643 17.7873 24.9643 18.0714V19.1H23.3571C20.4032 19.1 18 21.5032 18 24.4571V41.6429C18 44.5968 20.4032 47 23.3571 47H42.6429C45.5968 47 48 44.5968 48 41.6429V24.4571C48 21.5032 45.5968 19.1 42.6429 19.1ZM20.1429 24.4571C20.1429 22.685 21.585 21.2429 23.3571 21.2429H24.9643V22.2714C24.9643 22.5556 25.0772 22.8281 25.2781 23.029C25.479 23.23 25.7516 23.3429 26.0357 23.3429C26.3199 23.3429 26.5924 23.23 26.7933 23.029C26.9943 22.8281 27.1071 22.5556 27.1071 22.2714V21.2429H38.8929V22.2714C38.8929 22.5556 39.0057 22.8281 39.2067 23.029C39.4076 23.23 39.6801 23.3429 39.9643 23.3429C40.2484 23.3429 40.521 23.23 40.7219 23.029C40.9228 22.8281 41.0357 22.5556 41.0357 22.2714V21.2429H42.6429C44.415 21.2429 45.8571 22.685 45.8571 24.4571V25.5393H20.1429V24.4571ZM42.6429 44.8571H23.3571C21.585 44.8571 20.1429 43.415 20.1429 41.6429V27.6821H45.8571V41.6429C45.8571 43.415 44.415 44.8571 42.6429 44.8571Z" fill="#662482"/>
										</g>
									</g>
									<defs>
										<clipPath id="pc1-clip0"><rect width="66" height="64" fill="white"/></clipPath>
										<clipPath id="pc1-clip1"><rect width="30" height="30" fill="white" transform="translate(18 17)"/></clipPath>
									</defs>
								</svg>
							</div>
							<div class="protez-card-title">Восстановим не только улыбку, но и жевание</div>
							<div class="protez-card-text">Подбираем протез так, чтобы можно было нормально есть, говорить и улыбаться. Учитываем прикус и состояние дёсен.</div>
						</div>
						<div class="protez-card reveal">
							<div class="protez-card-ico protez-card-ico--plain">
								<svg width="48" height="48" viewBox="0 0 66 64" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
									<g clip-path="url(#pc2-clip0)">
										<mask id="pc2-mask" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="66" height="64"><path d="M65.9104 0H0V64H65.9104V0Z" fill="white"/></mask>
										<g mask="url(#pc2-mask)"><path d="M58.126 7.20028C67.0252 16.0995 67.915 49.6318 58.126 57.5418C48.337 65.4519 17.5733 65.4519 7.78445 57.5418C-2.00441 49.6318 -1.11475 16.0995 7.78445 7.20028C16.6836 -1.69892 49.2268 -1.69892 58.126 7.20028Z" fill="#DEC3E0"/></g>
										<g clip-path="url(#pc2-clip1)">
											<path d="M32.9551 46.9854C24.6922 46.9854 17.9697 40.2629 17.9697 32C17.9697 23.7371 24.6922 17.0146 32.9551 17.0146C41.218 17.0146 47.9405 23.7371 47.9405 32C47.9405 40.2629 41.218 46.9854 32.9551 46.9854ZM32.9551 18.8878C25.725 18.8878 19.8429 24.7699 19.8429 32C19.8429 39.2301 25.725 45.1122 32.9551 45.1122C40.1852 45.1122 46.0673 39.2301 46.0673 32C46.0673 24.7699 40.1852 18.8878 32.9551 18.8878ZM41.2857 35.2287C41.3959 35.0078 41.4142 34.7523 41.3366 34.5179C41.259 34.2836 41.0917 34.0895 40.8714 33.9781C40.6503 33.8669 40.3943 33.8473 40.1588 33.9235C39.9233 33.9997 39.7274 34.1655 39.6133 34.3852C39.5446 34.5169 37.8809 37.6195 32.9551 37.6195C28.0411 37.6195 26.3737 34.5322 26.2975 34.3864C26.1861 34.1652 25.9914 33.9973 25.7563 33.9196C25.5211 33.8419 25.2647 33.8608 25.0434 33.9721C24.9334 34.0271 24.8353 34.1033 24.7547 34.1962C24.6741 34.2891 24.6126 34.397 24.5737 34.5137C24.5348 34.6304 24.5193 34.7536 24.528 34.8763C24.5367 34.9989 24.5695 35.1187 24.6245 35.2287C24.7119 35.4029 26.827 39.4927 32.9551 39.4927C39.0832 39.4927 41.1983 35.4029 41.2857 35.2287ZM37.638 30.1268C36.605 30.1268 35.7648 29.2867 35.7648 28.2537C35.7648 27.2206 36.605 26.3805 37.638 26.3805C38.6711 26.3805 39.5112 27.2206 39.5112 28.2537C39.5112 29.2867 38.6711 30.1268 37.638 30.1268ZM28.2722 30.1268C27.2391 30.1268 26.399 29.2867 26.399 28.2537C26.399 27.2206 27.2391 26.3805 28.2722 26.3805C29.3052 26.3805 30.1453 27.2206 30.1453 28.2537C30.1453 29.2867 29.3052 30.1268 28.2722 30.1268Z" fill="#662482"/>
										</g>
									</g>
									<defs>
										<clipPath id="pc2-clip0"><rect width="66" height="64" fill="white"/></clipPath>
										<clipPath id="pc2-clip1"><rect width="30" height="30" fill="white" transform="translate(17.9551 17)"/></clipPath>
									</defs>
								</svg>
							</div>
							<div class="protez-card-title">Не оставляем после установки</div>
							<div class="protez-card-text">Если протез давит или натирает — пригласим на коррекцию. Доводим до состояния, когда пациенту действительно удобно.</div>
						</div>
					</div>

					<div class="protez-btns">
						<a href="#cta" class="btn btn-primary">Записаться на бесплатную консультацию по протезированию</a>
					</div>
				</div>

				<div class="protez-aside">
					<div class="gallery-slider js-gallery-slider">
						<div class="gallery-track">
							<?php foreach ( $gallery_images as $index => $gallery_image ) : ?>
								<img src="<?php echo esc_url( $gallery_image['src'] ); ?>" alt="<?php echo esc_attr( $gallery_image['alt'] ); ?>" class="gallery-slide<?php echo 0 === $index ? ' active' : ''; ?>">
							<?php endforeach; ?>
						</div>
						<button class="gallery-btn gallery-btn-prev" type="button" aria-label="Назад">
							<svg width="20" height="20" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M15 18l-6-6 6-6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
						</button>
						<button class="gallery-btn gallery-btn-next" type="button" aria-label="Вперёд">
							<svg width="20" height="20" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M9 18l6-6-6-6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
						</button>
						<div class="gallery-dots">
							<?php foreach ( $gallery_images as $index => $gallery_image ) : ?>
								<button class="gallery-dot<?php echo 0 === $index ? ' active' : ''; ?>" type="button" data-idx="<?php echo esc_attr( (string) $index ); ?>" aria-label="<?php echo esc_attr( sprintf( 'Слайд %d', $index + 1 ) ); ?>"></button>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php get_template_part( 'template-parts/sections/doctors' ); ?>
	<?php get_template_part( 'template-parts/sections/ratings' ); ?>
	<?php get_template_part( 'template-parts/sections/reviews' ); ?>

	<?php get_template_part( 'template-parts/sections/cta-main' ); if ( false ) : ?>
		<div class="cta-deco">
			<div class="cta-deco-sq1">
				<svg width="210" height="210" viewBox="0 0 234 234" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
					<rect width="234" height="234" rx="20" fill="url(#cta-grad-1)"/>
					<defs>
						<linearGradient id="cta-grad-1" x1="194" y1="-34" x2="-15" y2="216" gradientUnits="userSpaceOnUse">
							<stop stop-color="white" stop-opacity="0.15"/>
							<stop offset="1" stop-color="white" stop-opacity="0"/>
						</linearGradient>
					</defs>
				</svg>
			</div>
			<div class="cta-deco-sq2">
				<svg width="160" height="160" viewBox="0 0 234 234" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
					<rect width="234" height="234" rx="20" fill="url(#cta-grad-2)"/>
					<defs>
						<linearGradient id="cta-grad-2" x1="194" y1="-34" x2="-15" y2="216" gradientUnits="userSpaceOnUse">
							<stop stop-color="white" stop-opacity="0.15"/>
							<stop offset="1" stop-color="white" stop-opacity="0"/>
						</linearGradient>
					</defs>
				</svg>
			</div>
		</div>
		<div class="container">
			<h2>Запишитесь на бесплатную консультацию</h2>
			<p>Врач посмотрит, подскажет варианты и назовёт точную цену. Без давления и обязательств.</p>
			<div class="cta-main-btns">
				<a href="#" class="btn btn-accent btn-lg">Записаться онлайн</a>
				<a href="<?php echo esc_url( nika_get_page_url( 'contacts' ) ); ?>" class="btn btn-outline-white btn-lg">Позвонить</a>
			</div>
		</div>
	<?php endif; ?>

	<?php get_template_part( 'template-parts/sections/contacts' ); ?>
</main>
<?php
get_footer();
?>
