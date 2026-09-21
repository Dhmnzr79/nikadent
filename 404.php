<?php
/**
 * 404 template.
 *
 * @package Nika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$help_links = array(
	array(
		'label' => __( 'Врачи', 'nika' ),
		'url'   => nika_get_page_url( 'doctors' ),
	),
	array(
		'label' => __( 'Цены', 'nika' ),
		'url'   => nika_get_page_url( 'prices' ),
	),
	array(
		'label' => __( 'Блог', 'nika' ),
		'url'   => nika_get_blog_page_url(),
	),
);

get_header();
?>
<main class="site-main site-main--error">
	<section class="error-page">
		<div class="container">
			<div class="error-page__panel">
				<div class="error-page__code" aria-hidden="true">404</div>
				<h1 class="error-page__title"><?php esc_html_e( 'Страница не найдена', 'nika' ); ?></h1>
				<p class="error-page__text"><?php esc_html_e( 'Возможно, страница была перемещена или в адресе допущена ошибка. Вернитесь на главную или выберите нужный раздел.', 'nika' ); ?></p>

				<div class="error-page__actions">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary btn-sm"><?php esc_html_e( 'На главную', 'nika' ); ?></a>
					<a href="<?php echo esc_url( nika_get_page_url( 'contacts' ) ); ?>" class="btn btn-secondary btn-sm"><?php esc_html_e( 'Контакты', 'nika' ); ?></a>
				</div>

				<nav class="error-page__nav" aria-label="<?php esc_attr_e( 'Полезные разделы', 'nika' ); ?>">
					<?php foreach ( $help_links as $help_link ) : ?>
						<a href="<?php echo esc_url( $help_link['url'] ); ?>" class="error-page__nav-link"><?php echo esc_html( $help_link['label'] ); ?></a>
					<?php endforeach; ?>
				</nav>
			</div>
		</div>
	</section>
</main>
<?php
get_footer();
?>
