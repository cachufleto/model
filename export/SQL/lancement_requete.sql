--# créer un fichier avec des requetes et l'enregistrer sur le bureau
--# contenu du fichier:
USE diwoo10_entreprise;
SELECT * FROM employes;
SELECT * FROM employes WHERE id_employes = 7369;

--# dans la console :
--# mysql> source mettre le chemin d'accès au fichier
mysql> source C:/Users/stagiaire/Desktop/fichier.sql;



