<?php
session_start();
include("connexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST["login"];
    $message = $_POST["message"];
    $date = $_POST["date"];
    $idDest = $_POST["idDest"];
    $idEdi = $_POST["idEdi"];
    

    $requete = "INSERT INTO messages VALUES (NULL, :date, :message, :login, :id_user_edi, :id_user_dest)";
    $stmt = $db->prepare($requete); 
    $stmt->bindValue(':date', $date, PDO::PARAM_STR);
    $stmt->bindValue(':message', $message, PDO::PARAM_STR);
    $stmt->bindValue(':login', $login, PDO::PARAM_STR);  
    $stmt->bindValue(':id_user_edi', $idEdi, PDO::PARAM_INT);
    $stmt->bindValue(':id_user_dest', $idDest, PDO::PARAM_INT);
    $stmt->execute();


    header('Location:./chat.php?utilisateur='.$idDest);
}
?>
