<header class="header-desktop">
    <div class="header-container">
        <div class="site-logo">
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>">
            </a>
        </div>
        <nav>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_class' => 'nav-menu',
            ));
            ?>
        </nav>
        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
            <span class="menu-icon"></span>
        </button>
    </div>
</header>
<nav id="mobile-menu" class="mobile-menu" aria-hidden="true">
    <?php
    wp_nav_menu(array(
        'theme_location' => 'primary',
        'menu_class' => 'mobile-nav-menu',
    ));
    ?>
</nav>
