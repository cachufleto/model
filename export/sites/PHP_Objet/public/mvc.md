# MVC
## Présentation

Intérêts:
- séparation de couches applicatives
- clarté, regroupement de code


Définition:

- Le MVC est à un base un design pattern structurel (patron de conception)
- Design Pattern structurel permettant d'éviter le mélange de concepts: vue, contrôles, et logique métier.

Composants:

- Contrôleur : Gérer les entrées / sorties HTTP d'un scénario nominal
- Modèles : Classes métier
- Vues : Affichage (ex. CSS)

### Exercice de localisation fonctionnalités

Remplacez les différents contextes dans une application Web respectant le MVC

1. Définition de l'URL pour atteindre la page de recherche d'un livre
2. Affichage du formulaire de recherche
3. Récupération du titre du livre
4. Validateurs associés au livre
5. Requête SQL
6. Redirection vers une page d'affichage détaillé
7. Quelle forme de données transmettre à la vue pour afficher le livre et une photo
8. Comment récupérer le nom (voire sa photo) de l'utilisateur connecté

Configuration:
#1: routage
#4: validateurs

Repository:
#5

Validateur:
#4

Modèles:
(#5)

Vues:
#2, #7: service, #8

Contrôleurs:
#3, #6: header ('Location: '), #7: modèle (object) Livre, #8: array

Service:
#8: array