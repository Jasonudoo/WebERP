<?php
/**
 * @copyright Copyright(2010) All Right Reserved.
 * @filesource: Module.php,v$
 * @package: object
 *
 * @author Jason Williams <jasonudoo@gmail.com>
 * @version $Id: v 1.0 2010-05-20 Jason Exp $
 *
 * @abstract:
 */

if (!defined('PROJECT_START')) {
    exit('Access Denied');
}

require_once PROJECT_ROOT."/object/Mysql.php";

class Module {
    
    protected $_data;
    protected $_properties;
    protected $DB;
    
    public function __construct() {
		global $mydb, $table_prefix;
    	$this->DB = & $mydb;
    	$this->DB->set_prefix($table_prefix);
    }
    
    /**
     * Overloadable version of getProperty. You should have the ability
     * to do custom processing when getting a property. Case point: not
     * hitting the database for a value unless it is explicitly requested.
     */
    public function get($p_property) {
        return $this->__getProperty($p_property);
    }
    
    /**
     * function _getProperty returns a single value from the private data
     * structure.  It ensures case-insensitivity of the property value
     */
    private function __getProperty($p_property) {
        $property = strtolower($p_property);
        $hashKey = (isset($this->_properties[$property]) ? $this->_properties[$property] : null);
        
        if (!$hashKey) {
            $retVal = null;
        } else {
            $retVal = (isset($this->_data[$hashKey]) ? $this->_data[$hashKey] : null);
        }
        
        return $retVal;
    }
    /**
     * public function setProperty is used as the default setProperty implementation.
     * most subclasses should overload this function to implement any data validation
     * that needs to occur before setting the values;
     */
    public function set($p_property, $p_value) {
        return $this->__setProperty($p_property, $p_value);
    }
    
    /**
     * private function __SetProperty sets the single values in the private
     * data structure with a lower-case key.
     */
    private function __setProperty($p_property, $p_value) {
        $property = strtolower($p_property);
        $hashKey = isset($this->_properties[$property]) ? $this->_properties[$property] : FALSE;
        
        if (!$hashKey) {
            $this->_properties[$property] = $property;
            $this->_data[$property] = $p_value;
        
        } else {
            $this->_data[$hashKey] = $p_value;
        }
        return true;
    }

}
?>
