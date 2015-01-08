CREATE TABLE IF NOT EXISTS `civicrm_contact_category` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(75) NULL,
  `parent_id` INT NULL,
  `is_active` TINYINT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB;