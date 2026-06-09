<?php
/**
 * Personal data consent page template.
 *
 * @package Nika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>
<main class="site-main site-main--inner">
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<?php $document_text = nika_get_personal_data_consent_text(); ?>
		<?php
		get_template_part(
			'template-parts/sections/legal-document',
			null,
			array(
				'document_text' => $document_text,
				'page_title'    => nika_get_legal_document_title( $document_text ),
			)
		);
		?>
	<?php endwhile; ?>
</main>
<?php
get_footer();
