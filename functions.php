<?php
function tailwind_scss_theme_enqueue_styles() {
    wp_enqueue_script('tailwindcdn', 'https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4', [],  null, false );
    wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', ['jquery'], filemtime(get_template_directory() . '/assets/js/main.js'), true );
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=EB+Garamond&family=Tinos&display=swap', [], null );
    wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/css/main.css', [], filemtime(get_template_directory() . '/assets/css/main.css') );
}

add_action('wp_enqueue_scripts', 'tailwind_scss_theme_enqueue_styles');

function linkbuilding_setup() {
  add_theme_support('post-thumbnails');
  register_nav_menus([
    'top-menu' => __('Hoofdmenu'),
    'category-menu' => __('Categorie Menu'),
    'footer-menu' => __('Footer Menu')
  ]);
}
add_action('after_setup_theme', 'linkbuilding_setup');

?>