# Comment installer le site web sur son serveur local ?
Lancez WAMPP sur votre ordinateur personnel.

Ensuite, aller dans vos fichiers, et rendez vous dans c:\wamp64\www et déposez y le dossier complet de l'ENT.
N'oubliez pas d'importer la base de données ent.sql dans votre phpMyAdmin.
Tapez ensuite dans votre navigateur http://localhost/ent. Vous aurez ainsi accès directement à notre ENT sur votre propre serveur local WAMP.




# ENT
En tant qu'élèves, les profils insérés sont ceux de Jade Célestine, Rihab Bouazzaoui et Sabine Thibout. 
Les professeurs de la formation sont également insérés en tant que profs.
Pour tous les profils, pour se connecter:
login = prenom.nom (sans accent ni maj)
mdp = nom (sans accent ni maj)

Les fonctionnalités développées sont : 

1. VOTE REPAS DU CROUS
   Les utilisateurs avec le rôle "personnel du CROUS" ont accès à une interface spécifique.
   Ici, l'utilisateur est Adelina Ashani avec le login "adelina.ashani" et le mdp "ashani".
   On suppose que chaque jour, cette personne se rend sur l'interface et propose deux choix de repas au étudiants pour le lendemain. 
   Avant de proposer ces choix, elle doit absolument réinitialiser les votes de la veille pour que: 
        - les votes soient remis à 0,
        - le choix ayant le plus de vote la veille s'affiche comme plat du jour.
   
   Ainsi, les utilisateurs avec le rôle de professeur ou d'élève peuvent voter (une fois max évidemment) pour le plat qu'ils préfèrent pour le repas du lendemain.

   Le personnel du CROUS peut également, via un formulaire, ajouter de nouveaux plats à la liste des choix qui pourront être proposés chaque jour.

2. RESERVATION DE MATERIEL
   Les utilisateurs avec le rôle élève peuvent, sur la page "réservation de matériel" de la rubrique "services", réserver du matériel.
   Ainsi, lorsqu'une réservation est faite, celle-ci apparaît dans la section "mes réservations" de la page. 
   Les utilisateurs avec le rôle de professeurs peuvent visualiser dans cette même page les réservations actuelles faites par les élèves.
   Dès qu'une réservation est passée, elle n'apparaît plus dans les réservations en cours, pour les étudiants et les professeurs. Cependant, les professeurs ont accès aux réservations qui sont passées en cas de problème.
   Nous avons choisi de ne pas faire de gestion de stocks car trop compliqué pour peu.

3. INSERTION DE NOTES, ET MOYENNE GENERALE
   Les professeurs peuvent, via la page "notes" de la rubrique "mon profil", insérer des notes de leur matière respective aux étudiants. On suppose que toutes les notes sont sur 20.
   Sur l'interface étudiante, les élèves peuvent via cette même page consulter leurs notes et leur moyenne générale.
   Les matières sont classées par UE.
   La matière générale est calculée en fonction de toutes les notes et de leur coefficient respectif.

4. INSERTION DES ABSENCES ET RETARDS, ET POINTS EN MOINS SUR LA MOYENNE
   Les professeurs peuvent, via leur interface, insérer aux élèves des heures d'absence ou de retard, justifiés ou non.
   Ainsi, les élèves peuvent observer via leur interface personnelle leurs heures de retards et d'absence justifiés ou non. 
   Ils peuvent également avoir accès à leur nombre de points en moins sur leur moyenne générale. Celui-ci est calculé en fonction du nombre total d'heures d'absences et de retards non justifiés.
   En effet, au-delà de 10H cumulées, chaque heure supplémentaire enlèvera 0.025points sur la moyenne.

5. INSERTION DE COURS
   Les utilisateurs connectés avec le rôle de professeur peuvent dans la page "cours", insérer de nouveaux cours pour leur matière respective.
   Les élèves pourront ainsi télécharger les cours de chaque matière. Pour cela, ils devront aller sur la page cours et sélectionner la matière dont ils veulent consulter les cours déposés.