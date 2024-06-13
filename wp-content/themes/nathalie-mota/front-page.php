<?php
/* Template Name: Home Page */

get_header();
?>

<!-- Hero Section -->

<div class="hero" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/hero-section-image.png');">
    <h1 class="hero-title">PHOTOGRAPHE EVENT</h1>
</div>

<!-- Galerie de photos -->
<div class="content">
    <div class="filter-container">
        <select id="category-filter">
            <option value="">Catégories</option>
            <option value="reception">Réception</option>
            <option value="mariage">Mariage</option>
            <option value="concert">Concert</option>
            <option value="television">Télévision</option>
        </select>
        <select id="format-filter">
            <option value="">Formats</option>
            <option value="portrait">Portrait</option>
            <option value="paysage">Paysage</option>
        </select>
        <select id="sort-filter">
            <option value="desc">À partir des plus récentes</option>
            <option value="asc">À partir des plus anciennes</option>
        </select>
    </div>

    <div id="photo-gallery" class="gallery-container">
        <!-- Les photos seront chargées ici -->
    </div>
    <button id="load-more">Charger plus</button>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    let page = 1;
    const galleryContainer = document.getElementById('photo-gallery');
    const loadMoreButton = document.getElementById('load-more');
    const categoryFilter = document.getElementById('category-filter');
    const formatFilter = document.getElementById('format-filter');
    const sortFilter = document.getElementById('sort-filter');

    async function fetchPhotos() {
        const category = categoryFilter.value;
        const format = formatFilter.value;
        const sort = sortFilter.value;

        try {
            const response = await fetch(`<?php echo site_url(); ?>/wp-json/nathalie-mota/v1/photos?page=${page}&category=${category}&format=${format}&sort=${sort}`);
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            const photos = await response.json();
            photos.forEach(photo => {
                const photoElement = document.createElement('div');
                photoElement.classList.add('photo');
                photoElement.innerHTML = `
                    <img src="${photo.source_url}" alt="${photo.title.rendered}">
                    <div class="photo-overlay">
                        <a href="${photo.source_url}" class="view-photo">👁️</a>
                        <a href="${photo.source_url}" class="full-screen">🔍</a>
                    </div>
                `;
                galleryContainer.appendChild(photoElement);
            });
        } catch (error) {
            console.error('Error fetching photos:', error);
        }
    }

    loadMoreButton.addEventListener('click', function() {
        page++;
        fetchPhotos();
    });

    categoryFilter.addEventListener('change', function() {
        galleryContainer.innerHTML = '';
        page = 1;
        fetchPhotos();
    });

    formatFilter.addEventListener('change', function() {
        galleryContainer.innerHTML = '';
        page = 1;
        fetchPhotos();
    });

    sortFilter.addEventListener('change', function() {
        galleryContainer.innerHTML = '';
        page = 1;
        fetchPhotos();
    });

    fetchPhotos();
});
</script>

<?php get_footer(); ?>

