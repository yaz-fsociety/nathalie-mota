<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="header-desktop">
    <div class="header-container">
        <div class="site-logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Nathalie Mota">
            </a>
        </div>
        <nav class="nav-menu">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary-menu',
                'menu_class'     => 'menu',
                'container'      => false,
            ) );
            ?>
        </nav>
    </div>
</header>

<!-- Autres éléments de la page -->

<?php
// Ajoutez le code pour la modale de contact ici si nécessaire
?>

<!-- Fin du code de la page -->
