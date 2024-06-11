<footer class="footer-desktop">
    <div class="footer-container">
        <button id="contactModalButton">Contact</button>
        <nav>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'footer',
                'container' => false,
                'menu_class' => 'footer-nav',
            ));
            ?>
        </nav>
    </div>
    <p>&copy; 2024 - Nathalie Mota</p>
</footer>
<?php wp_footer(); ?>
</body>
</html>
