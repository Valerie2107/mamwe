-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema mamwetest
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mamwetest
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mamwetest` DEFAULT CHARACTER SET latin1 ;
USE `mamwetest` ;

-- -----------------------------------------------------
-- Table `mamwetest`.`mw_article`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mamwetest`.`mw_article` (
  `idmw_article` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `mw_title_art` VARCHAR(100) NOT NULL,
  `mw_content_art` VARCHAR(5000) NOT NULL,
  `mw_visibilty_art` TINYINT ZEROFILL NOT NULL DEFAULT 1 COMMENT '1 = visble 0 = invisble ',
  `mw_date_art` DATE NOT NULL,
  PRIMARY KEY (`idmw_article`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mamwetest`.`mw_livredor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mamwetest`.`mw_livredor` (
  `idmw_livredor` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `mw_name_livredor` VARCHAR(100) NOT NULL,
  `mw_mail_livredor` VARCHAR(100) NOT NULL DEFAULT '1' COMMENT '1 = visible 0 = invisbile ',
  `mw_message_livredor` VARCHAR(5000) NOT NULL,
  `mw_date_livredor` DATE NOT NULL,
  `mw_visibilty_livredor` VARCHAR(45) NOT NULL DEFAULT '1' COMMENT '1 = visible 0 = invislbe 2 = userban',
  PRIMARY KEY (`idmw_livredor`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mamwetest`.`mw_ressources`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mamwetest`.`mw_ressources` (
  `mw_ID_ressources` INT NOT NULL,
  `mw_title_ressources` VARCHAR(100) NOT NULL,
  `mw_content_ressources` VARCHAR(5000) NOT NULL,
  `mw_url_ressources` VARCHAR(450) NOT NULL,
  `mw_date_ressources` DATE NOT NULL,
  PRIMARY KEY (`mw_ID_ressources`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mamwetest`.`mw_divers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mamwetest`.`mw_divers` (
  `idmw_divers` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `mw_ressources_divers` VARCHAR(500) NOT NULL,
  `mw_livredor_divers` VARCHAR(500) NOT NULL,
  `mw_livredor_idmw_livredor` INT UNSIGNED NOT NULL,
  `mw_ressources_mw_ID_ressources` INT NOT NULL,
  PRIMARY KEY (`idmw_divers`),
  INDEX `fk_mw_divers_mw_livredor1_idx` (`mw_livredor_idmw_livredor` ASC) VISIBLE,
  INDEX `fk_mw_divers_mw_ressources1_idx` (`mw_ressources_mw_ID_ressources` ASC) VISIBLE,
  CONSTRAINT `fk_mw_divers_mw_livredor1`
    FOREIGN KEY (`mw_livredor_idmw_livredor`)
    REFERENCES `mamwetest`.`mw_livredor` (`idmw_livredor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_mw_divers_mw_ressources1`
    FOREIGN KEY (`mw_ressources_mw_ID_ressources`)
    REFERENCES `mamwetest`.`mw_ressources` (`mw_ID_ressources`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mamwetest`.`mw_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mamwetest`.`mw_info` (
  `idmw_info` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `mw_content_info` VARCHAR(5000) NOT NULL,
  `mw_date_info` DATE NOT NULL,
  PRIMARY KEY (`idmw_info`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mamwetest`.`mw_contact`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mamwetest`.`mw_contact` (
  `idmw_contact` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `mw_name_contact` VARCHAR(100) NOT NULL,
  `mw_firstname_contact` VARCHAR(100) NOT NULL,
  `mw_info_idmw_info` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idmw_contact`, `mw_info_idmw_info`),
  INDEX `fk_mw_contact_mw_info1_idx` (`mw_info_idmw_info` ASC) VISIBLE,
  CONSTRAINT `fk_mw_contact_mw_info1`
    FOREIGN KEY (`mw_info_idmw_info`)
    REFERENCES `mamwetest`.`mw_info` (`idmw_info`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mamwetest`.`mw_section`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mamwetest`.`mw_section` (
  `idmw_section` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `mw_title_sect` VARCHAR(100) NOT NULL,
  `mw_content_sect` VARCHAR(800) NULL,
  `mw_visibilty_sect` TINYINT UNSIGNED NULL DEFAULT 1 COMMENT '1 = visible 0 = invisible',
  `mw_intro_sect` VARCHAR(5000) NOT NULL,
  `mw_article_idmw_article` INT UNSIGNED NOT NULL,
  `mw_ressources_mw_ID_ressources` INT NOT NULL,
  `mw_divers_idmw_divers` INT UNSIGNED NOT NULL,
  `mw_divers_mw_livredor_idmw_livredor` INT UNSIGNED NOT NULL,
  `mw_divers_mw_ressources_mw_ID_ressources` INT NOT NULL,
  `mw_contact_idmw_contact` INT UNSIGNED NULL,
  `mw_contact_mw_info_idmw_info` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idmw_section`),
  UNIQUE INDEX `mw_title_sect_UNIQUE` (`mw_title_sect` ASC) VISIBLE,
  INDEX `fk_mw_section_mw_article_idx` (`mw_article_idmw_article` ASC) VISIBLE,
  INDEX `fk_mw_section_mw_divers1_idx` (`mw_divers_idmw_divers` ASC, `mw_divers_mw_livredor_idmw_livredor` ASC, `mw_divers_mw_ressources_mw_ID_ressources` ASC) VISIBLE,
  INDEX `fk_mw_section_mw_contact1_idx` (`mw_contact_idmw_contact` ASC, `mw_contact_mw_info_idmw_info` ASC) VISIBLE,
  CONSTRAINT `fk_mw_section_mw_article`
    FOREIGN KEY (`mw_article_idmw_article`)
    REFERENCES `mamwetest`.`mw_article` (`idmw_article`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_mw_section_mw_divers1`
    FOREIGN KEY (`mw_divers_idmw_divers` , `mw_divers_mw_livredor_idmw_livredor` , `mw_divers_mw_ressources_mw_ID_ressources`)
    REFERENCES `mamwetest`.`mw_divers` (`idmw_divers` , `mw_livredor_idmw_livredor` , `mw_ressources_mw_ID_ressources`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_mw_section_mw_contact1`
    FOREIGN KEY (`mw_contact_idmw_contact` , `mw_contact_mw_info_idmw_info`)
    REFERENCES `mamwetest`.`mw_contact` (`idmw_contact` , `mw_info_idmw_info`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mamwetest`.`mw_picture`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mamwetest`.`mw_picture` (
  `idmw_picture` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `mw_title_photos` VARCHAR(100) NULL,
  `mw_url_photos` VARCHAR(400) NOT NULL,
  `mw_taille_photos` TINYINT ZEROFILL NOT NULL DEFAULT 1 COMMENT '1 = visible 0 = invisble ',
  `mw_posotion_photos` TINYINT ZEROFILL NOT NULL DEFAULT 1 COMMENT '1 = visible 0 = invisible\n1 droite et 0 gauche ',
  PRIMARY KEY (`idmw_picture`),
  UNIQUE INDEX `mw_title_picture_UNIQUE` (`mw_title_photos` ASC) VISIBLE,
  UNIQUE INDEX `mw_url_picture_UNIQUE` (`mw_url_photos` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mamwetest`.`mw_name_patient`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mamwetest`.`mw_name_patient` (
  `idmw_name_patient` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `mw_name` VARCHAR(100) NOT NULL,
  `mw_name_firstname` VARCHAR(100) NOT NULL,
  `mw_name_dateofbirth` DATE NOT NULL,
  `mw_name_mail` VARCHAR(45) NOT NULL,
  `mw_name_phone` INT NOT NULL,
  PRIMARY KEY (`idmw_name_patient`),
  UNIQUE INDEX `mw_nom_mail_UNIQUE` (`mw_name_mail` ASC) VISIBLE,
  UNIQUE INDEX `mw_nom_gsm_UNIQUE` (`mw_name_phone` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mamwetest`.`mw_user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mamwetest`.`mw_user` (
  `idmw_user` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `mw_login_userr` VARCHAR(80) NOT NULL,
  `mw_mail_user` VARCHAR(200) NOT NULL,
  `mw_pwd_user` VARCHAR(255) NOT NULL,
  `mw_nom_patient_idmw_nom_patient` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idmw_user`, `mw_nom_patient_idmw_nom_patient`),
  UNIQUE INDEX `mw_login_user_UNIQUE` (`mw_login_userr` ASC) VISIBLE,
  UNIQUE INDEX `mw_mail_user_UNIQUE` (`mw_mail_user` ASC) VISIBLE,
  INDEX `fk_mw_user_mw_nom_patient1_idx` (`mw_nom_patient_idmw_nom_patient` ASC) VISIBLE,
  CONSTRAINT `fk_mw_user_mw_nom_patient1`
    FOREIGN KEY (`mw_nom_patient_idmw_nom_patient`)
    REFERENCES `mamwetest`.`mw_name_patient` (`idmw_name_patient`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mamwetest`.`mw_homepage`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mamwetest`.`mw_homepage` (
  `idmw_home` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `mw_content_home` VARCHAR(5000) NOT NULL,
  `mw_date_home` DATE NOT NULL,
  PRIMARY KEY (`idmw_home`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mamwetest`.`mw_article_has_mw_photos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mamwetest`.`mw_article_has_mw_photos` (
  `mw_article_idmw_article` INT UNSIGNED NOT NULL,
  `mw_picture_idmw_picture` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`mw_article_idmw_article`, `mw_picture_idmw_picture`),
  INDEX `fk_mw_article_has_mw_picture_mw_picture1_idx` (`mw_picture_idmw_picture` ASC) VISIBLE,
  INDEX `fk_mw_article_has_mw_picture_mw_article1_idx` (`mw_article_idmw_article` ASC) VISIBLE,
  CONSTRAINT `fk_mw_article_has_mw_picture_mw_article1`
    FOREIGN KEY (`mw_article_idmw_article`)
    REFERENCES `mamwetest`.`mw_article` (`idmw_article`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_mw_article_has_mw_picture_mw_picture1`
    FOREIGN KEY (`mw_picture_idmw_picture`)
    REFERENCES `mamwetest`.`mw_picture` (`idmw_picture`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
