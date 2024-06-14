<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                get_template_part('template-parts/content', get_post_format());
            endwhile;

            the_posts_navigation();
        else :
            get_template_part('template-parts/content', 'none');
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

<?php get_sidebar(); ?>
<?php get_footer(); ?>

