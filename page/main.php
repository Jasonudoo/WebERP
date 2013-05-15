<?php
/**
 * @copyright Copyright(2010) All Right Reserved.
 * @filesource: index.php,v$
 * @package: page
 *
 * @author Jason Williams <jasonudoo@gmail.com>
 * @version $Id: v 1.0 2010-02-10 Jason Exp $
 *
 * @abstract:
 */
if (!defined('PROJECT_START')) {
    exit('Access Denied');
}

require_once PROJECT_ROOT."/object/Page.php";

class MainPage extends Page{
    
    private static $_output_url = "";
    private static $_output_class = "";
    public $page = "";

    public function __construct() {
        parent::__construct();
    }

    public function Run(){
        $u = $this->page = isset($_REQUEST['u']) ? $_REQUEST['u']:'customer';
        $cls = FALSE;
        switch($u){
            case "customer" :
                $cls = $this->_getCustomerClass();
                break;
            case "invoice" : 
                $cls = $this->_getInvoiceClass();
                break;
            case "order" :     
                $cls = $this->_getOrderClass();
                break;
            case "product" :
            	$cls = $this->_getProductClass();
            	break;
        }
        
        return $cls;
    }
    
    private function _getCustomerClass(){
    	$cls = FALSE;
        self::$_output_url = "page/customer.php";
        self::$_output_class = "CustomerPage";
        $cls = $this->_getInstance();
        return $cls;
    }
    
    private function _getInvoiceClass(){
		$cls = FALSE;
    	self::$_output_url = "page/invoice.php";
        self::$_output_class = "InvoicePage";
        $cls = $this->_getInstance();
        return $cls;
    }
    
    private function _getOrderClass(){
        $cls = FALSE;
    	self::$_output_url = "page/order.php";
        self::$_output_class = "OrderPage";
        $cls = $this->_getInstance();
        return $cls;
    }
    
    private function _getProductClass(){
    	$cls = FALSE;
    	self::$_output_url = "page/product.php";
    	self::$_output_class = "ProductPage";
    	$cls = $this->_getInstance();
    	return $cls;
    }
    
    private function _getInstance() {
        $filename = PROJECT_ROOT."/".self::$_output_url;
        if( file_exists($filename) ){
            if( !class_exists(self::$_output_class) ){
                require_once($filename);
                @$instance = new self::$_output_class;
                return @$instance;
            }
            else{
                return FALSE;
            }
        }
        else{
            return FALSE;
        }
    }
    
    public function getContent(){
    }

    public function gotoErrorPage() {
        ob_start();
        header("HTTP/1.0 404 Not Found");
        ob_end();
    }
}
?>
