<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="style/style.css">    
    <link rel="stylesheet" href="style/fonts.css">    
    <link rel="stylesheet" href="style/connexion.css">   
    <title>Connexion ENT</title>
    <link rel="icon" type="image/svg" href="./style/img/logoENT.svg">
<head>
	<meta charset="UTF-8">
</head>
<body>
    <nav>
        <a href="index.php" class="logo" aria-label="Logo et lien vers la page de connexion"></a>

    </nav>
    <?php
        if (isset($_GET["err"] )){  
            echo "<p class=\"err\">Vous n'avez pas entré le bon login/mdp.</p>";
        }
        //SCRIPT POUR ASHER LE MDP POUR LE RETRER ENSUITE DANS LA BDD
        // $mot_de_passe="than-long";
        // $passwordHash=password_hash($mot_de_passe, PASSWORD_DEFAULT);
        // var_dump($passwordHash);
    ?>

    <section>
        <h1>Connexion à l'ENT</h1>
        <form action="traiteLogin.php" method="get" class="formulaire">
            
            <div class="idMdp">
                <p class="formFlex">
                    <label for="login" class="labelForm">Identifiant :</label>
                    <input id="login" type="text" name="login" class="inputIdMdp">

                </p>
                <p class="formFlex">
                    <label for="mdp" class="labelForm">Mot de passe :</label>
                    <input name="mdp" type="password" class="inputIdMdp">
                </p>

                <input type="submit" value="connexion" class="connexionButton" aria-label="Validation de la connection">

            </div>
        
        </form>
        <img src="./style/img/bonhommes/dameConnexion.png" class="imgConnexion" alt="">
    </section>

</body>
</html>