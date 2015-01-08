<?php
/**
 * Class to create option group for category_contact_role_type
 *
 * @author Erik Hommel (CiviCooP) <erik.hommel@civicoop.org>
 * @license http://www.gnu.org/licenses/agpl-3.0.html
 */
class CRM_Category4contact_RoleType {
  /**
   * Function to create option group and values for role_type
   * if not exists already
   * 
   * @throws Exception if option group can not be created
   * @access public
   * @static
   */
  public static function create_role_type_option_group() {
    $option_group_name = 'category_contact_role_type';
    if (self::role_type_option_group_exists($option_group_name) == FALSE) {
      $params = array(
        'name' => $option_group_name,
        'title' => 'Category Contact Role Type',
        'is_active' => 1,
        'is_reserved' => 1
      );
      try {
        $option_group = civicrm_api3('OptionGroup', 'Create', $params);
      } catch (CiviCRM_API3_Exception $ex) {
        throw new Exception('Could not create option group category_contact_role_type, '
          . 'error from API OptionGroup Create: '.$ex->getMessage());      
      }
      self::create_role_type_option_values($option_group['id']);
    }
  }
  /**
   * Function to check if there is an option group with a specific name
   * 
   * @param string $option_group_name
   * @return boolean
   * @access public
   * @static
   */
  public static function role_type_option_group_exists($option_group_name) {
    $params = array('name' => $option_group_name);
    $count_option_group = civicrm_api3('OptionGroup', 'Getcount', $params);
    if ($count_option_group > 0) {
      return TRUE;
    } else {
      return FALSE;
    }
  }
  /**
   * Function to retrieve a role type id with label
   * 
   * @param string $option_label
   * @return string $value
   * @throws Exception when option group not found
   */
  public static function get_role_type_option_value($option_label) {
    $option_group_params = array(
      'name' => 'category_contact_role_type',
      'return' => 'id');
    try {
      $option_group_id = civicrm_api3('OptionGroup', 'Getvalue', $option_group_params);
    } catch (CiviCRM_API3_Exception $ex) {
      throw new Exception('Could not find option group with name category_contact_role_type, '
        . 'error from API OptionGroup Getvalue: '.$ex->getMessage());
    }
    $option_value_params = array(
      'option_group_id' => $option_group_id,
      'label' => $option_label,
      'return' => 'value');
    try {
      $value = civicrm_api3('OptionValue', 'Getvalue', $option_value_params);
    } catch (CiviCRM_API3_Exception $ex) {
      $value = '';
    }
    return $value;
  }
  /**
   * Function to retrieve a role type label with value
   * 
   * @param string $option_value
   * @return string $label
   * @throws Exception when option group tax_declaration_year_status not found
   */
  public static function get_role_type_option_label($option_value) {
    $option_group_params = array(
      'name' => 'category_contact_role_type',
      'return' => 'id');
    try {
      $option_group_id = civicrm_api3('OptionGroup', 'Getvalue', $option_group_params);
    } catch (CiviCRM_API3_Exception $ex) {
      throw new Exception('Could not find option group with name category_contact_role_type, '
        . 'error from API OptionGroup Getvalue: '.$ex->getMessage());
    }
    $option_value_params = array(
      'option_group_id' => $option_group_id,
      'value' => $option_value,
      'return' => 'label');
    try {
      $label = civicrm_api3('OptionValue', 'Getvalue', $option_value_params);
    } catch (CiviCRM_API3_Exception $ex) {
      $label = '';
    }
    return $label;
  }
  /**
   * Function to create option values for role type
   * 
   * @param int $option_group_id
   * @throws Exception if option value can not be created
   * @access protected
   * @static
   */
  protected static function create_role_type_option_values($option_group_id) {
    $status_labels = array('Standard');
    $value = 1;
    foreach ($status_labels as $status_label) {
      $params = array(
        'name' => $status_label,
        'label' => $status_label,
        'value' => $value,
        'is_active' => 1,
        'weight' => $value,
        'option_group_id' => $option_group_id);
      try {
        civicrm_api3('OptionValue', 'Create', $params);
        $value++;
      } catch (CiviCRM_API3_Exception $ex) {
        throw new Exception('Could not create option value '.$status_label.' in option group '
          .$option_group_id.', error from API OptionValue Create: '.$ex->getMessage());
      }
    }
  }
}
