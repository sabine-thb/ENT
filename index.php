<?php

?>
<head>
	<meta charset="UTF-8">
</head>
<body>
    <?php
        if (isset($_GET["err"] )){  
            echo "Vous n'avez pas entré le bon login/mdp, ou le rôle que vous avez sélectionné n'est pas attribué.";
        }


        //SCRIPT POUR ASHER LE MDP POUR LE RETRER ENSUITE DANS LA BDD
        // $mot_de_passe="bebou";
        // $passwordHash=password_hash($mot_de_passe, PASSWORD_DEFAULT);
        // var_dump($passwordHash);
    ?>

    <h1>Connexion à l'ENT</h1>
    <form action="traiteLogin.php" method="get">
        <select name="role" id="">
            <option value="élève">élève</option>
            <option value="professeur">professeur</option>
            <option value="personnel du CROUS">personnel du CROUS</option>
        </select>
        <br><br>
        <label for="login">Identifiant :</label>
        <input id="login" type="text" name="login">
        <br>
        <br>

        <label for="mdp">Mot de passe :</label>
        <input name="mdp" type="password">
        <input type="submit" value="ok">
    </form>

</body>