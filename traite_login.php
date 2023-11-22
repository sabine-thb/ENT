<?php
session_start();
include("connexion.php");
$requete =" SELECT * FROM utilisateurs WHERE login=:login /*AND mot_de_passe=:mot_de_passe*/";
$stmt=$db->prepare($requete);
$stmt->bindValue(':login',$_GET["login"],PDO::PARAM_STR);
// $stmt->bindValue(':mot_de_passe',$_GET["mot_de_passe"],PDO::PARAM_STR);
$stmt->execute();

if($stmt->rowCount()){
    $result=$stmt->fetch();

// traduit le mdp GET(celui qui est tapé par lutilisateur) récupéré de login.php vers le mdp Result haché dans la bdd

if (password_verify($_GET["mot_de_passe"],$result["mot_de_passe"])) {
    $_SESSION["login"]=$result["login"];
    // affiche le tableau avec tous les utilisateurs
    header('Location:affiche_utilisateurs.php');
}
// mdp n'est  pas bon
else {
    //message erreur
    header('Location:login.php?err=pblm');
}
}

?>