-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema db_hd
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema db_hd
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_hd` DEFAULT CHARACTER SET utf8 ;
USE `db_hd` ;

-- -----------------------------------------------------
-- Table `db_hd`.`patients`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_hd`.`patients` (
  `id` INT(45) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `dob` VARCHAR(45) NULL,
  `blood_type` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_hd`.`machines`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_hd`.`machines` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nama` VARCHAR(45) NULL,
  `type` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_hd`.`reports`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_hd`.`reports` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `patient_id` INT(45) NULL,
  `date_on` VARCHAR(45) NULL,
  `time_on` VARCHAR(45) NULL,
  `date_off` VARCHAR(45) NULL,
  `machine_id` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `machines_reports_patients_idx` (`patient_id` ASC) VISIBLE,
  INDEX `machines_reports_idx` (`machine_id` ASC) VISIBLE,
  CONSTRAINT `reports_patients`
    FOREIGN KEY (`patient_id`)
    REFERENCES `db_hd`.`patients` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `machines_reports`
    FOREIGN KEY (`machine_id`)
    REFERENCES `db_hd`.`machines` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_hd`.`parameters`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_hd`.`parameters` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `arterial_press` VARCHAR(45) NULL,
  `venous_press` VARCHAR(45) NULL,
  `dyalizate_press` VARCHAR(45) NULL,
  `temperature` VARCHAR(45) NULL,
  `conductivity` VARCHAR(45) NULL,
  `sodium` VARCHAR(45) NULL,
  `bicarbonate` VARCHAR(45) NULL,
  `uf_remove` VARCHAR(45) NULL,
  `uf_objective` VARCHAR(45) NULL,
  `uf_rate` VARCHAR(45) NULL,
  `time` VARCHAR(45) NULL,
  `fluid` VARCHAR(45) NULL,
  `warning` VARCHAR(45) NULL,
  `machine_report_id` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `machine_reports_parameters_idx` (`machine_report_id` ASC) VISIBLE,
  CONSTRAINT `machine_reports_parameters`
    FOREIGN KEY (`machine_report_id`)
    REFERENCES `db_hd`.`reports` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_hd`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_hd`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nama` VARCHAR(45) NULL,
  `role` VARCHAR(45) NULL,
  `password` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
