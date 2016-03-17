CREATE TABLE employes (
  id_employes int(4) NOT NULL  auto_increment,
  prenom varchar(20) default NULL,
  nom varchar(20) default NULL,
  sexe enum('m','f') NOT NULL,
  service varchar(30) default NULL,
  date_embauche date default NULL,
  salaire float default NULL,
  id_secteur int(2) NOT NULL,
  PRIMARY KEY  (id_employes)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO employes (id_employes, prenom, nom, sexe, service, date_embauche, salaire, id_secteur) VALUES
(7256, 'daniel', 'chevel', 'm', 'informatique', '2010-07-05', 1700, 10),
(7369, 'julien', 'cottet', 'm', 'secretariat', '2007-01-18', 1170, 10),
(7499, 'fabrice', 'grand', 'm', 'comptabilite', '2003-02-20', 1600, 10),
(7521, 'elodie', 'fellier', 'f', 'secretariat', '2002-02-22', 1250, 10),
(7566, 'stephanie', 'lafaye', 'f', 'assistant manager', '1998-04-02', 1775, 10),
(7654, 'damien', 'durand', 'm', 'commercial', '2005-09-28', 1250, 30),
(7698, 'thomas', 'winter', 'm', 'commercial', '1998-05-03', 2550, 20),
(7782, 'laura', 'blanchet', 'f', 'direction', '1998-06-09', 3050, 10),
(7788, 'jean-pierre', 'laborde', 'm', 'direction', '1997-12-09', 5000, 10),
(7839, 'thierry', 'desprez', 'm', 'standardiste', '2009-11-17', 1100, 10),
(7844, 'emilie', 'sennard', 'f', 'commercial', '1999-09-11', 1800, 40),
(7845, 'celine', 'perrin', 'f', 'commercial', '2006-09-10', 1500, 10),
(7846, 'melanie', 'collier', 'f', 'commercial', '2000-09-08', 1900, 30),
(7847, 'chloe', 'dubar', 'f', 'commercial', '2001-09-05', 2100, 30),
(7848, 'guillaume', 'miller', 'm', 'commercial', '2006-07-02', 1700, 20),
(7876, 'nathalie', 'martin', 'f', 'juridique', '2012-01-12', 3200, 10),
(7900, 'benoit', 'lagarde', 'm', 'chef de projet', '1999-01-03', 2050, 10),
(7902, 'mathieu', 'vignal', 'm', 'informatique', '2008-12-03', 1800, 10),
(7934, 'amandine', 'thoyer', 'f', 'charge de communication', '2010-01-23', 1500, 40);