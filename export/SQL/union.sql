--# UNION

USE diwoo10_bibliotheque;

SELECT auteur AS 'liste de personne physique' FROM livre UNION SELECT prenom FROM abonne;

--# UNION est DISTINCT par defaut
--# il est possible d'utiliser UNION ALL pour avoir tous les résultats

SELECT auteur AS 'liste de personne physique' FROM livre UNION ALL SELECT prenom FROM abonne;
