<?php
session_start();
include("connexion.php");

if (!isset($_SESSION['utilisateur'])) {
    header("Location: index.php");
    exit();
}

include("connexion.php");

$utilisateur = $_SESSION['utilisateur'];
$login = $utilisateur['login'];
$role = $utilisateur['role'];

// Récupérer l'ID du canal à partir de l'URL
$canal_id_actuel = isset($_GET['canal_id']) ? intval($_GET['canal_id']) : 0;

$requete = "SELECT * FROM messages WHERE canal_id = :canal_id ORDER BY date ASC";
$stmt = $db->prepare($requete);
$stmt->bindParam(':canal_id', $canal_id_actuel, PDO::PARAM_INT);
$stmt->execute();
$resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" href="style/style.css">   
    <link rel="stylesheet" href="style/fonts.css">
    <link rel="stylesheet" href="style/burger.css">
   <link rel="stylesheet" href="style/styleChat.css">
    <title>Chat ENT</title>
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
        <h1>Votre messagerie :</h1>
        <br>

        <!-- Affichage des messages -->
        <?php foreach ($resultat as $message) : ?>
            <div class="msg">
                <div class="msg-align <?= ($message['login'] === $_SESSION['utilisateur']['login']) ? 'user-msg' : '' ?>">
                    <p class="msg-envoie"><strong>@<?= $message['login'] ?>:</strong> <?= $message['message'] ?></p>
                    <p class="date"><?= $message['date'] ?></p>
                </div>
            </div>
        <?php endforeach; ?>

        <!-- Formulaire pour envoyer les messages -->
        <form action="traiteChat.php" method="post" class="traiteChat">
            <textarea type="text" name="message" id="message" class="message" required></textarea>
            <input type="hidden" name="login" value="<?= isset($_SESSION['utilisateur']['login']) ? $_SESSION['utilisateur']['login'] : '' ?>">
            <input type="hidden" name="date" value="<?= date('Y-m-d H:i:s') ?>">
            <input type="hidden" name="canal_id" value="<?= $canal_id_actuel ?>">
            <button type="submit" class="bouton">
                <img src="./style/img/send.svg" alt="Envoyer">
            </button>
        </form>
    </section>
    
    <script src="./script/burger.js"></script>

</body>
</html>