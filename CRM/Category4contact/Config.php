<?php
/**
 * Class following Singleton pattern for specific extension configuration
 *
 * @author Erik Hommel (CiviCooP) <erik.hommel@civicoop.org>
 * @license http://www.gnu.org/licenses/agpl-3.0.html
 */
class CRM_Category4contact_Config {
  /*
   * singleton pattern
   */
  static private $_singleton = NULL;
  /*
   * protected properties to hold the (sub)category labels
   */
  protected $_category_label = null;
  protected $_sub_category_label = null;
  /**
   * Constructor
   */
  function __construct() {
    
  }
  /**
   * Function to get the label for the category
   * @return string
   * @access public
   */
  public function get_category_label() {
    return $this->_category_label;
  }
  /**
   * Function to get the label for the subcategory
   * @return string
   * @access public
   */
  public function get_sub_category_label() {
    return $this->_sub_category_label;
  }
  /**
   * Function to set the label for the category
   * @param string $label
   * @access public
   */
  public function set_category_label($label) {
    $this->_category_label = stripslashes(trim($label));
    return;
  }
  /**
   * Function to set the label for the subcategory
   * @param string $label
   * @access public
   */
  public function set_sub_category_label($label) {
    $this->_sub_category_label = stripslashes(trim($label));
    return;
  }
  /**
   * Function to return singleton object
   * 
   * @return object $_singleton
   * @access public
   * @static
   */
  public static function &singleton() {
    if (self::$_singleton === NULL) {
      self::$_singleton = new CRM_Category4contact_Config();
    }
    return self::$_singleton;
  }
}
