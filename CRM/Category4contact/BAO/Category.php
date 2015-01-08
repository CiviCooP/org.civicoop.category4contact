<?php
/**
 * BAO Category for Contact Category
 * 
 * @author Erik Hommel (CiviCooP) <erik.hommel@civicoop.org>
 * @license http://www.gnu.org/licenses/agpl-3.0.html
 */
class CRM_Category4contact_BAO_Category extends CRM_Category4contact_DAO_Category {
  /**
   * Function to get values
   * 
   * @return array $result found rows with data
   * @access public
   * @static
   */
  public static function get_values($params) {
    $result = array();
    $category = new CRM_Category4contact_BAO_Category();
    if (!empty($params)) {
      $fields = self::fields();
      foreach ($params as $key => $value) {
        if (isset($fields[$key])) {
          $category->$key = $value;
        }
      }
    }
    $category->find();
    while ($category->fetch()) {
      $row = array();
      self::storeValues($category, $row);
      $result[$row['id']] = $row;
    }
    return $result;
  }
  /**
   * Function to add or update category
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
      throw new Exception('Params can not be empty when adding or updating a category');
    }
    $category = new CRM_Category4contact_BAO_Category();
    $fields = self::fields();
    foreach ($params as $key => $value) {
      if (isset($fields[$key])) {
        $category->$key = $value;
      }
    }
    $category->save();
    self::storeValues($category, $result);
    return $result;
  }
  /**
   * Function to delete a category by id
   * 
   * @param int $category_id
   * @throws Exception when category_id is empty
   */
  public static function delete_by_id($category_id) {
    if (empty($category_id)) {
      throw new Exception('category_id can not be empty when attempting to delete a category');
    }
    $category = new CRM_Category4contact_BAO_Category();
    $category->id = $category_id;
    $category->delete();
    return;
  }
}
