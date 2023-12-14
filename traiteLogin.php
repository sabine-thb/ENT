<?php 
session_start();
include("connexion.php");

$requete =" SELECT * FROM utilisateurs WHERE login=:login";
 //On séléctionne tout sur les utilistauers seulement si le login  et le rôle correspondent à ceux enrgistrés dans la BDD
$stmt=$db->prepare($requete);
$stmt->bindValue(':login',$_GET["login"],PDO::PARAM_STR);
$stmt->execute();

$pseudo = $_GET["login"];
$mdp = $_GET["mdp"];



//On fait des requêtes préparées pour éviter les insertions malveillantes


if ($stmt->rowCount()) {
    $result = $stmt->fetch();
    if (password_verify($mdp, $result["mdp"])) {

        unset($result["mdp"]);
        $_SESSION["utilisateur"]=$result;
        
        $utilisateur=$_SESSION['utilisateur'];
        $role=$utilisateur['role'];

        

        // Comparaison du mot de passe rentré avec le mot de passe haché stocké dans la BDD

         // Redirigez en fonction de la valeur sélectionnée
        if ($role == "professeur") {
            header("Location: accueil.php");
            exit();
        } 

        if ($role == "élève") {
            header("Location: accueil.php");
            exit();
        } 

        if ($role == "personnel du crous") {
            header("Location: crous.php");
            exit();
        } 
        
    

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