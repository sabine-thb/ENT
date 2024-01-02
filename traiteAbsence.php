<?php
session_start();
include("connexion.php");
$utilisateur=$_SESSION['utilisateur'];

$id_eleve=$_GET["eleve"];
$date = new DateTime($_GET['date']);
$dateFormatted = $date->format('Y-m-d H:i:s');
$dateActuelle = new DateTime();
$justification = $_GET["justification"];

$duree=$_GET['duree'];


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // On vérifie que l'un des boutons radio est coché
    if (isset($_GET['justification']) && ($_GET['justification'] === 'oui' || $_GET['justification'] === 'non')) {
        // On vérifie que la date est bien inférieure à la date actuelle
        if ($dateFormatted > $dateActuelle->format('Y-m-d')) {
            // La date de l'absence est après la date actuelle, on redirige avec un message d'erreur
            header('Location:absences.php?err=dateAbsence');
        } else {
            // Tout est ok, on peut effectuer l'insertion dans la base de données
            $requete = "INSERT INTO absence VALUES (NULL, :date, :duree, :justification, :id_user_ext)";
            $stmt = $db->prepare($requete);
            $stmt->bindValue(':date', $dateFormatted, PDO::PARAM_STR);
            $stmt->bindValue(':duree', $duree, PDO::PARAM_STR);
            $stmt->bindValue(':justification', $justification, PDO::PARAM_STR);
            $stmt->bindValue(':id_user_ext', $id_eleve, PDO::PARAM_INT);
            $stmt->execute();

            // Redirection avec un message de succès
            header('Location:absences.php?absence=ok');
        }
    } else {
        // Aucun bouton radio n'est coché, on redirige avec un message d'erreur
        header('Location:absences.php?err=statutAbsence');
    }
}
