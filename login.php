<?php
session_start();
if (isset($_SESSION["login"]))
{
	// echo "bonjour {$_SESSION["login"]}";
}
?>

<html>
<head>
	<meta charset="UTF-8">
</head>

<body>
	<?php
//si dans l'url j'ai le err qui s'affiche, alors le echo s'affiche

	if (isset($_GET["err"])){
		echo "Vous n'avez pas entré le bon login/mdp";
	}
	?>
	
	<FORM action="traite_login.php">
		
		<p>Saisissez votre login :<INPUT type=text name="login"> 
		<BR>
		 <p>et votre passwd :<input type="password" name="mot_de_passe">
		<br><input type=submit value= "OK">
	</FORM>

<!-- pour hacher le mdp, on ouvre login.php sur chrome afin de recupérer le mdp haché et le coller dans la bdd -->
    <!--?php
    echo password_hash("toto01", PASSWORD_DEFAULT);
    ?> -->
</body>