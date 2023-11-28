<?php
session_start();

$utilisateur=$_SESSION['utilisateur'];

echo"Bonjour et bienvenue {$utilisateur ['prenom']} "
?>

<h1>Bienvenue sur l'interface CROUS de l'ENT</h1>
<form action="">
    <label for="plat 1">Nom du plat 1</label>
    <input type="text" id="plat 1">
    <br>
    <br>
    <label for="plat2">Nom du plat 2</label>
    <input type="text" id="plat2">
    <input type="submit">
</form>

<form action="deconnexion.php">
    <input type="submit" value="Se déconnecter">
</form>