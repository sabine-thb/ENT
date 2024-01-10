<?php
session_start();
include("connexion.php");

$utilisateur=$_SESSION['utilisateur'];

$role=$utilisateur['role'];

$nom=$utilisateur['nom'];
$prenom=$utilisateur['prenom'];
$id_user=$utilisateur['id'];

if(isset($_GET["id"])){
    $id = $_GET["id"];
}
else{
    $id = "1";
}

$requete = "SELECT * FROM matiere WHERE  id_matiere = :id";
$stmt = $db->prepare($requete);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" href="style/style.css">   
    <link rel="stylesheet" href="style/fonts.css">
    <link rel="stylesheet" href="style/burger.css">
    <link rel="stylesheet" href="style/styleRessource.css">
    <title>ENT - Ressource</title>
    
    <link rel="icon" type="image/svg" href="./style/img/logoENT.svg">
</head>

<body>
    <header>
        <a href="#contenu" class="skip-link">Aller au contenu</a>
        
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
    <section class="sec1" id="contenu">
        <a href="cours.php" class="retour" aria-label="Lien retour vers la page des cours">Retour</a>
        <h1 class="titlePage">Ressource :  <?php foreach ($result as $row) echo $row["titre_matiere"];?></h1>
        <p class="expl">Voici les cours que vous pouvez télécharger : </p>
        <?php 


        // On récupère la liste des fichiers associés à ce cours depuis la base de données
        $requete = "SELECT * FROM cours WHERE id_mat_ext = :id_cours";
        $stmt = $db->prepare($requete);
        $stmt->bindParam(':id_cours', $id, PDO::PARAM_INT);
        $stmt->execute();
        $listeFichiers = $stmt->fetchAll(PDO::FETCH_ASSOC);

        
        ?>
        
        <!-- Affichez la liste des fichiers pour le cours -->
        
        <ul>
        <?php foreach ($listeFichiers as $fichier) : ?>
            <li>
            <a href="telechargerCours.php?id=<?php echo $fichier['id_cours']; ?>" download="cours_<?php echo $fichier['id_cours']; ?>.pdf" class="lienRessource" aria-label="Bouton de téléchargement du cours">
                 <?php echo $fichier['nomCours']; ?>
            </a>
            </li>
    <?php endforeach; ?>
    <?php if ($stmt->rowCount() == 0) { 
       echo"<p class=\"txtRouge\">Il n'y a rien à télécharger pour cette ressource actuellement.</p>" ;
    }
    ?>
        </ul>
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