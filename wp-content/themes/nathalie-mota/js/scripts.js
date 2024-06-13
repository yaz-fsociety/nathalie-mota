document.addEventListener('DOMContentLoaded', function () {
    console.log('Document loaded');

    var modal = document.getElementById('contactModal');
    var btnFooter = document.getElementById('contactModalButton');
    var btnHeader = document.querySelector('a[href="#"]:not(.home-link)');
    var span = document.getElementsByClassName('close')[0];

    console.log('Modal:', modal);
    console.log('Footer Button:', btnFooter);
    console.log('Header Button:', btnHeader);
    console.log('Close:', span);

    if (btnFooter) {
        btnFooter.onclick = function () {
            modal.style.display = 'block';
        }
    }

    if (btnHeader) {
        btnHeader.onclick = function () {
            modal.style.display = 'block';
        }
    }

    if (span) {
        span.onclick = function () {
            modal.style.display = 'none';
        }
    }

    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }

    // Gestion des filtres et du tri pour la galerie
    const categoryFilter = document.getElementById('category-filter');
    const formatFilter = document.getElementById('format-filter');
    const sortFilter = document.getElementById('sort-filter');
    const loadMoreButton = document.getElementById('load-more');
    const galleryContainer = document.getElementById('photo-gallery');

    let page = 1;

    function fetchPhotos(reset = false) {
        const category = categoryFilter.value;
        const format = formatFilter.value;
        const sort = sortFilter.value;

        const query = new URLSearchParams({
            page,
            category,
            format,
            sort,
        });

        fetch(`/wp-json/custom/v1/photos?${query.toString()}`)
            .then(response => response.json())
            .then(data => {
                if (reset) {
                    galleryContainer.innerHTML = '';
                }
                data.photos.forEach(photo => {
                    const photoElement = document.createElement('div');
                    photoElement.classList.add('photo');
                    photoElement.innerHTML = `
                        <img src="${photo.thumbnail}" alt="${photo.title}">
                        <div class="photo-overlay">
                            <a href="${photo.full}" class="photo-fullscreen">🔍</a>
                            <a href="${photo.info}" class="photo-info">ℹ️</a>
                        </div>
                    `;
                    galleryContainer.appendChild(photoElement);
                });

                if (!data.hasMore) {
                    loadMoreButton.style.display = 'none';
                } else {
                    loadMoreButton.style.display = 'block';
                }
            });
    }

    categoryFilter.addEventListener('change', () => {
        page = 1;
        fetchPhotos(true);
    });

    formatFilter.addEventListener('change', () => {
        page = 1;
        fetchPhotos(true);
    });

    sortFilter.addEventListener('change', () => {
        page = 1;
        fetchPhotos(true);
    });

    loadMoreButton.addEventListener('click', () => {
        page++;
        fetchPhotos();
    });

    fetchPhotos();

    // Lightbox
    document.body.addEventListener('click', function(event) {
        if (event.target.classList.contains('photo-fullscreen')) {
            event.preventDefault();
            const imgSrc = event.target.getAttribute('href');
            const lightbox = document.createElement('div');
            lightbox.id = 'lightbox';
            lightbox.innerHTML = `
                <div class="lightbox-content">
                    <span class="close-lightbox">&times;</span>
                    <img src="${imgSrc}" alt="">
                </div>
            `;
            document.body.appendChild(lightbox);
        }

        if (event.target.classList.contains('close-lightbox')) {
            document.getElementById('lightbox').remove();
        }
    });
});
