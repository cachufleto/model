<?php
  /**
    1. Créer un nouveau contrôleur sur le modèle du contrôleur fourni par le script de génération de squelette de bundle.
    2. Ce contrôleur comporte 3 actions qui on chacune une vue. Chaque vue hérite du layout commun au bundle. Le layout commun au bundle hérite du layout de base de symfony.
    3. Détail des actions :
      3.1. Action 1 : prend en entrée 2 arguments. Les deux arguments sont obligatoires et sont forcément des nombres. L'action multiplie les nombres entre eux et la vue affiche le calcul effectué ainsi que le résultat du calcul.
      3.2. Action 2 : prend en entrée 3 arguments. Les deux premiers arguments sont obligatoires et correspondent forcément à une liste de possibilités autorisées. Le 3ème argument est optionnel. L'action concaténe le premier argument avec le second et la vue affiche dans un premier paragraphe la concaténation effectuée, puis affiche dans un second paragraphe le 3ème argument mais seulement si il est fourni.
      3.3. Action 3 : prend en entrée 1 argument. Cet argument est obligatoire et doit être une date au format YYYY-MM-DD (utiliser une expression régulière). Le traitement transforme cette date en timestamp. La vue affiche la date et affiche le timestamp correspondant.
      3.3. Action 3 : prend en entrée 1 argument. L'argument est obligatoire et est une date au format YYYY-MM-DD (utiliser les expressions régulières). L'action transforme la date en timestamp. La vue affiche la date et le timestamp correspondant.
    4. Un menu de navigation doit vous permettre de lancer vos 3 actions à partir de la vue associée à n'importe laquelle d'entre elles.
  **/
?>