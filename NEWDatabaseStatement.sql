SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
 
-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema rezept
-- -----------------------------------------------------
 
-- -----------------------------------------------------
-- Schema rezept
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `rezept` DEFAULT CHARACTER SET utf8 ;
USE `rezept` ;

-- -----------------------------------------------------
-- Table `rezept`.`nutzer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rezept`.`nutzer` (
  `NutzerID` INT(11) NOT NULL AUTO_INCREMENT,
  `User` VARCHAR(255) NULL DEFAULT NULL,
  `Password` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`NutzerID`))
 
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;
INSERT INTO Nutzer
	(`NutzerID`, `User`, `Password`)
VALUES
	(1, "Lehrer", "d3f174c74ac93dcb59c40655c475db64690fdefb09e94a9cdf463f76517371bf");
 
-- -----------------------------------------------------
-- Table `rezept`.`gericht`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rezept`.`gericht` (
  `GerichtID` INT(11) NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(255) NULL DEFAULT NULL,
  `Zubereitungsanleitung` LONGTEXT NULL DEFAULT NULL,
  `Beschreibung` VARCHAR(255) NULL DEFAULT NULL,
  `Bild` LONGBLOB NULL DEFAULT NULL,
  `Zutaten` LONGTEXT NULL DEFAULT NULL,
  `kategorie_idKategorie` INT(11) NOT NULL,
  `nutzer_NutzerID` INT(11) NOT NULL,
  PRIMARY KEY (`GerichtID`),
    FOREIGN KEY (`kategorie_idKategorie`)
    REFERENCES `rezept`.`kategorie` (`idKategorie`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_gericht_nutzer1`
    FOREIGN KEY (`nutzer_NutzerID`)
    REFERENCES `rezept`.`nutzer` (`NutzerID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
 
DEFAULT CHARACTER SET = utf8;
INSERT INTO gericht
  (`GerichtID`,`Name`,`Zubereitungsanleitung`,`Beschreibung`,`Bild`,`Zutaten`,`kategorie_idKategorie`,`nutzer_NutzerID`)
  VALUES
    (1,"Lasagne","Machen dies Machen das","Beschreibung Gericht","Bild","Zutaten oder so",1,1 );

 
SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;