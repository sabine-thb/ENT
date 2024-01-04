<?php
session_start();
include("connexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer le contenu du formulaire
    $file = $_FILES["file"];
    $id_mat_ext = $_POST["matiere"];

    // Vérifier s'il y a un fichier téléchargé
    if ($file["error"] == UPLOAD_ERR_OK) {
        // Déplacer le fichier téléchargé vers un emplacement permanent
        $destination = "./uploads/" . basename($file["name"]);
        move_uploaded_file($file["tmp_name"], $destination);

        // Lire le contenu du fichier
        
        $contenuFichier = file_get_contents($file["tmp_name"]);

        // Insérer les informations dans la table cours avec une requête préparée
        $requete = "INSERT INTO cours VALUES (NULL, :fichier, :id_matiere)";
        $stmt = $db->prepare($requete);
        $stmt->bindParam(':id_matiere', $id_mat_ext, PDO::PARAM_INT);
        $stmt->bindParam(':fichier', $contenuFichier, PDO::PARAM_LOB);
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

