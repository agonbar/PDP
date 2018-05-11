SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `iu` ;
CREATE SCHEMA IF NOT EXISTS `iu` DEFAULT CHARACTER SET utf8 ;
USE `iu` ;

DROP TABLE IF EXISTS `users` ;

CREATE TABLE IF NOT EXISTS `users` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `email` VARCHAR(45) NOT NULL,
  `nombre` VARCHAR(45) NULL,
  `apellidos` VARCHAR(45) NULL,
  `createdAt` DATETIME NULL,
  `updatedAt` DATETIME NULL,
  `enabled` TINYINT NULL,
  `asesor` TINYINT NULL)
ENGINE = InnoDB;


DROP TABLE IF EXISTS `companys` ;

CREATE TABLE IF NOT EXISTS `companys` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `cif` INT NOT NULL,
  `nombre` VARCHAR(45) NULL,
  `description` VARCHAR(45) NULL,
  `companyscol` VARCHAR(45) NULL,
  `user_id` VARCHAR(45) NOT NULL,
  CONSTRAINT `fk_companys_users`
    FOREIGN KEY (`user_id`)
    REFERENCES `users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_companys_users_idx` ON `companys` (`user_id` ASC);

DROP TABLE IF EXISTS `industry` ;

CREATE TABLE IF NOT EXISTS `industry` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nombre` VARCHAR(45) NULL,
  `description` VARCHAR(45) NULL,
  `user_id` VARCHAR(45) NOT NULL,
  CONSTRAINT `fk_industry_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_industry_users1_idx` ON `industry` (`user_id` ASC);


DROP TABLE IF EXISTS `type` ;

CREATE TABLE IF NOT EXISTS `type` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `description` VARCHAR(45) NULL)
ENGINE = InnoDB;


DROP TABLE IF EXISTS `risks` ;

CREATE TABLE IF NOT EXISTS `risks` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nombre` VARCHAR(45) NULL,
  `description` VARCHAR(45) NULL,
  `Criticalidad` TINYINT(1) NULL,
  `industry_id` INT NOT NULL,
  `type_id` INT NOT NULL,
  CONSTRAINT `fk_risks_industry1`
    FOREIGN KEY (`industry_id`)
    REFERENCES `industry` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_risks_type1`
    FOREIGN KEY (`type_id`)
    REFERENCES `type` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_risks_industry1_idx` ON `risks` (`industry_id` ASC);

CREATE INDEX `fk_risks_type1_idx` ON `risks` (`type_id` ASC);


DROP TABLE IF EXISTS `requisites` ;

CREATE TABLE IF NOT EXISTS `requisites` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nombre` VARCHAR(45) NULL,
  `description` VARCHAR(45) NULL,
  `risks_id` INT NOT NULL,
  CONSTRAINT `fk_requisites_risks1`
    FOREIGN KEY (`risks_id`)
    REFERENCES `risks` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_requisites_risks1_idx` ON `requisites` (`risks_id` ASC);


DROP TABLE IF EXISTS `exam` ;

CREATE TABLE IF NOT EXISTS `exam` (
  `companys_id` INT NOT NULL,
  `requisites_id` INT NOT NULL,
  `resultados` VARCHAR(500) NULL,
  PRIMARY KEY (`companys_id`, `requisites_id`),
  CONSTRAINT `fk_companys_has_requisites_companys1`
    FOREIGN KEY (`companys_id`)
    REFERENCES `companys` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_companys_has_requisites_requisites1`
    FOREIGN KEY (`requisites_id`)
    REFERENCES `requisites` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_companys_has_requisites_requisites1_idx` ON `exam` (`requisites_id` ASC);

CREATE INDEX `fk_companys_has_requisites_companys1_idx` ON `exam` (`companys_id` ASC);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
