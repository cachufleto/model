------------------------------------------------- IMPORT/EXPORT -----------------------------------------------------------------
-- L'invite de commmande permet de réaliser des actions, ou faire communiquer des programmes entre eux.
-- Poste de Travail>clic droit>propriété>Avancé>Variables denvironnement
-- zone Variable utilisateur :
--		Nouveau -> 	Nom : PATH
-- 					Valeur : C:\wamp\bin\mysql\mysql5.x.x\bin;
-- Démarrer > Exécuter > Cmd
-- Cd Bureau
-- (Sauvegarde export Backup) : 
		mysqldump -u root diwoo10_entreprise > lenomdufichier.sql
-- (L'inverse : import) :
		mysql -u root diwoo10_entreprise < lenomdufichier.sql
---------------------------------------------- FIN IMPORT/EXPORT -----------------------------------------------------------------