<?php 
session_start();
include("connexion.php");

$utilisateur=$_SESSION['utilisateur'];
$id_user=$utilisateur ['id'];

// Je récupère l'ID du plat choisi depuis l'URL
$idPlatChoisi = $_GET['id'];



if(isset($_GET['id'])) { 

    // Vérification si l'utilisateur a déjà voté aujourd'hui
    $verificationRequete = "SELECT COUNT(*) as count FROM vote WHERE id_user_ext = :id_user ";
    $verificationStmt = $db->prepare($verificationRequete);
    $verificationStmt->bindValue(':id_user', $id_user, PDO::PARAM_INT);
    $verificationStmt->execute();
    $result = $verificationStmt->fetch(PDO::FETCH_ASSOC);

    if ($result['count'] > 0) {
        // L'utilisateur a déjà voté aujourd'hui, on affiche alors un message d'erreur
        header('Location: restauration.php?err=deja_vote');
        exit();
    }
    else{


    $requete ="UPDATE choix SET nb_votes = nb_votes + 1 WHERE id_choix = :id_choix;";
    $stmt=$db->prepare($requete);
    $stmt->bindValue(':id_choix',$idPlatChoisi,PDO::PARAM_INT);
    $stmt->execute();


    $requete ="INSERT INTO vote VALUES ( NULL, :id_user_ext)";
    $stmt=$db->prepare($requete);
    $stmt->bindValue(':id_user_ext',$id_user,PDO::PARAM_INT);
    $stmt->execute();

        
    

    header('Location:restauration.php?vote=ok');




    
    


} }
?>