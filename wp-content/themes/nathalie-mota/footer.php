<footer class="footer-desktop">
    <div class="footer-container">
        <nav class="footer-nav">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'footer',
                'menu_class' => 'footer-menu',
            ));
            ?>
        </nav>
        <p>&copy; <?php echo date('Y'); ?> - <?php bloginfo('name'); ?></p>
    </div>
    <?php wp_footer(); ?>
</footer>
</body>
</html>
