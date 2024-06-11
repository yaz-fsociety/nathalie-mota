<footer>
    <!-- Autres éléments du footer -->
    <button id="contactModalButton">Contact</button>
    
    <!-- Modale de contact -->
    <div id="contactModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="modal-header"></div>
            <div class="modal-body">
                <?php echo do_shortcode('[contact-form-7 id="ac4df15" title="Contact form 1"]'); ?>
            </div>
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
