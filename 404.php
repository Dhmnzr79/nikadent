<?php
/**
 * 404 template.
 *
 * @package Nika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$help_links = array(
	array(
		'label'       => __( 'Протезирование', 'nika' ),
		'description' => __( 'Основные услуги и направления лечения.', 'nika' ),
		'url'         => nika_get_page_url( 'protezirovanie' ),
	),
	array(
		'label'       => __( 'Врачи', 'nika' ),
		'description' => __( 'Познакомьтесь со специалистами клиники.', 'nika' ),
		'url'         => nika_get_page_url( 'doctors' ),
	),
	array(
		'label'       => __( 'Цены', 'nika' ),
		'description' => __( 'Посмотрите актуальный прайс по услугам.', 'nika' ),
		'url'         => nika_get_page_url( 'prices' ),
	),
	array(
		'label'       => __( 'Блог', 'nika' ),
		'description' => __( 'Статьи о лечении, восстановлении и уходе.', 'nika' ),
		'url'         => nika_get_blog_page_url(),
	),
	array(
		'label'       => __( 'Контакты', 'nika' ),
		'description' => __( 'Адреса филиалов, телефоны и режим работы.', 'nika' ),
		'url'         => nika_get_page_url( 'contacts' ),
	),
);

$recent_posts = get_posts(
	array(
		'post_type'           => 'post',
		'post_status'         => 'publish',
		'posts_per_page'      => 3,
		'ignore_sticky_posts' => true,
	)
);
?>
<main class="site-main site-main--inner">
	<section class="page-top">
		<div class="container">
			<nav class="breadcrumbs" aria-label="<?php esc_attr_e( 'Хлебные крошки', 'nika' ); ?>">
				<span class="breadcrumbs__item">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="breadcrumbs__link"><?php esc_html_e( 'Главная', 'nika' ); ?></a>
				</span>
				<span class="breadcrumbs__item">
					<span class="breadcrumbs__current"><?php esc_html_e( 'Ошибка 404', 'nika' ); ?></span>
				</span>
			</nav>

			<div class="error-page__code">404</div>
			<h1 class="page-top__title"><?php esc_html_e( 'Страница не найдена', 'nika' ); ?></h1>
			<div class="page-top__content">
				<p><?php esc_html_e( 'Возможно, ссылка устарела, страница была перемещена или адрес введён с ошибкой. Ниже собрали основные разделы сайта, чтобы вы быстро вернулись к нужной информации.', 'nika' ); ?></p>
			</div>
		</div>
	</section>

	<section class="page-section error-page">
		<div class="container">
			<div class="error-page__actions">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary btn-sm"><?php esc_html_e( 'На главную', 'nika' ); ?></a>
				<a href="<?php echo esc_url( nika_get_page_url( 'contacts' ) ); ?>" class="btn btn-secondary btn-sm"><?php esc_html_e( 'Связаться с клиникой', 'nika' ); ?></a>
			</div>

			<div class="error-page__links">
				<?php foreach ( $help_links as $help_link ) : ?>
					<a href="<?php echo esc_url( $help_link['url'] ); ?>" class="error-link-card">
						<span class="error-link-card__title"><?php echo esc_html( $help_link['label'] ); ?></span>
						<span class="error-link-card__text"><?php echo esc_html( $help_link['description'] ); ?></span>
					</a>
				<?php endforeach; ?>
			</div>

			<?php if ( ! empty( $recent_posts ) ) : ?>
				<div class="error-page__section">
					<h2 class="error-page__section-title"><?php esc_html_e( 'Последние статьи', 'nika' ); ?></h2>
					<div class="posts posts--blog">
						<?php foreach ( $recent_posts as $post ) : ?>
							<?php setup_postdata( $post ); ?>
							<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card post-card--blog' ); ?>>
								<a href="<?php the_permalink(); ?>" class="post-card__inner">
									<?php if ( has_post_thumbnail() ) : ?>
										<div class="post-card__media">
											<?php the_post_thumbnail( 'medium_large', array( 'class' => 'post-card__image' ) ); ?>
										</div>
									<?php endif; ?>

									<div class="post-card__body">
										<div class="post-card__meta">
											<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
										</div>
										<h3 class="post-card__title"><?php the_title(); ?></h3>
										<p class="post-card__excerpt"><?php echo esc_html( nika_get_post_preview_text( get_the_ID() ) ); ?></p>
										<span class="post-card__link"><?php esc_html_e( 'Читать статью', 'nika' ); ?></span>
									</div>
								</a>
							</article>
						<?php endforeach; ?>
						<?php wp_reset_postdata(); ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</section>

	<?php get_template_part( 'template-parts/sections/contacts' ); ?>
</main>
<?php
get_footer();
?>
