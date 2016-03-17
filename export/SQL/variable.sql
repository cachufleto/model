--# Variables
--# Une variable est un espace nommé permetant de conserver une valeur.
--# http://mysql.developpez.com/faq/?page=VARIABLES

SHOW VARIABLES;

--# variable systeme: @@var
--# exemple:
SELECT @@version;

--# variable globale: @var
--# exemple:
SET @ecole = 'Ifocop';
SELECT @ecole;

--# variable locale: var
DECLARE pays VARCHAR(255);
SET pays = 'France';
SELECT pays;






