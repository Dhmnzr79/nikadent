<?php
/**
 * Custom content types for doctors and reviews.
 *
 * @package Nika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function nika_register_content_types() {
	register_post_type(
		'nika_doctor',
		array(
			'labels'              => array(
				'name'                  => 'Врачи',
				'singular_name'         => 'Врач',
				'menu_name'             => 'Врачи',
				'name_admin_bar'        => 'Врач',
				'add_new'               => 'Добавить врача',
				'add_new_item'          => 'Добавить врача',
				'edit_item'             => 'Редактировать врача',
				'new_item'              => 'Новый врач',
				'view_item'             => 'Просмотреть врача',
				'search_items'          => 'Искать врачей',
				'not_found'             => 'Врачи не найдены',
				'not_found_in_trash'    => 'В корзине врачей нет',
				'all_items'             => 'Все врачи',
				'featured_image'        => 'Фото врача',
				'set_featured_image'    => 'Задать фото врача',
				'remove_featured_image' => 'Удалить фото врача',
				'use_featured_image'    => 'Использовать как фото врача',
			),
			'public'              => true,
			'publicly_queryable'  => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => false,
			'show_in_admin_bar'   => true,
			'exclude_from_search' => false,
			'has_archive'         => false,
			'rewrite'             => array(
				'slug'       => 'doctors',
				'with_front' => false,
			),
			'query_var'           => true,
			'menu_position'       => 20,
			'menu_icon'           => 'dashicons-groups',
			'supports'            => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
		)
	);

	register_post_type(
		'nika_review',
		array(
			'labels'              => array(
				'name'                  => 'Отзывы',
				'singular_name'         => 'Отзыв',
				'menu_name'             => 'Отзывы',
				'name_admin_bar'        => 'Отзыв',
				'add_new'               => 'Добавить отзыв',
				'add_new_item'          => 'Добавить отзыв',
				'edit_item'             => 'Редактировать отзыв',
				'new_item'              => 'Новый отзыв',
				'view_item'             => 'Просмотреть отзыв',
				'search_items'          => 'Искать отзывы',
				'not_found'             => 'Отзывы не найдены',
				'not_found_in_trash'    => 'В корзине отзывов нет',
				'all_items'             => 'Все отзывы',
				'featured_image'        => 'Фото автора',
				'set_featured_image'    => 'Задать фото автора',
				'remove_featured_image' => 'Удалить фото автора',
				'use_featured_image'    => 'Использовать как фото автора',
			),
			'public'              => false,
			'publicly_queryable'  => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => false,
			'show_in_admin_bar'   => true,
			'exclude_from_search' => true,
			'has_archive'         => false,
			'rewrite'             => false,
			'query_var'           => false,
			'menu_position'       => 21,
			'menu_icon'           => 'dashicons-format-status',
			'supports'            => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
		)
	);
}
add_action( 'init', 'nika_register_content_types' );

function nika_get_content_type_meta_fields( $post_type ) {
	$fields = array(
		'nika_doctor' => array(
			'speciality'       => array(
				'label' => 'Специальность',
				'type'  => 'text',
			),
			'experience'       => array(
				'label' => 'Опыт',
				'type'  => 'text',
			),
			'quote'            => array(
				'label' => 'Цитата',
				'type'  => 'textarea',
			),
			'education'        => array(
				'label' => 'Образование',
				'type'  => 'textarea',
			),
			'show_home_slider' => array(
				'label' => 'Показывать на главной в слайдере',
				'type'  => 'checkbox',
			),
		),
		'nika_review' => array(
			'preview_text'     => array(
				'label' => 'Превью отзыва',
				'type'  => 'textarea',
			),
			'review_date'      => array(
				'label' => 'Дата',
				'type'  => 'text',
			),
			'source_name'      => array(
				'label' => 'Источник',
				'type'  => 'text',
			),
			'source_link_text' => array(
				'label' => 'Текст ссылки',
				'type'  => 'text',
			),
			'source_url'       => array(
				'label' => 'Ссылка на источник',
				'type'  => 'url',
			),
			'show_home_slider' => array(
				'label' => 'Показывать на главной в слайдере',
				'type'  => 'checkbox',
			),
		),
	);

	return isset( $fields[ $post_type ] ) ? $fields[ $post_type ] : array();
}

function nika_add_content_type_meta_boxes() {
	add_meta_box(
		'nika-doctor-fields',
		'Данные врача',
		'nika_render_doctor_meta_box',
		'nika_doctor',
		'normal',
		'default'
	);

	add_meta_box(
		'nika-review-fields',
		'Данные отзыва',
		'nika_render_review_meta_box',
		'nika_review',
		'normal',
		'default'
	);
}
add_action( 'add_meta_boxes', 'nika_add_content_type_meta_boxes' );

function nika_render_doctor_meta_box( $post ) {
	nika_render_content_type_meta_box(
		$post,
		'Фото задаётся через блок "Фото врача" справа. Описание врача заполняется в основном текстовом поле под заголовком.'
	);
}

function nika_render_review_meta_box( $post ) {
	nika_render_content_type_meta_box(
		$post,
		'Фото задаётся через блок "Фото автора" справа. Текст отзыва заполняется в основном текстовом поле под заголовком.'
	);
}

function nika_render_content_type_meta_box( $post, $description ) {
	$fields = nika_get_content_type_meta_fields( $post->post_type );

	wp_nonce_field( 'nika_save_content_type_meta', 'nika_content_type_meta_nonce' );

	echo '<p>' . esc_html( $description ) . '</p>';
	echo '<table class="form-table" role="presentation"><tbody>';

	foreach ( $fields as $key => $field ) {
		$value = get_post_meta( $post->ID, 'nika_' . $key, true );

		echo '<tr>';
		echo '<th scope="row">';

		if ( 'checkbox' === $field['type'] ) {
			echo esc_html( $field['label'] );
		} else {
			echo '<label for="nika-meta-' . esc_attr( $key ) . '">' . esc_html( $field['label'] ) . '</label>';
		}

		echo '</th>';
		echo '<td>';

		switch ( $field['type'] ) {
			case 'textarea':
				echo '<textarea class="large-text" rows="5" id="nika-meta-' . esc_attr( $key ) . '" name="nika_meta[' . esc_attr( $key ) . ']">' . esc_textarea( $value ) . '</textarea>';
				break;

			case 'url':
				echo '<input class="regular-text" type="url" id="nika-meta-' . esc_attr( $key ) . '" name="nika_meta[' . esc_attr( $key ) . ']" value="' . esc_attr( $value ) . '">';
				break;

			case 'checkbox':
				echo '<label for="nika-meta-' . esc_attr( $key ) . '">';
				echo '<input type="checkbox" id="nika-meta-' . esc_attr( $key ) . '" name="nika_meta[' . esc_attr( $key ) . ']" value="1" ' . checked( $value, '1', false ) . '> ';
				echo esc_html( $field['label'] );
				echo '</label>';
				break;

			case 'text':
			default:
				echo '<input class="regular-text" type="text" id="nika-meta-' . esc_attr( $key ) . '" name="nika_meta[' . esc_attr( $key ) . ']" value="' . esc_attr( $value ) . '">';
				break;
		}

		echo '</td>';
		echo '</tr>';
	}

	echo '</tbody></table>';
}

function nika_save_content_type_meta( $post_id, $post ) {
	if ( ! isset( $_POST['nika_content_type_meta_nonce'] ) ) {
		return;
	}

	if ( ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['nika_content_type_meta_nonce'] ) ), 'nika_save_content_type_meta' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( wp_is_post_revision( $post_id ) ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$fields = nika_get_content_type_meta_fields( $post->post_type );

	if ( empty( $fields ) ) {
		return;
	}

	$submitted = array();

	if ( isset( $_POST['nika_meta'] ) && is_array( $_POST['nika_meta'] ) ) {
		$submitted = wp_unslash( $_POST['nika_meta'] );
	}

	foreach ( $fields as $key => $field ) {
		$meta_key = 'nika_' . $key;

		if ( 'checkbox' === $field['type'] ) {
			update_post_meta( $post_id, $meta_key, isset( $submitted[ $key ] ) ? '1' : '0' );
			continue;
		}

		$value = isset( $submitted[ $key ] ) ? $submitted[ $key ] : '';

		switch ( $field['type'] ) {
			case 'textarea':
				$value = trim( sanitize_textarea_field( $value ) );
				break;

			case 'url':
				$value = esc_url_raw( trim( $value ) );
				break;

			case 'text':
			default:
				$value = trim( sanitize_text_field( $value ) );
				break;
		}

		if ( '' === $value ) {
			delete_post_meta( $post_id, $meta_key );
			continue;
		}

		update_post_meta( $post_id, $meta_key, $value );
	}
}
add_action( 'save_post', 'nika_save_content_type_meta', 10, 2 );

function nika_filter_content_type_title_placeholder( $text, $post ) {
	if ( 'nika_doctor' === $post->post_type ) {
		return 'Имя врача';
	}

	if ( 'nika_review' === $post->post_type ) {
		return 'Имя автора отзыва';
	}

	return $text;
}
add_filter( 'enter_title_here', 'nika_filter_content_type_title_placeholder', 10, 2 );

function nika_get_meta_text( $post_id, $key ) {
	$value = get_post_meta( $post_id, 'nika_' . $key, true );

	return is_string( $value ) ? trim( $value ) : '';
}

function nika_get_doctor_entry_data( $post ) {
	$post = get_post( $post );

	if ( ! $post instanceof WP_Post || 'nika_doctor' !== $post->post_type ) {
		return array();
	}

	return array(
		'id'          => (int) $post->ID,
		'name'        => get_the_title( $post ),
		'speciality'  => nika_get_meta_text( $post->ID, 'speciality' ),
		'experience'  => nika_get_meta_text( $post->ID, 'experience' ),
		'quote'       => nika_get_meta_text( $post->ID, 'quote' ),
		'description' => trim( (string) $post->post_content ),
		'education'   => nika_get_meta_text( $post->ID, 'education' ),
		'image'       => get_the_post_thumbnail_url( $post, 'large' ) ? get_the_post_thumbnail_url( $post, 'large' ) : '',
		'url'         => nika_get_doctor_permalink( $post ),
		'show_slider' => '1' === nika_get_meta_text( $post->ID, 'show_home_slider' ),
	);
}

function nika_get_doctor_entries( $home_only = false ) {
	$args = array(
		'post_type'      => 'nika_doctor',
		'post_status'    => 'publish',
		'posts_per_page' => -1,
		'orderby'        => array(
			'menu_order' => 'ASC',
			'title'      => 'ASC',
		),
	);

	if ( $home_only ) {
		$args['meta_query'] = array(
			array(
				'key'   => 'nika_show_home_slider',
				'value' => '1',
			),
		);
	}

	$posts   = get_posts( $args );
	$doctors = array();

	foreach ( $posts as $post ) {
		$doctors[] = nika_get_doctor_entry_data( $post );
	}

	return $doctors;
}

function nika_get_review_entries( $home_only = false ) {
	$args = array(
		'post_type'      => 'nika_review',
		'post_status'    => 'publish',
		'posts_per_page' => -1,
		'orderby'        => array(
			'menu_order' => 'ASC',
			'date'       => 'DESC',
		),
	);

	if ( $home_only ) {
		$args['meta_query'] = array(
			array(
				'key'   => 'nika_show_home_slider',
				'value' => '1',
			),
		);
	}

	$posts   = get_posts( $args );
	$reviews = array();

	foreach ( $posts as $post ) {
		$reviews[] = array(
			'name'         => get_the_title( $post ),
			'text'         => trim( (string) $post->post_content ),
			'preview_text' => nika_get_meta_text( $post->ID, 'preview_text' ),
			'date'         => nika_get_meta_text( $post->ID, 'review_date' ),
			'source_name'  => nika_get_meta_text( $post->ID, 'source_name' ),
			'source_link_text' => nika_get_meta_text( $post->ID, 'source_link_text' ),
			'source_url'   => nika_get_meta_text( $post->ID, 'source_url' ),
			'avatar'       => get_the_post_thumbnail_url( $post, 'thumbnail' ) ? get_the_post_thumbnail_url( $post, 'thumbnail' ) : '',
			'show_slider'  => '1' === nika_get_meta_text( $post->ID, 'show_home_slider' ),
		);
	}

	return $reviews;
}

function nika_filter_doctor_admin_columns( $columns ) {
	return array(
		'cb'               => isset( $columns['cb'] ) ? $columns['cb'] : '',
		'thumbnail'        => 'Фото',
		'title'            => 'Имя врача',
		'speciality'       => 'Специальность',
		'show_home_slider' => 'Главная',
		'menu_order'       => 'Порядок',
		'date'             => 'Дата',
	);
}
add_filter( 'manage_nika_doctor_posts_columns', 'nika_filter_doctor_admin_columns' );

function nika_filter_review_admin_columns( $columns ) {
	return array(
		'cb'               => isset( $columns['cb'] ) ? $columns['cb'] : '',
		'thumbnail'        => 'Фото',
		'title'            => 'Имя',
		'review_date'      => 'Дата отзыва',
		'show_home_slider' => 'Главная',
		'menu_order'       => 'Порядок',
		'date'             => 'Дата записи',
	);
}
add_filter( 'manage_nika_review_posts_columns', 'nika_filter_review_admin_columns' );

function nika_render_doctor_admin_column( $column, $post_id ) {
	nika_render_content_type_admin_column( $column, $post_id );
}
add_action( 'manage_nika_doctor_posts_custom_column', 'nika_render_doctor_admin_column', 10, 2 );

function nika_render_review_admin_column( $column, $post_id ) {
	nika_render_content_type_admin_column( $column, $post_id );
}
add_action( 'manage_nika_review_posts_custom_column', 'nika_render_review_admin_column', 10, 2 );

function nika_render_content_type_admin_column( $column, $post_id ) {
	if ( 'thumbnail' === $column ) {
		if ( has_post_thumbnail( $post_id ) ) {
			echo wp_kses_post( get_the_post_thumbnail( $post_id, array( 48, 48 ) ) );
			return;
		}

		echo '&mdash;';
		return;
	}

	if ( 'speciality' === $column ) {
		$value = nika_get_meta_text( $post_id, 'speciality' );
		echo $value ? esc_html( $value ) : '&mdash;';
		return;
	}

	if ( 'review_date' === $column ) {
		$value = nika_get_meta_text( $post_id, 'review_date' );
		echo $value ? esc_html( $value ) : '&mdash;';
		return;
	}

	if ( 'show_home_slider' === $column ) {
		if ( '1' === nika_get_meta_text( $post_id, 'show_home_slider' ) ) {
			echo '<span class="dashicons dashicons-yes-alt" aria-hidden="true"></span><span class="screen-reader-text">Да</span>';
		} else {
			echo '<span class="dashicons dashicons-minus" aria-hidden="true"></span><span class="screen-reader-text">Нет</span>';
		}
		return;
	}

	if ( 'menu_order' === $column ) {
		echo esc_html( (string) get_post_field( 'menu_order', $post_id ) );
	}
}
