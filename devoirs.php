<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" href="style/style.css">   
    <link rel="stylesheet" href="style/fonts.css">
    <link rel="stylesheet" href="style/burger.css">
    <link rel="stylesheet" href="style/styleDevoirs.css">
    <title>ENT - Devoirs à Rendre</title>
    
    <link rel="icon" type="image/svg" href="./style/img/logoENT.svg">
</head>

<body>

    <header>

        <a href="accueil.php" class="logo"></a>

        <nav class="responsive-menu">
            <a href="#" class="toggle-menu" data-toggle-class="active" data-toggle-target=".main-menu, this"><svg height="32" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg"><path d="M4 10h24c1.104 0 2-.896 2-2s-.896-2-2-2H4c-1.104 0-2 .896-2 2s.896 2 2 2zm24 4H4c-1.104 0-2 .896-2 2s.896 2 2 2h24c1.104 0 2-.896 2-2s-.896-2-2-2zm0 8H4c-1.104 0-2 .896-2 2s.896 2 2 2h24c1.104 0 2-.896 2-2s-.896-2-2-2z" fill="#fff"/></svg></a>
            
            <ul class="main-menu">
                <li><div class="navFirstLevel"><span>Mon profil</span></div> 
                    <ul class="sub-menu">
                        <li><a href="absences.php"><span>Absences et retards</span></a></li>
                        <li><a href="notes.php"><span>Notes</span></a></li>
                    </ul>
                </li>
                <li><div class="navFirstLevel"><span>Scolarité</span></div>
                    <ul class="sub-menu">
                        <li><a href="edt.php"><span>Emploi du temps</span></a></li>
                        <li><a href="devoirs.php"><span>Devoirs à rendre</span></a></li>
                        <li><a href="cours.php"><span>Cours</span></a></li>
                    </ul>
                </li>
                <li><div class="navFirstLevel"><span>Services</span></div>
                    <ul class="sub-menu">
                        <li><a href="restauration.php"><span>Restauration</span></a></li>
                        <li><a href="resa.php"><span>Réservation de matériel</span></a></li>
                    </ul>
                </li>
                <li><div class="navFirstLevel"><span>Informations</span></div>
                    <ul class="sub-menu">
                        <li><a href="infosProf.php"><span>Informations sur les professeurs</span></a></li>
                        <li><a href="actus.php"><span>Actualités étudiantes</span></a></li>
                        <li><a href="carte.php"><span>Carte du campus</span></a></li>
                    </ul>
                </li>
                <li>
                    <div class="navFirstLevel">
                        <a href="deconnexion.php" class="navItem">
                        <img src="./style/img/deco.svg"  class="deco" alt="se déconnecter">
                        </a> 
                </div>
                    
                </li>
            </ul>
        </nav>
        
    </header>

    <section class="section1">

        <h1 class="title">Devoirs à Rendre</h1>

        <div class="devoirs">

            <div class="devoir">
                <img src="./style/img/logoENT.svg" alt="devoir 1" srcset="" class="img">
                <div class="descr">
                    <div class="flex">
                        <h2 class="nom nom1">SAÉ 3.01 ENT</h2>
                        <p class="date">Pour le <strong>12/01</strong> à <strong>23:59</strong></p>
                    </div>
                    <div class="flex">
                        <p class="profs">Matthieu Berthet, Gaëlle Charpentier, Renaud Eppstein...</p>
                        <p class="italic">Non rendu</p>
                    </div>
                </div>
            </div>

            <div class="separation"></div>
            
            <div class="devoir">
                <img src="./style/img/logoENT.svg" alt="devoir 2" srcset="" class="img">
                <div class="descr">
                    <div class="flex">
                        <h2 class="nom nom2">SAÉ 3.02-B CV Vidéo</h2>
                        <p class="date">Pour le <strong>08/01</strong> à <strong>23:59</strong></p>
                    </div>
                    <div class="flex">
                        <p class="profs">Anne Tasso, Lahcen Soussi, Alexandre Leroy...</p>
                        <p class="italic">Rendu</p>
                    </div>
                </div>
            </div>

            <div class="separation"></div>

            <div class="devoir">
                <img src="./style/img/logoENT.svg" alt="devoir 3" srcset="" class="img">
                <div class="descr">
                    <div class="flex">
                        <h2 class="nom nom3">Portfolio</h2>
                        <p class="date">Pour le <strong>18/12</strong> à <strong>01:00</strong></p>
                    </div>
                    <div class="flex">
                        <p class="profs">Gaëlle Charpentier</p>
                        <p class="italic">Rendu</p>
                    </div>
                </div>
            </div>

            <div class="separation"></div>

            <div class="devoir">
                <img src="./style/img/logoENT.svg" alt="devoir 4" srcset="" class="img">
                <div class="descr">
                    <div class="flex">
                        <h2 class="nom nom4">SAÉ 3.02-A Podcast</h2>
                        <p class="date">Pour le <strong>24/11</strong> à <strong>23:59</strong></p>
                    </div>
                    <div class="flex">
                        <p class="profs">Tony Houziaux, KPC, Alexandre Leroy...</p>
                        <p class="italic">Rendu</p>
                    </div>
                </div>
            </div>

        </div>

        <!-- Popups -->
        <div class="popup-visible-1">
            <img src="./style/img/croix.png" alt="fermer1" class="fermer1">
            <div class="popup">
                <h3>SAÉ 3.01 ENT</h3>
                <h4>Date de rendu :</h4>
                <p>Pour le <strong class="color">12/01</strong> à <strong class="color">23:59</strong></p>
                <h4>Professeurs en chargent :</h4>
                <p>Matthieu Berthet, Gaëlle Charpentier, Renaud Eppstein, Philippe Gambette, Fatima Laoufi, Alexandre Leroy & Hervé Lo</p>
                <h4>Présentation du travail à rendre :</h4>
                <p>Vous êtes chargé de réaliser un ENT en appliquant l'ensemble des étapes de la méthodologie UX (eXperience Utilisateur). Puis vous réaliserez le design de votre interface une fois celle-ci testée. Vous mettrez en œuvre vos compétences de développement pour produire un site sécurisé avec un accès aux ressources différencié en fonction des profils identifiés, ainsi que des possibilités pour certains profils d’administrer, au travers d’un back-office, certaines fonctionnalités du site.</p>
                <h4>Zone de dépôt :</h4>
                <div class="flex">
                    <p>Statut des travaux remis :</p>
                    <p>Aucune Tentatives</p>
                </div>
                <div class="flex">
                    <p>Statut d’évaluation :</p>
                    <p>Non évalué</p>
                </div>
                <div class="flex">
                    <p>Dernière modifications :</p>
                    <p>Aucune Modifications</p>
                </div>
                <div class="flex">
                    <p>Commentaires :</p>
                    <p>0</p>
                </div>
                <p class="centre"><a href="#" target="_blank" class="lienPleinEcran"><strong>Ajouter un travail</strong></a></p>
                <p class="color centre">Vous n'avez pas encore remis de travail.</p>
            </div>
        </div>

        <div class="popup-visible-2">
            <img src="./style/img/croix.png" alt="fermer2" class="fermer2">
            <div class="popup">
                <h3>SAÉ 3.02-B CV Vidéo</h3>
                <h4>Date de rendu :</h4>
                <p>Pour le <strong class="color">08/01</strong> à <strong class="color">23:59</strong></p>
                <h4>Professeurs en chargent :</h4>
                <p>Anne Tasso, Lahcen Soussi, Alexandre Leroy, Leyla Jaoued & Odile Niel</p>
                <h4>Présentation du travail à rendre :</h4>
                <p>Vous devez réaliser un CV Vidéo sous forme de tournage, montage et post-production en TP. Celui-ci doit durer de 2mn à 2mn 30 maximum. La vidéo sera déposée au format mp4 sur l’espace dédié du e-learning, avec une résolution Full HD (1920x1080) et compressée portant vos noms et prénoms. Pour filmer ce CV, il faut du matériel. La réservation ce fait via l'ENT dans la page de réservation. Le CV Vidéo doit comporter au moins :</p>
                <ul>
                    <li>Une transition créative</li>
                    <li>Un tracking vidéo avec insertion de texte animé ou motion</li>
                    <li>Un plan général</li>
                    <li>Un plan américain</li>
                    <li>Un plan serré taille</li>
                    <li>Un plan serré poitrine</li>
                    <li>Un plan portrait</li>
                    <li>Un gros plan</li>
                    <li>Un plan panoramique</li>
                    <li>Un champ contre champ</li>
                    <li>Deux mouvements parmi ceux proposés sur la page d'Anne Tasso que vous retrouverez <a href="https://www.annetasso.fr/ProductionAudiovisuelle/analyse-filmique/les-mouvements-de-camera/" target="_blank" alt="Lien vers le site d'Anne Tasso" class="lienSite">ici</a>.</li>
                </ul>
                <h4>Zone de dépôt :</h4>
                <div class="flex">
                    <p>Statut des travaux remis :</p>
                    <p>3 Tentatives</p>
                </div>
                <div class="flex">
                    <p>Statut d’évaluation :</p>
                    <p>Non évalué</p>
                </div>
                <div class="flex">
                    <p>Dernière modifications :</p>
                    <p>30/12 à 16:23</p>
                </div>
                <div class="flex">
                    <p>Commentaires :</p>
                    <p>0</p>
                </div>
                <p class="centre"><a href="#" target="_blank" class="lienPleinEcran"><strong>Ajouter un travail</strong></a></p>
                <p class="color centre">Vous avez déjà remis un travail.</p>
            </div>
        </div>

        <div class="popup-visible-3">
            <img src="./style/img/croix.png" alt="fermer3" class="fermer3">
            <div class="popup">
                <h3>Portfolio</h3>
                <h4>Date de rendu :</h4>
                <p>Pour le <strong class="color">18/12</strong> à <strong class="color">01:00</strong></p>
                <h4>Professeurs en chargent :</h4>
                <p>Gaëlle Charpentier</p>
                <h4>Présentation du travail à rendre :</h4>
                <p>Site web avec un nom de domaine adapté et professionnel. Il peut s’agir d’un one page. Ce site contient au minimum :</p>
                <ul>
                    <li>Prénom+Nom, Biographie</li>
                    <li>Lien vers votre CV PDF à jour</li>
                    <li>Lien vers votre profil LinkedIn à jour</li>
                    <li>Liens vers Github pour les développeur·euses</li>
                    <li>Accès à vos projets/travaux</li>
                </ul>
                <p>Pour la biographie : </p>
                <p>Profitez de ce bloc pour donner de la personnalité à votre portfolio et véhiculer vos valeurs. Pour ce faire, soyez concis, humble et honnête. Rédigez un texte propre et engageant. Informez et suscitez l’intérêt du visiteur</p>
                <p>Pour les Projets/travaux :</p>
                <p>Il faut mettre 5 à 6 projets. Ceux-ci peuvent êtres personnels (photos, sons, dessins, vidéos, gestion d’un blog…), scolaires, réalisés dans le cadre des cours (affiches, moodboard, sites web, vidéos, études de marché, tests utilisateurs…) et/ou réalisés en stage.</p>
                <h4>Zone de dépôt :</h4>
                <div class="flex">
                    <p>Statut des travaux remis :</p>
                    <p>2 Tentatives</p>
                </div>
                <div class="flex">
                    <p>Statut d’évaluation :</p>
                    <p>Non évalué</p>
                </div>
                <div class="flex">
                    <p>Dernière modifications :</p>
                    <p>16/12 à 14:31</p>
                </div>
                <div class="flex">
                    <p>Commentaires :</p>
                    <p>0</p>
                </div>
                <p class="centre"><a href="#" target="_blank" class="lienPleinEcran"><strong>Ajouter un travail</strong></a></p>
                <p class="color centre">Vous avez déjà remis un travail.</p>
            </div>
        </div>

        <div class="popup-visible-4">
            <img src="./style/img/croix.png" alt="fermer4" class="fermer4">
            <div class="popup">
                <h3>SAÉ 3.02-A Podcast</h3>
                <h4>Date de rendu :</h4>
                <p>Pour le <strong class="color">24/11</strong> à <strong class="color">23:59</strong></p>
                <h4>Professeurs en chargent :</h4>
                <p>Tony Houziaux, KPC, Alexandre Leroy & Florence Bister</p>
                <h4>Présentation du travail à rendre :</h4>
                <p>Il s'agit de rédiger, enregistrer et monter un podcast sur le thème d'une page de BD d'horreur ou d'une couverture de roman, sur laquelle vous avez travailler avec M.KPC.</p>
                <p>Il faudra ensuite rédiger un rapport de groupe apportant un éclairage critique sur toutes vos démarches concernant l'enregistrement et l'utilisations des éléments audios.</p>
                <p>Un nom d’étudiant.e du groupe dans le nom du fichier rendu (rapport). Tous les noms d’étudiant.es doivent figurer dans le rapport, celui-ci doit être précis et rédigé avec soin, sans fautes, au format .pdf, de poids léger. Enfin, il doit être déposé sur le eLearning au plus tard le 24/11/23.</p>
                <p>Les noms des fichiers des enregistrements audio seront explicites et facilement identifiables les uns des autres</p>
                <h4>Zone de dépôt :</h4>
                <div class="flex">
                    <p>Statut des travaux remis :</p>
                    <p>1 Tentatives</p>
                </div>
                <div class="flex">
                    <p>Statut d’évaluation :</p>
                    <p>Non évalué</p>
                </div>
                <div class="flex">
                    <p>Dernière modifications :</p>
                    <p>23/11 à 19:48</p>
                </div>
                <div class="flex">
                    <p>Commentaires :</p>
                    <p>0</p>
                </div>
                <p class="centre"><a href="#" target="_blank" class="lienPleinEcran"><strong>Ajouter un travail</strong></a></p>
                <p class="color centre">Vous avez déjà remis un travail.</p>
            </div>
        </div>

        <script src="./script/devoirs.js"></script>

    </section>
    
    <footer>
    <div class="logoFooterContainer">
        <a href="accueil.php">
            <img src="./style/img/logoFooter.svg" class="logoFooter" alt="retour à l'accueil">
        </a>
    </div>
    <div class="ML">
        <a href="ML.html" class="lienFooter"><p class="pFooterTitle">Mentions Légales</p></a>
        <a href="ML.html#editeur" class="lienFooter"><p class="pFooter">éditeur</p></a>
        <a href="ML.html#contributeurs" class="lienFooter"><p class="pFooter">Contributeurs</p></a>
        <a href="ML.html#hebergeur" class="lienFooter"><p class="pFooter">Hébergeur</p></a>
        <a href="ML.html#cookies" class="lienFooter"><p class="pFooter">Cookies</p></a>
        <a href="ML.html#RGPD" class="lienFooter"><p class="pFooter">RGPD</p></a>
    </div>
    <div class="contact">
        <p class="pFooterTitle">Contact</p>
        <div class="reseaux">
            <img src="./style/img/instagram.svg" class ="reseau" alt="instagram">
            <img src="./style/img/twitter.svg"  class ="reseau"alt="twitter">
            <img src="./style/img/facebook.svg" class ="reseau" alt="facebook">
        </div>
    </div>
</footer>
    <a href="messagerie.php" class="chat"><img src="./style/img/chat.png" alt="Bouton vers la messagerie" srcset="" class="imgChat"></a>
</body>
</html>