document.addEventListener('DOMContentLoaded', function () {
    console.log('Document loaded');
    
    // Code pour la modale de contact
    var modal = document.getElementById('contactModal');
    var btn = document.getElementById('contactModalButton');
    var span = document.getElementsByClassName('close')[0];

    console.log('Modal:', modal);
    console.log('Button:', btn);
    console.log('Close:', span);

    if (btn) {
        btn.onclick = function () {
            console.log('Button clicked');
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
});