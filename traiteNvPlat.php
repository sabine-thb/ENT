<!-- ici le code pour insérer dans la BDD les repas une fois le formulaire du CROUS Validé -->

<?php
session_start();

include("connexion.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Récupérer le contenu du formulaire
    $nom=$_GET["nom"];
    $image=$_GET["image"];
    $descr=$_GET["descr"];
    



    //j'insère ensuite les infos dans ma table choix pour pouvoir les afficher ensuite dans la liste déroulante

    $requete ="INSERT INTO choix VALUES ( NULL, :nom, :descr, :image, NOW(), 0, 0)";
    $stmt=$db->prepare($requete);

    $stmt->bindValue(':nom',$nom,PDO::PARAM_STR);
    $stmt->bindValue(':image',$image,PDO::PARAM_STR);
    $stmt->bindValue(':descr',$descr,PDO::PARAM_STR);   
    $stmt->execute();
    $result = $stmt->fetchall(PDO::FETCH_ASSOC); 


    header('Location:crous.php?nvplat=ok');

}


?>