//Code pour envoyer le message lorsque l'on appuie sur la touche entrée

document.addEventListener("DOMContentLoaded", function () {

    document.getElementById('message').addEventListener('keydown', function(event) {
        if (event.key === 'Enter') {
            event.preventDefault(); // Empêcher le comportement par défaut (rechargement de la page)
            submitForm();
        }
    });

    function submitForm() {
        document.querySelector('.traiteChat').submit();
    }

});