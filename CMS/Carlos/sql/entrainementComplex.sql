--###################################################################################
--########### REQUETTE IMBRIQUEE ####################################################
--###################################################################################

--# Un champs null se test avec IS

SELECT id_livre
	FROM emprunt
	-- Pour l'hipothese ou le champs n'a pas été mise à la valeur 0
	WHERE date_rendu IS NULL

--# Nous aimerions connaitre les numeros des livres que Chloe a emprenté à la bibliotheque

SELECT id_livre
	FROM emprunt
	WHERE id_abonne IN (
		SELECT id_abonne
			FROM abonne
			WHERE prenom = "chloe"
		);

--# afficher les prenom des abonnes ayant emprunté un livre le 19/12/2011
SELECT prenom 
	FROM abonne 
	WHERE id_abonne IN(
		SELECT id_abonne 
			FROM emprunt 
			WHERE date_sortie='2011-12-19'
		);
		
--# afficher la liste (prenom) des abonnés ayant déjà emprunté un livre d'Alphonce Daudet

-- lister prenom de abonne
SELECT prenom 
	FROM abonne
	-- lister id abonne de emprunt
	WHERE id_abonne in(
		SELECT id_abonne 
			FROM emprunt
			-- lister id du livre Alphonce Daudet
			WHERE id_livre IN (
				SELECT id_livre
					FROM livre
					WHERE auteur = "ALPHONSE DAUDET"
			)
		);

--# Nous aimerions maintenant connaitre le titre de(s) livre(s) que Chloe n'a pas encore rendu à la bibliotheque

--# lister le titre d'un livre
SELECT titre
	FROM livre
	WHERE id_livre IN (
		--# liste les emprinte du livre non rendu
		SELECT id_livre 
			FROM emprunt
			WHERE 
				date_rendu IS NULL
			AND 
				id_abonne IN (
				--# lister les empreinte de fait par Chloe
				SELECT id_abonne
					FROM abonne
					WHERE prenom = "chloe"
				)
	);

--# lister les empreinte de fait par Chloe
--# lister le titre d'un livre
SELECT titre, id_livre
	FROM livre
	WHERE id_livre NOT IN (
		--# liste les emprinte du livre non imprinté
		SELECT id_livre
			FROM emprunt
			WHERE id_abonne IN(
				--# lister les empreinte de fait par Chloe
				SELECT id_abonne
					FROM abonne
					WHERE prenom = "chloe"
			)
	);

--# Qui (prenom) a emprunté le plus de livres à la bibliotheque?
--# lister les abonne
SELECT *
	FROM abonne;

SELECT id_abonne,  COUNT(id_abonne)
	FROM emprunt 
	GROUP BY id_abonne 
	ORDER BY COUNT(id_abonne) DESC ;

SELECT prenom
	FROM abonne
	-- Seule des operateurs sont aceptés suite à une limitation
	-- IN resteras accessible sans limitation
	WHERE id_abonne = (
		-- selection de l'abonne
		-- max de livres imprenté par abonne
		SELECT id_abonne 
			FROM emprunt 
			GROUP BY id_abonne 
			ORDER BY COUNT(id_abonne) DESC
			LIMIT 0,1
	);
	

--###################################################################################
--########### REQUETTE EN JOINTURE
--###################################################################################
SELECT * FROM livre;

SELECT * FROM emprunt;

SELECT * FROM abonne, emprunt, livre  ORDER BY livre.id_livre, emprunt.id_emprunt;

SELECT *
	FROM emprunt, livre
	WHERE livre.id_livre = emprunt.id_livre
	ORDER BY emprunt.id_emprunt;

SELECT livre.id_livre, titre, emprunt.date_rendu, emprunt.date_sortie
	FROM emprunt, livre
	WHERE livre.auteur = 'ALPHONSE DAUDET'
	AND livre.id_livre = emprunt.id_livre
	ORDER BY emprunt.id_emprunt;
	
SELECT livre.titre, abonne.prenom, emprunt.date_sortie
	FROM abonne, emprunt, livre  
	WHERE livre.titre = 'une vie' 
		AND emprunt.date_sortie BETWEEN '2011-01-01' AND '2011-12-31'
		AND abonne.id_abonne = emprunt.id_abonne 
		AND emprunt.id_livre = livre.id_livre
	ORDER BY livre.id_livre, emprunt.id_emprunt;

SELECT abonne.prenom, COUNT(id_emprunt)
	FROM abonne, emprunt  
	WHERE abonne.id_abonne = emprunt.id_abonne
	GROUP BY abonne.id_abonne
	ORDER BY COUNT(abonne.prenom) DESC
	LIMIT 0,1;
	
--# qui emprenté quoi et quand
SELECT abonne.prenom, livre.titre, emprunt.date_sortie
	FROM abonne, emprunt, livre  
	WHERE abonne.id_abonne = emprunt.id_abonne
	AND livre.id_livre = emprunt.id_livre
	ORDER BY abonne.prenom, livre.titre, emprunt.date_sortie;

SELECT abonne.prenom, livre.titre, emprunt.date_sortie, abonne.id_abonne, emprunt.id_abonne, livre.id_livre, emprunt.id_livre
	FROM abonne, emprunt, livre  
	ORDER BY abonne.prenom, livre.titre, emprunt.date_sortie;

SELECT abonne.prenom, livre.titre, emprunt.date_sortie, abonne.id_abonne, emprunt.id_abonne, livre.id_livre, emprunt.id_livre
	FROM abonne, emprunt, livre  
	WHERE abonne.id_abonne = emprunt.id_abonne
	ORDER BY abonne.prenom, livre.titre, emprunt.date_sortie;

SELECT abonne.prenom, livre.titre, emprunt.date_sortie, abonne.id_abonne, emprunt.id_abonne, livre.id_livre, emprunt.id_livre
	FROM abonne, emprunt, livre  
	WHERE abonne.id_abonne = emprunt.id_abonne
	AND livre.id_livre = emprunt.id_livre
	ORDER BY abonne.prenom, livre.titre, emprunt.date_sortie;

INSERT INTO abonne (prenom) VALUES ('carlos');

SELECT *
	FROM abonne
	LEFT JOIN emprunt ON abonne.id_abonne = emprunt.id_abonne;

SELECT *
	FROM abonne
	JOIN emprunt ON abonne.id_abonne = emprunt.id_abonne;

SELECT *
	FROM emprunt
	RIGHT JOIN abonne ON emprunt.id_abonne = abonne.id_abonne;

SELECT *
	FROM abonne
	RIGHT JOIN emprunt ON abonne.id_abonne = emprunt.id_abonne;


