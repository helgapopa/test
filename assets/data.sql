
CREATE DATABASE biblioteca;
use biblioteca;
CREATE TABLE `biblioteca`.`carti` ( `id` INT NOT NULL AUTO_INCREMENT , `titlu` VARCHAR(255) NOT NULL , `autor` VARCHAR(255) NOT NULL , `editura` VARCHAR(255) NOT NULL , `tip_carte` VARCHAR(255) NOT NULL , `an` CHAR(4) NOT NULL , `pagini` INT(4) NOT NULL , `pret` DECIMAL(10,2) NOT NULL , `poza` VARCHAR(200) NOT NULL , `ts` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;

INSERT INTO `carti` (`id`, `titlu`, `autor`, `editura`, `tip_carte`, `an`, `pagini`, `pret`, `poza`, `ts`) VALUES ('1', 'Ion', 'Liviu Rebreanu', 'All', 'Roman', '1920', '245', '50', '', CURRENT_TIMESTAMP);
