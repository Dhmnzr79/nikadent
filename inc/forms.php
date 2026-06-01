<?php
/**
 * Theme form handlers.
 *
 * @package Nika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function nika_handle_lead_submission() {
	check_ajax_referer( 'nika_submit_lead', 'nonce' );

	$name          = isset( $_POST['name'] ) ? sanitize_text_field( wp_unslash( $_POST['name'] ) ) : '';
	$phone         = isset( $_POST['phone'] ) ? sanitize_text_field( wp_unslash( $_POST['phone'] ) ) : '';
	$page_url      = isset( $_POST['page_url'] ) ? esc_url_raw( wp_unslash( $_POST['page_url'] ) ) : '';
	$trigger_label = isset( $_POST['trigger_label'] ) ? sanitize_text_field( wp_unslash( $_POST['trigger_label'] ) ) : '';
	$privacy       = isset( $_POST['privacy'] ) ? sanitize_text_field( wp_unslash( $_POST['privacy'] ) ) : '';
	$company       = isset( $_POST['company'] ) ? sanitize_text_field( wp_unslash( $_POST['company'] ) ) : '';

	if ( '' !== $company ) {
		wp_send_json_success(
			array(
				'message' => 'Спасибо! Заявка отправлена.',
			)
		);
	}

	if ( '' === $name || '' === $phone ) {
		wp_send_json_error(
			array(
				'message' => 'Заполните имя и телефон.',
			),
			400
		);
	}

	if ( '1' !== $privacy ) {
		wp_send_json_error(
			array(
				'message' => 'Нужно согласие на обработку персональных данных.',
			),
			400
		);
	}

	$phone_digits = preg_replace( '/\D+/', '', $phone );

	if ( strlen( $phone_digits ) < 10 ) {
		wp_send_json_error(
			array(
				'message' => 'Укажите корректный номер телефона.',
			),
			400
		);
	}

	$recipient = get_option( 'admin_email' );
	$subject   = 'Новая заявка с сайта НикаДент';
	$message   = array(
		'Новая заявка с сайта НикаДент',
		'',
		'Имя: ' . $name,
		'Телефон: ' . $phone,
		'Страница: ' . ( $page_url ? $page_url : 'Не указана' ),
		'Кнопка: ' . ( $trigger_label ? $trigger_label : 'Не указана' ),
	);

	$sent = wp_mail( $recipient, $subject, implode( "\n", $message ) );

	if ( ! $sent ) {
		wp_send_json_error(
			array(
				'message' => 'Не удалось отправить заявку. Попробуйте чуть позже.',
			),
			500
		);
	}

	wp_send_json_success(
		array(
			'message' => 'Спасибо! Мы скоро свяжемся с вами.',
		)
	);
}
add_action( 'wp_ajax_nika_submit_lead', 'nika_handle_lead_submission' );
add_action( 'wp_ajax_nopriv_nika_submit_lead', 'nika_handle_lead_submission' );
