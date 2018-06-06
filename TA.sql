-- MySQL Script generated by MySQL Workbench
-- 06/05/18 15:34:33
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema ta
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema ta
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ta` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `ta` ;

-- -----------------------------------------------------
-- Table `ta`.`kelas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ta`.`kelas` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nama_kelas` VARCHAR(50) NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ta`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ta`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nama` VARCHAR(80) NULL COMMENT '',
  `username` VARCHAR(50) NULL COMMENT '',
  `password` VARCHAR(255) NULL COMMENT '',
  `role` ENUM('murid', 'guru', 'ortu', 'admin') NULL COMMENT '',
  `foto` VARCHAR(255) NULL COMMENT '',
  `kelas_id` INT NULL COMMENT '',
  `ortu_id` INT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_user_kelas1_idx` (`kelas_id` ASC)  COMMENT '',
  INDEX `fk_user_user1_idx` (`ortu_id` ASC)  COMMENT '',
  CONSTRAINT `fk_user_kelas1`
    FOREIGN KEY (`kelas_id`)
    REFERENCES `ta`.`kelas` (`id`)
    ON DELETE SET NULL
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_user1`
    FOREIGN KEY (`ortu_id`)
    REFERENCES `ta`.`user` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ta`.`matpel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ta`.`matpel` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nama_pelajaran` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ta`.`week`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ta`.`week` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nama` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ta`.`relasi_user_matpel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ta`.`relasi_user_matpel` (
  `user_id` INT NOT NULL COMMENT '',
  `matpel_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`user_id`, `matpel_id`)  COMMENT '',
  INDEX `fk_user_has_matpel_matpel1_idx` (`matpel_id` ASC)  COMMENT '',
  INDEX `fk_user_has_matpel_user_idx` (`user_id` ASC)  COMMENT '',
  CONSTRAINT `fk_user_has_matpel_user`
    FOREIGN KEY (`user_id`)
    REFERENCES `ta`.`user` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_has_matpel_matpel1`
    FOREIGN KEY (`matpel_id`)
    REFERENCES `ta`.`matpel` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ta`.`materi`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ta`.`materi` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `file` VARCHAR(255) NULL COMMENT '',
  `matpel_id` INT NOT NULL COMMENT '',
  `week_id` INT NOT NULL COMMENT '',
  `user_id` INT NULL COMMENT '',
  PRIMARY KEY (`id`, `matpel_id`, `week_id`)  COMMENT '',
  INDEX `fk_materi_matpel1_idx` (`matpel_id` ASC)  COMMENT '',
  INDEX `fk_materi_week1_idx` (`week_id` ASC)  COMMENT '',
  INDEX `fk_materi_user1_idx` (`user_id` ASC)  COMMENT '',
  CONSTRAINT `fk_materi_matpel1`
    FOREIGN KEY (`matpel_id`)
    REFERENCES `ta`.`matpel` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_materi_week1`
    FOREIGN KEY (`week_id`)
    REFERENCES `ta`.`week` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_materi_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `ta`.`user` (`id`)
    ON DELETE SET NULL
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ta`.`tugas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ta`.`tugas` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `namatugas` VARCHAR(45) NULL COMMENT '',
  `matpel_id` INT NOT NULL COMMENT '',
  `week_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`id`, `matpel_id`, `week_id`)  COMMENT '',
  INDEX `fk_tugas_matpel1_idx` (`matpel_id` ASC)  COMMENT '',
  INDEX `fk_tugas_week1_idx` (`week_id` ASC)  COMMENT '',
  CONSTRAINT `fk_tugas_matpel1`
    FOREIGN KEY (`matpel_id`)
    REFERENCES `ta`.`matpel` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tugas_week1`
    FOREIGN KEY (`week_id`)
    REFERENCES `ta`.`week` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ta`.`user_has_tugas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ta`.`user_has_tugas` (
  `user_id` INT NOT NULL COMMENT '',
  `tugas_id` INT NOT NULL COMMENT '',
  `file` VARCHAR(255) NULL COMMENT '',
  `tgl_diupload` DATE NULL COMMENT '',
  `nilai` DOUBLE NULL COMMENT '',
  INDEX `fk_user_has_tugas_tugas1_idx` (`tugas_id` ASC)  COMMENT '',
  INDEX `fk_user_has_tugas_user1_idx` (`user_id` ASC)  COMMENT '',
  PRIMARY KEY (`tugas_id`, `user_id`)  COMMENT '',
  CONSTRAINT `fk_user_has_tugas_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `ta`.`user` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_has_tugas_tugas1`
    FOREIGN KEY (`tugas_id`)
    REFERENCES `ta`.`tugas` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ta`.`grup`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ta`.`grup` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `topik_grup` VARCHAR(45) NOT NULL COMMENT '',
  `user_id` INT NOT NULL COMMENT '',
  `tgl_dibuat` DATE NOT NULL COMMENT '',
  PRIMARY KEY (`id`, `user_id`)  COMMENT '',
  INDEX `fk_grup_user1_idx` (`user_id` ASC)  COMMENT '',
  CONSTRAINT `fk_grup_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `ta`.`user` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ta`.`anggota`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ta`.`anggota` (
  `grup_id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `user_id` INT NOT NULL COMMENT '',
  `tgl_join` DATE NOT NULL COMMENT '',
  PRIMARY KEY (`grup_id`)  COMMENT '',
  INDEX `fk_grup_has_user_user1_idx` (`user_id` ASC)  COMMENT '',
  INDEX `fk_grup_has_user_grup1_idx` (`grup_id` ASC)  COMMENT '',
  CONSTRAINT `fk_grup_has_user_grup1`
    FOREIGN KEY (`grup_id`)
    REFERENCES `ta`.`grup` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_grup_has_user_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `ta`.`user` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ta`.`postingan`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ta`.`postingan` (
  `idpostingan` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `isi` VARCHAR(1000) NULL COMMENT '',
  `tgldiposting` DATE NULL COMMENT '',
  `user_id` INT NOT NULL COMMENT '',
  `grup_id` INT NULL COMMENT '',
  `file` VARCHAR(255) NULL COMMENT '',
  PRIMARY KEY (`idpostingan`, `user_id`)  COMMENT '',
  INDEX `fk_postingan_user1_idx` (`user_id` ASC)  COMMENT '',
  INDEX `fk_postingan_grup1_idx` (`grup_id` ASC)  COMMENT '',
  CONSTRAINT `fk_postingan_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `ta`.`user` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_postingan_grup1`
    FOREIGN KEY (`grup_id`)
    REFERENCES `ta`.`grup` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ta`.`komentar`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ta`.`komentar` (
  `idkomentar` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `isi` VARCHAR(2000) NULL COMMENT '',
  `user_id` INT NOT NULL COMMENT '',
  `postingan_idpostingan` INT NOT NULL COMMENT '',
  PRIMARY KEY (`idkomentar`, `user_id`, `postingan_idpostingan`)  COMMENT '',
  INDEX `fk_komentar_user1_idx` (`user_id` ASC)  COMMENT '',
  INDEX `fk_komentar_postingan1_idx` (`postingan_idpostingan` ASC)  COMMENT '',
  CONSTRAINT `fk_komentar_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `ta`.`user` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_komentar_postingan1`
    FOREIGN KEY (`postingan_idpostingan`)
    REFERENCES `ta`.`postingan` (`idpostingan`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ta`.`like`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ta`.`like` (
  `user_id` INT NOT NULL COMMENT '',
  `post_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`user_id`, `post_id`)  COMMENT '',
  INDEX `fk_user_has_postingan_postingan1_idx` (`post_id` ASC)  COMMENT '',
  INDEX `fk_user_has_postingan_user1_idx` (`user_id` ASC)  COMMENT '',
  CONSTRAINT `fk_user_has_postingan_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `ta`.`user` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_has_postingan_postingan1`
    FOREIGN KEY (`post_id`)
    REFERENCES `ta`.`postingan` (`idpostingan`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ta`.`events`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ta`.`events` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `title` VARCHAR(100) NOT NULL COMMENT '',
  `description` VARCHAR(255) NULL COMMENT '',
  `start_date` DATE NOT NULL COMMENT '',
  `end_date` DATE NOT NULL COMMENT '',
  `created` DATE NOT NULL COMMENT '',
  `user_id` INT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_events_user1_idx` (`user_id` ASC)  COMMENT '',
  CONSTRAINT `fk_events_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `ta`.`user` (`id`)
    ON DELETE SET NULL
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ta`.`matpel_has_week`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ta`.`matpel_has_week` (
  `matpel_id` INT NOT NULL COMMENT '',
  `week_id` INT NOT NULL COMMENT '',
  `title` VARCHAR(100) NULL COMMENT '',
  `description` VARCHAR(255) NULL COMMENT '',
  PRIMARY KEY (`matpel_id`, `week_id`)  COMMENT '',
  INDEX `fk_matpel_has_week_week1_idx` (`week_id` ASC)  COMMENT '',
  INDEX `fk_matpel_has_week_matpel1_idx` (`matpel_id` ASC)  COMMENT '',
  CONSTRAINT `fk_matpel_has_week_matpel1`
    FOREIGN KEY (`matpel_id`)
    REFERENCES `ta`.`matpel` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_matpel_has_week_week1`
    FOREIGN KEY (`week_id`)
    REFERENCES `ta`.`week` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ta`.`report`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ta`.`report` (
  `user_id` INT NOT NULL COMMENT '',
  `postingan_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`user_id`, `postingan_id`)  COMMENT '',
  INDEX `fk_user_has_postingan_postingan2_idx` (`postingan_id` ASC)  COMMENT '',
  INDEX `fk_user_has_postingan_user2_idx` (`user_id` ASC)  COMMENT '',
  CONSTRAINT `fk_user_has_postingan_user2`
    FOREIGN KEY (`user_id`)
    REFERENCES `ta`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_has_postingan_postingan2`
    FOREIGN KEY (`postingan_id`)
    REFERENCES `ta`.`postingan` (`idpostingan`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ta`.`gallery`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ta`.`gallery` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `title` VARCHAR(100) NULL COMMENT '',
  `file` VARCHAR(255) NULL COMMENT '',
  `user_id` INT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_gallery_user1_idx` (`user_id` ASC)  COMMENT '',
  CONSTRAINT `fk_gallery_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `ta`.`user` (`id`)
    ON DELETE SET NULL
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ta`.`achievement`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ta`.`achievement` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `title` VARCHAR(50) NULL COMMENT '',
  `description` VARCHAR(255) NULL COMMENT '',
  `file` VARCHAR(255) NULL COMMENT '',
  `user_id` INT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_achievement_user1_idx` (`user_id` ASC)  COMMENT '',
  CONSTRAINT `fk_achievement_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `ta`.`user` (`id`)
    ON DELETE SET NULL
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ta`.`conversation`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ta`.`conversation` (
  `c_id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `id_pengirim` INT NOT NULL COMMENT '',
  `id_penerima` INT NOT NULL COMMENT '',
  `time` DATETIME NULL COMMENT '',
  PRIMARY KEY (`c_id`, `id_pengirim`, `id_penerima`)  COMMENT '',
  INDEX `fk_conversation_user1_idx` (`id_pengirim` ASC)  COMMENT '',
  INDEX `fk_conversation_user2_idx` (`id_penerima` ASC)  COMMENT '',
  CONSTRAINT `fk_conversation_user1`
    FOREIGN KEY (`id_pengirim`)
    REFERENCES `ta`.`user` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_conversation_user2`
    FOREIGN KEY (`id_penerima`)
    REFERENCES `ta`.`user` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ta`.`notification`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ta`.`notification` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `c_id` INT NOT NULL COMMENT '',
  `n_number` INT NULL COMMENT '',
  `id_penerima` INT NOT NULL COMMENT '',
  PRIMARY KEY (`id`, `c_id`, `id_penerima`)  COMMENT '',
  INDEX `fk_notification_conversation1_idx` (`c_id` ASC)  COMMENT '',
  INDEX `fk_notification_user1_idx` (`id_penerima` ASC)  COMMENT '',
  CONSTRAINT `fk_notification_conversation1`
    FOREIGN KEY (`c_id`)
    REFERENCES `ta`.`conversation` (`c_id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_notification_user1`
    FOREIGN KEY (`id_penerima`)
    REFERENCES `ta`.`user` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ta`.`conversation_reply`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ta`.`conversation_reply` (
  `cr_id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `reply` VARCHAR(255) NULL COMMENT '',
  `fk_id_pengirim` INT NOT NULL COMMENT '',
  `time` DATETIME NULL COMMENT '',
  `fk_c_id` INT NOT NULL COMMENT '',
  `seen` TINYINT(1) NULL COMMENT '',
  PRIMARY KEY (`cr_id`, `fk_id_pengirim`, `fk_c_id`)  COMMENT '',
  INDEX `fk_conversation_reply_conversation1_idx` (`fk_c_id` ASC)  COMMENT '',
  INDEX `fk_conversation_reply_user1_idx` (`fk_id_pengirim` ASC)  COMMENT '',
  CONSTRAINT `fk_conversation_reply_conversation1`
    FOREIGN KEY (`fk_c_id`)
    REFERENCES `ta`.`conversation` (`c_id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_conversation_reply_user1`
    FOREIGN KEY (`fk_id_pengirim`)
    REFERENCES `ta`.`user` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
