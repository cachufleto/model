--# 1 - Afficher la profession de l'employé ayant l'id_employes 7654
mysql> SELECT id_employes, service FROM employes WHERE id_employes = 7654;
+-------------+------------+
| id_employes | service    |
+-------------+------------+
|        7654 | commercial |
+-------------+------------+
1 row in set (0.00 sec)
--# 2 - Afficher la date d'embauche d'Amandine
SELECT prenom, date_embauche 
FROM employes 
WHERE prenom='amandine';
--# 3 - Afficher le nombre de commerciaux
SELECT COUNT(*) AS nombre_de_commerciaux FROM employes WHERE service='commercial';
--# 4 - Afficher le cout des commerciaux sur une année
SELECT SUM(salaire*12) AS masse_salariale_commerciaux FROM employes WHERE service="commercial";
--# 5 - Afficher le salaire moyen par service
SELECT service, ROUND(AVG(salaire)) FROM employes GROUP BY service;
--# 6 - Afficher le nombre de recrutement sur l 'année 2010
SELECT COUNT(*) AS nombre_recrutement FROM employes WHERE date_embauche LIKE '2010%';
SELECT COUNT(*) AS nombre_recrutement FROM employes WHERE date_embauche BETWEEN '2010-01-01' AND '2010-12-31';
SELECT COUNT(*) AS nombre_recrutement FROM employes WHERE date_embauche >= '2010-01-01' AND date_embauche <='2010-12-31';
--# 7 - Augmenter le salaire de chaque employé de 100€
UPDATE employes SET salaire=salaire+100;
--# 8 - Nombre de différents service
SELECT COUNT(DISTINCT service) FROM employes; 
--# 9 - Nombre d'employés par service
SELECT service, COUNT(*) FROM employes GROUP BY service;
--# 10 - Afficher les informations de l'employé du service commercial gagnant le salaire le plus élevé
SELECT * FROM employes WHERE service="commercial" ORDER BY salaire DESC LIMIT 0,1; 
SELECT * FROM employes WHERE service="commercial" AND salaire = (SELECT MAX(salaire) FROM employes WHERE service='commercial');
--# 11 - Afficher les informations de l'employé ayant été embauché en dernier.







