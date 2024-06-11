jQuery(document).ready(function ($) {
    var page = 1;
    var order = 'desc';

    function fetchPhotos() {
        var category = $('#category-filter').val();
        var format = $('#format-filter').val();

        $.ajax({
            url: '/wp-json/nathalie-mota/v1/photos',
            data: {
                page: page,
                order: order,
                category: category,
                format: format
            },
            success: function (data) {
                if (page === 1) {
                    $('#photo-gallery').html('');
                }
                data.forEach(function (photo) {
                    $('#photo-gallery').append(`
                        <div class="photo-card">
                            <img src="${photo.thumbnail}" alt="${photo.title}">
                            <div class="photo-info">
                                <a href="${photo.full}" class="lightbox-link">
                                    <span class="icon-eye"></span>
                                </a>
                                <a href="${photo.full}" class="fullscreen-link">
                                    <span class="icon-fullscreen"></span>
                                </a>
                            </div>
                        </div>
                    `);
                });
            }
        });
    }

    $('#load-more').on('click', function () {
        page++;
        fetchPhotos();
    });

    $('#category-filter, #format-filter, #sort-filter').on('change', function () {
        page = 1;
        order = $('#sort-filter').val();
        fetchPhotos();
    });

    fetchPhotos();
});