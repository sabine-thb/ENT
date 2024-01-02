<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="style/style.css">    
    <link rel="stylesheet" href="style/styleCrous.css">    
    <link rel="stylesheet" href="style/fonts.css">     
    <title>ENT - CROUS</title>
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
        <p class="descrForm">Si vous souhaitez ajouter de nouveaux plats à la liste des propositions, veuillez les ajouter ici.</p>

        <?php
        if (isset($_GET["nvplat"] )){  
            echo "<p class=\"formValid\">Votre plat a bien été ajouté à la liste des propositions de chaque jour.</p>";
        }
        
        ?>
        
        <div class="formulaire">
            <form action="traiteNvPlat.php" class="ajtPlat">
                <img src="./style/img/bonhommes/vote.png" class="img" alt="">
                <label for="plat" class="lab1">Nom du plat : </label>
                <input class="inputForm" type="text" id="plat" name="nom" required>
                <br>
                <br>
                <label for="img" class="lab1">Lien d'une image : </label>
                <input class="inputForm" type="text" id="img" name="image" required>
                <br>
                <br>  
                <label for="descr" class="lab1">Description : </label>
                <br><br>
                <textarea class="textArea" type="text" id="descr" name="descr" required> </textarea>            
                
                <input type="hidden" name="date">
                <input class="envoyer" type="submit" value="Valider">
            </form>

        </div>

    </section>
    <section class="secPropositions">
    <h1>Propositions de plats pour demain.</h1>
    <?php 
    if (isset($_GET["operation"] )){  
            echo "<p class=\"reinitOK\">Vous avez bien réinitialisé les votes.</p>";
        } 

    if (isset($_GET["propositions"] )){  
            echo "<p class=\"formValid\">Vos deux propositions pour le repas de demain ont bien été enregistrées.</p>";
    }
    ?>
    <div class="actions">
        <div class="reinit">
            <div class="caseReinit">
                <div class="explReinit">Avant de faire de nouvelles propositions de choix pour le menu de demain, veuillez réinitialiser les votes en cliquant sur le bouton ci-dessous.</div>
                <a href="reinitVote.php" class="lienReinit">Réinitialisation</a>
            </div>
            
        </div>
        <div class="choixPlats">
            
            <form action="traitePropositionsChoix.php" class="formPropositions">
                <p>
                    <label for="choix1" class="lab2">Proposition 1 :</label>
                    <select name="choix1" id="choix1">
                        <?php
                        include("connexion.php");
                        $requete =" SELECT * FROM choix  ORDER BY date DESC ";
                        $stmt=$db->prepare($requete);
                        $stmt->execute(); 
                        $result = $stmt->fetchall(PDO::FETCH_ASSOC);
                        foreach ($result as $row): ?>

                        <option value="<?php echo $row["id_choix"] ?>"><?php echo $row["nom"] ?></option>
                        <?php endforeach;?>

                    </select>
                </p>
                <p>
                    <label for="choix2" class="lab2">Proposition 2 :</label>
                    <select name="choix2" id="choix2">
                        <?php
                        foreach ($result as $row): ?>
                        <option value="<?php echo $row["id_choix"] ?>"><?php echo $row["nom"] ?></option>
                        <?php endforeach;?>

                    </select>

                </p>
                <input type="submit" value="Valider" class="envoyer second">
                
            </form>

        </div>
    </div>
    
   

    </section>
        
        

        

    
        

    


</body>
</html>