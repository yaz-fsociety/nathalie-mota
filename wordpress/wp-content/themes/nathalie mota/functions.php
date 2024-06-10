<?php
function mon_theme_enqueue_styles() {
    wp_enqueue_style('style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'mon_theme_enqueue_styles');
?>
