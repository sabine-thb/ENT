<h1>Bienvenue sur l'accueil de l'ENT </h1>
<?php
session_start();

$utilisateur=$_SESSION['utilisateur'];

echo"Bonjour et bienvenue {$utilisateur ['prenom']} "
?>

<form action="deconnexion.php">
    <input type="submit" value="Se déconnecter">
</form>