<?php
session_start();
include("connexion.php");

if(isset($_GET["utilisateur"])){
    $utilisateurDest = $_GET["utilisateur"];
}
else{
    $utilisateurDest = "1";
}

date_default_timezone_set('Europe/Paris');




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
   <link rel="stylesheet" href="style/styleChat.css">
    <title>Chat - ENT</title>
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

    <section class="section1">
        <a href="messagerie.php" class="retour">Retour</a>
        <div class="titleContainer">
            <h1 class="titlePage">Ma messagerie </h1>
            <img src="./style/img/bonhommes/messages.png" alt="" class="img">
        </div>
        <br>
        <div class="allMsg">
            <!-- Affichage des messages -->
        <?php 
        $requete = "SELECT * FROM messages WHERE (id_user_dest=:userDest OR id_user_dest=:idSession) AND (id_user_edi=:idSession OR id_user_edi=:userDest) ORDER BY date ASC";
        $stmt = $db->prepare($requete);
        $stmt->bindParam(':userDest', $utilisateurDest, PDO::PARAM_INT);        
        $stmt->bindParam(':idSession', $idSession, PDO::PARAM_INT);        
        $stmt->execute();
        $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);foreach ($resultat as $message) : ?>
            <div class="msg " >
                <div class="msg-align <?php if(trim($message['login']) == trim($login)) { echo 'user-msg'; } ?>">        
                    <p class="msg-envoie <?php if(trim($message['login']) == trim($login)) { echo 'user-msg'; } ?>"><strong>@<?= $message['login'] ?>:</strong> <?= $message['message'] ?></p>
                    <p class="date"><?= date('d/m/y H:i', strtotime($message['date'])) ?></p>
                </div>
            </div>

        <?php endforeach; ?>
        
        </div>
        
        

        <!-- Formulaire pour envoyer les messages -->
        <form action="traiteChat.php" method="post" class="traiteChat">
            <textarea type="text" name="message" id="message" class="message" required></textarea>
            <input type="hidden" name="login" value="<?php echo $login; ?> ">
            <input type="hidden" name="idDest" value="<?php echo $utilisateurDest ;?> ">
            <input type="hidden" name="idEdi" value="<?php echo $idSession; ?> ">
            <input type="hidden" name="date" value="<?= date('Y-m-d H:i:s') ?>">
            <button type="submit" class="bouton">
                <img src="./style/img/send.svg" alt="Envoyer">
            </button>
        </form>
    </section>
    
    <script src="./script/burger.js"></script>
    <script src="./script/messagerie.js"></script>

</body>
</html>