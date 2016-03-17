//Enoncé :
/*
	Déclarez un objet qui contient :

		-> 1 propriété qui contient une méthode (fonction dans une propriété) :
			- qui prend en argument 1 nombre.
			- qui affiche ce nombre dans une b.d.d.
			- qui retourne ce nombre multiplié par 100.
		-> Exécutez cette méthode et affichez la valeur de retour dans un b.d.d.

		-> 1 propriété qui contient une méthode :
			- qui prend en argument 1 texte.
			- qui affiche ce texte dans une b.d.d.
			- qui retourne ce texte concaténé avec la chaine de caractère 'hello !'
		-> Exécutez cette méthode et affichez la valeur de retour dans un b.d.d.

		-> 1 propriété qui contient une méthode :
			- qui prend en argument un tableau de 3 cases.
			- qui affiche le contenu de la case 2
			- qui remplace ce que contient la case 2 par ce qui est contenu dans la case 3.
			- qui retourne ce tableau de 3 cases modifié.
		-> Exécutez cette méthode et affichez la valeur de la 2ème case de la valeur de retour dans un b.d.d.

		-> 1 propriété qui contient une méthode :
			- qui prend en argument un objet de 5 propriété qui contiennent chacune un nombre.
			- qui met dans la 4ème propriété la somme de chacun des nombre de chacune des propriétés.
			- qui retourne 1 objet de 5 propriétés.
		-> Exécutez cette méthode et affichez la valeur de la 4ème propriété de la valeur de retour dans un b.d.d.
*/

var objet= {
	prop1:function(nombre){
		return nombre*100;
	},
	prop2:function(texte){
		return "hello "+texte;
	},
	prop3:function(tableau){
		tableau[1]=tableau[2];
		return tableau;
	},
	prop4:function(objet){
			var p4=0;
			p4=objet.prop1+objet.prop2+objet.prop3+objet.prop4+objet.prop5;
			alert(p4+"-1");
			objet.prop4=p4;
			alert(objet.prop4+"-2");
			return objet;
	}
}

alert(objet.prop1(15));
alert(objet.prop2("machin"));
var tab=["1","2","3"];
alert(objet.prop3(tab)[0]+"-"+objet.prop3(tab)[1]+"-"+objet.prop3(tab)[2]);
var objet2={
	prop1:1,
	prop2:2,
	prop3:3,
	prop4:4,
	prop5:5
}
var test=objet.prop4(objet2)
alert(test.prop4+"-3");
alert(objet.prop4(objet2).prop4+"-4");









