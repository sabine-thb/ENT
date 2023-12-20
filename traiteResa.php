<?php
session_start();
include("connexion.php");
$utilisateur=$_SESSION['utilisateur'];

$id_user=$utilisateur['id'];
$fin=$_GET['dateFin'];
$dateActuelle = new DateTime();

$matos=$_GET['matos'];

if($fin< $dateActuelle){ /*Je compare la date de rendu du matériel avec la date actuelle*/ 
    header('Location:resa.php?err=date');
}else{
    $requete ="INSERT INTO reservation VALUES ( NULL, NOW(), :fin, :id_user_ext, :id_mat_ext)";
    $stmt=$db->prepare($requete);
    $stmt->bindValue(':fin',$fin,PDO::PARAM_STR);
    $stmt->bindValue(':id_user_ext',$id_user,PDO::PARAM_INT);
    $stmt->bindValue(':id_mat_ext',$matos,PDO::PARAM_INT);
    $stmt->execute();

header('Location:resa.php?resa=ok');
}



?>