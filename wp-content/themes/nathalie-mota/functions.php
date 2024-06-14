<?php
// Functions.php

// Enregistrer les menus de navigation
function nathalie_mota_register_menus() {
    register_nav_menus(
        array(
            'primary-menu' => __( 'Primary Menu', 'nathalie-mota-theme' ),
            'footer-menu' => __( 'Footer Menu', 'nathalie-mota-theme' )
        )
    );
}
add_action( 'init', 'nathalie_mota_register_menus' );

// Ajouter les scripts et les styles
function nathalie_mota_enqueue_styles() {
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    wp_enqueue_style( 'modal-style', get_template_directory_uri() . '/css/modal.css' );
}

function nathalie_mota_enqueue_scripts() {
    wp_enqueue_script( 'script', get_template_directory_uri() . '/js/scripts.js', array(), '1.0', true );
    wp_enqueue_script( 'gallery-script', get_template_directory_uri() . '/js/gallery.js', array('jquery'), '1.0', true );
}

add_action( 'wp_enqueue_scripts', 'nathalie_mota_enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'nathalie_mota_enqueue_scripts' );

// Support des fonctionnalités du thème
function nathalie_mota_theme_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'nathalie_mota_theme_setup' );

// Register REST API routes
add_action('rest_api_init', function() {
    register_rest_route('custom/v1', '/photos', array(
        'methods' => 'GET',
        'callback' => 'nathalie_mota_get_photos',
    ));

    register_rest_route('nathalie-mota/v1', '/photos', array(
        'methods' => 'GET',
        'callback' => 'nathalie_mota_get_photos',
    ));
});

// Function to fetch photos
function nathalie_mota_get_photos($data) {
    $paged = isset($data['page']) ? $data['page'] : 1;
    $category = isset($data['category']) ? $data['category'] : '';
    $format = isset($data['format']) ? $data['format'] : '';
    $order = isset($data['sort']) ? $data['sort'] : 'desc';

    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => 8,
        'paged' => $paged,
        'orderby' => 'meta_value',
        'meta_key' => 'date_cliche',
        'order' => $order,
    );

    if ($category) {
        $args['tax_query'][] = array(
            'taxonomy' => 'category',
            'field' => 'slug',
            'terms' => $category
        );
    }

    if ($format) {
        $args['tax_query'][] = array(
            'taxonomy' => 'format',
            'field' => 'slug',
            'terms' => $format
        );
    }

    $query = new WP_Query($args);
    $photos = array();

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $photos[] = array(
                'title' => get_the_title(),
                'thumbnail' => get_the_post_thumbnail_url(get_the_ID(), 'thumbnail'),
                'full' => get_the_post_thumbnail_url(get_the_ID(), 'full'),
                'date' => get_field('date_cliche')
            );
        }
    }

    wp_reset_postdata();
    return $photos;
}
?>

