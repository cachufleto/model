--# TRANSACTION
USE diwoo10_entreprise;

START TRANSACTION; --# demarre la zone de mise en tampon
SELECT * FROM employes;

UPDATE employes SET prenom='PRENOM' WHERE id_employes = 7369;

SELECT * FROM employes;

ROLLBACK; --# donne l'ordre à Mysql de tout annuler depuis le START TRANSACTION.
COMMIT; --# à l'inverse, COMMIT valide l'ensemble des opérations depuis le start transaction.

--# Si l'on ferme la console pendant une transaction sans avoir spécifié de rollback ou commit: ce sera un rollback par defaut.

--# TRANSACTION AVANCEE et SAVEPOINT
START TRANSACTION;
SELECT * FROM employes;
SAVEPOINT point1;

UPDATE employes SET prenom='PRENOM' WHERE id_employes = 7369;
SELECT * FROM employes;

SAVEPOINT point2;

UPDATE employes SET prenom='PRENOM 2' WHERE id_employes = 7369;
SELECT * FROM employes;

SAVEPOINT point3;
ROLLBACK to point2; 
SELECT * FROM employes;

ROLLBACK to point3; --# erreur SAVEPOINT point3 does not exist
ROLLBACK to point1;

COMMIT; --# pour valider
ROLLBACK; --# pour tout annuler depuis la transaction.









