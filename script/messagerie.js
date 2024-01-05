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

    window.onload = function() {
        // Fonction pour faire défiler jusqu'au bas de la page
        function scrollToBottom() {
            window.scrollTo(0, document.body.scrollHeight);
        }

        // Appeler la fonction lors du chargement de la page
        scrollToBottom();
    };

});