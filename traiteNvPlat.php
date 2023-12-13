<!-- ici le code pour insérer dans la BDD les repas une fois le formulaire du CROUS Validé -->

<?php
session_start();

include("connexion.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Récupérer le contenu du formulaire
    $nom=$_GET["nom"];
    $image=$_GET["image"];



    //j'insère ensuite les infos dans ma table commentaire pour pouvoir les afficher ensuite

    $requete ="INSERT INTO choix VALUES ( NULL, :nom, :image, NOW(), 0, 0)";
    $stmt=$db->prepare($requete);

    $stmt->bindValue(':nom',$nom,PDO::PARAM_STR);
    $stmt->bindValue(':image',$image,PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchall(PDO::FETCH_ASSOC); 


    header('Location:crous.php?nvplat=ok');

}


?>