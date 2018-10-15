CREATE TABLE movies (
  id_film varchar NOT NULL AUTO_INCREMENT,
  title varchar DEFAULT NOT NULL,
  actors varchar DEFAULT NULL,
  directors varchar DEFAULT NOT NULL,
  producer varchar DEFAULT NULL,
  year_of_prod year DEFAULT NULL,
  langage varchar DEFAULT NULL,
  category enum DEFAULT NOT NULL,
  storyline text,
  video varchar 
  PRIMARY KEY (id_film)
) ENGINE=InnoDB ;