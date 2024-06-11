<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="header-desktop">
    <div class="header-container">
        <div class="site-logo">
            <!-- Logo de votre site -->
            <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Site Logo">
        </div>
        <nav class="nav-menu">
            <ul>
                <li><a href="<?php echo home_url('/about'); ?>">À propos</a></li>
                <li><a href="<?php echo home_url('/contact'); ?>" id="contactModalHeaderButton">Contact</a></li>
                <li><a href="<?php echo home_url('/home'); ?>">Accueil</a></li>
                <li><a href="<?php echo home_url('/categories'); ?>">Catégories</a></li>
                <li><a href="<?php echo home_url('/formats'); ?>">Formats</a></li>
                <li><a href="<?php echo home_url('/sort'); ?>">Trier par</a></li>
            </ul>
        </nav>
    </div>
</header>
<?php wp_footer(); ?>
</body>
</html>

