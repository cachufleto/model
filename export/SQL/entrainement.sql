--# ceci est un commentaire

--# pour voir les BDD du serveur.
SHOW DATABASES;

--# permet de cr�er une nouvele BDD
CREATE DATABASE diwoo10_entreprise;

--# pour utiliser une BDD
USE nomdelabdd;

--# pour supprimer une BDD
DROP DATABASE nomdelabdd;
--# pour supprimer une table
DROP TABLE nomdelatable;

--# pour vider une table
TRUNCATE nomdelatable;

--# pour voir la structure d'une table
DESC nomdelatable;

--####### REQUETE DE SELECTION

--# Quels sont les noms et pr�noms de la table employes
SELECT nom, prenom FROM employes;

--# afficher tous les services d ela table employes
SELECT service FROM employes;

-- pour avoir les diff�rents services de la table employes
SELECT DISTINCT service FROM employes;

--# Pour afficher tous les champs de la table employes
SELECT id_employes, prenom, nom, sexe, service, date_embauche, salaire, id_secteur FROM employes;

--# avec * pour dire ALL
SELECT * FROM employes;


--# Conditions
--# toutes les informations des employes travaillant dans le service informatique.
SELECT * FROM employes WHERE service='informatique'; 

--# je souhaite connaitre le nom, prenom ainsi que la date d'embauche des employes recrut�s entre 2006 et 2011
SELECT nom, prenom, date_embauche FROM employes WHERE date_embauche BETWEEN '2006-01-01' AND '2011-12-31';

--# je souhaite connaitre le nom, prenom ainsi que la date d'embauche des employes recrut�s entre 2006 jusqu'� aujourd'hui

SELECT nom, prenom, date_embauche FROM employes WHERE date_embauche BETWEEN '2006-01-01' AND CURDATE();

--# je souhaite connaitre le(s) pr�nom(s) des employ�s commen�ant par la lettre "s"
SELECT prenom FROM employes WHERE prenom LIKE 's%';
--# m�me chose avec les pr�noms qui finissent par "ie"
SELECT prenom FROM employes WHERE prenom LIKE '%ie';
--# m�me chose sans  tenir compte du positionnement
SELECT prenom FROM employes WHERE prenom LIKE '%-%';


--# je souhaite connaitre le nom et pr�nom des employes sauf ceux qui travaillent dans le service informatique.
SELECT nom, prenom, service FROM employes WHERE service != 'informatique';

--# op�rateurs de comparaison
-----------------------------
--# = est �gal �
--# != est diff�rent de
--# > strictement sup�rieur
--# >=  sup�rieur ou �gal �
--# < strictement inf�rieur
--# <=  inf�rieur ou �gal �

--# je souhaite connaitre les informations du ou des employes dont le salaire est sup�rieur � 3000
SELECT * FROM employes WHERE salaire > 3000;

--# je souhaite classer les employes par salaire 
SELECT * FROM employes ORDER BY salaire;

--# ORDER BY est en mode croissant par defaut (ASC) pour l'avoir en ordre d�croissant DESC
SELECT * FROM employes ORDER BY salaire DESC;

--# pour connaitre les informations de l'employ� ayant le plus gros salaire
SELECT * FROM employes ORDER BY salaire DESC LIMIT 0,1;

SELECT nom, prenom, salaire, service FROM employes ORDER BY salaire ASC, prenom DESC;

--# je souhaite connaitre les noms prenoms et salaire annuel des employes
SELECT nom, prenom, salaire * 12 FROM employes;

--# je souhaite connaitre la masse salariale de l'entreprise sur une ann�e (la somme des salaire x12)

SELECT SUM(salaire*12) FROM employes;

--# Je souhaite connaitre le salaire minimum de l'entreprise
SELECT MIN(salaire) FROM employes;

SELECT * FROM employes;

--# Afficher toutes les informatiosn de l'employ� ayant le salaire minimum.
SELECT nom, MIN(salaire) FROM employes; --# /!\ r�sultat incorrect
SELECT * FROM employes ORDER BY salaire LIMIT 0,1;

SELECT * FROM employes WHERE salaire = (SELECT MIN(salaire) FROM employes); --# exemple de requete imbriqu�e

--# Salaire moyen de l'entreprise
SELECT AVG(salaire) FROM employes;

--# le m�me r�sultat mais arrondi
SELECT ROUND(AVG(salaire)) FROM employes;
SELECT ROUND(AVG(salaire), 2) FROM employes; --# avec deux chiffres apr�s la virgule.

--# Je souhaite connaitre le nombre de femme dans l'entreprise
SELECT COUNT(*) FROM employes WHERE sexe='f';

--# je souhaite conaitre les informations des employes es services 'informatique' et 'comptabilite'
SELECT * FROM employes WHERE service IN('informatique', 'comptabilite');

--# exclusion avec IN
SELECT * FROM employes WHERE service NOT IN('informatique', 'comptabilite') ORDER BY service;


--# je souhaite connaitre les informations des employes travaillant dans le service commercial ET gagnant un salaire inf�rieur ou �gal � 1500
SELECT * FROM employes WHERE service="commercial" AND salaire <= 1500;

--# je souhaite connaitre les informations des employes travaillant dans le service commercial avec un id_secteur 10 ou 40
SELECT * FROM employes WHERE service='commercial' AND (id_secteur= 10 OR id_secteur = 40);




--############################################
--####### REQUETE D'INSERTION
--############################################

SELECT * FROM employes;

INSERT INTO employes (id_employes, prenom, nom, sexe, service, date_embauche, salaire, id_secteur) VALUES (9999, 'mathieu', 'quittard', 'm', 'informatique', '2015-12-02', 2000, 40);

--# m�me chose mais avec la g�n�ration de l'id_employes(cl� primaire) automatique
INSERT INTO employes ( prenom, nom, sexe, service, date_embauche, salaire, id_secteur) VALUES ('mathieu', 'quittard', 'm', 'informatique', '2015-12-02', 2000, 40);

--# sans sp�cifier les champs
INSERT INTO employes VALUES (11111, 'mathieu', 'quittard', 'm', 'informatique', '2015-12-02', 2000, 40);


--############################################
--####### REQUETE DE MODIFICATION
--############################################

SELECT * FROM employes;
--" modification du salaire de l'employ� ayant le nom cottet (pr�f�rable de la faire avec l'id)
UPDATE employes SET salaire=1270 WHERE nom="cottet";


INSERT INTO employes (id_employes, prenom, nom, sexe, service, date_embauche, salaire, id_secteur) VALUES (9999, 'mathieu', 'quittard', 'm', 'informatique', '2015-12-02', 2000, 40);
--# replace fonctionne comme un insert ou un update. Si la requete poss�de un id existant d�j� dans la table alors c'est un update sinon c'est un insert
REPLACE INTO employes (id_employes, prenom, nom, sexe, service, date_embauche, salaire, id_secteur) VALUES (9999, 'mathieu', 'quittard', 'm', 'informatique', '2015-12-02', 3000, 40);


--############################################
--####### REQUETE DE SUPPRESSION
--############################################

SELECT * FROM employes;

--# suppression de l'employ� qui a le nom chevel
DELETE FROM employes WHERE nom = "chevel";

--# suppression de deux employ�s
DELETE FROM employes WHERE id_employes = 7839 OR id_employes = 7521;

--# suppression de tous les informaticiens sauf 1
DELETE FROM employes WHERE service="informatique" AND id_employes != 7902;

--# vider un table (m�me chose que TRUNCATE)
DELETE FROM employes;


--############################################
--####### REQUETE DE SELECTION AVEC GROUP BY
--############################################

SELECT id_secteur, ville, chiffre_affaires FROM localite;
--# aucun secteur ne fait plus de 600000 de chiffre d'affaire. En revanche la ville de Paris apparait eux fois et si on additionne les chiffre d'affaires, Paris d�passe les 600000

--# affichage en associant les m�me valeur du champs ville grace au group by. Paris ressort bien avec un chiffre d'affaires sup�rieur � 600000.
SELECT id_secteur, ville, SUM(chiffre_affaires) FROM localite GROUP BY ville;

--# HAVING remplace le WHERE avec un GROUP BY
SELECT id_secteur, ville, SUM(chiffre_affaires) FROM localite GROUP BY ville HAVING SUM(chiffre_affaires)>600000;








