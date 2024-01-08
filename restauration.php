<?php
session_start();
include("connexion.php");
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" href="style/style.css">   
    <link rel="stylesheet" href="style/fonts.css">
    <link rel="stylesheet" href="style/burger.css">
    <link rel="stylesheet" href="style/styleRestauration.css">
       
    <title>ENT - Restauration</title>
    <link rel="icon" type="image/svg" href="./style/img/logoENT.svg">
</head>
<body>
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
$requete =" SELECT * FROM repas  ORDER BY date_repas DESC LIMIT 1";
    $stmt=$db->prepare($requete);
    $stmt->execute(); 
    $result = $stmt->fetch(PDO::FETCH_ASSOC); 
        $id_choix1=$result["id_choix1_ext"];
        $id_choix2=$result["id_choix2_ext"];
    

$requete =" SELECT * FROM choix WHERE id_choix = $id_choix1 OR id_choix = $id_choix2 ";
$stmt=$db->query($requete);
$result=$stmt -> fetchall(PDO::FETCH_ASSOC);
?>

<section class="sec1">
    <div class="vote">
        <h1>Votez pour votre repas de demain.</h1>
        <p class="descrVote">Pour cela, cliquez sur votre plat favori.</p> 
        <?php if (isset($_GET["err"] )){  
            echo "<p class=\"voteOk\">Vous avez déjà voté aujourd'hui.</p>";
        } 
        ?> 
        <?php if (isset($_GET["vote"] )){  
            echo "<p class=\"voteOk\">Votre vote a bien été pris en compte !</p>";
        } 
        ?> 
        

        <div class="imgVote">
        <?php foreach ($result as $row){ ?>
            <img src="./style/img/bonhommes/vote.png" class="imgDeco" alt="">
            <a href="traiteVote.php?id=<?php echo $row["id_choix"] ?>" class="linkVote two" aria-label="Valider le vote">
                <div style="background-image:url(<?php echo $row["image"] ?>);" class="imgPlat" alt=""></div>
                <p class="nomPlat"><?php echo $row["nom"] ?></p>
            </a>
            <?php } ?>
        </div>
        
        <?php $requete2 = "SELECT nb_votes, nom
            FROM choix
            JOIN repas ON (choix.id_choix = repas.id_choix1_ext OR choix.id_choix = repas.id_choix2_ext)
            WHERE repas.id_repas = (
                SELECT id_repas
                FROM repas
                ORDER BY date_repas DESC
                LIMIT 1
            )"; //ici je récupère le nombre de vote de chaque choix proposés dans le repas le plus récent ( celui du jour)
            $stmt=$db->query($requete2);
            $result2=$stmt -> fetchall(PDO::FETCH_ASSOC);

                  
            // Initialiser la variable pour le nombre total de votes
            $totalVotes=0;
            
            foreach ($result2 as $row) {    
                $totalVotes += $row["nb_votes"]; // je récup le nb total de votes
            }
            // Initialiser un tableau pour stocker les pourcentages
            $percentages = array();

            // Je parcours les résultats pour calculer le pourcentage pour chaque choix
            foreach ($result2 as $row) {
                $nbVotesChoix = $row["nb_votes"];

                // Je calcule le pourcentage pour chaque choix
                $percentage = ($totalVotes > 0) ? ($nbVotesChoix / $totalVotes) * 100 : 0;

                //Je fais en sorte que mon % n'ait pas de chiffre après la virgule
                $formattedPercentage = number_format($percentage, 1);

                // Je stocke le pourcentage dans le tableau associatif
                $percentages[$row["nom"]] = $formattedPercentage;



                // J'afiche le pourcentage (facultatif)
                echo "<p class=\"percent\">Pourcentage de votes pour " . $row["nom"] . " : " . $formattedPercentage . "%</p>";
            }?>

            <div class="barre">
            <?php
            // Boucle pour afficher chaque choix avec la largeur correspondante
            foreach ($percentages as $nomChoix => $pourcentage) {
                echo '<div class="choix"' . strtolower(str_replace(' ', '', $nomChoix)) . '" style="width: ' . $pourcentage . '%;"></div>';
            }
            ?>
            </div>

        

    </div>
    
    <div class="queue">
        <h1 class="titreTemps">Temps d'attente de vos CROUS : </h1> 
        <div class="compteurs">
            <div class="temps">
                <p class="nomCrous">ESSIE</p>
                <div class="compteur c1">25 mn</div>
            </div>
            <div class="temps">
                <p class="nomCrous">Copernic</p>
                <div class="compteur c2">14 mn</div>
            </div>
        </div>   
        
        
        
    </div>
</section>
<section class="sec2" id="platJour">
    <h1>Le plat que vous avez voté pour aujourd'hui : </h1>
    <div class="flex">
        <?php $requete =" SELECT * FROM choix WHERE choixEnTete = 1";
        $stmt=$db->query($requete);
        $result=$stmt -> fetchall(PDO::FETCH_ASSOC);
        foreach ($result as $row){ ?>
        <div class="platJour">
            <div class="imgPlatJour" style="background-image:url(<?php echo $row["image"] ?>);" alt="Image du plat du jour"></div>
            <div class="titreEtDescr">           
                <div class="nomPlatJour"><?php echo $row["nom"] ?></div>
                <div class="descrPlatJour"><?php echo $row["description"] ?></div>
            </div>        
            
        <?php } ?>
        </div>
        <div class="imgContainer">
            <img src="./style/img/bonhommes/crous.png" alt="" class="imgCrous">
        </div>
        

    </div>
    
   

</section>
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


<script src="./script/compteur.js"></script>
<script src="./script/burger.js"></script>
<script src="./script/restauration.js"></script>


    
</body>

</html>