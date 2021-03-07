<?php
// Добавление расширенных возможностей
if ( ! function_exists( 'universal_theme_setup' ) ) :
  function universal_theme_setup() {
    // Добавление тега title
    add_theme_support( 'title-tag' );

    // Добавление миниатюр
    add_theme_support( 'post-thumbnails', array( 'post' ) );    

    // Добавление пользовательского логотипа
    add_theme_support( 'custom-logo', [
      'height'       => 40,
      'flex-width' => true,
      'header-text' => 'Universal',
      'unlink-homepage-logo' => false, // WP 5.5
    ] );

    // Регистрация меню
    register_nav_menus( [
      'header_menu' => 'Menu in header',
      'footer_menu' => 'Menu in footer',
    ] );
  }
endif;
add_action( 'after_setup_theme', 'universal_theme_setup');

// Подключение стилей и скриптов
function enqueue_universal_style() {
  wp_enqueue_style( 'style', get_stylesheet_uri() );
  wp_enqueue_style( 'Roboto-Slab', '//fonts.googleapis.com/css2?family=Roboto+Slab:wght@700&display=swap');
  wp_enqueue_style( 'universal-theme', get_template_directory_uri() . '/assets/css/universal-theme.css', 'style', time());
}
add_action( 'wp_enqueue_scripts', 'enqueue_universal_style' );

## отключаем создание миниатюр файлов для указанных размеров
add_filter( 'intermediate_image_sizes', 'delete_intermediate_image_sizes' );
function delete_intermediate_image_sizes( $sizes ){
	// размеры которые нужно удалить
	return array_diff( $sizes, [
		'medium_large',
		'large',
		'1536x1536',
		'2048x2048',
	] );
}

if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'homepage-thumb', 65, 65, true ); // Кадрирование изображения
}