



SELECT id_livre FROM emprint WHERE date_rendu IS NULL;

--#LE TITRE DES LIVRES NON RENDUS

SELECT titre from livre where id_livre IN (SELECT id_livre FROM emprint WHERE date_rendu IS NULL);


nous aimerions connaitre les numeros des livres que chloe a emprunte de notre bibliotheque
