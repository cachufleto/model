--########################################################
--################### VIEW ###############################
--########################################################

USE diwoo10_entreprise;

--# REQUETTE virtuelle garde la requette et elle sera au jour des tables d'origine
CREATE VIEW vue_homme AS
	SELECT prenom, nom, sexe, service, salaire 
	FROM employes 
	WHERE sexe='m';


--# 
USE Diwoo_biblio;

CREATE VIEW vue_emprunt AS
	SELECT a.prenom, l.titre, e.date_sortie
	FROM abonne a, livre l, emprunt e
	WHERE a.id_abonne = e.id_abonne
	AND e.id_livre = l.id_livre;

SELECT * FROM vue_emprunt;

USE information_schema;
SELECT * FROM views;

--#
USE diwoo10_entreprise;
DROP VIEW vue_homme;