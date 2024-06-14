jQuery(document).ready(function ($) {
    var page = 1; // Page initiale
    var order = 'desc'; // Ordre par défaut

    // Fonction pour récupérer les photos via l'API REST
    function fetchPhotos() {
        var category = $('#category-filter').val(); // Récupère la catégorie sélectionnée
        var format = $('#format-filter').val(); // Récupère le format sélectionné

        $.ajax({
            url: '/wp-json/nathalie-mota/v1/photos', // URL de l'API REST
            data: {
                page: page,
                order: order,
                category: category,
                format: format
            },
            success: function (data) {
                if (page === 1) {
                    $('#photo-gallery').html(''); // Réinitialise la galerie si c'est la première page
                }
                // Ajoute chaque photo à la galerie
                data.forEach(function (photo) {
                    $('#photo-gallery').append(`
                        <div class="photo-card">
                            <img src="${photo.source_url}" alt="${photo.title}">
                            <div class="photo-info">
                                <a href="${photo.source_url}" class="lightbox-link">
                                    <span class="icon-eye"></span>
                                </a>
                                <a href="${photo.source_url}" class="fullscreen-link">
                                    <span class="icon-fullscreen"></span>
                                </a>
                            </div>
                        </div>
                    `);
                });
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error('Failed to fetch photos:', jqXHR.responseText); // Affiche une erreur en cas d'échec
            }
        });
    }

    // Charge plus de photos lorsque le bouton est cliqué
    $('#load-more').on('click', function () {
        page++;
        fetchPhotos();
    });

    // Recharge les photos lorsque les filtres changent
    $('#category-filter, #format-filter, #sort-filter').on('change', function () {
        page = 1; // Réinitialise à la première page
        order = $('#sort-filter').val(); // Met à jour l'ordre
        fetchPhotos();
    });

    fetchPhotos(); // Appel initial pour charger les photos au démarrage de la page
});
