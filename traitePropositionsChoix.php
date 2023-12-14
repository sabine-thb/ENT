<!-- Ici le code pour ajouter les deux plats du jours proposés aux étudiants -->
<?php
session_start();
include("connexion.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Je récupère l'id du plat choisi dasn les listes déroulantes
    $id_choix1_ext=$_GET["choix1"];
    $id_choix2_ext=$_GET["choix2"];

    //j'insère ensuite les id des plats dans ma table repas pour pouvoir les afficher ensuite sur l'interafce étudiante

    $requete ="INSERT INTO repas VALUES ( NULL, NOW(), :id_choix1_ext, :id_choix2_ext)";
    $stmt=$db->prepare($requete);
    $stmt->bindValue(':id_choix1_ext',$id_choix1_ext,PDO::PARAM_STR);
    $stmt->bindValue(':id_choix2_ext',$id_choix2_ext,PDO::PARAM_STR);
    $stmt->execute();

    header('Location:crous.php?propositions=ok');

}