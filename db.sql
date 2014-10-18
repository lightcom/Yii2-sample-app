-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema filehosting
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `filehosting` ;

-- -----------------------------------------------------
-- Schema filehosting
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `filehosting` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `filehosting` ;

-- -----------------------------------------------------
-- Table `filehosting`.`sections`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `filehosting`.`sections` ;

CREATE TABLE IF NOT EXISTS `filehosting`.`sections` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(200) NOT NULL COMMENT 'Наименование',
  `parent_id` INT NOT NULL COMMENT 'ID родителя',
  `lvl` INT NOT NULL COMMENT 'Уровень',
  `hierarchy` VARCHAR(45) NOT NULL COMMENT 'Иерархия',
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `filehosting`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `filehosting`.`users` ;

CREATE TABLE IF NOT EXISTS `filehosting`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(45) NOT NULL COMMENT 'Email',
  `password` VARCHAR(15) NULL COMMENT 'Пароль',
  `name` VARCHAR(150) NOT NULL COMMENT 'ФИО',
  `activated` TINYINT(1) NOT NULL COMMENT 'Активирован',
  `admin` TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `filehosting`.`files`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `filehosting`.`files` ;

CREATE TABLE IF NOT EXISTS `filehosting`.`files` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(200) NOT NULL COMMENT 'Имя файла',
  `shared` TINYINT(1) NOT NULL COMMENT 'Доступ',
  `mimetype` VARCHAR(45) NOT NULL COMMENT 'Тип',
  `size` VARCHAR(100) NOT NULL COMMENT 'Размер',
  `systime` DATETIME NOT NULL COMMENT 'Системное время',
  `description` VARCHAR(400) NULL COMMENT 'Описание',
  `users_id` INT NOT NULL COMMENT 'Пользователь',
  `sections_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tbl_files_tbl_users1_idx` (`users_id` ASC),
  INDEX `fk_files_sections1_idx` (`sections_id` ASC),
  CONSTRAINT `fk_tbl_files_tbl_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `filehosting`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_files_sections1`
    FOREIGN KEY (`sections_id`)
    REFERENCES `filehosting`.`sections` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
