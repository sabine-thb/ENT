<?php
session_start();
include("connexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomCours=$_POST["nomCours"];
    $file = $_FILES["file"];
    $id_mat_ext = $_POST["matiere"];

    // Vérifier s'il y a un fichier téléchargé
    if ($file["error"] == UPLOAD_ERR_OK) {
        // Déplacer le fichier téléchargé vers un emplacement permanent
        $destination = "./uploads/" . basename($file["name"]);
        move_uploaded_file($file["tmp_name"], $destination);

        // Lire le contenu du fichier
        $contenuFichier = file_get_contents($destination);

        // Insérer les informations dans la table cours
        $requete = "INSERT INTO cours  VALUES (NULL, :nomCours, :fichier, :id_matiere)";
        $stmt = $db->prepare($requete);
        $stmt->bindParam(':nomCours', $nomCours, PDO::PARAM_STR);
        $stmt->bindParam(':fichier', $contenuFichier, PDO::PARAM_LOB);
        $stmt->bindParam(':id_matiere', $id_mat_ext, PDO::PARAM_INT);
        $stmt->execute();

        // Rediriger avec un message de succès
        header('Location: cours.php?insertion=ok');
        exit;

    } else {
        // Il y a eu une erreur lors du téléchargement du fichier
        echo "Erreur lors du téléchargement du fichier.";
    }
}
?>
