<?php

/**
 * Collection of upgrade steps
 */
class CRM_Category4contact_Upgrader extends CRM_Category4contact_Upgrader_Base {
  /**
   * Create tables when extension is installed
   */
  public function install() {
    $this->executeSqlFile('sql/create_civicrm_contact_category.sql');
    $this->executeSqlFile('sql/create_civicrm_contact_category_role.sql');
  }
}