CREATE TABLE IF NOT EXISTS `software-testing`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`));

INSERT INTO `users` (`username`, `password`) VALUES ('admin', 'flag{WOW_you_know_how_to_use_sqlmap!}');