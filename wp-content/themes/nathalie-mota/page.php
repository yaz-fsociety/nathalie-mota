<?php
get_header();

if (have_posts()) :
    while (have_posts()) : the_post(); ?>

        <h1><?php the_title(); ?></h1>
        <div><?php the_content(); ?></div>
        <div class="description-photo">
            <strong>Type:</strong> <?php the_field('type'); ?><br>
            <strong>Référence:</strong> <?php the_field('reference'); ?><br>
            <strong>Catégorie:</strong> <?php the_terms(get_the_ID(), 'categorie'); ?><br>
            <strong>Format:</strong> <?php the_terms(get_the_ID(), 'format'); ?>
        </div>

    <?php endwhile;
endif;

get_footer();
?>
