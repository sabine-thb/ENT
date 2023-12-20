document.addEventListener("DOMContentLoaded", function () {
    const button = document.querySelector('.button');

        // Sélectionnez l'élément avec la classe "sec2"
        const sec2 = document.querySelector('.sec2');

        // Ajoutez un gestionnaire d'événement pour le clic sur le bouton
        button.addEventListener('click', function () {
            // Changez le style de display de "none" à "block" pour l'élément avec la classe "sec2"
            sec2.style.display = 'flex';
        });
    

});