<?php
/**
 * SEO-related theme helpers.
 *
 * @package Nika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

remove_action( 'wp_head', 'rel_canonical' );

function nika_get_seo_brand_name() {
	$site_name = trim( wp_strip_all_tags( (string) get_bloginfo( 'name' ) ) );

	return '' !== $site_name ? $site_name : 'НикаДент';
}

function nika_is_thanks_page() {
	return is_page( 'thanks' );
}

function nika_get_seo_text_excerpt( $text, $word_count = 28 ) {
	$text = strip_shortcodes( (string) $text );
	$text = wp_strip_all_tags( $text );
	$text = preg_replace( '/\s+/u', ' ', $text );
	$text = is_string( $text ) ? trim( $text ) : '';

	if ( '' === $text ) {
		return '';
	}

	return wp_trim_words( $text, $word_count );
}

function nika_get_seo_description() {
	if ( is_404() ) {
		return 'Страница не найдена. Перейдите на главную страницу стоматологии ' . nika_get_seo_brand_name() . ' в Елизово.';
	}

	if ( nika_is_thanks_page() ) {
		return 'Спасибо за заявку. Стоматология ' . nika_get_seo_brand_name() . ' получила обращение и скоро свяжется с вами.';
	}

	if ( is_front_page() ) {
		return 'Стоматология ' . nika_get_seo_brand_name() . ' в Елизово: лечение, протезирование, имплантация, консультация и запись на прием.';
	}

	if ( is_home() ) {
		$intro = nika_get_seo_text_excerpt( nika_get_blog_intro_html(), 30 );

		if ( '' !== $intro ) {
			return $intro;
		}

		return 'Полезные статьи стоматологии ' . nika_get_seo_brand_name() . ' о лечении, протезировании и уходе за зубами.';
	}

	if ( is_singular( 'post' ) ) {
		$preview = nika_get_post_preview_text( get_queried_object_id(), 30 );

		if ( '' !== $preview ) {
			return $preview;
		}
	}

	if ( is_singular( 'nika_doctor' ) ) {
		$doctor = nika_get_doctor_entry_data( get_queried_object_id() );

		if ( ! empty( $doctor ) ) {
			$parts = array();

			if ( ! empty( $doctor['speciality'] ) ) {
				$parts[] = $doctor['speciality'];
			}

			if ( ! empty( $doctor['experience'] ) ) {
				$parts[] = $doctor['experience'];
			}

			$summary = nika_get_seo_text_excerpt( $doctor['description'], 20 );

			if ( '' !== $summary ) {
				$parts[] = $summary;
			}

			$description = trim( $doctor['name'] . '. ' . implode( '. ', array_filter( $parts ) ) );

			if ( '' !== $description ) {
				return $description;
			}
		}
	}

	if ( is_page() ) {
		$page = get_queried_object();

		if ( is_page( 'all-on-4' ) || is_page_template( 'page-all-on-4.php' ) ) {
			$content = nika_get_all_on_4_content();
			return $content['hero']['lead'];
		}

		if ( $page instanceof WP_Post ) {
			$slug = $page->post_name;

			if ( 'contacts' === $slug ) {
				return 'Контакты стоматологии ' . nika_get_seo_brand_name() . ' в Елизово: адреса филиалов, телефоны и часы работы.';
			}

			if ( 'prices' === $slug ) {
				return 'Цены на услуги стоматологии ' . nika_get_seo_brand_name() . ' в Елизово: лечение, протезирование, удаление и другие услуги.';
			}

			if ( 'doctors' === $slug ) {
				return 'Врачи стоматологии ' . nika_get_seo_brand_name() . ': специалисты клиники, направления работы и запись на консультацию.';
			}

			if ( 'documents' === $slug ) {
				return 'Документы и реквизиты стоматологии ' . nika_get_seo_brand_name() . '.';
			}

			$content = '';

			if ( ! function_exists( 'nika_is_seed_page_placeholder' ) || ! nika_is_seed_page_placeholder( $page ) ) {
				$content = nika_get_seo_text_excerpt( $page->post_content, 30 );
			}

			if ( '' !== $content ) {
				return $content;
			}
		}
	}

	if ( is_singular() ) {
		$post = get_queried_object();

		if ( $post instanceof WP_Post ) {
			$content = nika_get_seo_text_excerpt( $post->post_content, 30 );

			if ( '' !== $content ) {
				return $content;
			}
		}
	}

	return 'Стоматология ' . nika_get_seo_brand_name() . ' в Елизово.';
}

function nika_get_seo_document_title( $default_title ) {
	$brand_name = nika_get_seo_brand_name();

	if ( is_404() ) {
		return 'Страница не найдена | ' . $brand_name;
	}

	if ( nika_is_thanks_page() ) {
		return 'Спасибо за заявку | ' . $brand_name;
	}

	if ( is_front_page() ) {
		return $brand_name . ' | Стоматология в Елизово';
	}

	if ( is_home() ) {
		return nika_get_blog_archive_title() . ' | ' . $brand_name;
	}

	if ( is_singular( 'nika_doctor' ) ) {
		$doctor = nika_get_doctor_entry_data( get_queried_object_id() );

		if ( ! empty( $doctor['name'] ) ) {
			$title = $doctor['name'];

			if ( ! empty( $doctor['speciality'] ) ) {
				$title .= ' - ' . $doctor['speciality'];
			}

			return $title . ' | ' . $brand_name;
		}
	}

	return $default_title;
}

function nika_filter_seo_document_title( $title ) {
	return nika_get_seo_document_title( $title );
}
add_filter( 'pre_get_document_title', 'nika_filter_seo_document_title', 30 );

function nika_get_seo_canonical_url() {
	if ( is_404() ) {
		return '';
	}

	if ( is_front_page() ) {
		return home_url( '/' );
	}

	if ( is_home() ) {
		$current_page = nika_get_blog_current_page();

		if ( $current_page > 1 ) {
			return get_pagenum_link( $current_page );
		}

		return nika_get_blog_page_url();
	}

	if ( is_singular( 'post' ) ) {
		return nika_get_blog_post_url( get_queried_object_id() );
	}

	if ( is_singular( 'nika_doctor' ) ) {
		return nika_get_doctor_permalink( get_queried_object_id() );
	}

	if ( is_singular() || is_page() ) {
		return (string) get_permalink();
	}

	return '';
}

function nika_get_seo_og_image_url() {
	if ( is_singular( 'nika_doctor' ) ) {
		$doctor = nika_get_doctor_entry_data( get_queried_object_id() );

		if ( ! empty( $doctor['image'] ) ) {
			return $doctor['image'];
		}
	}

	if ( is_singular() && has_post_thumbnail( get_queried_object_id() ) ) {
		$image_url = get_the_post_thumbnail_url( get_queried_object_id(), 'large' );

		if ( $image_url ) {
			return $image_url;
		}
	}

	if ( is_front_page() ) {
		return nika_asset_url( 'images/main-bg.png' );
	}

	return '';
}

function nika_output_seo_meta_tags() {
	if ( is_admin() ) {
		return;
	}

	$title       = nika_get_seo_document_title( wp_get_document_title() );
	$description = nika_get_seo_description();
	$canonical   = nika_get_seo_canonical_url();
	$og_image    = nika_get_seo_og_image_url();
	$og_type     = is_singular() ? 'article' : 'website';

	if ( '' !== $description ) {
		echo '<meta name="description" content="' . esc_attr( $description ) . '">' . "\n";
	}

	if ( '' !== $canonical ) {
		echo '<link rel="canonical" href="' . esc_url( $canonical ) . '">' . "\n";
	}

	echo '<meta property="og:locale" content="ru_RU">' . "\n";
	echo '<meta property="og:title" content="' . esc_attr( $title ) . '">' . "\n";
	echo '<meta property="og:description" content="' . esc_attr( $description ) . '">' . "\n";
	echo '<meta property="og:type" content="' . esc_attr( $og_type ) . '">' . "\n";

	if ( '' !== $canonical ) {
		echo '<meta property="og:url" content="' . esc_url( $canonical ) . '">' . "\n";
	}

	if ( '' !== $og_image ) {
		echo '<meta property="og:image" content="' . esc_url( $og_image ) . '">' . "\n";
	}

	echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
}
add_action( 'wp_head', 'nika_output_seo_meta_tags', 1 );

function nika_filter_robots( $robots ) {
	if ( is_404() || nika_is_thanks_page() ) {
		$robots['noindex']  = true;
		$robots['nofollow'] = false;
	}

	return $robots;
}
add_filter( 'wp_robots', 'nika_filter_robots' );

function nika_get_medical_business_schema() {
	$brand_name = nika_get_seo_brand_name();
	$branches   = nika_get_contact_branches();
	$phones     = array();
	$departments = array();

	foreach ( $branches as $branch ) {
		$branch_phones = array_keys( $branch['phones'] );

		foreach ( $branch_phones as $phone ) {
			if ( ! in_array( $phone, $phones, true ) ) {
				$phones[] = $phone;
			}
		}

		$departments[] = array(
			'@type' => 'Dentist',
			'name'  => $brand_name . ', ' . $branch['title'],
			'address' => array(
				'@type'           => 'PostalAddress',
				'streetAddress'   => $branch['address'],
				'addressLocality' => 'Елизово',
				'addressCountry'  => 'RU',
			),
			'telephone' => $branch_phones,
		);
	}

	return array(
		'@type'       => 'Dentist',
		'@id'         => home_url( '/#organization' ),
		'name'        => $brand_name,
		'url'         => home_url( '/' ),
		'image'       => nika_asset_url( 'images/main-bg.png' ),
		'priceRange'  => '₽₽',
		'telephone'   => $phones,
		'areaServed'  => 'Елизово',
		'medicalSpecialty' => 'Dentistry',
		'department'  => $departments,
		'openingHoursSpecification' => array(
			array(
				'@type'     => 'OpeningHoursSpecification',
				'dayOfWeek' => array( 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday' ),
				'opens'     => '09:00',
				'closes'    => '18:00',
			),
			array(
				'@type'     => 'OpeningHoursSpecification',
				'dayOfWeek' => 'Saturday',
				'opens'     => '09:00',
				'closes'    => '15:00',
			),
		),
	);
}

function nika_get_breadcrumb_schema() {
	$items = nika_get_breadcrumb_items();

	if ( count( $items ) < 2 ) {
		return array();
	}

	$list_items = array();

	foreach ( $items as $index => $item ) {
		$item_url = ! empty( $item['url'] ) ? $item['url'] : nika_get_seo_canonical_url();

		$list_items[] = array(
			'@type'    => 'ListItem',
			'position' => $index + 1,
			'name'     => $item['label'],
			'item'     => $item_url,
		);
	}

	return array(
		'@type'           => 'BreadcrumbList',
		'itemListElement' => $list_items,
	);
}

function nika_get_doctor_schema() {
	if ( ! is_singular( 'nika_doctor' ) ) {
		return array();
	}

	$doctor = nika_get_doctor_entry_data( get_queried_object_id() );

	if ( empty( $doctor ) ) {
		return array();
	}

	$schema = array(
		'@type'    => 'Person',
		'name'     => $doctor['name'],
		'url'      => $doctor['url'],
		'worksFor' => array(
			'@id' => home_url( '/#organization' ),
		),
	);

	if ( ! empty( $doctor['image'] ) ) {
		$schema['image'] = $doctor['image'];
	}

	if ( ! empty( $doctor['speciality'] ) ) {
		$schema['jobTitle'] = $doctor['speciality'];
	}

	if ( ! empty( $doctor['description'] ) ) {
		$schema['description'] = nika_get_seo_text_excerpt( $doctor['description'], 35 );
	}

	return $schema;
}

function nika_output_schema_markup() {
	if ( is_admin() || is_404() ) {
		return;
	}

	$graph = array_filter(
		array(
			nika_get_medical_business_schema(),
			nika_get_breadcrumb_schema(),
			nika_get_doctor_schema(),
		)
	);

	if ( empty( $graph ) ) {
		return;
	}

	$schema = array(
		'@context' => 'https://schema.org',
		'@graph'   => array_values( $graph ),
	);

	echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
}
add_action( 'wp_head', 'nika_output_schema_markup', 20 );
