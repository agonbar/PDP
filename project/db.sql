SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `mydb` ;
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

DROP TABLE IF EXISTS `Usuario` ;

CREATE TABLE IF NOT EXISTS `Usuario` (
  `email` VARCHAR(45) NOT NULL,
  `Nombre` VARCHAR(45) NULL,
  `Apellidos` VARCHAR(45) NULL,
  `createdAt` DATETIME NULL,
  `updatedAt` DATETIME NULL,
  `Enabled` TINYINT NULL,
  `Asesor` TINYINT NULL,
  PRIMARY KEY (`email`))
ENGINE = InnoDB;


DROP TABLE IF EXISTS `Empresa` ;

CREATE TABLE IF NOT EXISTS `Empresa` (
  `CIF` INT NOT NULL,
  `Nombre` VARCHAR(45) NULL,
  `Descripción` VARCHAR(45) NULL,
  `Empresacol` VARCHAR(45) NULL,
  `Usuario_email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`CIF`),
  CONSTRAINT `fk_Empresa_Usuario`
    FOREIGN KEY (`Usuario_email`)
    REFERENCES `Usuario` (`email`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_Empresa_Usuario_idx` ON `Empresa` (`Usuario_email` ASC);

DROP TABLE IF EXISTS `Industria` ;

CREATE TABLE IF NOT EXISTS `Industria` (
  `idIndustria` INT NOT NULL,
  `Nombre` VARCHAR(45) NULL,
  `Descripcion` VARCHAR(45) NULL,
  `Usuario_email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idIndustria`),
  CONSTRAINT `fk_Industria_Usuario1`
    FOREIGN KEY (`Usuario_email`)
    REFERENCES `Usuario` (`email`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_Industria_Usuario1_idx` ON `Industria` (`Usuario_email` ASC);


DROP TABLE IF EXISTS `Tipo Riesgo` ;

CREATE TABLE IF NOT EXISTS `Tipo Riesgo` (
  `idTipo` INT NOT NULL,
  `Descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`idTipo`))
ENGINE = InnoDB;


DROP TABLE IF EXISTS `Riesgos` ;

CREATE TABLE IF NOT EXISTS `Riesgos` (
  `idRiesgos` INT NOT NULL,
  `Nombre` VARCHAR(45) NULL,
  `Descripcion` VARCHAR(45) NULL,
  `Criticalidad` TINYINT(1) NULL,
  `Industria_idIndustria` INT NOT NULL,
  `Tipo Riesgo_idTipo` INT NOT NULL,
  PRIMARY KEY (`idRiesgos`),
  CONSTRAINT `fk_Riesgos_Industria1`
    FOREIGN KEY (`Industria_idIndustria`)
    REFERENCES `Industria` (`idIndustria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Riesgos_Tipo Riesgo1`
    FOREIGN KEY (`Tipo Riesgo_idTipo`)
    REFERENCES `Tipo Riesgo` (`idTipo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_Riesgos_Industria1_idx` ON `Riesgos` (`Industria_idIndustria` ASC);

CREATE INDEX `fk_Riesgos_Tipo Riesgo1_idx` ON `Riesgos` (`Tipo Riesgo_idTipo` ASC);


DROP TABLE IF EXISTS `Requisitos` ;

CREATE TABLE IF NOT EXISTS `Requisitos` (
  `idRequisitos` INT NOT NULL,
  `Nombre` VARCHAR(45) NULL,
  `Descripción` VARCHAR(45) NULL,
  `Riesgos_idRiesgos` INT NOT NULL,
  PRIMARY KEY (`idRequisitos`),
  CONSTRAINT `fk_Requisitos_Riesgos1`
    FOREIGN KEY (`Riesgos_idRiesgos`)
    REFERENCES `Riesgos` (`idRiesgos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_Requisitos_Riesgos1_idx` ON `Requisitos` (`Riesgos_idRiesgos` ASC);


DROP TABLE IF EXISTS `Examen requisitos` ;

CREATE TABLE IF NOT EXISTS `Examen requisitos` (
  `Empresa_CIF` INT NOT NULL,
  `Requisitos_idRequisitos` INT NOT NULL,
  `Resultados` VARCHAR(500) NULL,
  PRIMARY KEY (`Empresa_CIF`, `Requisitos_idRequisitos`),
  CONSTRAINT `fk_Empresa_has_Requisitos_Empresa1`
    FOREIGN KEY (`Empresa_CIF`)
    REFERENCES `Empresa` (`CIF`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Empresa_has_Requisitos_Requisitos1`
    FOREIGN KEY (`Requisitos_idRequisitos`)
    REFERENCES `Requisitos` (`idRequisitos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_Empresa_has_Requisitos_Requisitos1_idx` ON `Examen requisitos` (`Requisitos_idRequisitos` ASC);

CREATE INDEX `fk_Empresa_has_Requisitos_Empresa1_idx` ON `Examen requisitos` (`Empresa_CIF` ASC);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
