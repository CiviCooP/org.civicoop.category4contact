<?php
/**
 * @author Erik Hommel (CiviCooP) <erik.hommel@civicoop.org>
 * @license http://www.gnu.org/licenses/agpl-3.0.html
 */
require_once 'category4contact.civix.php';

/**
 * Implementation of hook_civicrm_config
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function category4contact_civicrm_config(&$config) {
  _category4contact_civix_civicrm_config($config);
}

/**
 * Implementation of hook_civicrm_xmlMenu
 *
 * @param $files array(string)
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function category4contact_civicrm_xmlMenu(&$files) {
  _category4contact_civix_civicrm_xmlMenu($files);
}

/**
 * Implementation of hook_civicrm_install
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function category4contact_civicrm_install() {
  return _category4contact_civix_civicrm_install();
}

/**
 * Implementation of hook_civicrm_uninstall
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function category4contact_civicrm_uninstall() {
  return _category4contact_civix_civicrm_uninstall();
}

/**
 * Implementation of hook_civicrm_enable
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function category4contact_civicrm_enable() {
  /*
   * create required option group for role type if not exist yet
   */
  CRM_Category4contact_RoleType::create_role_type_option_group();
  return _category4contact_civix_civicrm_enable();
}

/**
 * Implementation of hook_civicrm_disable
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function category4contact_civicrm_disable() {
  return _category4contact_civix_civicrm_disable();
}

/**
 * Implementation of hook_civicrm_upgrade
 *
 * @param $op string, the type of operation being performed; 'check' or 'enqueue'
 * @param $queue CRM_Queue_Queue, (for 'enqueue') the modifiable list of pending up upgrade tasks
 *
 * @return mixed  based on op. for 'check', returns array(boolean) (TRUE if upgrades are pending)
 *                for 'enqueue', returns void
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function category4contact_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _category4contact_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implementation of hook_civicrm_managed
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function category4contact_civicrm_managed(&$entities) {
  return _category4contact_civix_civicrm_managed($entities);
}

/**
 * Implementation of hook_civicrm_caseTypes
 *
 * Generate a list of case-types
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function category4contact_civicrm_caseTypes(&$caseTypes) {
  _category4contact_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implementation of hook_civicrm_alterSettingsFolders
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function category4contact_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _category4contact_civix_civicrm_alterSettingsFolders($metaDataFolders);
}
/**
 * Implementation of hook civicrm_navigationMenu
 * 
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_navigationMenu
 */
function category4contact_civicrm_navigationMenu( &$params ) {
    $itemMain = array (
        'name'          =>  ts('Categories for Contact'),
        'url'           =>  CRM_Utils_System::url('civicrm/categorylist', '', true),
        'permission'    => 'administer CiviCRM',
    );
    _category4contact_civix_insert_navigation_menu($params, 'Administer', $itemMain);
}
/**
 * Implementation of hook civicrm_tabs to add a tab for Category
 * 
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_tabs
 */
function category4contact_civicrm_tabs(&$tabs, $contact_id) {
  $role_count = CRM_Contact4category_BAO_Role::get_contact_count($contact_id);
  $category4contact_config = CRM_Category4contact_Config::singleton();
  $title = $category4contact_config->get_category_label();
  $role_url = CRM_Utils_System::url('civicrm/categoryrolelist','snippet=1&cid='.$contact_id);
  $tabs[] = array( 
    'id'    => 'category_roles',
    'url'       => $role_url,
    'title'     => $title,
    'weight'    => 99,
    'count'     => $role_count);
}
