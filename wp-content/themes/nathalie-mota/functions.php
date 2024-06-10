<?php
function nathalie_mota_enqueue_styles() {
    wp_enqueue_style('style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'nathalie_mota_enqueue_styles');

function nathalie_mota_enqueue_scripts() {
    wp_enqueue_script('modal-script', get_template_directory_uri() . '/js/scripts.js', array(), false, true);
}
add_action('wp_enqueue_scripts', 'nathalie_mota_enqueue_scripts');
?>
