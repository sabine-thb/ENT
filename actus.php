<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" href="style/style.css">   
    <link rel="stylesheet" href="style/fonts.css">
    <link rel="stylesheet" href="style/burger.css">
    <link rel="stylesheet" href="style/styleAccueil.css">
    <title>Emploi du Temps</title>
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
        <h1>Actu de la semaine</h1>
        <img src="./style/img/actus/actu1.jpg" alt="Image Actualité de la semaine" srcset="">
        <h2>Enquête REMEDE : Résultats de l'état des lieux des actions pour l'égalité dans les établissements d'enseignement supérieur</h2>
        <p>Lundi 13 novembre 2023, l'Observatoire National des Discriminations et de l'Égalité dans le Supérieur (ONDES) et la Conférence Permanente des chargé.e.s de mission Égalité et Diversité (CPED) ont présenté les résultats de l’enquête REMEDE (Recueil Extensif des Mesures des Établissements contre les Discriminations et pour l’Égalité), réalisée par Yannick L’Horty (Université Gustave Eiffel Et ONDES), Philippe Liotard (Université Lyon 1 Et CPED), Romane Masternak (CPED) et Aude Stheneur (CPED). Une table ronde s’est tenue suite à la divulgation des résultats de l’enquête afin de commenter et compléter le propos.</p>
    </section>
        
    <script src="./script/burger.js"></script>

    <a href="messagerie.php" class="chat"><img src="./style/img/chat.png" alt="Bouton vers la messagerie" srcset="" class="imgChat"></a>

</body>
</html>