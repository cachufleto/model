--# Fonctions prédéfinies
--# Prévue par le langage et exécuté par le developpeur.

SELECT DATABASE(); --# indique la BDD actuellement selectionnée
SELECT VERSION(); --# indique la version Mysql

INSERT INTO employes (prenom) VALUES ('test_insert_id');
SELECT LAST_INSERT_ID(); --# permet d'afficher le dernier id inséré. Si vous insérez plusieurs lignes au même moment avec une requete INSERT, LAST_INSERT_ID() retourne la valeur de la première ligne insérée.

SELECT DATE_ADD('2015-12-07', INTERVAL 31 DAY);
--# ou
SELECT ADDDATE('2000-01-01', 31);
--# 31 jours plus tard (systeme d'enchere, jeu concours ...)

SELECT CURDATE(); --# date courante
SELECT CURTIME(); --# heure courante

SELECT DATE_FORMAT('2015-12-07 22:23:01', '%d/%m/%Y - %H:%i:%s') AS 'Format français'; 

USE diwoo10_bibliotheque;
SELECT date_sortie, DATE_FORMAT(date_sortie, 'Le %d/%m/%Y') FROM emprunt;

SELECT DAYNAME('1976-03-29'); --# afiche le jour d'une date en particulier.

SELECT DAYOFYEAR('2015-12-07');

SELECT NOW(); --# pour avoir la date et l'heure

SELECT PASSWORD('monmotdepasse'); --# permet le crypter le mot d epasse en algorithme AES

SELECT CONCAT('a', 'b', 'c'); --# concaténation
SELECT CONCAT_WS(' - ', 'Premier nom', 'deuxième nom', 'troisième nom'); --# concaténation avec separateur.
SELECT CONCAT_WS(' - ', id_abonne, prenom) FROM abonne;

SELECT LENGTH('chaine'); --# 6

SELECT SUBSTRING('Bonjour', 4); --# jour

SELECT TRIM('   Bonsoir   '); --# supprime les espaces

--# FONCTION UTILISATEUR
--# prévue, inscrite et exécuté par le développeur.

DELIMITER $ --# on change le delimiter car notre fonction va avoir des ; lors des différentes instructions.

CREATE FUNCTION calcul_tva(nb INT) RETURNS TEXT --# onn reçoit un argumment de type INT et on précise que la fonction renverra du texte
COMMENT 'Fonction permettant le calcul de la TVA' 
READS SQL DATA 
BEGIN 
	RETURN CONCAT_WS(': ', 'Le résultat est', (nb*1.2));
END $

DELIMITER ;
SELECT calcul_tva(2000);

SHOW FUNCTION STATUS;
SHOW FUNCTION STATUS \G;
DROP FUNCTION calcul_tva;


--# faire la même fonction en donnant la possibilité à l'utilisateur le choix du taux.

DELIMITER $ 

CREATE FUNCTION calcul_tva_taux(nb INT, taux FLOAT) RETURNS TEXT 
COMMENT 'Fonction permettant le calcul de la TVA avec le choix du taux' 
READS SQL DATA 
BEGIN 
	RETURN CONCAT_WS(': ', 'Le résultat est', ROUND((nb*taux),2));
END $

DELIMITER ;
SELECT calcul_tva_taux(2000, 5.6);


--# 

USE diwoo10_entreprise;

DELIMITER $
CREATE FUNCTION nombre_employes_par_service(servicerecu VARCHAR(255)) RETURNS INT 
READS SQL DATA
BEGIN
	DECLARE resultat INT;
	SELECT COUNT(*) FROM employes WHERE service= servicerecu INTO resultat;
	RETURN resultat;
END $
SELECT nombre_employes_par_service('commercial') $

--#

--# DEFINER
--# En mode DEFINER, la fonction est liée au compte de celui qui l'a créé.
--# Si le compte est un jour supprimé, la fonction/procédure ne s'exécutera plus.
--# En revanche, la fonction peut être exécutée par un autre compte.

--# INVOKER
--# En mode INVOKER, la fonction est liée au droits du compte. de celui qui l'exécute.

--# CONTAINS SQL | NO SQL | READS SQL DATA | MODIFIES SQL DATA
--# Si ce n'est pas précisé, ce sera CONTAINS SQL par defaut.
--# READS SQL DATA permet de préciser qu'aucun accès en écriture n'est effectué.
--# MODIFIES SQL DATA permet de préciser que la routine contient des requêtes en écriture.
--# NO SQL précise que la routine ne contient pas de requêtes SQL.
--# CONTAINS SQL -- cas par defaut contient des requête.

--# ces parametres sont utilisées pour améliorer les performances.






