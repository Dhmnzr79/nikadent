<?php
/**
 * Theme form handlers.
 *
 * @package Nika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function nika_get_lead_request_ip() {
	$keys = array(
		'HTTP_CF_CONNECTING_IP',
		'HTTP_X_FORWARDED_FOR',
		'REMOTE_ADDR',
	);

	foreach ( $keys as $key ) {
		if ( empty( $_SERVER[ $key ] ) ) {
			continue;
		}

		$value = sanitize_text_field( wp_unslash( $_SERVER[ $key ] ) );

		if ( 'HTTP_X_FORWARDED_FOR' === $key ) {
			$parts = array_map( 'trim', explode( ',', $value ) );
			$value = isset( $parts[0] ) ? $parts[0] : '';
		}

		if ( '' !== $value ) {
			return $value;
		}
	}

	return 'unknown';
}

function nika_is_lead_submission_too_fast( $started_at ) {
	$started_at = (int) $started_at;

	if ( $started_at <= 0 ) {
		return true;
	}

	return ( time() - $started_at ) < 2;
}

function nika_is_lead_submission_rate_limited( $phone_digits ) {
	$ip            = nika_get_lead_request_ip();
	$transient_key = 'nika_lead_' . md5( $ip . '|' . $phone_digits );

	if ( get_transient( $transient_key ) ) {
		return true;
	}

	set_transient( $transient_key, 1, 10 * MINUTE_IN_SECONDS );

	return false;
}

function nika_handle_lead_submission() {
	check_ajax_referer( 'nika_submit_lead', 'nonce' );

	$name          = isset( $_POST['name'] ) ? sanitize_text_field( wp_unslash( $_POST['name'] ) ) : '';
	$phone         = isset( $_POST['phone'] ) ? sanitize_text_field( wp_unslash( $_POST['phone'] ) ) : '';
	$page_url      = isset( $_POST['page_url'] ) ? esc_url_raw( wp_unslash( $_POST['page_url'] ) ) : '';
	$trigger_label = isset( $_POST['trigger_label'] ) ? sanitize_text_field( wp_unslash( $_POST['trigger_label'] ) ) : '';
	$privacy       = isset( $_POST['privacy'] ) ? sanitize_text_field( wp_unslash( $_POST['privacy'] ) ) : '';
	$company       = isset( $_POST['company'] ) ? sanitize_text_field( wp_unslash( $_POST['company'] ) ) : '';
	$started_at    = isset( $_POST['form_started_at'] ) ? (int) wp_unslash( $_POST['form_started_at'] ) : 0;

	if ( '' !== $company ) {
		wp_send_json_success(
			array(
				'message'     => 'Спасибо! Заявка отправлена.',
				'redirectUrl' => nika_get_page_url( 'thanks' ),
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

	if ( nika_is_lead_submission_too_fast( $started_at ) ) {
		wp_send_json_error(
			array(
				'message' => 'Подождите пару секунд и повторите отправку.',
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

	if ( nika_is_lead_submission_rate_limited( $phone_digits ) ) {
		wp_send_json_error(
			array(
				'message' => 'Заявка уже отправлялась недавно. Если нужно, повторите чуть позже.',
			),
			429
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
			'message'     => 'Спасибо! Мы скоро свяжемся с вами.',
			'redirectUrl' => nika_get_page_url( 'thanks' ),
		)
	);
}
add_action( 'wp_ajax_nika_submit_lead', 'nika_handle_lead_submission' );
add_action( 'wp_ajax_nopriv_nika_submit_lead', 'nika_handle_lead_submission' );
