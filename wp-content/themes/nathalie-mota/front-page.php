<?php
/* Template Name: Front Page */
get_header();
?>

<div class="hero">
    <img src="<?php echo get_template_directory_uri(); ?>/images/nathalie-11.png" alt="Hero Image">
    <h1 class="hero-title">PHOTOGRAPHE EVENT</h1>
</div>

<div class="content">
    <!-- Contenu spécifique de la page d'accueil -->
    <div class="categories">
        <button>Catégories</button>
        <button>Formats</button>
        <button>Trier par</button>
    </div>
    <div class="gallery">
        <!-- Ajoutez les images de votre galerie ici -->
    </div>
</div>

<?php get_footer(); ?>
