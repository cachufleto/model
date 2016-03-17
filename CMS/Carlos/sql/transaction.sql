--########################################################
--################### TRANSACTION ########################
--########################################################

USE diwoo10_entreprise;

START TRANSACTION; 
--# demarre la zone de mise en tampon
SELECT * FROM employes;

UPDATE employes 
	SET prenom = 'toto'
	WHERE id_employes = 7369;

SELECT * FROM employes;

--# reviens sur les actions présedent, action par defaut
ROLLBACK;

--# valide les actions en cours
COMMIT;

--########################################################
--########## TRANSACTION AVANCEE et SAVEPOINT ############
--########################################################

START TRANSACTION; 
SELECT * FROM employes LIMIT 0,2;;
SAVEPOINT point1;

UPDATE employes 
	SET prenom = 'Toto'
	WHERE id_employes = 7369;
SELECT * FROM employes LIMIT 0,2;;
SAVEPOINT point2;

UPDATE employes 
	SET prenom = 'TITI'
	WHERE id_employes = 7369;
SELECT * FROM employes LIMIT 0,2;
SAVEPOINT point3;


--# reviens sur les actions présedent, action par defaut
ROLLBACK to point2;
SELECT * FROM employes LIMIT 0,2;

--# reviens sur les actions présedent, action par defaut
ROLLBACK to point3;
SELECT * FROM employes LIMIT 0,2;

--# reviens sur les actions présedent, action par defaut
ROLLBACK to point1;
SELECT * FROM employes LIMIT 0,2;

ROLLBACK;
SELECT * FROM employes LIMIT 0,2;

--# valide les actions en cours
COMMIT;
