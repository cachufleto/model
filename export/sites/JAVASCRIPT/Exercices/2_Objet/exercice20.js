//Enoncé :
/*
	Déclarez un objet qui contient :

		-> 1 propriété qui contient une méthode (fonction dans une propriété) :
			- qui prend en argument 1 nombre.
			- qui affiche ce nombre dans une b.d.d.
			- qui retourne ce nombre multiplié par 100.
		-> Exécutez cette méthode et affichez la valeur de retour dans un b.d.d.
*/

  
/*
		-> 1 propriété qui contient une méthode :
			- qui prend en argument 1 texte.
			- qui affiche ce texte dans une b.d.d.
			- qui retourne ce texte concaténé avec la chaine de caractère 'hello !'
		-> Exécutez cette méthode et affichez la valeur de retour dans un b.d.d.
*/
	 	
/*	
		-> 1 propriété qui contient une méthode :
			- qui prend en argument un tableau de 3 cases.
			- qui affiche le contenu de la case 2
			- qui remplace ce que contient la case 2 par ce qui est contenu dans la case 3.
			- qui retourne ce tableau de 3 cases modifié.
		-> Exécutez cette méthode et affichez la valeur de la 2ème case de la valeur de retour dans un b.d.d.
*/ 
 
/*
		-> 1 propriété qui contient une méthode :
			- qui prend en argument un objet de 5 propriété qui contiennent chacune un nombre.
			- qui met dans la 4ème propriété la somme de chacun des nombre de chacune des propriétés.
			- qui retourne 1 objet de 5 propriétés.
		-> Exécutez cette méthode et affichez la valeur de la 4ème propriété de la valeur de retour dans un b.d.d.
*/
var objet = {
			methode:function(nombre){
			  alert(nombre);
			  return nombre*100;
			},
			methode_texte:function(texte){
			  alert(texte);
			  return texte+' hello !';
			},
			methode_nouvelle:function(tableau){
				alert(tableau[1]);		
				tableau[1]=tableau[2];
				return tableau; // ['salut','hello','hello']
			},
			methode_new:function(object){
				var somme=object.prop1+object.prop2+object.prop3+object.prop4+object.prop5;
				object.prop4=somme; // = 15
				return object;
			}
		}
		var objet_propriete={
		prop1:1,
		prop2:2,
		prop3:3,
		prop4:4,
		prop5:5
	}
		var new_objet=objet.methode_new(objet_propriete);
		alert(new_objet.prop4);
		
		
	














