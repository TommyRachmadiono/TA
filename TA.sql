-- MySQL Script generated by MySQL Workbench
-- 03/04/18 13:48:17
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nama` VARCHAR(45) NULL COMMENT '',
  `username` VARCHAR(45) NULL COMMENT '',
  `password` VARCHAR(45) NULL COMMENT '',
  `role` VARCHAR(15) NULL COMMENT '',
  `jurusan` ENUM('IPA', 'IPS', 'BAHASA') NULL COMMENT '',
  `foto` VARCHAR(255) NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`matpel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`matpel` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nama_pelajaran` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`week`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`week` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nama` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`relasi_user_matpel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`relasi_user_matpel` (
  `user_id` INT NOT NULL COMMENT '',
  `matpel_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`user_id`, `matpel_id`)  COMMENT '',
  INDEX `fk_user_has_matpel_matpel1_idx` (`matpel_id` ASC)  COMMENT '',
  INDEX `fk_user_has_matpel_user_idx` (`user_id` ASC)  COMMENT '',
  CONSTRAINT `fk_user_has_matpel_user`
    FOREIGN KEY (`user_id`)
    REFERENCES `mydb`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_has_matpel_matpel1`
    FOREIGN KEY (`matpel_id`)
    REFERENCES `mydb`.`matpel` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`matpel_has_week`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`matpel_has_week` (
  `matpel_id` INT NOT NULL COMMENT '',
  `week_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`matpel_id`, `week_id`)  COMMENT '',
  INDEX `fk_matpel_has_week_week1_idx` (`week_id` ASC)  COMMENT '',
  INDEX `fk_matpel_has_week_matpel1_idx` (`matpel_id` ASC)  COMMENT '',
  CONSTRAINT `fk_matpel_has_week_matpel1`
    FOREIGN KEY (`matpel_id`)
    REFERENCES `mydb`.`matpel` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_matpel_has_week_week1`
    FOREIGN KEY (`week_id`)
    REFERENCES `mydb`.`week` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`materi`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`materi` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `file` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`materi_has_week`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`materi_has_week` (
  `materi_id` INT NOT NULL COMMENT '',
  `week_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`materi_id`, `week_id`)  COMMENT '',
  INDEX `fk_materi_has_week_week1_idx` (`week_id` ASC)  COMMENT '',
  INDEX `fk_materi_has_week_materi1_idx` (`materi_id` ASC)  COMMENT '',
  CONSTRAINT `fk_materi_has_week_materi1`
    FOREIGN KEY (`materi_id`)
    REFERENCES `mydb`.`materi` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_materi_has_week_week1`
    FOREIGN KEY (`week_id`)
    REFERENCES `mydb`.`week` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tugas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tugas` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `namatugas` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tugas_has_week`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tugas_has_week` (
  `tugas_id` INT NOT NULL COMMENT '',
  `week_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`tugas_id`, `week_id`)  COMMENT '',
  INDEX `fk_tugas_has_week_week1_idx` (`week_id` ASC)  COMMENT '',
  INDEX `fk_tugas_has_week_tugas1_idx` (`tugas_id` ASC)  COMMENT '',
  CONSTRAINT `fk_tugas_has_week_tugas1`
    FOREIGN KEY (`tugas_id`)
    REFERENCES `mydb`.`tugas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tugas_has_week_week1`
    FOREIGN KEY (`week_id`)
    REFERENCES `mydb`.`week` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`user_has_tugas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`user_has_tugas` (
  `user_id` INT NOT NULL COMMENT '',
  `tugas_id` INT NOT NULL COMMENT '',
  `file` VARCHAR(45) NULL COMMENT '',
  `tgl_diupload` DATE NULL COMMENT '',
  PRIMARY KEY (`user_id`, `tugas_id`)  COMMENT '',
  INDEX `fk_user_has_tugas_tugas1_idx` (`tugas_id` ASC)  COMMENT '',
  INDEX `fk_user_has_tugas_user1_idx` (`user_id` ASC)  COMMENT '',
  CONSTRAINT `fk_user_has_tugas_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `mydb`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_has_tugas_tugas1`
    FOREIGN KEY (`tugas_id`)
    REFERENCES `mydb`.`tugas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`grup`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`grup` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `topik_grup` VARCHAR(45) NOT NULL COMMENT '',
  `user_id` INT NOT NULL COMMENT '',
  `tgl_dibuat` DATE NOT NULL COMMENT '',
  PRIMARY KEY (`id`, `user_id`)  COMMENT '',
  INDEX `fk_grup_user1_idx` (`user_id` ASC)  COMMENT '',
  CONSTRAINT `fk_grup_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `mydb`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`anggota`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`anggota` (
  `grup_id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `user_id` INT NOT NULL COMMENT '',
  `tgl_join` DATE NOT NULL COMMENT '',
  PRIMARY KEY (`grup_id`, `user_id`)  COMMENT '',
  INDEX `fk_grup_has_user_user1_idx` (`user_id` ASC)  COMMENT '',
  INDEX `fk_grup_has_user_grup1_idx` (`grup_id` ASC)  COMMENT '',
  CONSTRAINT `fk_grup_has_user_grup1`
    FOREIGN KEY (`grup_id`)
    REFERENCES `mydb`.`grup` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_grup_has_user_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `mydb`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`postingan`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`postingan` (
  `idpostingan` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `isi` VARCHAR(100) NULL COMMENT '',
  `tgldiposting` DATE NULL COMMENT '',
  `user_id` INT NOT NULL COMMENT '',
  `grup_id` INT NULL COMMENT '',
  PRIMARY KEY (`idpostingan`, `user_id`)  COMMENT '',
  INDEX `fk_postingan_user1_idx` (`user_id` ASC)  COMMENT '',
  INDEX `fk_postingan_grup1_idx` (`grup_id` ASC)  COMMENT '',
  CONSTRAINT `fk_postingan_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `mydb`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_postingan_grup1`
    FOREIGN KEY (`grup_id`)
    REFERENCES `mydb`.`grup` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`komentar`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`komentar` (
  `idkomentar` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `isi` VARCHAR(45) NULL COMMENT '',
  `user_id` INT NOT NULL COMMENT '',
  `postingan_idpostingan` INT NOT NULL COMMENT '',
  PRIMARY KEY (`idkomentar`, `user_id`, `postingan_idpostingan`)  COMMENT '',
  INDEX `fk_komentar_user1_idx` (`user_id` ASC)  COMMENT '',
  INDEX `fk_komentar_postingan1_idx` (`postingan_idpostingan` ASC)  COMMENT '',
  CONSTRAINT `fk_komentar_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `mydb`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_komentar_postingan1`
    FOREIGN KEY (`postingan_idpostingan`)
    REFERENCES `mydb`.`postingan` (`idpostingan`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`like`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`like` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `postid` INT NOT NULL COMMENT '',
  `user_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_postingan_has_user_postingan1_idx` (`id` ASC)  COMMENT '',
  CONSTRAINT `fk_postingan_has_user_postingan1`
    FOREIGN KEY (`id`)
    REFERENCES `mydb`.`postingan` (`idpostingan`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
