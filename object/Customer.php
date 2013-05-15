<?php
/**
 * @copyright NetWebX INC Copyright(2010) All Right Reserved.
 * @filesource: Customer.php,v$
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

class Customer extends Module {
    
	private $_table;
	
    public function __construct() {
        parent::__construct();
    	$this->_table = $this->DB->customer;
    }
    
    private function _isCorrectEmailFormat($p_mail){
    	if( empty($p_mail) ) return FALSE;
    	return isemail($p_mail);
    }
    
    private function _isEmailExists($p_mail){
    	if( empty($p_mail) ) return FALSE;
    	$sql = sprintf("SELECT count(1) as CNT FROM `%s` WHERE `email` = %%s", $this->_table);
    	$cnt = $this->DB->get_var($this->DB->prepare($sql, $p_mail));
    	
    	if(intval($cnt) > 0){
    		return TRUE;
    	}
    	return FALSE;
    }
    
    public function checkEmailValid($p_mail){
    	if( empty($p_mail) ) return 0;
    	
    	if(!$this->_isCorrectEmailFormat($p_mail)) return 1;
    	if($this->_isEmailExists($p_mail)) return 2;
    	
    	return -1;
    }
    
    public function genGUID(){
        srand((double) microtime() * 1000000);
        $guid = "";
    	$random_char = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", 
							"a", "b", "c", "d", "e", "f", "g", "h", "i", "j", 
							"k", "l", "m", "n", "o", "p", "q", "r", "s", "t", 
							"u", "v", "w", "x", "y", "z");
		for($i = 0; $i < 8; $i++){
            $guid .= $random_char[rand(0, 35)];
		}
		$guid .= "-";
		for($i = 0; $i < 4; $i++){
            $guid .= $random_char[rand(0, 35)];
		}
		$guid .= "-";
		for($i = 0; $i < 4; $i++){
            $guid .= $random_char[rand(0, 35)];
		}
		$guid .= "-";
		for($i = 0; $i < 11; $i++){
            $guid .= $random_char[rand(0, 35)];
		}
		
		return $guid;
    }
    
    public function genCustomerID(){
        srand((double) microtime() * 1000000);
    	$random_char = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9"); 
    	$custid = "CUST";
    	
    	for($i = 0; $i < 9; $i++){
    		$custid .= $random_char[rand(0,9)];
    	}
    	
    	$sql = sprintf("SELECT count(1) AS CNT FROM `%s` WHERE `Customer_ID` = %%s", $this->_table);
    	$cnt = $this->DB->get_var($this->DB->prepare($sql, $custid));
    	
    	if($cnt > 0){
    		$custid = $this->genCustomerID();
    	}
    	
    	return $custid;
    }
    
    private function _isCustomerIdExists($p_cust){
    	if( empty($p_cust) ) return FALSE;
		$sql = sprintf("SELECT count(1) AS CNT FROM `%s` WHERE `Customer_ID` = %%s", $this->_table);
		$cnt = $this->DB->get_var($this->DB->prepare($sql, $p_cust));
		
		if( intval($cnt) > 0){
			return TRUE;
		}
		
		return FALSE;
    }
    
    private function _isCorrectCustomerIdFormat($p_cust){
		if (trim($p_cust) == "") return FALSE;
        if ( eregi("^[a-z]+[a-z0-9]*$", $p_cust) ) return TRUE;
        else return FALSE;
    }
    
    public function checkCustomerValid($p_cust){
    	if( trim($p_cust) == "") return 0;
    	
    	if( !$this->_isCorrectCustomerIdFormat($p_cust) ) return 1;
    	if( $this->_isCustomerIdExists($p_cust) ) return 2;
    	
    	return -1;
    }
    
    public function isCorrectWebsiteFormat($p_url){
		if( eregi("^(http|https|ftp):\/\/(([A-Z0-9][A-Z0-9_-]*)(\.[A-Z0-9][A-Z0-9_-]*)+)(:(\d+))?\/?", $p_url) ) return TRUE;
		else return FALSE;    	
    }
    
    public function add(){
    	$this->set("added", date("Y-m-d H:i:s"));
    	$this->set("GUID", $this->genGUID());

    	$this->DB->field_types["Sales_to_Date"] = "%.4f";
    	$this->DB->field_types["creditlimit"] = "%.4f";
    	$this->DB->field_types["Balance"] = "%.4f";
    	$this->DB->field_types["PastDue"] = "%.4f";
    	$this->DB->field_types["net_discount"] = "%.4f";
    	$this->DB->field_types["discount"] = "%.4f";
    	
    	$result = $this->DB->insert($this->_table, $this->_data);
    	return $result;
    }
    
    public function search($sch, $sortby, $sort, $start, $pagesize){
    	$orderby = "ORDER BY $sortby $sort";
    	$limit = "LIMIT $start, $pagesize";
    	
    	$sql = sprintf("SELECT count(1) AS CNT FROM %s LIMIT 1", $this->_table);
    	$total = $this->DB->get_var($sql);
    	
    	
    	$sql = sprintf("SELECT Customer_ID, Contact_Name, Company_Name, Store_Number, tax_id, Phone, email, Last_order_date, salesman FROM %s %s %s", 
    					$this->_table, $orderby, $limit);
    	$rows = $this->DB->get_results($sql);

    	$result['totalProperty'] = $total;
    	for($i = 0; $i < count($rows); $i++){
    		$row[] = array("Customer_ID" => $rows[$i]->Customer_ID,
    					   "Contact_Name" => $rows[$i]->Contact_Name,
    					   "Company_Name" => $rows[$i]->Company_Name,
    					   "Store_Number" => $rows[$i]->Store_Number,
    					   "tax_id" => $rows[$i]->tax_id,
    					   "Phone" => $rows[$i]->Phone,
    					   "email" => $rows[$i]->email,
    					   "Last_order_date" => $rows[$i]->Last_order_date,
    					   "salesman" => $rows[$i]->salesman);
    	}
    	$result['root'] = $row; 
    	return $result;
    }
    
    public function update(){
    	
    }
    
    public function delete($id){
    	if( empty($id) ){
    		$result['error'] = true;
    		$result['message'] = "";
    		return $result;
    	}
    	
    	$ids = explode(",", $id);
    	for($i = 0; $i < count($ids); $i++){
    		$wc[] = sprintf("'%s'", $ids[$i]);
    	}
    	$sql = sprintf("DELETE FROM `%s` WHERE `Customer_ID` in (%s)", $this->_table, join(",", $wc));
		$del_cnt = $this->DB->query($sql);
		
		$result['error'] = false;
		$result['message'] = sprintf("Total %d customers has(have) been deleted successfully!", $del_cnt);
		
		return $result;
    }
    
    public function getCustomerByID($id){
    	if( empty($id) ){
    		return FALSE;
    	}
    	
    	$sql = sprintf("SELECT * FROM `%s` WHERE `Customer_ID` = %%s LIMIT 1", $this->_table);
    	$query = $this->DB->prepare($sql, $id);
    	$result = $this->DB->get_row($query, ARRAY_A);
    	
    	return $result;
    	
    }
}
