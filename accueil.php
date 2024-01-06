<?php
session_start();
include("connexion.php");
$utilisateur=$_SESSION['utilisateur'];

$idSession = $utilisateur['id'];

// Je crée ma requête pour récupérer les trois derniers messages reçus par l'utilisateur connecté Idsession
$requeteDerniersMessages = "
    SELECT m.*, u.prenom, u.nom
    FROM messages m
    INNER JOIN utilisateurs u ON m.id_user_edi = u.id
    WHERE m.id_user_dest = :idSession
    ORDER BY m.date DESC
    LIMIT 3;
";

$stmtDerniersMessages = $db->prepare($requeteDerniersMessages);
$stmtDerniersMessages->bindParam(':idSession', $idSession, PDO::PARAM_INT);
$stmtDerniersMessages->execute();
$derniersMessages = $stmtDerniersMessages->fetchAll(PDO::FETCH_ASSOC);
?>
<!-- Je crée la requête pour affihcer les 3 derniers cours déposes par les profs -->
<?php
$requeteDerniersCours = "
    SELECT * FROM cours 
    LIMIT 3;

";

$stmtDerniersCours = $db->prepare($requeteDerniersCours);
$stmtDerniersCours->execute();
$derniersCours = $stmtDerniersCours->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" href="style/style.css">   
    <link rel="stylesheet" href="style/fonts.css">
    <link rel="stylesheet" href="style/burger.css">
   <link rel="stylesheet" href="style/styleAccueil.css">
    
    <title>ENT - Accueil</title>
    
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
        <div class="bjr">
            <?php
                echo"<h1>Bonjour {$utilisateur ['prenom']}.</h1> "
            ?>
                <p>Bienvenue sur l’espace numérique de travail de l’université Gustave Eiffel.</p>
                    <h3 class="titlepc"> Prochains cours </h3>
                     <div class="pcs">
                        
                    </div>
        </div>
        
        <div class="devoirs">
        <h1 class="titreRendus">Prochains rendus</h1>
        <div class="rectangles">
                <div class="rec1">
                    <div class="rectangle"><a href="devoirs.php">SAÉ 3.01 </a></div>
                    <div class="rectangle"><a href="devoirs.php">SAÉ 3.02 </a></div>
                </div>
                <div class="rec2">
                    <div class="rectangle"><a href="devoirs.php">Portfolio</a></div>
                    <div class="rectangle"><a href="devoirs.php">SAÉ 3.02A </a></div>
                </div>

        </div>


        <div class="lien">
            
        <a class="iconn" href="cours.php"><img src="./style/img/cours.svg"> <p>Cours</p></a> 
        <a class="iconn" href="edt.php"><img src="./style/img/EDT.svg"><p>EDT</p></a> 
        <a class="iconn" href="notes.php"><img src="./style/img/notes.svg"><p>Notes</p></a> 


        </div>
        </div>
        
</section>
<!-- affichage des 3 derniers mess -->
<section class="sec2">
<section class="derniersms">
<h2 class="titreNM">Nouveaux messages</h2>

<div class="derniers-messages">
    <ul>
        <?php foreach ($derniersMessages as $message) : ?>
            <div class="message-item">
                <div class="message-contenu">
                    <?= $message['message'] ?>
                    <div class="expediteur">
                        <i><?= $message['prenom'] . ' ' . $message['nom'] ?></i>
                    </div>
                </div>
                <div class="date-heure">
                    <span class="date"><?= date('d/m/y', strtotime($message['date'])) ?></span>
                    <br>
                    <span class="heure"><?= date('H:i', strtotime($message['date'])) ?></span>
                </div>
                <div style="clear: both;"></div>
        </div>
        <?php endforeach; ?>
    </ul>
</div>
</div>
    
</section>
<section class=derniercours>
        <h2>Les trois derniers cours</h2>

        <?php foreach ($derniersCours as $cours) : ?>
            <div class="cours-item">
                <p>Nom du cours : <?php echo $cours['nomCours']; ?></p>

            </div>
        <?php endforeach; ?>
    </section>

</section>
</section>

<script src="./script/burger.js"></script>

<a href="messagerie.php" class="chat"><img src="./style/img/chat.png" alt="Bouton vers la messagerie" srcset="" class="imgChat"></a>

</a></body>
</html>
