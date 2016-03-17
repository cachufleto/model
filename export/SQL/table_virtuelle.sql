USE diwoo10_entreprise;

CREATE VIEW vue_homme AS SELECT prenom, nom, sexe, service, salaire FROM employes WHERE sexe="m";

--#
USE diwoo10_bibliotheque;

CREATE VIEW vue_emprunt AS 
SELECT a.prenom, l.titre, e.date_sortie 
FROM abonne a, livre l, emprunt e 
WHERE a.id_abonne = e.id_abonne 
AND e.id_livre = l.id_livre;

SELECT * FROM vue_emprunt;

--# 
USE information_schema;
SELECT * FROM views;

--#
USE diwoo10_entreprise;
DROP VIEW vue_homme;

--# Différences entre table virtuelle et table temporaire

--# Dans une table virtuelle, je sauvegarde la requete qui me permet de mener aux données. Si je change le prenom d'un employé dans la table virtuelle, il change en conséquence dans la table d'origine et inversement. (on manipule les mêmes données)
--# Dans une table temporaire, je sauvegarde les données, si je change le prenomd'un employé de la table employes, il ne changera pas dans la table temporaire précédemment créée. (on ne manipule pas les mêmes données)

--# Une table temporaire a une durée de vie très courte, une table virtuelle restera tant que l'on ne la supprimera pas.









