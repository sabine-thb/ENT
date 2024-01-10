<?php
session_start();
include("connexion.php");

$utilisateur=$_SESSION['utilisateur'];

$role=$utilisateur['role'];

$nom=$utilisateur['nom'];
$prenom=$utilisateur['prenom'];
$id_user=$utilisateur['id'];

// var_dump($nom);

$id_user=$utilisateur['id'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" href="style/style.css">   
    <link rel="stylesheet" href="style/fonts.css">
    <link rel="stylesheet" href="style/burger.css">
    <link rel="stylesheet" href="style/styleNotes.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
       
    <title>ENT - Notes</title>
    <link rel="icon" type="image/svg" href="./style/img/logoENT.svg">
</head>

<body class="body">
    <a href="#contenu" class="skip-link">Aller au contenu</a>
    <header>
        
        
        <a href="accueil.php" class="logo" aria-label="Logo et lien vers la page d'accueil"></a>

        <nav class="responsive-menu">
            <a href="#" class="toggle-menu" data-toggle-class="active" data-toggle-target=".main-menu, this" aria-label="Accès au menu"><svg height="32" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg"><path d="M4 10h24c1.104 0 2-.896 2-2s-.896-2-2-2H4c-1.104 0-2 .896-2 2s.896 2 2 2zm24 4H4c-1.104 0-2 .896-2 2s.896 2 2 2h24c1.104 0 2-.896 2-2s-.896-2-2-2zm0 8H4c-1.104 0-2 .896-2 2s.896 2 2 2h24c1.104 0 2-.896 2-2s-.896-2-2-2z" fill="#fff"/></svg></a>
            
            <ul class="main-menu">
                <li><div class="navFirstLevel"><span>Mon profil</span></div> 
                    <ul class="sub-menu">
                        <li><a href="absences.php" aria-label="Lien vers la page des abscences et retards"><span>Absences et retards</span></a></li>
                        <li><a href="notes.php" aria-label="Lien vers la page des notes"><span>Notes</span></a></li>
                    </ul>
                </li>
                <li><div class="navFirstLevel"><span>Scolarité</span></div>
                    <ul class="sub-menu">
                        <li><a href="edt.php" aria-label="Lien vers la page de l'emploi du temps'"><span>Emploi du temps</span></a></li>
                        <li><a href="devoirs.php" aria-label="Lien vers la page des devoirs à rendre"><span>Devoirs à rendre</span></a></li>
                        <li><a href="cours.php" aria-label="Lien vers la page des cours"><span>Cours</span></a></li>
                    </ul>
                </li>
                <li><div class="navFirstLevel"><span>Services</span></div>
                    <ul class="sub-menu">
                        <li><a href="restauration.php" aria-label="Lien vers la page de restauration"><span>Restauration</span></a></li>
                        <li><a href="resa.php" aria-label="Lien vers la page de réservation de matériel"><span>Réservation de matériel</span></a></li>
                    </ul>
                </li>
                <li><div class="navFirstLevel"><span>Informations</span></div>
                    <ul class="sub-menu">
                        <li><a href="infosProf.php" aria-label="Lien vers la page d'informations sur les professeurs"><span>Informations sur les professeurs</span></a></li>
                        <li><a href="actus.php" aria-label="Lien vers la page d'actualités"><span>Actualités étudiantes</span></a></li>
                        <li><a href="carte.php" aria-label="Lien vers la page de la carte du campus"><span>Carte du campus</span></a></li>
                    </ul>
                </li>
                <li>
                    <div class="navFirstLevel">
                        <a href="deconnexion.php" class="navItem" aria-label="Lien vers la page de connexion">
                        <img src="./style/img/deco.svg"  class="deco" alt="se déconnecter">
                        </a> 
                </div>
                    
                </li>
            </ul>
        </nav>
	
    </header>

<?php
     if ($role == "professeur") {
    ?>
    <section id="contenu">
        <h1 class="titre"><?php echo "$prenom" ?>, vous souhaitez déposer une note ?</h1>
        <?php if (isset($_GET["insertion"] )){  
            echo "<p class=\"noteOk\">Votre note a bien été insérée.</p>";
        } 
        ?> 
        <?php if (isset($_GET["err"] )){  
            echo "<p class=\"noteOk\">Votre valeur de note doit être supérieure ou égale à 20.</p>";
        } 
        ?> 
        <div class="formContainer">
            <form action="traiteNote.php">
                    <?php
                    $requete =" SELECT * FROM matiere WHERE professeur = '$nom' ";
                    $stmt=$db->query($requete);
                    $result=$stmt -> fetchall(PDO::FETCH_ASSOC);
                    foreach ($result as $row){ ?>          
                    <h2 class="votreMat">Votre matière : <?php echo $row["titre_matiere"]?></h2>
                    <?php } ?>
                <input type="hidden" value="<?php echo $row["id_matiere"]?>" name="id_matiere">
                <p class="legendoblige">* Tous les champs sont obligatoires</p>

                <p class="pForm">
                    <label for="eleve">Élève<span class="asterisque">*</span> : </label>
                    <select name="eleve" id="eleve" aria-describedby="form-note-élève">
                        <?php
                        $requete =" SELECT * FROM utilisateurs WHERE role = 'élève' ";
                        $stmt=$db->query($requete);
                        $result=$stmt -> fetchall(PDO::FETCH_ASSOC);
                        foreach ($result as $row){ ?>
                        
                        <option value="<?php echo $row["id"]?>"><?php echo $row["nom"]?> <?php echo $row["prenom"]?></option>
                        <?php } ?>
                    </select>
                </p>
                
                <p class="pForm">
                    <label for="title">Titre de la note<span class="asterisque">*</span> : </label>
                    <input type="text" id="title" name="titleNote" required>
                </p>
                
                <p class="pForm">   
                    <label for="value">Valeur de la note sur 20<span class="asterisque">*</span> : </label>
                    <input type="text" id="value" name="valueNote" required>
                </p>

                <p class="pForm">
                    <label for="coeff">Coefficient<span class="asterisque">*</span> : </label>
                    <input type="text" id="coeff" name="coeffNote" required>
                </p>
                <p>
                    <input type="submit" value="valider" class="valid">
                </p>
                <img src="./style/img/bonhommes/fusee.png"  class="imgProf" alt="">

                
                

            </form>

        </div>
        
    </section>

    
<?php }?>

<?php
     if ($role == "élève") {
    ?>
    
    <section class="secNotes" id="contenu">
        <h1 class="titre">Mon relevé de notes par UE</h1>
        <div class="accordeonContainer">
            <div class="moyG">      
                <?php 
                    $requete =" SELECT * FROM note WHERE  id_user_ext =$id_user ";
                    $stmt=$db->query($requete);
                    $result=$stmt -> fetchall(PDO::FETCH_ASSOC);

                    $totalValeurCoeff = 0;
                    $totalCoeff = 0;
                    foreach ($result as $row) {
                        $totalValeurCoeff += $row["valeur"] * $row["coeff"];
                        $totalCoeff += $row["coeff"];
                    } 
                    if ($totalCoeff > 0) {
                         $moyenneGenerale = $totalValeurCoeff / $totalCoeff;
                        echo "Moyenne générale : " . round($moyenneGenerale, 2) . " / 20";} ?>
                              
            </div>
            <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" aria-label="Lien vers notes de l'UE Comprendre" aria-describedby="button-note-élève-comprendre">
                    Comprendre
                </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <?php 
                    $requete =" SELECT * FROM note, matiere, UE WHERE id_matiere_ext=id_matiere AND id_UE_ext=id_UE AND id_user_ext =$id_user AND titreUE='Comprendre' ORDER BY date DESC";
                    $stmt=$db->query($requete);
                    $result=$stmt -> fetchall(PDO::FETCH_ASSOC);
                    foreach ($result as $row){ ?>          
                    <div class="oneNote">
                        <div class="matDev">
                            <div class="matiere">Matière : <?php echo $row["titre_matiere"]?> </div>
                            <div class="titreDev">Titre du devoir : <?php echo $row["titre"]?></div>
                        </div>
                        <div class="noteCoeff">
                            <div class="note">Note : <?php echo $row["valeur"]?> / 20 </div>
                            <div class="coeff"> Coefficient : <?php echo $row["coeff"]?></div>
                        </div>
                    </div>
                    <?php } ?>    
                </div>
            </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" aria-label="Lien vers notes de l'UE Exprimer"aria-describedby="button-note-élève-exprimer">
                    Exprimer
                </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                <?php 
                    $requete =" SELECT * FROM note, matiere, UE WHERE id_matiere_ext=id_matiere AND id_UE_ext=id_UE AND id_user_ext =$id_user AND titreUE='Exprimer' ORDER BY date DESC";
                    $stmt=$db->query($requete);
                    $result=$stmt -> fetchall(PDO::FETCH_ASSOC);
                    foreach ($result as $row){ ?>          
                    <div class="oneNote">
                        <div class="matDev">
                            <div class="matiere">Matière : <?php echo $row["titre_matiere"]?> </div>
                            <div class="titreDev">Titre du devoir : <?php echo $row["titre"]?></div>
                        </div>
                        <div class="noteCoeff">
                            <div class="note">Note : <?php echo $row["valeur"]?> / 20 </div>
                            <div class="coeff"> Coefficient : <?php echo $row["coeff"]?></div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" aria-label="Lien vers notes de l'UE Développer"aria-describedby="button-note-élève-développer">
                    Développer
                </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <?php 
                    $requete =" SELECT * FROM note, matiere, UE WHERE id_matiere_ext=id_matiere AND id_UE_ext=id_UE AND id_user_ext =$id_user AND titreUE='Développer' ORDER BY date DESC";
                    $stmt=$db->query($requete);
                    $result=$stmt -> fetchall(PDO::FETCH_ASSOC);
                    foreach ($result as $row){ ?>          
                    <div class="oneNote">
                        <div class="matDev">
                            <div class="matiere">Matière : <?php echo $row["titre_matiere"]?> </div>
                            <div class="titreDev">Titre du devoir : <?php echo $row["titre"]?></div>
                        </div>
                        <div class="noteCoeff">
                            <div class="note">Note : <?php echo $row["valeur"]?> / 20 </div>
                            <div class="coeff"> Coefficient : <?php echo $row["coeff"]?></div>
                        </div>
                        </div>  
                    <?php } ?>
                                  
                </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour" aria-label="Lien vers notes de l'UE Concevoir"aria-describedby="button-note-élève-concevoir">
                    Concevoir
                </button>
                </h2>
                <?php
                ?>
                <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                <?php 
                    $requete =" SELECT * FROM note, matiere, UE WHERE id_matiere_ext=id_matiere AND id_UE_ext=id_UE AND id_user_ext =$id_user AND titreUE='Concevoir' ORDER BY date DESC";
                    $stmt=$db->query($requete);
                    $result=$stmt -> fetchall(PDO::FETCH_ASSOC);
                    foreach ($result as $row){ ?>          
                    <div class="oneNote">
                        <div class="matDev">
                            <div class="matiere">Matière : <?php echo $row["titre_matiere"]?> </div>
                            <div class="titreDev">Titre du devoir : <?php echo $row["titre"]?></div>
                        </div>
                        <div class="noteCoeff">
                            <div class="note">Note : <?php echo $row["valeur"]?> / 20 </div>
                            <div class="coeff"> Coefficient : <?php echo $row["coeff"]?></div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive" aria-label="Lien vers notes de l'UE Entreprendre"aria-describedby="button-note-élève-entreprendre">
                    Entreprendre
                </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                <?php 
                    $requete =" SELECT * FROM note, matiere, UE WHERE id_matiere_ext=id_matiere AND id_UE_ext=id_UE AND id_user_ext =$id_user AND titreUE='Entreprendre' ORDER BY date DESC";
                    $stmt=$db->query($requete);
                    $result=$stmt -> fetchall(PDO::FETCH_ASSOC);
                    foreach ($result as $row){ ?>          
                    <div class="oneNote">
                        <div class="matDev">
                            <div class="matiere">Matière : <?php echo $row["titre_matiere"]?> </div>
                            <div class="titreDev">Titre du devoir : <?php echo $row["titre"]?></div>
                        </div>
                        <div class="noteCoeff">
                            <div class="note">Note : <?php echo $row["valeur"]?> / 20 </div>
                            <div class="coeff"> Coefficient : <?php echo $row["coeff"]?></div>
                        </div>
                        </div>
                    <?php } ?>
                </div>
                </div>
            </div>
            </div>
            <img src="./style/img/bonhommes/fusee.png" alt="" class="img">
        </div>

        
        
    </section>

    
<?php }?>
    <footer>
        <div class="logoFooterContainer">
            <a href="accueil.php" aria-label="Lien vers l'accueil">
                <img src="./style/img/logoFooter.svg" class="logoFooter" alt="retour à l'accueil">
            </a>
        </div>
        <div class="ML">
            <a href="ML.html" class="lienFooter" aria-label="Lien vers les mentions légales"><p class="pFooterTitle">Mentions Légales</p></a>
            <a href="ML.html#editeur" class="lienFooter" aria-label="Lien vers la section éditeur des mentions légales"><p class="pFooter">éditeur</p></a>
            <a href="ML.html#contributeurs" class="lienFooter" aria-label="Lien vers la section contributeurs des mentions légales"><p class="pFooter">Contributeurs</p></a>
            <a href="ML.html#hebergeur" class="lienFooter" aria-label="Lien vers la section hébergeur des mentions légales"><p class="pFooter">Hébergeur</p></a>
            <a href="ML.html#cookies" class="lienFooter" aria-label="Lien vers la section cookies des mentions légales"><p class="pFooter">Cookies</p></a>
            <a href="ML.html#RGPD" class="lienFooter" aria-label="Lien vers la section RGPD des mentions légales"><p class="pFooter">RGPD</p></a>
        </div>
        <div class="contact">
            <p class="pFooterTitle">Contact</p>
            <div class="reseaux">
                <img src="./style/img/instagram.svg" class ="reseau" alt="instagram">
                <img src="./style/img/twitter.svg"  class ="reseau"alt="twitter">
                <img src="./style/img/facebook.svg" class ="reseau" alt="facebook">
            </div>
        </div>
    </footer>

    <a href="messagerie.php" class="chat" aria-label="Lien vers la messagerie"><img src="./style/img/chat.png" alt="Bouton vers la messagerie" srcset="" class="imgChat"></a>



<script src="./script/burger.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>