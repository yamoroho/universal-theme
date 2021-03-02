<?php
// Добавление расширенных возможностей
if ( ! function_exists( 'universal_theme_setup' ) ) :
  function universal_theme_setup() {
    // Добавление тега title
    add_theme_support( 'title-tag' );

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
  wp_enqueue_style( 'universal-theme', get_template_directory_uri() . '/assets/css/universal-theme.css', 'style' );
  wp_enqueue_style( 'Roboto-Slap', 'https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@700&display=swap');
}
add_action( 'wp_enqueue_scripts', 'enqueue_universal_style' );