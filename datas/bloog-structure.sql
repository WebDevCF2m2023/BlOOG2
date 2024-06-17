-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema bloog
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `bloog` ;

-- -----------------------------------------------------
-- Schema bloog
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bloog` DEFAULT CHARACTER SET utf8mb4 ;
USE `bloog` ;

-- -----------------------------------------------------
-- Table `bloog`.`permission`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bloog`.`permission` ;

CREATE TABLE IF NOT EXISTS `bloog`.`permission` (
  `persmission_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `permission_name` VARCHAR(45) NOT NULL,
  `permission_description` VARCHAR(300) NULL,
  PRIMARY KEY (`persmission_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bloog`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bloog`.`user` ;

CREATE TABLE IF NOT EXISTS `bloog`.`user` (
  `user_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_login` VARCHAR(60) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_bin' NOT NULL COMMENT 'case sensitive',
  `user_password` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_bin' NOT NULL COMMENT 'case sensitive',
  `user_full_name` VARCHAR(160) NULL,
  `user_mail` VARCHAR(180) NOT NULL,
  `user_status` TINYINT UNSIGNED NOT NULL DEFAULT 0 COMMENT '0 pas actif\n1 actif\n2 banni',
  `user_secret_key` VARCHAR(80) NOT NULL,
  `permission_persmission_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `fk_user_permission`
    FOREIGN KEY (`permission_persmission_id`)
    REFERENCES `bloog`.`permission` (`persmission_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE UNIQUE INDEX `user_login_UNIQUE` ON `bloog`.`user` (`user_login` ASC) VISIBLE;

CREATE UNIQUE INDEX `user_mail_UNIQUE` ON `bloog`.`user` (`user_mail` ASC) VISIBLE;

CREATE INDEX `fk_user_permission_idx` ON `bloog`.`user` (`permission_persmission_id` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `bloog`.`article`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bloog`.`article` ;

CREATE TABLE IF NOT EXISTS `bloog`.`article` (
  `article_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `article_title` VARCHAR(160) NOT NULL,
  `article_slug` VARCHAR(160) NOT NULL,
  `article_text` TEXT NOT NULL,
  `article_date_create` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `article_date_update` TIMESTAMP NULL,
  `article_date_publish` TIMESTAMP NULL,
  `article_is_published` TINYINT UNSIGNED NOT NULL DEFAULT 0,
  `user_user_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`article_id`),
  CONSTRAINT `fk_article_user1`
    FOREIGN KEY (`user_user_id`)
    REFERENCES `bloog`.`user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE UNIQUE INDEX `article_slug_UNIQUE` ON `bloog`.`article` (`article_slug` ASC) VISIBLE;

CREATE INDEX `fk_article_user1_idx` ON `bloog`.`article` (`user_user_id` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `bloog`.`category`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bloog`.`category` ;

CREATE TABLE IF NOT EXISTS `bloog`.`category` (
  `category_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name` VARCHAR(100) NOT NULL,
  `category_slug` VARCHAR(100) NOT NULL,
  `category_description` VARCHAR(300) NULL,
  `category_parent` INT UNSIGNED NULL DEFAULT 0,
  PRIMARY KEY (`category_id`))
ENGINE = InnoDB;

CREATE UNIQUE INDEX `category_slug_UNIQUE` ON `bloog`.`category` (`category_slug` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `bloog`.`article_has_category`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bloog`.`article_has_category` ;

CREATE TABLE IF NOT EXISTS `bloog`.`article_has_category` (
  `article_article_id` INT UNSIGNED NOT NULL,
  `category_category_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`article_article_id`, `category_category_id`),
  CONSTRAINT `fk_article_has_category_article1`
    FOREIGN KEY (`article_article_id`)
    REFERENCES `bloog`.`article` (`article_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_article_has_category_category1`
    FOREIGN KEY (`category_category_id`)
    REFERENCES `bloog`.`category` (`category_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_article_has_category_category1_idx` ON `bloog`.`article_has_category` (`category_category_id` ASC) VISIBLE;

CREATE INDEX `fk_article_has_category_article1_idx` ON `bloog`.`article_has_category` (`article_article_id` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `bloog`.`comment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bloog`.`comment` ;

CREATE TABLE IF NOT EXISTS `bloog`.`comment` (
  `comment_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `comment_text` VARCHAR(500) NOT NULL,
  `comment_parent` INT UNSIGNED NULL DEFAULT 0,
  `comment_date_create` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `comment_date_update` TIMESTAMP NULL,
  `comment_date_publish` TIMESTAMP NULL,
  `comment_is_published` TINYINT UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (`comment_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bloog`.`comment_has_article`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bloog`.`comment_has_article` ;

CREATE TABLE IF NOT EXISTS `bloog`.`comment_has_article` (
  `comment_comment_id` INT UNSIGNED NOT NULL,
  `article_article_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`comment_comment_id`, `article_article_id`),
  CONSTRAINT `fk_comment_has_article_comment1`
    FOREIGN KEY (`comment_comment_id`)
    REFERENCES `bloog`.`comment` (`comment_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_comment_has_article_article1`
    FOREIGN KEY (`article_article_id`)
    REFERENCES `bloog`.`article` (`article_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_comment_has_article_article1_idx` ON `bloog`.`comment_has_article` (`article_article_id` ASC) VISIBLE;

CREATE INDEX `fk_comment_has_article_comment1_idx` ON `bloog`.`comment_has_article` (`comment_comment_id` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `bloog`.`comment_has_user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bloog`.`comment_has_user` ;

CREATE TABLE IF NOT EXISTS `bloog`.`comment_has_user` (
  `comment_comment_id` INT UNSIGNED NOT NULL,
  `user_user_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`comment_comment_id`, `user_user_id`),
  CONSTRAINT `fk_comment_has_user_comment1`
    FOREIGN KEY (`comment_comment_id`)
    REFERENCES `bloog`.`comment` (`comment_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_comment_has_user_user1`
    FOREIGN KEY (`user_user_id`)
    REFERENCES `bloog`.`user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_comment_has_user_user1_idx` ON `bloog`.`comment_has_user` (`user_user_id` ASC) VISIBLE;

CREATE INDEX `fk_comment_has_user_comment1_idx` ON `bloog`.`comment_has_user` (`comment_comment_id` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `bloog`.`image`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bloog`.`image` ;

CREATE TABLE IF NOT EXISTS `bloog`.`image` (
  `image_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `image_url` VARCHAR(60) NOT NULL,
  `image_description` VARCHAR(150) NULL,
  `article_article_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`image_id`),
  CONSTRAINT `fk_image_article1`
    FOREIGN KEY (`article_article_id`)
    REFERENCES `bloog`.`article` (`article_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_image_article1_idx` ON `bloog`.`image` (`article_article_id` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `bloog`.`tag`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bloog`.`tag` ;

CREATE TABLE IF NOT EXISTS `bloog`.`tag` (
  `tag_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `tag_slug` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`tag_id`))
ENGINE = InnoDB;

CREATE UNIQUE INDEX `tag_slug_UNIQUE` ON `bloog`.`tag` (`tag_slug` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `bloog`.`tag_has_article`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bloog`.`tag_has_article` ;

CREATE TABLE IF NOT EXISTS `bloog`.`tag_has_article` (
  `tag_tag_id` INT UNSIGNED NOT NULL,
  `article_article_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`tag_tag_id`, `article_article_id`),
  CONSTRAINT `fk_tag_has_article_tag1`
    FOREIGN KEY (`tag_tag_id`)
    REFERENCES `bloog`.`tag` (`tag_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tag_has_article_article1`
    FOREIGN KEY (`article_article_id`)
    REFERENCES `bloog`.`article` (`article_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_tag_has_article_article1_idx` ON `bloog`.`tag_has_article` (`article_article_id` ASC) VISIBLE;

CREATE INDEX `fk_tag_has_article_tag1_idx` ON `bloog`.`tag_has_article` (`tag_tag_id` ASC) VISIBLE;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
