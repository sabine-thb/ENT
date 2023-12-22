<?php

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="style/style.css">    
    <link rel="stylesheet" href="style/fonts.css">    
    <link rel="stylesheet" href="style/connexion.css">   
    <title>Connexion ENT</title>
<head>
	<meta charset="UTF-8">
</head>
<body>
    <nav>
        <a href="index.php" class="logo"></a>
    </nav>
    <?php
        if (isset($_GET["err"] )){  
            echo "Vous n'avez pas entré le bon login/mdp.";
        }
        //SCRIPT POUR ASHER LE MDP POUR LE RETRER ENSUITE DANS LA BDD
        // $mot_de_passe="dallet";
        // $passwordHash=password_hash($mot_de_passe, PASSWORD_DEFAULT);
        // var_dump($passwordHash);
    ?>

    <section>
        <h1>Connexion à l'ENT</h1>
        <form action="traiteLogin.php" method="get" class="formulaire">
            
            <div class="idMdp">
                <label for="login" class="labelForm">Identifiant :</label>
                <input id="login" type="text" name="login" class="inputIdMdp">
                <br>
                <br>

                <label for="mdp" class="labelForm">Mot de passe :</label>
                <input name="mdp" type="password" class="inputIdMdp">
                <br>
                <br>
                <input type="submit" value="connexion" class="connexionButton">

            </div>
        
        </form>
        <img src="./style/img/bonhommes/dameConnexion.png" class="imgConnexion" alt="">
    </section>

</body>
</html>