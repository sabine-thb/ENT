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
            echo "Vous n'avez pas entré le bon login/mdp, ou le rôle que vous avez sélectionné n'est pas attribué.";
        }
        //SCRIPT POUR ASHER LE MDP POUR LE RETRER ENSUITE DANS LA BDD
        // $mot_de_passe="bebou";
        // $passwordHash=password_hash($mot_de_passe, PASSWORD_DEFAULT);
        // var_dump($passwordHash);
    ?>

    <section>
        <h1>Connexion à l'ENT</h1>
        <form action="traiteLogin.php" method="get" class="formulaire">
            <!-- <label for="statut" class="labelStatut">Statut : </label>
            <select name="role" id="statut">
                <option value="élève">élève</option>
                <option value="professeur">professeur</option>
                <option value="personnel du CROUS">personnel du CROUS</option>
            </select>
            <br><br> -->
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