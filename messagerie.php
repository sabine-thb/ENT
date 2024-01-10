<?php
session_start();
include("connexion.php");

if (!isset($_SESSION['utilisateur'])) {
    header("Location: index.php");
    exit();
}

$utilisateur = $_SESSION['utilisateur'];
$login = $utilisateur['login'];
$role = $utilisateur['role'];
$idSession = $utilisateur['id'];
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" href="style/style.css">   
    <link rel="stylesheet" href="style/fonts.css">
    <link rel="stylesheet" href="style/burger.css">
   <link rel="stylesheet" href="style/styleMessagerie.css">
    <title>ENT - Messagerie</title>
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
    
    <section class="section1" id="contenu">

        <div class="titleContainer">
            <h1 class="titlePage">Ma messagerie </h1>
            <img src="./style/img/bonhommes/messages.png" alt="" class="img">

        </div>
        
        <br>

    
        <h2>Conversations en cours</h2>
        <?php 
        $requete = "SELECT m.*
        FROM messages m
        INNER JOIN (
            SELECT id_user_edi, MAX(date) AS max_date
            FROM messages
            WHERE id_user_dest = :idSession
            GROUP BY id_user_edi
        ) latest ON m.id_user_edi = latest.id_user_edi AND m.date = latest.max_date
        ORDER BY m.date DESC;";
        $stmt = $db->prepare($requete);      
        $stmt->bindParam(':idSession', $idSession, PDO::PARAM_INT);        
        $stmt->execute();
        $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (empty($resultat)) {
            echo "<p class=\"txtRouge\">Vous n'avez pas de conversation en cours.</p>";
        }


        ?>

        <div class="allConv">

        
        <!-- On affiche toutes les conv en cours -->
        <?php foreach ($resultat as $message) : ?>
            
            <div class="conv">
                <img src="./style/img/profil/<?= $message['id_user_edi'] ?>.svg" class="photoProfil" alt="">
                <div class="loginMsg">
                    <div class="edi"><strong>@<?= $message['login'] ?></strong></div>
                    <div class="msg"><?= $message['message'] ?></div>

                </div>
                    
                <div class="finMsg">
                    <div class="date"><?= date('d/m/y H:i', strtotime($message['date'])) ?></div>
                    <a href="chat.php?utilisateur=<?= $message['id_user_edi'] ?>" class="linkConv" aria-label="Lien vers l'ensemble de la discussion">Voir tout</a>                    
                </div>
                    
                
            </div>
        <?php endforeach; ?>
    </section>
    
    <section class="sec2">
        
        
        <form action="chat.php" method="get" class="choix-utilisateur">
        <label for="utilisateur">Nouvelle conversation :</label>
        <select name="utilisateur" id="utilisateur" required>
            <option value="">Sélectionnez un utilisateur</option>
            <?php
            // je recup la liste des utilisateurs depuis la bdd
            $requeteUtilisateurs = "SELECT * FROM utilisateurs WHERE role = 'élève' OR role='professeur' ";
            $stmtUtilisateurs = $db->prepare($requeteUtilisateurs);
            $stmtUtilisateurs->execute();
            $utilisateurs = $stmtUtilisateurs->fetchAll(PDO::FETCH_ASSOC);

            // affichage
            foreach ($utilisateurs as $utilisateur) {
                echo "<option value='{$utilisateur['id']}' class=\"optionUser\">
                           {$utilisateur['prenom']} {$utilisateur['nom']}
                    </option>";
            }
            ?>
        </select>
        <button type="submit" aria-label="Validation de la sélection d'un nouvel utilisateur avec lequel parler par message">Valider</button>
    </form>
    </div>
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
    
</body>
</html>