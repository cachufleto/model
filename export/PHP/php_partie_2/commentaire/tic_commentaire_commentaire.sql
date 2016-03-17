CREATE TABLE commentaire (
  id_commentaire int(11) NOT NULL auto_increment,
  pseudo varchar(25) NOT NULL,
  message text NOT NULL,
  date datetime NOT NULL,
  PRIMARY KEY  (id_commentaire)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ;

