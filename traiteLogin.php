<?php 
session_start();
include("connexion.php");

$requete =" SELECT * FROM utilisateurs WHERE loggin=:login ";
$stmt=$db->prepare($requete);
$stmt->bindValue(':login',$_GET["login"],PDO::PARAM_STR);
$stmt->execute();

$pseudo = $_GET["login"];
$mdp = $_GET["mdp"];

//On fait des requêtes préparéespour éviter les insertions malveillantes


if ($stmt->rowCount()) {
    $result = $stmt->fetch();
    if (password_verify($mdp, $result["mdp"])) {
        // Comparaison du mot de passe rentré avec le mot de passe haché stocké dans la BDD

        header('Location: billets.php');
        $_SESSION["login"]=$result["login"];  

    } else {
        // Mot de passe incorrect, rediriger vers la page de connexion avec un message d'erreur
        header('Location: index.php?err=pblm');
        exit();
    }

} else {
    // Utilisateur non trouvé, rediriger vers la page de connexion avec un message d'erreur
    header('Location: index.php?err=pblm');
    exit();
        
}

?>