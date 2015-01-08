<?php
/**
 * BAO Category for Contact Category Role
 * 
 * @author Erik Hommel (CiviCooP) <erik.hommel@civicoop.org>
 * @license http://www.gnu.org/licenses/agpl-3.0.html
 */
class CRM_Category4contact_BAO_CategoryRole extends CRM_Category4contact_DAO_CategoryRole {
  /**
   * Function to get values
   * 
   * @return array $result found rows with data
   * @access public
   * @static
   */
  public static function get_values($params) {
    $result = array();
    $category_role = new CRM_Category4contact_BAO_CategoryRole();
    if (!empty($params)) {
      $fields = self::fields();
      foreach ($params as $key => $value) {
        if (isset($fields[$key])) {
          $category_role->$key = $value;
        }
      }
    }
    $category_role->find();
    while ($category_role->fetch()) {
      $row = array();
      self::storeValues($category_role, $row);
      $result[$row['id']] = $row;
    }
    return $result;
  }
  /**
   * Function to add or update category role
   * 
   * @param array $params 
   * @return array $result
   * @access public
   * @throws Exception when params is empty
   * @static
   */
  public static function add($params) {
    $result = array();
    if (empty($params)) {
      throw new Exception('Params can not be empty when adding or updating a category role');
    }
    $category_role = new CRM_Category4contact_BAO_CategoryRole();
    $fields = self::fields();
    foreach ($params as $key => $value) {
      if (isset($fields[$key])) {
        $category_role->$key = $value;
      }
    }
    $category_role->save();
    self::storeValues($category_role, $result);
    return $result;
  }
  /**
   * Function to delete a category_role by id
   * 
   * @param int $category_role_id
   * @throws Exception when category_role_id is empty
   */
  public static function delete_by_id($category_role_id) {
    if (empty($category_role_id)) {
      throw new Exception('category_role_id can not be empty when attempting to delete a category role');
    }
    $category_role = new CRM_Category4contact_BAO_CategoryRole();
    $category_role->id = $category_role_id;
    $category_role->delete();
    return;
  }
}
