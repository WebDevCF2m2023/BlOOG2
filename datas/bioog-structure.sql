-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema bioog
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `bioog` ;

-- -----------------------------------------------------
-- Schema bioog
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bioog` DEFAULT CHARACTER SET utf8mb4 ;
USE `bioog` ;

-- -----------------------------------------------------
-- Table `bioog`.`article`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bioog`.`article` ;

CREATE TABLE IF NOT EXISTS `bioog`.`article` (
  `article_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `article_name` VARCHAR(160) NOT NULL,
  `article_slug` VARCHAR(160) NOT NULL,
  `article_text` TEXT NOT NULL,
  `article_date_create` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `article_date_update` TIMESTAMP NULL,
  `article_date_publish` TIMESTAMP NULL,
  `article_is_published` TINYINT UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (`article_id`))
ENGINE = InnoDB;

CREATE UNIQUE INDEX `article_slug_UNIQUE` ON `bioog`.`article` (`article_slug` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `bioog`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bioog`.`user` ;

CREATE TABLE IF NOT EXISTS `bioog`.`user` (
  `user_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_login` VARCHAR(60) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_bin' NOT NULL COMMENT 'case sensitive',
  `user_password` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_bin' NOT NULL COMMENT 'case sensitive',
  `user_full_name` VARCHAR(160) NULL,
  `user_mail` VARCHAR(180) NOT NULL,
  `user_status` TINYINT UNSIGNED NOT NULL DEFAULT 0 COMMENT '0 pas actif\n1 actif\n2 banni',
  PRIMARY KEY (`user_id`))
ENGINE = InnoDB;

CREATE UNIQUE INDEX `user_login_UNIQUE` ON `bioog`.`user` (`user_login` ASC) VISIBLE;

CREATE UNIQUE INDEX `user_mail_UNIQUE` ON `bioog`.`user` (`user_mail` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `bioog`.`permission`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bioog`.`permission` ;

CREATE TABLE IF NOT EXISTS `bioog`.`permission` (
  `persmission_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `permission_name` VARCHAR(45) NOT NULL,
  `permission_description` VARCHAR(300) NULL,
  PRIMARY KEY (`persmission_id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
