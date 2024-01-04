<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" href="style/style.css">   
    <link rel="stylesheet" href="style/fonts.css">
    <link rel="stylesheet" href="style/burger.css">
    <link rel="stylesheet" href="style/styleActus.css">
    <title>Actualités</title>
    <link rel="icon" type="image/svg" href="./style/img/logoENT.svg">
</head>
<body>
    
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
        
        
        <div class="titleContainer">
            <img src="./style/img/bonhommes/hautParleur.png" class="img1" alt="">
            <h1 class="titlePage">Actu de la semaine</h1>
        </div>   
        
        <img src="./style/img/actus/actu4.jpg" alt="Image Actualité de la semaine" srcset="" class="actuPrincipale">

        <h2 class="titleActuPrincipale">Plastic Odyssey : un tour du monde engagé dans la lutte contre la pollution plastique</h2>

        <p class="descrPrincipale">Focus sur le projet Recityplast porté par l’Université Gustave Eiffel, présenté à l’occasion de la première escale de l’expédition à Dakar, au Sénégal.</p>

    </section>

    <section class="section2">

        <img src="./style/img/bonhommes/dameLivre.png" class="img2" alt="">

        <h1 class="title2">Actualités Gustave Eiffel</h1>

        <div class="actus">
            <div class="actuContainer">
                <a href="actus.php"><img src="./style/img/actus/actu1.jpg" alt="Image Actualité 1" srcset="" class=" actu actu2"></a>
                <h2>Enquête REMEDE : Résultats de l'état des lieux des actions pour l'égalité dans les établissements d'enseignement supérieur</h2>
                <p class="descr">Lundi 13 novembre 2023, les résultats de l’enquête REMEDE ont été présentés.</p>
            </div>

            <div class="actuContainer">
                <a href="actu2.php"><img src="./style/img/actus/actu2.jpg" alt="Image Actualité 2" srcset="" class=" actu actu3"></a>
                <h2>Classement de Shanghai : l’Université Gustave Eiffel se distingue dans le classement par thématique</h2>
                <p class="descr">Le classement de Shanghai est un classement annuel des universités du monde entier. Pour la troisième année consécutive, l'Université Gustave Eiffel se distingue sur 9 des 54 classements thématique.</p>
            </div>

            <div class="actuContainer">
                <a href="actu3.php"><img src="./style/img/actus/actu3.jpg" alt="Image Actualité 3" srcset="" class="actu actu4"></a>
                <h2>L'UEO - Médiation scientifique à destination des scolaires ou du grand public</h2>
                <p class="descr">Vidéo YouTube disponible sur la chaîne de l’Université.</p>
            </div>
        </div>
        
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
        
    <script src="./script/burger.js"></script>

    <a href="messagerie.php" class="chat"><img src="./style/img/chat.png" alt="Bouton vers la messagerie" srcset="" class="imgChat"></a>

</body>
</html>