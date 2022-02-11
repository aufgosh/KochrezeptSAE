
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema rezept
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema rezept
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `rezept` DEFAULT CHARACTER SET utf8 ;
USE `rezept` ;

-- -----------------------------------------------------
-- Table `rezept`.`Zutaten`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rezept`.`Zutaten` (
  `idZutaten` INT NOT NULL,
  `Name` VARCHAR(45) NULL,
  `Menge` INT NULL,
  PRIMARY KEY (`idZutaten`));



-- -----------------------------------------------------
-- Table `rezept`.`Gericht`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rezept`.`Gericht` (
  `GerichtID` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(45) NULL,
  `Zubereitungsanleitung` VARCHAR(45) NULL,
  `Bild` VARCHAR(45) NULL,
  `Anzahl Personen` VARCHAR(45) NULL,
  `Zutaten_idZutaten` INT NOT NULL,
  PRIMARY KEY (`GerichtID`, `Zutaten_idZutaten`),
    FOREIGN KEY (`Zutaten_idZutaten`) REFERENCES `Rezept`.`Zutaten` (`idZutaten`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `rezept`.`Nutzer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rezept`.`Nutzer` (
  `NutzerID` INT NOT NULL AUTO_INCREMENT Primary key,
  `UserName` VARCHAR(45) NULL,
  `Passwd` VARCHAR(255) NULL
    );
INSERT INTO Nutzer
	(`NutzerID`, `UserName`, `Passwd`)
VALUES
	(1, "Lehrer", "d3f174c74ac93dcb59c40655c475db64690fdefb09e94a9cdf463f76517371bf");


-- -----------------------------------------------------
-- Table `rezept`.`Kategorie`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rezept`.`Kategorie` (
  `idKategorie` INT NOT NULL AUTO_INCREMENT,
  `Hauptspeisen` VARCHAR(45) NULL,
  `Nachtisch` VARCHAR(45) NULL,
  `Backen` VARCHAR(45) NULL,
  `Gericht_GerichtID` INT NOT NULL,
  PRIMARY KEY (`idKategorie`, `Gericht_GerichtID`),
    FOREIGN KEY (`Gericht_GerichtID`)
    REFERENCES `Rezept`.`Gericht` (`GerichtID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;