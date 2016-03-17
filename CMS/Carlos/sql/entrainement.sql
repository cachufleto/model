--#lister les bases

SHOW DATABASES;

--#copier: clic droit....
--#coler: enter ou clic droit....

--# Creer une base
CREATE DATABASE diwoo10_entreprise;

--# Supprimer une BDD
DROP DATABASE diwoo10_entreprise;

--# Utliser la BDD
USE diwoo10_entreprise;

--# liste des tables
SHOW TABLES;

--# Montrer les attributs de la table
DESC diwoo10_entreprise;


--# Selection des données
SELECT nom, prenom, salaire FROM employes;

--# Ou...
SELECT * FROM employes;

--# Selection distinctive des données
SELECT DISTINCT * FROM employes;

--# Selection conditionée des données
SELECT * FROM employes WHERE nom = ''; --# champs de caracteres

--# Selection distinctive conditionées des données
SELECT DISTINCT * FROM employes WHERE nom = ''; --# champs de caracteres

--# Selection conditionée des données format DATE
SELECT nom, prenom 
	FROM employes 
	WHERE date_embauche BETWEEN '2006-01-01' AND '2011-12-31'; --# champs DATE

--# Selection conditionée des données format DATE à la date du jour
SELECT nom, prenom, date_embauche 
	FROM employes 
	WHERE date_embauche BETWEEN '2006-01-01' AND CURDATE(); --# champs DATE

--# Selection conditionée des données format DATE à la date du jour ordenée
SELECT nom, prenom, date_embauche 
	FROM employes 
	WHERE date_embauche BETWEEN '2006-01-01' AND CURDATE() 
	ORDER BY date_embauche ASC;

--# Selection conditionée des données text avec une recherche specifique
SELECT nom, prenom, date_embauche 
	FROM employes 
	-- 's%' commance par s
	-- '%s%' contiene s
	-- '%s' termine par s
	WHERE nom LIKE 's%'
	ORDER BY date_embauche ASC;

--# Selection conditionée des données numeriques avec une recherche specifique
SELECT nom, prenom, date_embauche 
	FROM employes 
	-- < inferieur à
	-- <= inferieur ou égale à
	-- = égale à
	-- != different à
	-- >= supperieur ou égale à
	-- > supperieur à
	WHERE salaire < 3000
	ORDER BY date_embauche ASC;

--# Selection conditionée des données numeriques avec une recherche limité
SELECT nom, prenom, salaire, date_embauche 
	FROM employes 
	WHERE salaire < 3000
	ORDER BY salaire DESC
	-- arg1 = 0 -> ligne de debut
	-- arg2 = 2 -> nombre de lignes affectes
	LIMIT 0,2;

SELECT nom, prenom, salaire, date_embauche 
	FROM employes 
	WHERE salaire < 3000
	ORDER BY salaire DESC
	LIMIT 1,3;

--# Selection conditionée des données numeriques avec une opration
	-- salaire*12 -> operation
	-- augmentation -> nomage de l'operation
SELECT nom, prenom, salaire, salaire*12 as augmentation, date_embauche 
	FROM employes 
	WHERE salaire < 3000
	ORDER BY salaire DESC
	LIMIT 1,3;

--# operation absolut
	-- SUM(champs) -> operation somme
SELECT SUM(salaire) as masseSalariale 
	FROM employes 
	WHERE salaire < 3000;

--# operation absolut imbriqué
	-- MIN(champs) -> operation minimum
SELECT *
	FROM employes 
	WHERE salaire = (
		-- Imbriqué
		SELECT MIN(salaire) FROM employes
		);

--# operation absolut imbriqué
	-- AVG(champs) -> operation moyenne
SELECT *
	FROM employes 
	WHERE salaire >= (
		-- Imbriqué
		SELECT AVG(salaire) FROM employes
		);

--# operation absolut imbriqué arrondi
	-- ROUND() -> operation
SELECT *
	FROM employes 
	WHERE salaire >= (
		-- Imbriqué
		SELECT ROUND(AVG(salaire)) FROM employes
		);
	
--# operation absolut imbriqué contabiliser
	-- COUNT(*) -> operation
SELECT COUNT(*)
	FROM employes 
	WHERE salaire >= (
		-- Imbriqué
		SELECT ROUND(AVG(salaire)) FROM employes
		);
	
--# operation imbriqué inclusion ou exclusion
SELECT *
	FROM employes 
	-- IN(liste d'arguments '') ou NOT IN(liste d'arguments '')
	WHERE service IN ('informatique', 'comptabilite')
	ORDER BY salaire;
	
--# Multiconditionement
SELECT *
	FROM employes 
	-- IN(liste d'arguments '') ou NOT IN(liste d'arguments '')
	WHERE service IN ('informatique', 'comptabilite', 'commercial')
	AND (
		salaire  >= (SELECT ROUND(AVG(salaire)) FROM employes)
		OR
		salaire  = (SELECT MIN(salaire) FROM employes)
		)
	ORDER BY salaire;

-- ############################################################################
-- ############# REQUETTES D'INSERTION ########################################
-- ############################################################################

--# explicite complet
INSERT INTO employes (id_employes, prenom, nom, sexe, service, date_embauche, salaire, id_secteur) 
	VALUES (9999, 'theo', 'dubare', 'm', 'informatique', '2015-09-05', 2800, 40);

--# implicite complet dans l'ordre des collonnes dans la table
INSERT INTO employes 
	VALUES (9812, 'Patrice', 'lolo', 'm', 'informatique', '2010-09-05', 2350, 40);

--# partielle, couplet // id géneré
INSERT INTO employes (prenom, nom, id_secteur) 
	VALUES ('Crhistian', 'toto', 30);

-- ############################################################################
-- ############# REQUETTES DE MODIFICATION ####################################
-- ############################################################################

UPDATE

REPLACE

-- ############################################################################
-- ############# REQUETTES DE SUPPRETION ######################################
-- ############################################################################

DELETE FROM employes 
	WHERE nom='chevel';

DELETE FROM employes 
	WHERE id_employes = 7839
		OR id_employes = 7521;

DELETE FROM employes 
	WHERE service = 'informatique'
		AND id_employes != 7902;

--# vide le tout -- ATTENTION
DELETE FROM employes; -- => equivalent à TRUNCATE

-- ############################################################################
-- ############# REQUETTES DE SELECTION AVEC GROUP BY #########################
-- ############################################################################

-- TOUS
SELECT  id_localite, id_secteur, ville, chiffre_affaires FROM localite;

-- GROUPE par ville
SELECT  id_localite, ville, SUM(chiffre_affaires) as TOTAL
	FROM localite
	GROUP BY ville;
 
-- GROUPE par ville 
SELECT  id_localite, ville, SUM(chiffre_affaires) as TOTAL
	FROM localite
	GROUP BY ville HAVING SUM(chiffre_affaires);
 
-- GROUPE par ville 
SELECT  id_localite, ville, SUM(chiffre_affaires) as TOTAL
	FROM localite
	GROUP BY ville HAVING SUM(chiffre_affaires) > 600000;

--# 1. afficher la profession de l'employé ayant l'id_employes 7654
--# 2. afficher la date de l'embauche ayant l'id_employes 7654
 

