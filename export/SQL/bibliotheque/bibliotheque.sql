CREATE TABLE abonne (
  id_abonne int(4) NOT NULL auto_increment,
  prenom varchar(15) DEFAULT NULL,
  PRIMARY KEY (id_abonne)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO abonne (id_abonne, prenom) VALUES
(1, 'Guillaume'),
(2, 'Benoit'),
(3, 'Chloe'),
(4, 'Laura');


CREATE TABLE emprunt (
  id_emprunt int(3) NOT NULL auto_increment,
  id_livre int(4) default NULL,
  id_abonne int(4) default NULL,
  date_sortie date default NULL,
  date_rendu date default NULL,
  PRIMARY KEY  (id_emprunt)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

INSERT INTO emprunt (id_emprunt, id_livre, id_abonne, date_sortie, date_rendu) VALUES
(1, 100, 1, '2011-12-17', '2011-12-18'),
(2, 101, 2, '2011-12-18', '2011-12-20'),
(3, 100, 3, '2011-12-19', '2011-12-22'),
(4, 103, 4, '2011-12-19', '2011-12-22'),
(5, 104, 1, '2011-12-19', '2011-12-28'),
(6, 105, 2, '2012-03-20', '2012-03-26'),
(7, 105, 3, '2013-06-13', NULL),
(8, 100, 2, '2013-06-15', NULL);



CREATE TABLE livre (
  id_livre int(4) NOT NULL auto_increment,
  auteur varchar(25) DEFAULT NULL,
  titre varchar(30) DEFAULT NULL,
  PRIMARY KEY (id_livre)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO livre (id_livre, auteur, titre) VALUES
(100, 'GUY DE MAUPASSANT', 'Une vie'),
(101, 'GUY DE MAUPASSANT', 'Bel-Ami '),
(102, 'HONORE DE BALZAC', 'Le père Goriot'),
(103, 'ALPHONSE DAUDET', 'Le Petit chose'),
(104, 'ALEXANDRE DUMAS', 'La Reine Margot'),
(105, 'ALEXANDRE DUMAS', 'Les Trois Mousquetaires');