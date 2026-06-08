<?php
/**
 * Legal page helpers.
 *
 * @package Nika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function nika_get_privacy_policy_text() {
	$path = get_template_directory() . '/assets/content/privacy-policy.txt';

	if ( ! file_exists( $path ) ) {
		return '';
	}

	return trim( (string) file_get_contents( $path ) );
}

function nika_format_legal_text_fragment( $text ) {
	$text = esc_html( trim( $text ) );

	$text = preg_replace( '~(https?://[^\s<]+)~u', '<a href="$1">$1</a>', $text );
	$text = preg_replace( '~([A-Z0-9._%+\-]+@[A-Z0-9.\-]+\.[A-Z]{2,})~iu', '<a href="mailto:$1">$1</a>', $text );

	return wp_kses(
		(string) $text,
		array(
			'a' => array(
				'href' => array(),
			),
		)
	);
}

function nika_render_legal_document( $text ) {
	$lines         = preg_split( '/\r\n|\r|\n/', trim( (string) $text ) );
	$html          = '';
	$list_is_open  = false;
	$is_first_line = true;

	foreach ( $lines as $line ) {
		$line = trim( $line );

		if ( '' === $line ) {
			if ( $list_is_open ) {
				$html        .= '</ul>';
				$list_is_open = false;
			}

			continue;
		}

		if ( preg_match( '/^\d+\.\s/u', $line ) ) {
			if ( $list_is_open ) {
				$html        .= '</ul>';
				$list_is_open = false;
			}

			$html         .= '<h2>' . esc_html( $line ) . '</h2>';
			$is_first_line = false;
			continue;
		}

		if ( preg_match( '/^\d+\.\d+\.\s/u', $line ) ) {
			if ( $list_is_open ) {
				$html        .= '</ul>';
				$list_is_open = false;
			}

			$html         .= '<h3>' . esc_html( $line ) . '</h3>';
			$is_first_line = false;
			continue;
		}

		if ( preg_match( '/^—\s/u', $line ) ) {
			if ( ! $list_is_open ) {
				$html        .= '<ul class="legal-page__list">';
				$list_is_open = true;
			}

			$html .= '<li>' . nika_format_legal_text_fragment( preg_replace( '/^—\s/u', '', $line ) ) . '</li>';
			continue;
		}

		if ( preg_match( '/^(Цель обработки|Персональные данные|Правовые основания|Виды обработки персональных данных)\s+(.+)$/u', $line, $matches ) ) {
			if ( $list_is_open ) {
				$html        .= '</ul>';
				$list_is_open = false;
			}

			$html .= '<p><strong>' . esc_html( $matches[1] ) . ':</strong> ' . nika_format_legal_text_fragment( $matches[2] ) . '</p>';
			continue;
		}

		if ( $is_first_line ) {
			$html         .= '<h2>' . esc_html( $line ) . '</h2>';
			$is_first_line = false;
			continue;
		}

		if ( $list_is_open ) {
			$html        .= '</ul>';
			$list_is_open = false;
		}

		$html .= '<p>' . nika_format_legal_text_fragment( $line ) . '</p>';
	}

	if ( $list_is_open ) {
		$html .= '</ul>';
	}

	return $html;
}
