--########################################################
--################### UNION ##############################
--########################################################

USE diwoo_biblio;

--# TABLES de réference
SELECT * FROM livre;
SELECT * FROM abonne;

--# UNION est DISTINCT par defaut
SELECT auteur AS 'liste de personne physique'
FROM livre
UNION SELECT prenom 
FROM abonne;

