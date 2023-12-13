<?php
session_start();
include("connexion.php");

// Je sélectionne le choix avec le plus de votes
$requete = "SELECT id_choix FROM choix ORDER BY nb_votes DESC LIMIT 1";
$stmt = $db->prepare($requete);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result) {
    $idChoixEnTete = $result['id_choix'];

    // Je remets à 0 le choix "choix_en_tete" de la veille
    $resetRequete = "UPDATE choix SET choixEnTete = 0";
    $resetStmt = $db->prepare($resetRequete);
    $resetStmt->execute();

    // Je mets désormais un 1 au nouveau choix avec le plus de votes.
    $miseAJourRequete = "UPDATE choix SET choixEnTete = 1 WHERE id_choix = :id_choix";
    $miseAJourStmt = $db->prepare($miseAJourRequete);
    $miseAJourStmt->bindValue(':id_choix', $idChoixEnTete, PDO::PARAM_INT);
    $miseAJourStmt->execute();

    // Je réinitialise tous les champs nb_votes à zéro afin que les étudiants puissent revoter
    $reinitialisationRequete = "UPDATE choix SET nb_votes = 0";
    $reinitialisationStmt = $db->prepare($reinitialisationRequete);
    $reinitialisationStmt->execute();

    // Je supprime tous les votes de la veille qui sont désormais inutiles
    $suppressionRequete = "DELETE FROM vote";
    $suppressionStmt = $db->prepare($suppressionRequete);
    $suppressionStmt->execute();

    // Je redirige avec un message de succès
    header('Location: crous.php?operation=success');
    exit();
}