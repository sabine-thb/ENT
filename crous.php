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
        <a href="deconnexion.php" class="navItem">
            <img src="./style/img/deco.svg"  class="deco" alt="se déconnecter">
        </a> 
    </nav>
    <section>
            <?php
        session_start();

        $utilisateur=$_SESSION['utilisateur'];

        echo"<h1>Bonjour {$utilisateur ['prenom']}. </h1>"
        ?>

        <p>Bienvenue sur l'interface CROUS de l'ENT.</p>
    </section>
    <section class="secForm">
        <h1 class="titreForm">Restauration de l'université</h1>
        <p class="descrForm">Veuillez ajouter les 2 plats principaux de demain ainsi qu'une image correspondante afin de les soumettre aux votes des étudiants.</p>

        <?php
        if (isset($_GET["repas"] )){  
            echo "<p class=\"formValid\">Vos propositions ont bien été ajoutées à l'interface des étudiants, afin qu'ils votent le repas de demain.</p>";
        }
        
        ?>
        
        <div class="formulaire">

            <form action="traiteCrous.php">
                <img src="./style/img/bonhommes/vote.png" class="img" alt="">
                <label for="plat1">Nom du premier plat : </label>
                <input class="inputForm" type="text" id="plat1" name="plat1" required>
                <br>
                <br>
                <label for="img1">Lien de la première image : </label>
                <input class="inputForm" type="text" id="img1" name="image1" required>
                <br>
                <br>
                <label for="plat2">Nom du deuxième plat : </label>
                <input class="inputForm" type="text" id="plat2" name="plat2" required>
                <br>
                <br>
                <label for="img2">Lien de la deuxième image : </label>
                <input class="inputForm" type="text" id="img2" name="image2" required>
                <br>
                <br>
                <input type="hidden" name="date">
                <input class="envoyer" type="submit" value="Valider">
            </form>

        </div>
        

    </section>
        

    


</body>
</html>