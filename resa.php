<?php
session_start();
include("connexion.php");

$utilisateur=$_SESSION['utilisateur'];

$role=$utilisateur['role'];

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
    <link rel="stylesheet" href="style/styleResa.css">
       
    <title>ENT - Réservations</title>
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

    <?php
     if ($role == "professeur") {
    ?>
    <section class="sec1" id="contenu">

        <h1>Suivi des réservations étudiantes</h1>
        <p class="pProf">Ici, vous avez accès à toutes les réservations effectuées par les élèves.</p>
        <p class="pProf">Vous pouvez voir ici les réservations qui sont en cours. </p>
        <div class="allResaEtud">
        <img src="./style/img/bonhommes/planning.png" class="img2" alt="">
        

        
            <?php $requete = "SELECT * FROM reservation, utilisateurs, materiel WHERE id=id_user_ext AND id_mat=id_mat_ext AND date_fin>NOW()";
            $stmt=$db->query($requete);
            $result=$stmt -> fetchall(PDO::FETCH_ASSOC); 
            foreach ($result as $row){ ?>

            
                        
            <div class="oneResaEtud">
                <p><span class="eleve"><?php echo "{$row["nom"]} {$row["prenom"]}"?></span> a effectué une réservation.</p>
                <p class="p2">L'élève a réservé le matériel "<?php echo $row["nom_mat"]?>" du <?php echo date("d-m-Y", strtotime($row["date_debut"]));?> au <?php echo date("d-m-Y", strtotime($row["date_fin"]));?> </p>
            </div>
            <?php } ?>

            
            
        </div>
        <button class="button" aria-describedby="button-anciennes-réservation">Voir les anciennes réservations</button>
        


    </section>



    <section class="sec2">

        <h1 class="titleOldResa">Suivi des anciennes réservations</h1>
        <p class="pProf">Ici, vous avez accès à toutes les anciennes réservations des élèves.</p>
        <p class="pProf">Cette section peut vous être utile en cas de souci avec le matériel rendu.</p>
        <div class="oldResaEtud">



            <?php $requete = "SELECT * FROM reservation, utilisateurs, materiel WHERE id=id_user_ext AND id_mat=id_mat_ext AND date_fin<NOW()";
            $stmt=$db->query($requete);
            $result=$stmt -> fetchall(PDO::FETCH_ASSOC); 
            foreach ($result as $row){ ?>

            
                        
            <div class="oneResaEtud old">
                <p><span class="eleve"><?php echo "{$row["nom"]} {$row["prenom"]}"?></span> avait effectué une réservation.</p>
                <p class="p2">L'élève avait réservé le matériel "<?php echo $row["nom_mat"]?>" du <?php echo date("d-m-Y", strtotime($row["date_debut"]));?> au <?php echo date("d-m-Y", strtotime($row["date_fin"]));?> </p>
            </div>

            <?php } ?> 
        </div>
        
    </section>

    <?php } ?> 

    


    <?php 
    if ($role == "élève") { 
    ?>
    <section class="sec1">
        <h1 class="titleResa">Réservations</h1>
        <p>Ci-dessous le formulaire pour réserver du matériel dans le cadre de vos projets tutorés.</p>
        <?php if (isset($_GET["resa"] )){  
            echo "<p class=\"txtRouge\">Votre réservation a bien été prise en compte !</p>";
        } 

        if (isset($_GET["err"] )){  
            echo "<p class=\"txtRouge\">La date de rendu que vous avez sélectionnée est déjà passée..</p>";
            
        }
        ?> 
        
        <form action="traiteResa.php" method="get" class="formResa">
            <label for="matos">Matériel à réserver : </label>
            <select name="matos" id="matos" class="matos" aria-describedby="form-matériel">
                <?php
                $requete =" SELECT * FROM materiel ";
                $stmt=$db->query($requete);
                $result=$stmt -> fetchall(PDO::FETCH_ASSOC);
                foreach ($result as $row){ ?>
                
                <option value="<?php echo $row["id_mat"]?>"><?php echo $row["nom_mat"]?></option>
                <?php } ?>
            </select>
            <br>
            <br>
            <label for="date">Date de rendu : </label>
            <input type="date" id="date" name="dateFin">
            <br>
            <br>
            <input type="submit" class="envoyer" value="valider" aria-label="Valider la réservation">
        </form>
        </section>
        <section class="secResa">
            <h1 >Mes réservations en cours</h1>

            <?php $requete =" SELECT * FROM reservation, materiel WHERE id_user_ext = $id_user AND id_mat=id_mat_ext AND date_fin>NOW()";
            $stmt=$db->query($requete);
            $result=$stmt -> fetchall(PDO::FETCH_ASSOC); 
            if (empty($result)) {
                $classHidden = 'hidden'; //classe que je met aux éléments que je veux ccher quand aucune réservation n'est faite
                echo "Vous n'avez pas de réservation en cours.";}else{
                $classHidden = 'ok';  ?>
                 
                <div class="mesResa <?php echo $classHidden; ?> ">
                    <img src="./style/img/bonhommes/planning.png" alt="" class="img <?php echo $classHidden; ?>">
                    <?php foreach ($result as $row){ ?>
                    <div class="oneResa">
                        <p>Votre réservation : Du <?php echo date("d-m-Y", strtotime($row["date_debut"]));?> au <?php echo date("d-m-Y", strtotime($row["date_fin"]));?></p>
                        <p>Vous avez réservé "<?php echo $row["nom_mat"]?>"</p>
                        <div class="line"></div>
                        <?php } ?>
                    </div>
                    <?php } }?>
                    
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
    <a href="messagerie.php" class="chat" aria-label="Lien vers la messagerie"><img src="./style/img/chat.png" alt="Bouton vers la messagerie" srcset="" class="imgChat"></a>

    <script src="./script/burger.js"></script>
    <script src="./script/scriptResa.js"></script>
</body>
    


