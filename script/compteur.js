document.addEventListener("DOMContentLoaded", function () {
    //ici le code pour faire un faux compteur étant donné que nous n"avons pas les moyens de calculer réellement le temps d'attente à la cantine

    // Fonction pour mettre à jour le compteur
    function mettreAJourCompteur(element, tempsRestant) {
        element.textContent = tempsRestant + ' mn';
    }

    // Fonction de compte à rebours
    function demarrerCompteur(element, tempsInitial) {
        let tempsRestant = tempsInitial;

        mettreAJourCompteur(element, tempsRestant);

        // Mettre à jour le compteur toutes les minutes
        const intervalID = setInterval(function() {
            tempsRestant--;

            if (tempsRestant >= 0) {
                mettreAJourCompteur(element, tempsRestant);
            } else {
                clearInterval(intervalID); // Arrêter le compte à rebours quand le temps atteint 0
            }
        }, 60000); // 60000 millisecondes = 1 minute
    }

    // Démarrer les compteurs
    const compteur1 = document.querySelector('.c1');
    const compteur2 = document.querySelector('.c2');

    demarrerCompteur(compteur1, 25);
    demarrerCompteur(compteur2, 14);

});