<?php
function nathalie_mota_enqueue_styles() {
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&family=Poppins:wght@300;400&display=swap', false);
    wp_enqueue_style('modal-styles', get_template_directory_uri() . '/nathalie-mota/css/modal.css', array(), false);
}
add_action('wp_enqueue_scripts', 'nathalie_mota_enqueue_styles');

function nathalie_mota_enqueue_scripts() {
    wp_enqueue_script('modal-script', get_template_directory_uri() . '/js/scripts.js', array(), false, true);
}
add_action('wp_enqueue_scripts', 'nathalie_mota_enqueue_scripts');

function nathalie_mota_setup() {
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'nathalie-mota-theme'),
        'footer' => __('Footer Menu', 'nathalie-mota-theme'),
    ));
}
add_action('after_setup_theme', 'nathalie_mota_setup');
?>



