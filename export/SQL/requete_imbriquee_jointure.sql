--############################################
--####### REQUETE IMBRIQUEE
--############################################

--# Un champs null se test avec IS

SELECT id_livre FROM emprunt WHERE date_rendu IS NULL;

--# Quels sont les titres des livres qui n'ont pas été rendu
SELECT titre FROM livre WHERE id_livre IN (SELECT id_livre FROM emprunt WHERE date_rendu IS NULL);

--# Nous aimerions connaitre les numeros des livres que Chloe a emprunté à la bibliotheque

SELECT id_livre FROM emprunt WHERE id_abonne IN (SELECT id_abonne FROM abonne WHERE prenom ="chloe");


--# Afficher les prénoms des abonnés ayant emprunté un livre le 19/12/2011

SELECT prenom FROM abonne WHERE id_abonne IN (SELECT id_abonne FROM emprunt WHERE date_sortie='2011-12-19');


--# Afficher la liste (prénom) des abonnés ayant déjà emprunté un livre d'Alphonse Daudet

SELECT prenom FROM abonne WHERE id_abonne IN (SELECT id_abonne FROM emprunt WHERE id_livre IN(SELECT id_livre FROM livre WHERE auteur='alphonse daudet'));

--# Nous aimerions maintenant connaitre le titre de(s) livre(s) que Chloe n'a pas encore rendu à la bibliotheque

SELECT titre FROM livre WHERE id_livre IN (SELECT id_livre FROM emprunt WHERE date_rendu IS NULL AND id_abonne IN (SELECT id_abonne FROM abonne WHERE prenom="chloe"));

--# Nous aimerions aussi connaitre les titres des livres que Chloe n'a pas encore emprunté.

SELECT titre FROM livre WHERE id_livre NOT IN (SELECT id_livre FROM emprunt WHERE id_abonne IN (SELECT id_abonne FROM abonne WHERE prenom='chloe'));

--# Qui (prenom) a emprunté le plus de livre à la bibliotheque ?
--# => benoit
SELECT prenom FROM abonne WHERE 

--# nb de ligne dans la table emprunt
SELECT COUNT(*) FROM emprunt;
SELECT id_abonne, COUNT(*) FROM emprunt GROUP BY id_abonne;
SELECT id_abonne, COUNT(*) FROM emprunt GROUP BY id_abonne ORDER BY COUNT(*) DESC;



--############################################
--####### REQUETE JOINTURE
--############################################
--# différence enre une requete imbriquée et une requete en jointure:
--# Une imbriquée est possible si les informations obtenus proviennent d'une seule et unique table
--# Une requete en jointure peut nous afficher des informations qui proviennent de plusieurs tables.

--# Nous aimerions connaitre les dates de sortie et les date de rendu pour l'abonné guillaume 

SELECT abonne.prenom, emprunt.date_sortie, emprunt.date_rendu  
FROM abonne, emprunt 
WHERE abonne.prenom = 'guillaume' 
AND abonne.id_abonne = emprunt.id_abonne;

SELECT id_abonne, date_sortie, date_rendu FROM emprunt WHERE id_abonne IN (SELECT id_abonne FROM abonne WHERE prenom="guillaume");



SELECT a.prenom, e.date_sortie, e.date_rendu  
FROM abonne a, emprunt e 
WHERE a.prenom = 'guillaume' 
AND a.id_abonne = e.id_abonne;











