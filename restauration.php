
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
    <link rel="stylesheet" href="style/styleRestauration.css">
       
    <title>Restauration</title>
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
<?php
$requete =" SELECT * FROM repas  ORDER BY date DESC LIMIT 1";
    $stmt=$db->prepare($requete);
    $stmt->execute(); 
    $result = $stmt->fetchall(PDO::FETCH_ASSOC); 
?>
<?php foreach ($result as $row): ?>
<section class="sec1">
    <div class="vote">
        <h1>Votez pour votre repas de demain.</h1>
        <p class="descrVote">Pour cela, cliquez sur votre plat favori.</p>


        <div class="imgVote">
            <img src="./style/img/bonhommes/vote.png" class="imgDeco" alt="">
            <a href="traiteVote.php" class="linkVote one">
                <div style="background-image:url(<?php echo $row["img1"] ?>);" class="imgPlat"></div>
                <p class="nomPlat"><?php echo $row["plat1"] ?></p>
            </a>
            <a href="traiteVote.php" class="linkVote two">
                <div style="background-image:url(<?php echo $row["img2"] ?>);" class="imgPlat"></div>
                <p class="nomPlat"><?php echo $row["plat2"] ?></p>
            </a>
        </div>
        
    </div>
    <?php endforeach;?>
    <div class="queue">
        <h1 class="titreTemps">Temps d'attente de vos CROUS : </h1> 
        <div class="compteurs">
            <div class="temps">
                <p class="nomCrous">ESSIE</p>
                <div class="compteur c1">25 mn</div>
            </div>
            <div class="temps">
                <p class="nomCrous">Copernic</p>
                <div class="compteur c2">14 mn</div>
            </div>
        </div>   
        
        
        
    </div>
</section>
<section class="sec2">
    <h1>Menu cantine du jour</h1>
</section>


<script src="./script/compteur.js"></script>
<script src="./script/burger.js"></script>

    
</body>
