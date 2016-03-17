--########################################################
--################### VIEW ###############################
--########################################################

USE diwoo10_entreprise;

CREATE TEMPORARY TABLE femme AS
	SELECT * 
	FROM employes
	WHERE sexe = 'f';

SHOW TABLES;

SELECT * FROM femme;