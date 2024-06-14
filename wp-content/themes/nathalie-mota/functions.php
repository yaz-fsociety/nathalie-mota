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
// Action pour initialiser les menus au démarrage de WordPress
add_action( 'init', 'nathalie_mota_register_menus' );

// Ajouter les styles CSS
function nathalie_mota_enqueue_styles() {
    // Style principal du thème
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    // Style pour les modals
    wp_enqueue_style( 'modal-style', get_template_directory_uri() . '/css/modal.css' );
}

// Ajouter les scripts JavaScript
function nathalie_mota_enqueue_scripts() {
    // Script principal
    wp_enqueue_script( 'script', get_template_directory_uri() . '/js/scripts.js', array(), '1.0', true );
    // Script pour la galerie
    wp_enqueue_script( 'gallery-script', get_template_directory_uri() . '/js/gallery.js', array('jquery'), '1.0', true );
}

// Actions pour charger les styles et les scripts
add_action( 'wp_enqueue_scripts', 'nathalie_mota_enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'nathalie_mota_enqueue_scripts' );

// Support des fonctionnalités du thème
function nathalie_mota_theme_setup() {
    // Support du titre de la page
    add_theme_support( 'title-tag' );
    // Support des images mises en avant
    add_theme_support( 'post-thumbnails' );
}
// Action pour configurer les fonctionnalités du thème après le démarrage du thème
add_action( 'after_setup_theme', 'nathalie_mota_theme_setup' );

// Enregistrement des routes de l'API REST
add_action('rest_api_init', function() {
    register_rest_route('nathalie-mota/v1', '/photos', array(
        'methods' => 'GET',
        'callback' => 'nathalie_mota_get_photos',
    ));
});

// Fonction callback pour récupérer les photos
function nathalie_mota_get_photos($data) {
    // Récupération des paramètres
    $paged = isset($data['page']) ? $data['page'] : 1;
    $category = isset($data['category']) ? $data['category'] : '';
    $format = isset($data['format']) ? $data['format'] : '';
    $order = isset($data['sort']) ? $data['sort'] : 'desc';

    // Arguments de la requête WP_Query
    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => 8,
        'paged' => $paged,
        'orderby' => 'meta_value',
        'meta_key' => 'date_cliche',
        'order' => $order,
    );

    // Filtre par catégorie si spécifié
    if ($category) {
        $args['tax_query'][] = array(
            'taxonomy' => 'category',
            'field' => 'slug',
            'terms' => $category
        );
    }

    // Filtre par format si spécifié
    if ($format) {
        $args['tax_query'][] = array(
            'taxonomy' => 'format',
            'field' => 'slug',
            'terms' => $format
        );
    }

    // Exécution de la requête
    $query = new WP_Query($args);
    $photos = array();

    // Si des posts sont trouvés
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $photos[] = array(
                'title' => get_the_title(),
                'source_url' => get_the_post_thumbnail_url(get_the_ID(), 'full'),
                'date' => get_field('date_cliche')
            );
        }
    }

    // Réinitialisation des données de post
    wp_reset_postdata();
    return $photos;
}

// Définir la constante ACF_DEV si elle n'est pas définie
if (!defined('ACF_DEV')) {
    define('ACF_DEV', true);
}

?>