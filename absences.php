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
   <link rel="stylesheet" href="style/styleAbs.css">
   
    
    <title>ENT - Absences/retards</title>
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
	

<section >
        
<?php
     if ($role == "professeur") {
    ?>
    <h1>Abscences et retards</h1>
        <?php 
        if (isset($_GET['err']) && $_GET['err'] === 'dateAbsence') {
            echo "<p class=\"txtRouge\">Erreur : La date de l'absence que vous avez sélectionnée n'est pas encore passée.</p>";
        }?>
        <?php 
        if (isset($_GET['err']) && $_GET['err'] === 'dateRetard') {
            echo "<p class=\"txtRouge\">Erreur : La date du retard que vous avez sélectionnée n'est pas encore passée.</p>";
        }?>
        <?php 
        if (isset($_GET['err']) && $_GET['err'] === 'statutAbsence') {
            echo "<p class=\"txtRouge\">Erreur : Veuillez sélectionner un statut d'absence.</p>";
        }?>
        <?php 
        if (isset($_GET['err']) && $_GET['err'] === 'statutRetard') {
            echo "<p class=\"txtRouge\">Erreur : Veuillez sélectionner un statut de retard.</p>";
        }?>
        <?php 
        if (isset($_GET['absence'])) {
            echo "<p class=\"txtRouge\">Votre absence a bien été insérée.</p>";
        }?>
        <?php 
        if (isset($_GET['retard'])) {
            echo "<p class=\"txtRouge\">Votre retard a bien été inséré.</p>";
        }?>
        
        <div class="allForm">
            <div class="form1">
                <h2 class="titleForm one">Insérer une absence</h2>
                <form action="traiteAbsence.php" class=" form formAbs">
                    <p>
                        <label for="eleve" class="label1">Nom de l'élève : </label>
                        <select name="eleve" id="eleve" required>
                                <?php
                                $requete =" SELECT * FROM utilisateurs WHERE role = 'élève' ";
                                $stmt=$db->query($requete);
                                $result=$stmt -> fetchall(PDO::FETCH_ASSOC);
                                foreach ($result as $row){ ?>
                                
                                <option value="<?php echo $row["id"]?>" name="eleve"><?php echo $row["nom"]?> <?php echo $row["prenom"]?> </option>
                                <?php } ?>
                        </select>
                    </p>
                    <p>
                        <label for="date" class="label1">Date de l'absence : </label>
                        <input type="date" id="date" name="date" required>

                    </p>
                    <p>
                        <label for="duree" class="label1">Durée de l'absence : </label>
                        <input type="number" id="duree" step="0.25" min="0.25" max="100" name="duree" required>
                    </p>
                    <p>
                        <fieldset required>
                            <legend class="label1">Statut de l'absence :</legend>
                            <div>
                                <input type="radio" id="justNon" name="justification" value="oui" />
                                <label for="justNon">Absence justifiée</label>
                            </div>

                            <div>
                                <input type="radio" id="justOK" name="justification" value="non" />
                                <label for="justOK">Absence non justifiée</label>
                            </div>
                        </fieldset>

                    </p>
                    <p>
                        <input type="submit" value="valider" class="valider">
                    </p>
                    
                    
                </form>

            </div>
            <div class="form2">
                <h2 class="titleForm two">Insérer un retard</h2>
                <form action="traiteRetard.php" class=" form formRet">
                    <p>
                        <label for="eleve2" class="label2">Nom de l'élève : </label>
                        <select name="eleve" id="eleve2" required>
                                <?php
                                $requete =" SELECT * FROM utilisateurs WHERE role = 'élève' ";
                                $stmt=$db->query($requete);
                                $result=$stmt -> fetchall(PDO::FETCH_ASSOC);
                                foreach ($result as $row){ ?>
                                
                                <option value="<?php echo $row["id"]?>"><?php echo $row["nom"]?> <?php echo $row["prenom"]?></option>
                                <?php } ?>
                        </select>
                    </p>
                    <p>
                        <label for="date2" class="label2">Date du retard : </label>
                        <input type="date" id="date2" name="date"required >

                    </p>
                    
                    <p>
                        <label for="duree2" class="label2">Durée du retard : </label>
                        <input type="number" id="duree2" step="0.25" min="0.25" max="100" name="duree" required>
                    </p>
                    <p>
                        <fieldset>
                            <legend class="label2">Statut du retard :</legend>
                            <div>
                                <input type="radio" id="justNon2" name="justification" value="oui" />
                                <label for="justNon2">Retard justifié</label>
                            </div>

                            <div>
                                <input type="radio" id="justOK2" name="justification" value="non"/>
                                <label for="justOK2">Retard non justifié</label>
                            </div>
                        </fieldset>

                    </p>
                    <p>
                        <input type="submit" value="valider" class="valider">
                    </p>
                    
                    
                </form>

            </div>
            
            
        </div>
        
  
<?php }?>  

        
<?php
     if ($role == "élève") {
    ?>
    <div class="allAbsAndRet">
        <div class=" number absJust">
        <h2 class="titleOne">Absences</h2>
        <h3 class="titleTwo">Justifiées</h3>
        <?php $requete = "SELECT SUM(duree_absence) as total_duree FROM absence WHERE id_user_ext=$id_user AND justificatif_absence='oui'";
            $stmt=$db->query($requete);
            $result=$stmt -> fetch(PDO::FETCH_ASSOC); 

            $totalDuree = $result['total_duree'];

            echo"<p class=\"num\"> $totalDuree</p>"
            ?>  
        </div>
        <div class="number absNnJust">
        <h2 class="titleOne">Absences</h2>
        <h3 class="titleTwo">Non justifiées</h3>
        <?php $requete = "SELECT SUM(duree_absence) as total_duree FROM absence WHERE id_user_ext=$id_user AND justificatif_absence='non'";
            $stmt=$db->query($requete);
            $result=$stmt -> fetch(PDO::FETCH_ASSOC); 

            $totalDuree = $result['total_duree'];

            echo"<p class=\"num\"> $totalDuree</p>"
            ?>  
        </div>
        <div class="number retJust">
        <h2 class="titleOne">Retards</h2>
        <h3 class="titleTwo">Justifiées</h3>
        <?php $requete = "SELECT SUM(duree_retard) as total_duree FROM retard WHERE id_user_ext=$id_user AND justificatif_retard='oui'";
            $stmt=$db->query($requete);
            $result=$stmt -> fetch(PDO::FETCH_ASSOC); 

            $totalDuree = $result['total_duree'];

            echo"<p class=\"num\"> $totalDuree </p>"
            ?>  
        </div>
        <div class="number retNnJust">
        <h2 class="titleOne">Retards</h2>
        <h3 class="titleTwo">Non justifiées</h3>
        <?php $requete = "SELECT SUM(duree_retard) as total_duree FROM retard WHERE id_user_ext=$id_user AND justificatif_retard='non'";
            $stmt=$db->query($requete);
            $result=$stmt -> fetch(PDO::FETCH_ASSOC); 

            $totalDuree = $result['total_duree'];

            echo"<p class=\"num\"> $totalDuree</p>"
            ?>  
        </div>
     </div>

</section>
<section class="sec2">
    <div class="ptMoins">
        <?php
        $requete = " SELECT SUM(duree) as total_duree
            FROM (
                SELECT duree_retard as duree FROM retard WHERE id_user_ext = $id_user AND justificatif_retard = 'non'
                UNION ALL
                SELECT duree_absence as duree FROM absence WHERE id_user_ext = $id_user AND justificatif_absence = 'non'
            ) as combined_table";
        $stmt = $db->query($requete);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $totalDuree = $result['total_duree'];

        echo "<p> Total d'absences et retards non justifiés : $totalDuree heures.</p>";

        // Si le total des heures est supérieur à 10
        if ($totalDuree > 10) {
            // Calculer le nombre d'heures excédentaires
            $heuresExcedentaires = $totalDuree - 10;

            // Calculer le nombre de points à enlever sur la moyenne
            $pointsEnleves = $heuresExcedentaires * 0.025;

            // Arrondir le nombre de points à deux chiffres après la virgule
            $pointsEnlevesArrondis = round($pointsEnleves, 2);

            // Afficher le nombre de points enlevés arrondis
            echo "<p>Points enlevés : $pointsEnlevesArrondis</p>";
        }
        ?>
    </div>
    <?php }?> 

</section>

    

    
<script src="./script/burger.js"></script>
</body>
</html>
