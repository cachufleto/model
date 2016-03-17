


--# 1. Afficher la profession de l'employé ayant l'id_employes 7654
SELECT service FROM employes WHERE id_employes = 7654;
+------------+
| service    |
+------------+
| commercial |
+------------+


--# 2. Afficher la date de l'embauche d'Amandine
SELECT date_embauche FROM employes WHERE prenom LIKE '%Amandine%';
+---------------+
| date_embauche |
+---------------+
| 2010-01-23    |
+---------------+


--# 3. Afficher le nombre de commerciaux
SELECT COUNT(*) FROM employes WHERE service = 'commercial';
+----------+
| COUNT(*) |
+----------+
|        7 |
+----------+


--# 4. Afficher le cout des commerciaux sur une année
SELECT SUM(salaire*12) FROM employes WHERE service = 'commercial';
+-----------------+
| SUM(salaire*12) |
+-----------------+
|          153600 |
+-----------------+


--# 5. Afficher le salaire moyen par service
SELECT service, AVG(salaire)
	FROM employes 
	GROUP BY service;
+-------------------------+--------------------+
| service                 | AVG(salaire)       |
+-------------------------+--------------------+
| NULL                    |               NULL |
| assistant manager       |               1675 |
| charge de communication |               1400 |
| chef de projet          |               1950 |
| commercial              | 1728.5714285714287 |
| comptabilite            |               1500 |
| direction               |               3925 |
| informatique            | 2233.3333333333335 |
| juridique               |               3100 |
| secretariat             |               1110 |
| standardiste            |               1000 |
+-------------------------+--------------------+


--# 6. Afficher le nombre de recrutement sur l'année 2010
SELECT COUNT(*)
	FROM employes 
	WHERE date_embauche LIKE '2010-%';
+----------+
| COUNT(*) |
+----------+
|        5 |
+----------+


--# 7. Augmenter le salaire dechage employé
UPDATE employes SET salaire = (salaire+100);
+-------------------------+--------------------+
| service                 | AVG(salaire)       |
+-------------------------+--------------------+
| NULL                    |               NULL |
| assistant manager       |               1775 |
| charge de communication |               1500 |
| chef de projet          |               2050 |
| commercial              | 1828.5714285714287 |
| comptabilite            |               1600 |
| direction               |               4025 |
| informatique            | 2333.3333333333335 |
| juridique               |               3200 |
| secretariat             |               1210 |
| standardiste            |               1100 |
+-------------------------+--------------------+


--# 8. Nombre de differents services
SELECT COUNT(DISTINCT service) FROM employes;
+-------------------------+
| COUNT(DISTINCT service) |
+-------------------------+
|                      10 |
+-------------------------+
	

--# 9. Nombre d'employes par services
SELECT service, COUNT(*) 
	FROM employes
	GROUP BY service;


--# 10. Afficher les informations de l'employé du service comercial gagnant le salaire le plus élevé
SELECT nom, prenom
	FROM employes
	WHERE service = 'commercial' 
	ORDER BY salaire DESC
	LIMIT 0,1;

--# 11. Afficher 
