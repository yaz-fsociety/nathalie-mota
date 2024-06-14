<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                the_title('<h1>', '</h1>');
                the_content();

                // Afficher les champs ACF
                if (have_rows('group_66668d65476769')) :
                    while (have_rows('group_66668d65476769')) : the_row();
                        // Exemple de champ texte
                        $text_field = get_sub_field('text_field');
                        echo '<p>' . esc_html($text_field) . '</p>';
                    endwhile;
                endif;
            endwhile;
        endif;
        ?>

        <!-- Modal HTML -->
        <div id="contactModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <p>Contactez-nous via ce formulaire...</p>
            </div>
        </div>

        <!-- Bouton pour ouvrir le modal -->
        <button id="contactModalButton">Contact</button>
        <a href="#" class="home-link">Contact</a>

        <!-- Filtres pour la galerie -->
        <select id="category-filter">
            <option value="">Toutes les catégories</option>
            <!-- Ajoutez vos options de catégories ici -->
        </select>
        <select id="format-filter">
            <option value="">Tous les formats</option>
            <!-- Ajoutez vos options de formats ici -->
        </select>
        <select id="sort-filter">
            <option value="desc">Décroissant</option>
            <option value="asc">Croissant</option>
        </select>

        <!-- Galerie de photos -->
        <div id="photo-gallery" class="photo-gallery"></div>
        <button id="load-more">Charger plus</button>
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>

