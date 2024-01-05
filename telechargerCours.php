<?php
include("connexion.php");

if (isset($_GET['id'])) {
    $id_cours = $_GET['id'];

    $requete = "SELECT nomCours, contenu_fichier FROM cours WHERE id_cours = :id_cours";
    $stmt = $db->prepare($requete);
    $stmt->bindParam(':id_cours', $id_cours, PDO::PARAM_INT);
    $stmt->execute();
    $resultat = $stmt->fetch(PDO::FETCH_ASSOC);

    // Téléchargement du fichier avec le nom d'origine
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($resultat['nomCours']) . '.pdf"');
    echo $resultat['contenu_fichier'];
    exit;
} else {
    echo "ID du cours non spécifié.";
}
?>
