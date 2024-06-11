<footer>
    <!-- Autres éléments du footer -->
    <button id="contactModalButton">Contact</button>
    
    <!-- Modale de contact -->
    <div id="contactModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <img src="<?php echo get_template_directory_uri(); ?>/images/contact-header.png" alt="Contact Header" class="modal-header-image">
            <?php echo do_shortcode('[contact-form-7 id="ac4df15" title="Contact form 1"]'); ?>
        </div>
    </div>
    
    <div class="footer-container">
        <?php wp_nav_menu(array('theme_location' => 'footer')); ?>
    </div>
    <p>&copy; <?php echo date('Y'); ?> - Nathalie Mota</p>
</footer>
<?php wp_footer(); ?>
</body>
</html>
