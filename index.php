<?php

?>
<head>
	<meta charset="UTF-8">
</head>
<body>
    <?php
        if (isset($_GET["err"])){  
            echo "Vous n'avez pas entré le bon login/mdp";
        }
    ?>

    <form action="traiteLogin.php">
        <label for="login">Entrez votre login</label>
        <input id="login"type="text" name="login">
        <br>
        <br>

        <label for="mdp">Entrez votre mdp</label>
        <input name="mdp" type="password">
        <input type="submit" value="ok">
    </form>

</body>