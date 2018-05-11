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
  `user_id` INT NOT NULL,
  FOREIGN KEY `company_user_key` (`user_id`) REFERENCES `users`(`id`))
ENGINE = InnoDB;

DROP TABLE IF EXISTS `industry` ;

CREATE TABLE IF NOT EXISTS `industry` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nombre` VARCHAR(45) NULL,
  `description` VARCHAR(45) NULL,
  `user_id` INT NOT NULL,
  FOREIGN KEY `industry_user_key` (`user_id`) REFERENCES `users`(`id`))
ENGINE = InnoDB;

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
  FOREIGN KEY `industry_key` (`industry_id`) REFERENCES `industry`(`id`),
  FOREIGN KEY `type_key` (`type_id`) REFERENCES `type`(`id`))
ENGINE = InnoDB;

DROP TABLE IF EXISTS `requisites` ;

CREATE TABLE IF NOT EXISTS `requisites` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nombre` VARCHAR(45) NULL,
  `description` VARCHAR(45) NULL,
  `risks_id` INT NOT NULL,
  FOREIGN KEY `risks_key` (`risks_id`) REFERENCES `risks`(`id`))
ENGINE = InnoDB;

DROP TABLE IF EXISTS `companys_requisites` ;

/* Exam */
CREATE TABLE IF NOT EXISTS `companys_requisites` (
  `companys_id` INT NOT NULL,
  `requisites_id` INT NOT NULL,
  `resultados` VARCHAR(500) NULL,
  PRIMARY KEY (`companys_id`, `requisites_id`),
  FOREIGN KEY `companys_key` (`companys_id`) REFERENCES `companys`(`id`),
  FOREIGN KEY `requisites_key` (`requisites_id`) REFERENCES `requisites`(`id`))
ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
