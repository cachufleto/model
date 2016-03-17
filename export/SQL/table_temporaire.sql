--# Table temporaire
USE diwoo10_entreprise;

CREATE TEMPORARY TABLE femme AS SELECT * FROM employes WHERE sexe='f';

SHOW TABLES;

SELECT * FROM femme;

--# Différences entre table virtuelle et table temporaire

--# Dans une table virtuelle, je sauvegarde la requete qui me permet de mener aux données. Si je change le prenom d'un employé dans la table virtuelle, il change en conséquence dans la table d'origine et inversement. (on manipule les mêmes données)
--# Dans une table temporaire, je sauvegarde les données, si je change le prenomd'un employé de la table employes, il ne changera pas dans la table temporaire précédemment créée. (on ne manipule pas les mêmes données)

--# Une table temporaire a une durée de vie très courte, une table virtuelle restera tant que l'on ne la supprimera pas.