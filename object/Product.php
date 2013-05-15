<?php
/**
 * @copyright NetWebX INC Copyright(2010) All Right Reserved.
 * @filesource: Product.php,v$
 * @package: object
 *
 * @author Jason Williams <jason@netwebx.com>
 * @version $Id: v 1.0 2010-05-10 Jason Exp $
 *
 * @abstract:
 */
if (!defined('PROJECT_START')) {
    exit('Access Denied');
}

class Product extends Module {
    
	private $_table;
	
    public function __construct() {
        parent::__construct();
    	$this->_table = $this->DB->products;
    }
    
    public function checkBarcodeValid(){
    	
    }
    
    public function genBarCode(){
        srand((double) microtime() * 1000000);
        $barcode = "";
    	$random_char = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", 
							"a", "b", "c", "d", "e", "f", "g", "h", "i", "j", 
							"k", "l", "m", "n", "o", "p", "q", "r", "s", "t", 
							"u", "v", "w", "x", "y", "z");
		for($i = 0; $i < 12; $i++){
            $barcode .= $random_char[rand(0, 35)];
		}
		return $barcode;
    	
    }
    
    public function checkProductIDValid(){
    	
    }
    
    public function genProductID(){
        srand((double) microtime() * 1000000);
        $pid = "";
    	$random_char = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", 
							"a", "b", "c", "d", "e", "f", "g", "h", "i", "j", 
							"k", "l", "m", "n", "o", "p", "q", "r", "s", "t", 
							"u", "v", "w", "x", "y", "z");
		for($i = 0; $i < 15; $i++){
            $pid .= $random_char[rand(0, 35)];
		}
		return $pid;
    }
    
    public function add(){
    	
    }
    
    public function search($sch, $sortby, $sort, $start, $pagesize){
    	$orderby = "ORDER BY $sortby $sort";
    	$limit = "LIMIT $start, $pagesize";
    	
    	$sql = sprintf("SELECT count(1) AS CNT FROM %s LIMIT 1", $this->_table);
    	$total = $this->DB->get_var($sql);
    	
    	
    	$sql = sprintf("SELECT * FROM %s %s %s", 
    					$this->_table, $orderby, $limit);
    	$rows = $this->DB->get_results($sql);

    	$result['totalProperty'] = $total;
    	for($i = 0; $i < count($rows); $i++){
    		$row[] = array("Bar" => $rows[$i]->Bar,
    					   "Product_ID" => $rows[$i]->Product_ID,
    					   "Title" => $rows[$i]->Title,
    					   "Vendor" => $rows[$i]->Vendor,
    					   "Unit_Price" => $rows[$i]->Unit_Price,
    					   "Prodcut_Cost" => $rows[$i]->Product_Cost,
    					   "US_Style" => $rows[$i]->US_Style,
    					   "HK_Style" => $rows[$i]->HK_Style,
    					   "lastTrans" => $rows[$i]->lastTrans);
    	}
    	$result['root'] = $row; 
    	return $result;    	
    }
}
?>