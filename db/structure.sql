SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


-- -----------------------------------------------------
-- Table `g_user_role`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `g_user_role` (
  `role_id` INT NOT NULL AUTO_INCREMENT,
  `role_name` VARCHAR(100) NULL,
  `role_input_date` TIMESTAMP NULL,
  `role_last_update` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`role_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `g_user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `g_user` (
  `user_id` INT NOT NULL AUTO_INCREMENT,
  `user_name` VARCHAR(100) NULL,
  `user_full_name` VARCHAR(255) NULL,
  `user_password` VARCHAR(45) NULL,
  `user_email` VARCHAR(45) NULL,
  `user_description` TEXT NULL,
  `user_role` INT NULL,
  `user_input_date` TIMESTAMP NULL,
  `user_last_update` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  INDEX `fk_g_user_user_role_idx` (`user_role` ASC),
  CONSTRAINT `fk_g_user_user_role`
    FOREIGN KEY (`user_role`)
    REFERENCES `g_user_role` (`role_id`)
    ON DELETE SET NULL
    ON UPDATE SET NULL)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `g_posts_category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `g_posts_category` (
  `category_id` INT NOT NULL AUTO_INCREMENT,
  `category_name` VARCHAR(100) NULL,
  `category_input_date` TIMESTAMP NULL,
  `category_last_update` TIMESTAMP NULL,
  PRIMARY KEY (`category_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `g_posts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `g_posts` (
  `posts_id` INT NOT NULL AUTO_INCREMENT,
  `posts_title` VARCHAR(255) NULL,
  `posts_description` TEXT NULL,
  `posts_content` TEXT NULL,
  `posts_published_date` TIMESTAMP NULL,
  `posts_image` VARCHAR(255) NULL,
  `posts_input_date` TIMESTAMP NULL,
  `posts_last_update` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `posts_is_published` TINYINT(1) NULL DEFAULT 0 COMMENT '1 = published, 0 = draft',
  `posts_is_commentable` TINYINT(1) NULL DEFAULT 0 COMMENT '1 = commentable, 0 = uncommentable',
  `user_id` INT NULL,
  `category_id` INT NULL,
  PRIMARY KEY (`posts_id`),
  INDEX `fk_g_posts_g_user1_idx` (`user_id` ASC),
  INDEX `fk_g_posts_g_posts_category1_idx` (`category_id` ASC),
  CONSTRAINT `fk_g_posts_g_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `g_user` (`user_id`)
    ON DELETE SET NULL
    ON UPDATE SET NULL,
  CONSTRAINT `fk_g_posts_g_posts_category1`
    FOREIGN KEY (`category_id`)
    REFERENCES `g_posts_category` (`category_id`)
    ON DELETE SET NULL
    ON UPDATE SET NULL)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `g_page`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `g_page` (
  `page_id` INT NOT NULL AUTO_INCREMENT,
  `page_name` VARCHAR(100) NULL,
  `page_description` TEXT NULL,
  `page_content` TEXT NULL,
  `page_image` VARCHAR(255) NULL,
  `page_published_date` TIMESTAMP NULL,
  `page_input_date` TIMESTAMP NULL,
  `page_last_update` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `page_is_published` TINYINT(1) NULL DEFAULT 0 COMMENT '1 = published, 0 = draft',
  `page_is_commentable` TINYINT(1) NULL DEFAULT 0 COMMENT '1 = commentable, 0 = uncommentable',
  `user_id` INT NULL,
  PRIMARY KEY (`page_id`),
  INDEX `fk_g_page_g_user1_idx` (`user_id` ASC),
  CONSTRAINT `fk_g_page_g_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `g_user` (`user_id`)
    ON DELETE SET NULL
    ON UPDATE SET NULL)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mptt`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mptt` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(50) NOT NULL,
  `lft` INT NOT NULL DEFAULT 0,
  `rgt` INT NOT NULL DEFAULT 0,
  `parent` INT NOT NULL DEFAULT 0,
  `url` VARCHAR(255) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `g_activity_log`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `g_activity_log` (
  `activity_log_id` INT NOT NULL AUTO_INCREMENT,
  `activity_log_date` TIMESTAMP NULL,
  `activity_log_action` VARCHAR(45) NULL,
  `activity_log_module` VARCHAR(45) NULL,
  `activity_log_info` TEXT NULL,
  `user_id` INT NULL,
  PRIMARY KEY (`activity_log_id`),
  INDEX `fk_g_activity_log_g_user1_idx` (`user_id` ASC),
  CONSTRAINT `fk_g_activity_log_g_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `g_user` (`user_id`)
    ON DELETE SET NULL
    ON UPDATE SET NULL)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `g_mediamanager`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `g_mediamanager` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NULL DEFAULT NULL,
  `type` VARCHAR(45) NULL DEFAULT NULL,
  `isfile` TINYINT(1) NULL DEFAULT '0',
  `label` TEXT NULL DEFAULT NULL,
  `info` TEXT NULL DEFAULT NULL,
  `upload_at` DATETIME NULL DEFAULT NULL,
  `album_id` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;


-- -----------------------------------------------------
-- Table `g_mediamanager_album`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `g_mediamanager_album` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `label` VARCHAR(255) NULL DEFAULT NULL,
  `upload_at` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;


-- -----------------------------------------------------
-- Table `user_sessions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `user_sessions` (
  `session_id` VARCHAR(45) NOT NULL,
  `ip_address` VARCHAR(45) NULL DEFAULT NULL,
  `user_agent` VARCHAR(120) NULL DEFAULT NULL,
  `last_activity` INT(11) NULL DEFAULT NULL,
  `user_data` TEXT NULL DEFAULT NULL)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
