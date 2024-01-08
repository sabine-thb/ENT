<?php
session_start();
include("connexion.php");

$utilisateur=$_SESSION['utilisateur'];

$role=$utilisateur['role'];

$nom=$utilisateur['nom'];
$prenom=$utilisateur['prenom'];
$id_user=$utilisateur['id'];
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
    <title>ENT - Cours</title>
    
    <link rel="icon" type="image/svg" href="./style/img/logoENT.svg">
</head>

<body>
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
    <?php
     if ($role == "professeur") {
    ?>

    <?php
                    
        $requete =" SELECT * FROM matiere WHERE professeur = '$nom' ";
        $stmt=$db->query($requete);
        $result=$stmt -> fetchall(PDO::FETCH_ASSOC); 
    ?>
               
    <section >
        <?php if (isset($_GET["insertion"] )){  
            echo "<p class=\"coursOk txtRouge\">Votre cours a bien été inséré.</p>";
        } 
        ?>
        <h1 class="titlePage"><?php echo "$prenom" ?>, vous souhaitez déposer un cours ?</h1>
    </section>
    <section class="secInsertion">
        
            <div class="formContainer">
                <form action="traiteCours.php" method="post" enctype="multipart/form-data">
                <div class="selecFile">
                    <label for="file"  class="label1">Sélectionnez le fichier du cours :</label>
                    <input type="file" name="file" id="file" accept=".pdf, .doc, .docx">
                </div>
                <div class="nomCours">
                    <label for="titre">Nom du Cours : </label>
                    <input id="titre" type="text" name="nomCours">
                    <input type="hidden" name="matiere" value="<?php foreach ($result as $row){  echo $row["id_matiere"]; } ?>">
                </div>
                <input type="submit" value="Déposer le fichier" class="valider" aria-label="Valider l'envoie du fichier">

                
                    
                    
                
                </form>

            </div>

    </section>
        
        

    

    <?php } ?>

    <?php
     if ($role == "élève") {
    ?>
    <section>
        <h1 class="titlePage">Supports de cours</h1>
        <h2 class="categorie">Développement Web</h2>
        <div class="coursDev">
        <?php    
            $requete =" SELECT * FROM matiere WHERE type = 'Développement web' ";
            $stmt=$db->query($requete);
            $result=$stmt -> fetchall(PDO::FETCH_ASSOC); 
            foreach ($result as $row){ ?>

            <a href="ressources.php?id=<?php echo $row['id_matiere']; ?>" class="lienRessource" style="background-image: url('./style/img/cours/<?php echo $row['id_matiere']; ?>')" alt="Image et lien vers cours" aria-label="Lien vers la page du cours">
                <div class="imgCours" >
                <h2 class="titreRessource"><?php echo $row["titre_matiere"]; ?></h2>
                </div>
            </a>

            <?php } ?>
            
        </div>
        <h2 class="categorie two">Création numérique</h2>
        <div class="coursCrea">
        <?php    
            $requete =" SELECT * FROM matiere WHERE type = 'Création numérique' ";
            $stmt=$db->query($requete);
            $result=$stmt -> fetchall(PDO::FETCH_ASSOC); 
            foreach ($result as $row){ ?>

            <a href="ressources.php?id=<?php echo $row['id_matiere']; ?>" class="lienRessource" style="background-image: url('./style/img/cours/<?php echo $row['id_matiere']; ?>')" alt="Image et lien vers cours" aria-label="Lien vers la page du cours">
                <div class="imgCours" >
                <h2 class="titreRessource"><?php echo $row["titre_matiere"]; ?></h2>
                </div>
            </a>

            <?php } ?>
            
        </div>
        <h2 class="categorie three">Communication</h2>
        <div class="coursCrea">
        <?php    
            $requete =" SELECT * FROM matiere WHERE type = 'Communication' ";
            $stmt=$db->query($requete);
            $result=$stmt -> fetchall(PDO::FETCH_ASSOC); 
            foreach ($result as $row){ ?>

            <a href="ressources.php?id=<?php echo $row['id_matiere']; ?>" class="lienRessource" style="background-image: url('./style/img/cours/<?php echo $row['id_matiere']; ?>')" alt="Image et lien vers cours" aria-label="Lien vers la page du cours">
                <div class="imgCours" >
                <h2 class="titreRessource"><?php echo $row["titre_matiere"]; ?></h2>
                </div>
            </a>

            <?php } ?>
            
        </div>


    </section>

    <?php } ?>

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

    <a href="messagerie.php" class="chat" aria-label="Lien vers la messagerie"><img src="./style/img/chat.png" alt="Bouton vers la messagerie" srcset="" class="imgChat"></a>

    
    <script src="./script/burger.js"></script>
</body>
</html>