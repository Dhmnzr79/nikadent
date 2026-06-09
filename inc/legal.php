<?php
/**
 * Legal page helpers.
 *
 * @package Nika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function nika_get_legal_document_text( $file_name ) {
	$path = get_template_directory() . '/assets/content/' . ltrim( $file_name, '/' );

	if ( ! file_exists( $path ) ) {
		return '';
	}

	return trim( (string) file_get_contents( $path ) );
}

function nika_get_privacy_policy_text() {
	return nika_get_legal_document_text( 'privacy-policy.txt' );
}

function nika_get_personal_data_consent_text() {
	return nika_get_legal_document_text( 'personal-data-consent.txt' );
}

function nika_get_legal_document_title( $text ) {
	$lines = preg_split( '/\r\n|\r|\n/', trim( (string) $text ) );

	foreach ( $lines as $line ) {
		$line = trim( $line );

		if ( '' !== $line ) {
			return $line;
		}
	}

	return '';
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
	$lines               = preg_split( '/\r\n|\r|\n/', trim( (string) $text ) );
	$html                = '';
	$list_is_open        = false;
	$is_first_text_line  = true;
	$list_marker_pattern = '/^(?:\x{2014}|\x{2013}|\x{2022}|-)\s+/u';

	foreach ( $lines as $line ) {
		$line = trim( $line );

		if ( '' === $line ) {
			if ( $list_is_open ) {
				$html         .= '</ul>';
				$list_is_open = false;
			}

			continue;
		}

		// The page already has the main title, so the repeated document title is skipped.
		if ( $is_first_text_line && ! preg_match( '/^\d+\.\s/u', $line ) ) {
			$is_first_text_line = false;
			continue;
		}

		$is_first_text_line = false;

		if ( preg_match( '/^\d+\.\s/u', $line ) ) {
			if ( $list_is_open ) {
				$html         .= '</ul>';
				$list_is_open = false;
			}

			$html .= '<h2>' . esc_html( $line ) . '</h2>';
			continue;
		}

		if ( preg_match( $list_marker_pattern, $line ) ) {
			if ( ! $list_is_open ) {
				$html         .= '<ul class="legal-page__list">';
				$list_is_open = true;
			}

			$html .= '<li>' . nika_format_legal_text_fragment( preg_replace( $list_marker_pattern, '', $line ) ) . '</li>';
			continue;
		}

		if ( $list_is_open ) {
			$html         .= '</ul>';
			$list_is_open = false;
		}

		$html .= '<p>' . nika_format_legal_text_fragment( $line ) . '</p>';
	}

	if ( $list_is_open ) {
		$html .= '</ul>';
	}

	return $html;
}
