<?php
session_start();
include("connexion.php");
$db->query('SET NAMES utf8');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST["login"];
    $message = $_POST["message"];
    $date = $_POST["date"];
    $canal_id = $_POST["canal_id"];

    $requete = "INSERT INTO messages (login, message, date, canal_id) VALUES (:login, :message, :date, :canal_id)";
    $stmt = $db->prepare($requete);
    $stmt->bindParam(':login', $login, PDO::PARAM_STR);
    $stmt->bindParam(':message', $message, PDO::PARAM_STR);
    $stmt->bindParam(':date', $date, PDO::PARAM_STR);
    $stmt->bindParam(':canal_id', $canal_id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        header("Location: chat.php?canal_id=" . $canal_id);
        exit();
    } else {
        echo "Erreur lors de l'envoi du message.";
    }
}
?>
