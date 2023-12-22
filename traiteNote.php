<?php
session_start();

include("connexion.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Récupérer le contenu du formulaire
     //Je recup l'id de l'élève concerné
    $titreNote=$_GET["titleNote"];
    $valueNote=$_GET["valueNote"];
    $coeffNote=$_GET["coeffNote"];
    $id_matiere_ext=$_GET["id_matiere"];
    $id_user_ext=$_GET["eleve"];


    if($valueNote>20){ //Si la note est supérieure à 20 alors
        header('Location:notes.php?err=insertion');
    }else{
    //j'insère les infos dans ma table notes pour pouvoir les afficher ensuite

    $requete ="INSERT INTO note VALUES ( NULL, :titreNote, :valueNote, :coeffNote, NOW(), :id_matiere_ext, 1, :id_user_ext)";
    $stmt=$db->prepare($requete);

    $stmt->bindValue(':titreNote',$titreNote,PDO::PARAM_STR);
    $stmt->bindValue(':valueNote',$valueNote,PDO::PARAM_INT);
    $stmt->bindValue(':coeffNote',$coeffNote,PDO::PARAM_INT);   
    $stmt->bindValue(':id_matiere_ext',$id_matiere_ext,PDO::PARAM_INT);   
    $stmt->bindValue(':id_user_ext',$id_user_ext,PDO::PARAM_INT);   
    $stmt->execute();
    $result = $stmt->fetchall(PDO::FETCH_ASSOC); 


    header('Location:notes.php?insertion=ok');
    }
    
    

}


?>