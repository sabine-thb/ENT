<?php
session_start();
include("connexion.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" href="style/style.css">   
    <link rel="stylesheet" href="style/fonts.css">
    <link rel="stylesheet" href="style/burger.css">
    <link rel="stylesheet" href="style/styleProf.css">
       
    <title>ENT - Infos profs</title>
    <link rel="icon" type="image/svg" href="./style/img/logoENT.svg">
</head>

<body>
    <a href="#contenu" class="skip-link">Aller au contenu</a>
    <header>
        
        <a href="accueil.php" class="logo" aria-label="Logo et lien vers la page d'accueil"></a>

        <nav class="responsive-menu">
            <a href="#" class="toggle-menu" data-toggle-class="active" data-toggle-target=".main-menu, this" aria-label="Accès au menu"><svg height="32" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg"><path d="M4 10h24c1.104 0 2-.896 2-2s-.896-2-2-2H4c-1.104 0-2 .896-2 2s.896 2 2 2zm24 4H4c-1.104 0-2 .896-2 2s.896 2 2 2h24c1.104 0 2-.896 2-2s-.896-2-2-2zm0 8H4c-1.104 0-2 .896-2 2s.896 2 2 2h24c1.104 0 2-.896 2-2s-.896-2-2-2z" fill="#fff"/></svg></a>
            
            <ul class="main-menu">
                <li><div class="navFirstLevel"><span>Mon profil</span></div> 
                    <ul class="sub-menu">
                        <li><a href="absences.php" aria-label="Lien vers la page des abscences et retards"><span>Absences et retards</span></a></li>
                        <li><a href="notes.php" aria-label="Lien vers la page des notes"><span>Notes</span></a></li>
                    </ul>
                </li>
                <li><div class="navFirstLevel"><span>Scolarité</span></div>
                    <ul class="sub-menu">
                        <li><a href="edt.php" aria-label="Lien vers la page de l'emploi du temps'"><span>Emploi du temps</span></a></li>
                        <li><a href="devoirs.php" aria-label="Lien vers la page des devoirs à rendre"><span>Devoirs à rendre</span></a></li>
                        <li><a href="cours.php" aria-label="Lien vers la page des cours"><span>Cours</span></a></li>
                    </ul>
                </li>
                <li><div class="navFirstLevel"><span>Services</span></div>
                    <ul class="sub-menu">
                        <li><a href="restauration.php" aria-label="Lien vers la page de restauration"><span>Restauration</span></a></li>
                        <li><a href="resa.php" aria-label="Lien vers la page de réservation de matériel"><span>Réservation de matériel</span></a></li>
                    </ul>
                </li>
                <li><div class="navFirstLevel"><span>Informations</span></div>
                    <ul class="sub-menu">
                        <li><a href="infosProf.php" aria-label="Lien vers la page d'informations sur les professeurs"><span>Informations sur les professeurs</span></a></li>
                        <li><a href="actus.php" aria-label="Lien vers la page d'actualités"><span>Actualités étudiantes</span></a></li>
                        <li><a href="carte.php" aria-label="Lien vers la page de la carte du campus"><span>Carte du campus</span></a></li>
                    </ul>
                </li>
                <li>
                    <div class="navFirstLevel">
                        <a href="deconnexion.php" class="navItem" aria-label="Lien vers la page de connexion">
                        <img src="./style/img/deco.svg"  class="deco" alt="se déconnecter">
                        </a> 
                </div>
                    
                </li>
            </ul>
        </nav>
	
    </header>

    <section id="contenu">
        <h1 class="titlePage">Informations sur les professeurs</h1>
    </section>

    <section class="sec1">
        <div class="gridContainer">
                <?php 
                $requete =" SELECT * 
                FROM utilisateurs
                JOIN matiere ON utilisateurs.nom = matiere.professeur
                WHERE utilisateurs.role = 'professeur';";
                $stmt=$db->query($requete);
                $result=$stmt -> fetchall(PDO::FETCH_ASSOC);
                foreach ($result as $row){ ?>  
                <div class="prof">        
                    <div class="photoContainer"><img src="./style/img/profil/<?php echo $row["id"]?>.svg"  class="photoProf" alt=""></div>
                    <div class="nomPrenom"><?php echo $row["prenom"]?> <?php echo $row["nom"]?></div>
                    <div class="matiere"><?php echo $row["titre_matiere"]?></div>
                    <div class="mail"><?php echo $row["mail"]?></div>

                </div>
                <?php }?>
            
        </div>
        <img src="./style/img/bonhommes/damePlanning.png" class="img" alt="">
    </section>

    <footer>
        <div class="logoFooterContainer">
            <a href="accueil.php" aria-label="Lien vers l'accueil">
                <img src="./style/img/logoFooter.svg" class="logoFooter" alt="retour à l'accueil">
            </a>
        </div>
        <div class="ML">
            <a href="ML.html" class="lienFooter" aria-label="Lien vers les mentions légales"><p class="pFooterTitle">Mentions Légales</p></a>
            <a href="ML.html#editeur" class="lienFooter" aria-label="Lien vers la section éditeur des mentions légales"><p class="pFooter">éditeur</p></a>
            <a href="ML.html#contributeurs" class="lienFooter" aria-label="Lien vers la section contributeurs des mentions légales"><p class="pFooter">Contributeurs</p></a>
            <a href="ML.html#hebergeur" class="lienFooter" aria-label="Lien vers la section hébergeur des mentions légales"><p class="pFooter">Hébergeur</p></a>
            <a href="ML.html#cookies" class="lienFooter" aria-label="Lien vers la section cookies des mentions légales"><p class="pFooter">Cookies</p></a>
            <a href="ML.html#RGPD" class="lienFooter" aria-label="Lien vers la section RGPD des mentions légales"><p class="pFooter">RGPD</p></a>
            <a href="ML.html#sources" class="lienFooter" aria-label="Lien vers la section sources des mentions légales"><p class="pFooter">Sources</p></a>
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

    <a href="messagerie.php" class="chat" aria-label="Lien vers la messagerie"><img src="./style/img/chat.png" alt="Bouton vers la messagerie" srcset="" class="imgChat"></a>

    <script src="./script/burger.js"></script>
    
</body>
</html>