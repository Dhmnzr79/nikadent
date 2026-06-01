<?php
/**
 * Prices admin screen and data helpers.
 *
 * @package Nika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function nika_get_empty_price_service() {
	return array(
		'name'  => '',
		'price' => '',
	);
}

function nika_get_empty_price_section() {
	return array(
		'title'    => '',
		'services' => array(
			nika_get_empty_price_service(),
		),
	);
}

function nika_sanitize_price_text( $value ) {
	if ( ! is_string( $value ) ) {
		return '';
	}

	return trim( sanitize_text_field( $value ) );
}

function nika_normalize_price_sections( $sections ) {
	if ( ! is_array( $sections ) ) {
		return array();
	}

	$normalized = array();

	foreach ( $sections as $section ) {
		if ( ! is_array( $section ) ) {
			continue;
		}

		$title    = isset( $section['title'] ) ? nika_sanitize_price_text( $section['title'] ) : '';
		$services = array();

		if ( isset( $section['services'] ) && is_array( $section['services'] ) ) {
			foreach ( $section['services'] as $service ) {
				if ( ! is_array( $service ) ) {
					continue;
				}

				$name  = isset( $service['name'] ) ? nika_sanitize_price_text( $service['name'] ) : '';
				$price = isset( $service['price'] ) ? nika_sanitize_price_text( $service['price'] ) : '';

				if ( '' === $name ) {
					continue;
				}

				$services[] = array(
					'name'  => $name,
					'price' => $price,
				);
			}
		}

		if ( '' === $title && empty( $services ) ) {
			continue;
		}

		$normalized[] = array(
			'title'    => $title,
			'services' => $services,
		);
	}

	return $normalized;
}

function nika_get_price_sections() {
	$sections = get_option( 'nika_prices', array() );

	return nika_normalize_price_sections( $sections );
}

function nika_sanitize_price_sections_option( $sections ) {
	return nika_normalize_price_sections( wp_unslash( $sections ) );
}

function nika_register_prices_settings() {
	register_setting(
		'nika_prices',
		'nika_prices',
		array(
			'type'              => 'array',
			'sanitize_callback' => 'nika_sanitize_price_sections_option',
			'default'           => array(),
		)
	);
}
add_action( 'admin_init', 'nika_register_prices_settings' );

function nika_register_prices_admin_page() {
	add_menu_page(
		'Цены',
		'Цены',
		'manage_options',
		'nika-prices',
		'nika_render_prices_admin_page',
		'dashicons-money-alt',
		22
	);
}
add_action( 'admin_menu', 'nika_register_prices_admin_page' );

function nika_enqueue_prices_admin_assets( $hook_suffix ) {
	if ( 'toplevel_page_nika-prices' !== $hook_suffix ) {
		return;
	}

	$theme_version = wp_get_theme()->get( 'Version' );
	$theme_uri     = get_template_directory_uri();
	$theme_path    = get_template_directory();
	$css_path      = '/assets/css/admin-prices.css';
	$js_path       = '/assets/js/admin-prices.js';
	$get_version   = static function ( $relative_path ) use ( $theme_path, $theme_version ) {
		$file_path = $theme_path . $relative_path;

		if ( file_exists( $file_path ) ) {
			return (string) filemtime( $file_path );
		}

		return $theme_version;
	};

	wp_enqueue_style(
		'nika-prices-admin',
		$theme_uri . $css_path,
		array(),
		$get_version( $css_path )
	);

	wp_enqueue_script(
		'nika-prices-admin',
		$theme_uri . $js_path,
		array(),
		$get_version( $js_path ),
		true
	);
}
add_action( 'admin_enqueue_scripts', 'nika_enqueue_prices_admin_assets' );

function nika_render_prices_admin_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	$sections = nika_get_price_sections();

	if ( empty( $sections ) ) {
		$sections = array( nika_get_empty_price_section() );
	}
	?>
	<div class="wrap nika-prices-admin">
		<h1>Цены</h1>
		<p class="nika-prices-admin__intro">Добавляйте разделы и услуги в нужном порядке. Если название раздела пустое, на сайте услуги покажутся общим списком без заголовка.</p>

		<?php settings_errors(); ?>

		<form action="options.php" method="post" class="nika-prices-admin__form">
			<?php settings_fields( 'nika_prices' ); ?>
			<input type="hidden" name="nika_prices" value="">

			<div class="nika-price-sections" data-price-sections>
				<?php foreach ( $sections as $section_index => $section ) : ?>
					<?php nika_render_price_section_fields( $section, $section_index ); ?>
				<?php endforeach; ?>
			</div>

			<p class="nika-prices-admin__actions">
				<button type="button" class="button button-secondary" data-add-price-section>Добавить раздел</button>
			</p>

			<?php submit_button( 'Сохранить цены' ); ?>
		</form>

		<template id="nika-price-section-template">
			<?php nika_render_price_section_fields( nika_get_empty_price_section(), '__section__' ); ?>
		</template>

		<template id="nika-price-service-template">
			<?php nika_render_price_service_fields( nika_get_empty_price_service(), '__section__', '__service__' ); ?>
		</template>
	</div>
	<?php
}

function nika_render_price_section_fields( $section, $section_index ) {
	$title    = isset( $section['title'] ) ? (string) $section['title'] : '';
	$services = isset( $section['services'] ) && is_array( $section['services'] ) ? $section['services'] : array();

	if ( empty( $services ) ) {
		$services = array( nika_get_empty_price_service() );
	}
	?>
	<div class="nika-price-section" data-price-section>
		<div class="nika-price-section__header">
			<div class="nika-price-section__heading">
				<h2 class="nika-price-section__title">Раздел</h2>
				<p class="nika-price-section__note">Оставьте название пустым, если нужен список услуг без заголовка.</p>
			</div>

			<div class="nika-price-section__controls">
				<button type="button" class="button button-secondary" data-move-section="up">Выше</button>
				<button type="button" class="button button-secondary" data-move-section="down">Ниже</button>
				<button type="button" class="button button-link-delete" data-remove-section>Удалить раздел</button>
			</div>
		</div>

		<div class="nika-price-section__field">
			<label class="nika-price-section__label">
				<span class="nika-price-section__label-text">Название раздела</span>
				<input
					type="text"
					class="regular-text"
					data-price-section-title
					name="nika_prices[<?php echo esc_attr( $section_index ); ?>][title]"
					value="<?php echo esc_attr( $title ); ?>"
				>
			</label>
		</div>

		<div class="nika-price-services" data-price-services>
			<?php foreach ( $services as $service_index => $service ) : ?>
				<?php nika_render_price_service_fields( $service, $section_index, $service_index ); ?>
			<?php endforeach; ?>
		</div>

		<p class="nika-price-section__footer">
			<button type="button" class="button button-secondary" data-add-price-service>Добавить услугу</button>
		</p>
	</div>
	<?php
}

function nika_render_price_service_fields( $service, $section_index, $service_index ) {
	$name  = isset( $service['name'] ) ? (string) $service['name'] : '';
	$price = isset( $service['price'] ) ? (string) $service['price'] : '';
	?>
	<div class="nika-price-service" data-price-service>
		<div class="nika-price-service__fields">
			<label class="nika-price-service__field nika-price-service__field--name">
				<span class="nika-price-service__label">Услуга</span>
				<input
					type="text"
					class="regular-text"
					data-price-service-name
					name="nika_prices[<?php echo esc_attr( $section_index ); ?>][services][<?php echo esc_attr( $service_index ); ?>][name]"
					value="<?php echo esc_attr( $name ); ?>"
				>
			</label>

			<label class="nika-price-service__field nika-price-service__field--price">
				<span class="nika-price-service__label">Цена</span>
				<input
					type="text"
					class="regular-text"
					data-price-service-price
					name="nika_prices[<?php echo esc_attr( $section_index ); ?>][services][<?php echo esc_attr( $service_index ); ?>][price]"
					value="<?php echo esc_attr( $price ); ?>"
				>
			</label>
		</div>

		<div class="nika-price-service__controls">
			<button type="button" class="button button-secondary" data-move-service="up">Выше</button>
			<button type="button" class="button button-secondary" data-move-service="down">Ниже</button>
			<button type="button" class="button button-link-delete" data-remove-service>Удалить</button>
		</div>
	</div>
	<?php
}
