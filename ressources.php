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
    <link rel="stylesheet" href="style/styleCours.css">
    <title>ENT - Ressource</title>
    
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
    <section>
        <h1 class="titlePage">Ressource :  <?php foreach ($result as $row) echo $row["titre_matiere"];?></h1>
        <p>Voici les cours que vous pouvez télécharger : </p>
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
        <a href="telechargerCours.php?id=<?php echo $fichier['id_cours']; ?>" download="cours_<?php echo $fichier['id_cours']; ?>.pdf">
                 <?php echo $fichier['nomCours']; ?>
        </a>
    </li>
<?php endforeach; ?>
        </ul>
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

    
    <script src="./script/burger.js"></script>
</body>
</html>