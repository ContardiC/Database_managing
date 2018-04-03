CREATE TABLE `utenti`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(60) NOT NULL ,
  `password` VARCHAR(20) NOT NULL ,
  `conta_visite` INT NOT NULL DEFAULT '0' ,
  PRIMARY KEY (`id`)
);
