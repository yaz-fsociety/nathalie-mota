document.addEventListener('DOMContentLoaded', function () {
    // Code pour la modale de contact
    var modal = document.getElementById('contactModal');
    var btn = document.getElementById('contactModalButton');
    var span = document.getElementsByClassName('close')[0];

    if (btn) {
        btn.onclick = function () {
            if (modal) {
                modal.style.display = 'block';
            }
        }
    }

    if (span) {
        span.onclick = function () {
            if (modal) {
                modal.style.display = 'none';
            }
        }
    }

    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }

    // Code pour le menu mobile
    var menuToggle = document.querySelector('.menu-toggle');
    var mobileMenu = document.getElementById('mobile-menu');

    if (menuToggle && mobileMenu) {
        menuToggle.addEventListener('click', function () {
            var expanded = this.getAttribute('aria-expanded') === 'true' || false;
            this.setAttribute('aria-expanded', !expanded);
            mobileMenu.setAttribute('aria-hidden', expanded);
        });
    }
});

