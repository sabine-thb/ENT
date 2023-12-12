<!-- ici le code pour insérer dans la BDD les repas une fois le formulaire du CROUS Validé -->

<?php
session_start();

include("connexion.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Récupérer le contenu du formulaire
    $plat1=$_GET["plat1"];
    $image1=$_GET["image1"];
    $plat2=$_GET["plat2"];
    $image2=$_GET["image2"];


    //j'insère ensuite les infos dans ma table commentaire pour pouvoir les afficher ensuite

    $requete ="INSERT INTO repas VALUES ( NULL,  NOW(), :plat1, :image1, :plat2, :image2)";
    $stmt=$db->prepare($requete);
    $stmt->bindValue(':plat1',$plat1,PDO::PARAM_STR);
    $stmt->bindValue(':image1',$image1,PDO::PARAM_STR);
    $stmt->bindValue(':plat2',$plat2,PDO::PARAM_STR);
    $stmt->bindValue(':image2',$image2,PDO::PARAM_STR);
    $stmt->execute();


    header('Location:crous.php?repas=ok');

}


?>