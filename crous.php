<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="style/style.css">    
    <link rel="stylesheet" href="style/styleCrous.css">    
    <link rel="stylesheet" href="style/fonts.css">     
    <title>Interface CROUS</title>
<head>
	<meta charset="UTF-8">
</head>
<body>
    <nav>
        <a href="index.php" class="logo"></a>
    </nav>
    

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

</body>
</html>