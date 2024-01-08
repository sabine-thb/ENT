<?php
session_start();
include("connexion.php");
$utilisateur=$_SESSION['utilisateur'];

$idSession = $utilisateur['id'];

// Je crée ma requête pour récupérer les trois derniers messages reçus par l'utilisateur connecté Idsession
$requeteDerniersMessages = "
    SELECT m.*, u.prenom, u.nom
    FROM messages m
    INNER JOIN utilisateurs u ON m.id_user_edi = u.id
    WHERE m.id_user_dest = :idSession
    ORDER BY m.date DESC
    LIMIT 3;
";

$stmtDerniersMessages = $db->prepare($requeteDerniersMessages);
$stmtDerniersMessages->bindParam(':idSession', $idSession, PDO::PARAM_INT);
$stmtDerniersMessages->execute();
$derniersMessages = $stmtDerniersMessages->fetchAll(PDO::FETCH_ASSOC);
?>
<!-- Je crée la requête pour affihcer les 3 derniers cours déposes par les profs -->
<?php
$requeteDerniersCours = "
    SELECT * FROM cours, matiere, utilisateurs WHERE id_mat_ext=id_matiere AND professeur = nom LIMIT 2; 
    

";

$stmtDerniersCours = $db->prepare($requeteDerniersCours);
$stmtDerniersCours->execute();
$derniersCours = $stmtDerniersCours->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" href="style/style.css">   
    <link rel="stylesheet" href="style/fonts.css">
    <link rel="stylesheet" href="style/burger.css">
   <link rel="stylesheet" href="style/styleAccueil.css">
    
    <title>ENT - Accueil</title>
    
    <link rel="icon" type="image/svg" href="./style/img/logoENT.svg">
</head>
<body>
    
</head>
<body>
    <header>
        <a href="#contenu" class="skip-link">Aller au contenu</a>
        
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

    <section class="section1" id="contenu">
        <div class="container">
            <div class="pt1">
                <div class="bjr">
                    <?php
                        echo"<h1 class=\"firstTitle\">Bonjour {$utilisateur ['prenom']}.</h1> "
                    ?>
                        
                    <p>Bienvenue sur l’espace numérique de travail de l’université Gustave Eiffel.</p>

                </div>
                
                        <h3 class="titleSection">Prochains cours</h3>
                        <a href="edt.php" class="pcs">
                            <div class="horaires">
                                <div class="titleHoraires">Horaires</div>
                                <div class="contenu">
                                    <div class="h">8:15 à 10:15</div>
                                    <div class="h">10:30 à 12:30</div>
                                </div>
                            </div>
                            <div class="matieres">
                                <div class="titleMatieres">Matières</div>
                                <div class="contenu">
                                    <div class="mat">Anglais <i class="prof">Leroy</i> 126</div>
                                    <div class="mat">Dev <i class="prof">Gambette</i> 123</div>
                                </div>
                            </div>
                            
                        
                            
                        </a>
            </div>

        </div>
       
        <div class="container">
            <div class="pt2">
                <div class="devoirs">
                    <h1 class="titleSection">Prochains rendus</h1>
                    <div class="rectangles">
                            <div class="rec1">
                                <div class="rectangle"><a href="devoirs.php" aria-label="Lien vers la page des devoirs à rendre">SAÉ 3.01 </a></div>
                                <div class="rectangle"><a href="devoirs.php" aria-label="Lien vers la page des devoirs à rendre">SAÉ 3.02 </a></div>
                            </div>
                            <div class="rec2">
                                <div class="rectangle"><a href="devoirs.php" aria-label="Lien vers la page des devoirs à rendre">Portfolio</a></div>
                                <div class="rectangle"><a href="devoirs.php" aria-label="Lien vers la page des devoirs à rendre">SAÉ 3.02A </a></div>
                            </div>
                    </div>

                </div>
            

                <div class="lien">
                    
                    <a class="iconn" href="cours.php" aria-label="Lien vers la page des cours"><img src="./style/img/cours.svg" alt="Icône et lien vers la page des cours"> <p>Cours</p></a> 
                    <a class="iconn" href="edt.php" aria-label="Lien vers la page de l'emploi du temps"><img src="./style/img/EDT.svg" alt="Icône et lien vers la page de l'emploi du temps"><p>EDT</p></a> 
                    <a class="iconn" href="notes.php" aria-label="Lien vers la page des notes"><img src="./style/img/notes.svg" alt="Icône et lien vers la page des notes"><p>Notes</p></a> 


                </div>

            </div>

        </div>
        
        
        
        
</section>
<!-- affichage des 3 derniers mess -->
<section class="section2">

    <div class=derniersCoursContainer>
        <h2 class="titleSection blanc">Les deux derniers cours</h2>
                <div class="derniersCours">
                <?php foreach ($derniersCours as $cours) : ?>
                    <div class="cours-item">
                        <div class="cours">
                            <p  class="pCours">Cours :</p>
                            <a href="ressources.php?id=<?php echo $cours['id_mat_ext']; ?>" class="lienCours" aria-label="Lien vers la page du dernier cours"><?php echo $cours['nomCours']; ?></a>
                        </div>
                        <p class="pCours">Matière : <?php echo $cours['titre_matiere']; ?> </p>
                        <i class="pCours">Par <?php echo $cours['prenom']; ?> <?php echo $cours['nom']; ?></i>

                    </div>
                <?php endforeach; ?>

                </div>
                
        </div>

    

    <div class="msgContainer">
        <h2 class="titleSection titleMsg blanc">Derniers messages</h2>
        <div class="derniers-messages">
        <ul>
            <?php 
            if (empty($derniersMessages)) {
                echo "<p class=\"txtRouge\">Vous n'avez pas de derniers messages.</p>";
            }
            foreach ($derniersMessages as $message) : 
                $messageLimite = substr($message['message'], 0, 50);
                if (strlen($message['message']) > 100) {
                    $messageLimite .= '...';
                }?>
                <a href="chat.php?utilisateur=<?= $message['id_user_edi'] ?>"class="message-item" aria-label="Lien vers le chat du dernier message">
                    <div class="photoContainer">
                        <img src="./style/img/profil/<?= $message['id_user_edi'] ?>.svg" class="message-photo" alt="">
                    </div>
                    <div class="message-contenu">
                        <?= $messageLimite ?>
                        <div class="expediteur">
                            <i><?= $message['prenom'] . ' ' . $message['nom'] ?></i>
                        </div>
                    </div>
                    <div class="date-heure">
                        <span class="date"><?= date('d/m/y', strtotime($message['date'])) ?></span>
                        <br>
                        <span class="heure"><?= date('H:i', strtotime($message['date'])) ?></span>
                    </div>
                    <div style="clear: both;"></div>
                </a>
            <?php endforeach; ?>
        </ul>

        </div>
        
    </div>

</section>
<section class="section3">
    <h1 class="firstTitle restauration">Restauration de l'université</h1>
    <div class="restaurationContainer">
        <a href="restauration.php#platJour" class="menuJour" aria-label="Lien vers la section plat du jour de la page de restauration">
            <h1 class="firstTitle second">Menu cantine du jour</h1>
        <?php $requete =" SELECT * FROM choix WHERE choixEnTete = 1";
        $stmt=$db->query($requete);
        $result=$stmt -> fetchall(PDO::FETCH_ASSOC);
        foreach ($result as $row){ ?>
            <div class="platJour">
                <div class="imgPlat" style="background-image:url(<?php echo $row["image"] ?>);" alt="Image du plat du jour"></div>
                <div class="titrePlat">           
                    <div class="nomPlatJour"><?php echo $row["nom"] ?></div>
                </div>        
                
            <?php } ?>
            </div>
        </a>
        <div class="attentes">
            <h1 class="firstTitle second">Temps d'attente CROUS</h1>
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
    </div>
</section>
<section class="section4">
        <div class="titleContainer">
            <img src="./style/img/bonhommes/hautParleur.png" class="img1" alt="">
            <h1 class="titleActu">Actu de la semaine</h1>
        </div>    
        <div class="actuContainer">
            <img src="./style/img/actus/actu1.jpg" alt="Image Actualité de la semaine" srcset="" class="actuPrincipale">

            <h2 class="titleActuPrincipale">Enquête REMEDE : Résultats de l'état des lieux des actions pour l'égalité dans les établissements d'enseignement supérieur</h2>

            <p class="descrPrincipale">Lundi 13 novembre 2023, l'Observatoire National des Discriminations et de l'Égalité dans le Supérieur (ONDES) et la Conférence Permanente des chargé.e.s de mission Égalité et Diversité (CPED) ont présenté les résultats de l’enquête REMEDE (Recueil Extensif des Mesures des Établissements contre les Discriminations et pour l’Égalité), réalisée par Yannick L’Horty (Université Gustave Eiffel Et ONDES), Philippe Liotard (Université Lyon 1 Et CPED), Romane Masternak (CPED) et Aude Stheneur (CPED). Une table ronde s’est tenue suite à la divulgation des résultats de l’enquête afin de commenter et compléter le propos.</p>

            <a href="actus.php" class="lienActu" aria-label="Lien vers la page de l'actualité de la semaine">Voir tout</a>

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

    

<script src="./script/burger.js"></script>
<script src="./script/compteur.js"></script>

</a></body>
</html>
