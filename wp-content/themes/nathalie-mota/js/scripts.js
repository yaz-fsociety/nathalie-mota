document.addEventListener('DOMContentLoaded', function () {
    console.log('Document loaded');
    var modal = document.getElementById('contactModal');
    var footerButton = document.getElementById('contactModalButton');
    var headerButton = document.getElementById('contactModalHeaderButton');
    var span = document.getElementsByClassName('close')[0];

    console.log('Modal:', modal);
    console.log('Footer Button:', footerButton);
    console.log('Header Button:', headerButton);
    console.log('Close:', span);

    if (footerButton) {
        footerButton.onclick = function () {
            console.log('Footer button clicked');
            modal.style.display = 'block';
        }
    }

    if (headerButton) {
        headerButton.onclick = function (event) {
            event.preventDefault();
            console.log('Header button clicked');
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

