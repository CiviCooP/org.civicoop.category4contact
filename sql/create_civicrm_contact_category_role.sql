CREATE TABLE IF NOT EXISTS `civicrm_contact_category_role` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `category_id` INT NULL,
  `contact_id` INT NULL,
  `role_type_id` INT NULL,
  `start_date` DATE,
  `end_date` DATE,
  `is_active` TINYINT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `category INDEX` (`category_id` ASC),
  INDEX `contact INDEX` (`contact_id` ASC),
  INDEX `category_contact INDEX` (`category_id` ASC, `contact_id` ASC))
ENGINE = InnoDB;