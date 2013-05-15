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
require_once PROJECT_ROOT."/object/Customer.php";

class CustomerPage extends Page{
	public $Option;
	
    public function __construct() {
        parent::__construct();
    }
    public function Run() {    
        $act = isset($_REQUEST['actions']) ? $_REQUEST['actions'] : "list";
        switch($act){
            case "add" :
                $output_url = "add.php";
                $this->addCustomer();
                break;
            case "delete" :
                $output_url = "delete.php";
                $this->deleteCustomer();
                break;
            case "edit" :
                $output_url = "update.php";
                $this->editCustomer();
                break;
            default :
                $output_url = "list.php";
                $this->searchCustomer();
                break;
        }
        $filename = PROJECT_ROOT."/actions/customer/".$output_url;
        if( file_exists($filename) ){
            require_once($filename);
        }
        else{
            $this->gotoErrorPage();
        }
    }
    public function addCustomer(){
        $this->PageTitle = "Add Customer";
        $this->Script =<<<EOT
<link rel="stylesheet" type="text/css" href="css/tipTip.css" />
<script type="text/javascript" src="scripts/jquery/jquery.form.js"></script>
<script type="text/javascript" src="scripts/jquery/jquery.tipTip.js"></script>
<script type="text/javascript" src="scripts/apps/addcustomer.js"></script>
<style type="text/css"> 
    td.request_support {text-align: left; padding: 4px; border-bottom: 1px dotted #acacac; }
</style>
EOT;

        if($this->isPostCallback()){
            $customer = New Customer();
            $result = array();
            $msg = array();
            $error_code = 0;
            
            if(isset($_POST['special_form_command']) && $_POST['special_form_command'] == "add"){
            	
            	$customer->set("Company_Name", $_POST["company_name"]);
            	$customer->set("Customer_ID", $_POST['customer_id']);
            	$customer->set("Address1", $_POST['address1']);
            	$customer->set("Address2", $_POST['address2']);
            	$customer->set("Store_Number", $_POST['store_number']);
            	$customer->set("City", $_POST['city']);
            	$customer->set("Region", $_POST['region']);
            	$customer->set("Postal_Code", $_POST['postal_code']);
            	$customer->set("Country", "US");
            	$customer->set("Phone", $_POST['phone']);
            	$customer->set("Fax", $_POST['fax']);
            	$customer->set("comments1", $_POST['comments1']);
            	$customer->set("ship_name", $_POST['ship_name']);
            	$customer->set("ship_address1", $_POST['ship_address1']);
            	$customer->set("ship_address2", $_POST['ship_address2']);
            	$customer->set("ship_city", $_POST['ship_city']);
            	$customer->set("ship_state", $_POST['ship_state']);
            	$customer->set("ship_zip", $_POST['ship_zip']);
            	$customer->set("salesman", $_POST['salesman']);
            	$customer->set("Contact_Name", $_POST['contact_name']);
            	$customer->set("tax_id", $_POST['tax_id']);
            	$customer->set("email", $_POST['email']);
            	$customer->set("Last_order_date", $_POST['last_order_date']);
            	$customer->set("Last_Sale_date", $_POST['last_sale_date']);
            	$customer->set("web_address", $_POST['website']);
            	$customer->set("Sales_to_Date", $_POST['sales_to_date']);
            	$customer->set("creditlimit", $_POST['credit_limit']);
            	$customer->set("Balance", $_POST['balance']);
            	$customer->set("PastDue", $_POST['pastdue']);
            	$customer->set("discount", $_POST['discount']);
            	$customer->set("net_discount", $_POST['net_discount']);
            	$customer->set("terms", $_POST['terms']);
            	$customer->set("comments2", $_POST['special_note']);
            	
            	if(isset($_POST['jo1'])){
            		$customer->set("JO1", "Y");
            	} else {
            		$customer->set("JO1", "N");
            	}
            	
            	if(isset($_POST['bad_address'])){
            		$customer->set("Bad_Address", "Y");
            	} else {
            		$customer->set("Bad_Address", "N");
            	}
            	
            	if(isset($_POST['cbg'])){
            		$customer->set("CBG", "Y");
            	} else {
            		$customer->set("CBG", "N");
            	}
            	
            	if(isset($_POST['cod'])){
            		$customer->set("COD", "Y");
            	} else {
            		$customer->set("COD", "N");
            	}
            	
            	if(isset($_POST['do_not_ship'])){
            		$customer->set("do_not_ship", "Y");
            	} else {
            		$customer->set("do_not_ship", "N");
            	}
            	
            	if(isset($_POST['ijo'])){
            		$customer->set("IJO", "Y");
            	} else {
            		$customer->set("IJO", "N");
            	}
            	
            	if(isset($_POST['inactive'])){
            		$customer->set("inactive", "Y");
            	} else {
            		$customer->set("inactive", "N");
            	}
            	
            	if(isset($_POST['ljg'])){
            		$customer->set("LJG", "Y");
            	} else {
            		$customer->set("LJG", "N");
            	}
            	
            	if(isset($_POST['mailing'])){
            		$customer->set("mailing", "Y");
            	} else {
            		$customer->set("mailing", "N");
            	}
            	
            	if(isset($_POST['no_mail'])){
            		$customer->set("No_Span", "Y");
            	} else {
            		$customer->set("No_Span", "N");
            	}
            	
            	if(isset($_POST['ojm'])){
            		$customer->set("OJM", "Y");
            	} else {
            		$customer->set("OJM", "N");
            	}
            	
            	if(isset($_POST['past_due'])){
            		$customer->set("past_due", "Y");
            	} else {
            		$customer->set("past_due", "N");
            	}
            	
            	if(isset($_POST['rjo'])){
            		$customer->set("RJO", "Y");
            	} else {
            		$customer->set("RJO", "N");
            	}
            	
            	if(isset($_POST['sjo'])){
            		$customer->set("SJO", "Y");
            	} else {
            		$customer->set("SJO", "N");
            	}
            	
            	if(isset($_POST['special'])){
            		$customer->set("Special", "Y");
            	} else {
            		$customer->set("Special", "N");
            	}
            	
            	if( trim($_POST['last_order_date']) != ""){
            		$customer->set("Last_order_date", $_POST['last_order_date']);
            	}
            	
            	if( trim($_POST['last_sale_date']) != ""){
            		$customer->set("Last_Sale_date", $_POST['last_sale_date']);
            	}            	
            	
            	$add_result = $customer->add();
            	if($add_result){
            		$result['error'] = 0;
            		$result['message'] = "The customer <b>".($_POST['customer_id'])."</b> has been added successfully! <br/><br/> Do you want to add another new customer? Click 'Yes' to add another new one<br/><br/>Click 'No' to the customer list";
            	} else {
            		$result['error'] = 1;
            		$result['message'] = "There is some error happen when inserting to tables!<br /> Please contact with your system administrator!";
            	}
            	echo json_encode($result);
            	exit;
            }
            
            if($_POST["a"] == "check_website"){
            	$result['error'] = 0;
            	$result['message'] = "";
            	if( trim($_POST['website']) != "" ){
            		if(!$customer->isCorrectWebsiteFormat($_POST['website'])){
            			$result['error'] = 1;
            			$result['message'] = "The website is not correct!";
            		}
            	}
            	echo json_encode($result);
            	exit;
            }
            
            if($_POST["a"] == "check_email"){
            	$msg[0] = "This information is required!";
            	$msg[1] = "The email address is not correct!";
            	$msg[2] = "The email address exists! Please enter a new one!";
            	$error_code = $customer->checkEmailValid($_POST['email']);
            	if($error_code >= 0){
            		$result['error'] = 1;
            		$result['message'] = $msg[$error_code];
            	} else {
            		$result['error'] = 0;
            		$result['message'] = "";
            	}
            	echo json_encode($result);
            	exit;
            }
            
            if($_POST["a"] == "check_customer"){
            	$msg[0] = "This information is required!";
            	$msg[1] = "The customer id is not correct! The correct customer should only contain letters and numbers and must start with a letter and the length.";
            	$msg[2] = "The customer id exists! Please input a new one!";
            	$error_code = $customer->checkCustomerValid($_POST['customer_id']);
            	if( $error_code >= 0){
            		$result['error'] = 1;
            		$result['message'] = $msg[$error_code];
            	} else {
            		$result['error'] = 0;
            		$result['message'] = "";
            	}
            	echo json_encode($result);
            	exit;
            }
            
            if($_POST["a"] == "create_customer"){
            	$cust = $customer->genCustomerID();
            	$result['customer_id'] = $cust;
            	echo json_encode($result);
            	exit;
            }
            
        }       
    }
    
    public function searchCustomer() {
		$this->PageTitle = "Customer List";
        $this->Script =<<<EOT
<link rel="stylesheet" type="text/css" href="scripts/ext/examples/shared/icons/silk.css" />
<link rel="stylesheet" type="text/css" href="css/tipTip.css" />
<style type="text/css"> 
    td.request_support {text-align: left; padding: 4px; border-bottom: 1px dotted #acacac; }
	#main{padding: 10px}
</style>
<script type="text/javascript" src="scripts/jquery/jquery.form.js"></script>
<script type="text/javascript" src="scripts/jquery/jquery.tipTip.js"></script>
<script type="text/javascript" src="scripts/apps/listcustomer.js?1112"></script>
EOT;
		if( $this->isPostCallback() ){
			$start = isset($_POST['start']) ? intval($_POST['start']) : 0;
			$limit = isset($_POST['limit']) ? intval($_POST['limit']) : 50;
			$sortname = isset($_POST['sort']) ? $_POST['sort'] : "Customer_ID";
			$sortorder = isset($_POST['dir']) ? $_POST['dir'] : 'ASC';
        	$schWord = "";

        	$customer = new Customer();
        	$result = $customer->search($schWord, $sortname, $sortorder, $start, $limit);
        	echo json_encode($result);
        	exit;
		}
    }
    
    public function deleteCustomer(){
    	$this->PageTitle = "Delete Customer";
    	
    	if( $this->isPostCallback() ){
    		$customer = new Customer();
    		$id = $_POST['id'];
    		$result = $customer->delete($id);
    		echo json_encode($result);
    		exit;
    	}
    }
    
    public function editCustomer(){
    	$this->PageTitle = "Edit Customer";
		
    	$this->Option['showhead'] = isset($_POST['shd']) ? $_POST['shd'] : 1;
    	$this->Option['showfoot'] = isset($_POST['sft']) ? $_POST['sft'] : 1;
    	
    	$customer = new Customer();
    	$result = $customer->getCustomerByID($_POST['id']);
    	
    	if(!$result){
    		echo "<div class='page_title'> Can not find such customer! </div>";
    		exit;
    	}
    	$this->VARS['company_name'] = isset($this->VARS['company_name'])? $this->VARS['company_name'] : $result['Company_Name'];
    	$this->VARS['customer_id'] = isset($this->VARS['customer_id'])? $this->VARS['customer_id'] : $result['Customer_ID'];
    	$this->VARS['address1'] = isset($this->VARS['address1'])? $this->VARS['address1'] : $result['Address1'];
    	$this->VARS['address2'] = isset($this->VARS['address2'])? $this->VARS['address2'] : $result['Address2'];
    	$this->VARS['store_number'] = isset($this->VARS['store_number'])? $this->VARS['store_number'] : $result['Store_Number'];
    	$this->VARS['contact_name'] = isset($this->VARS['contact_name'])? $this->VARS['contact_name'] : $result['Contact_Name'];
    	$this->VARS['city'] = isset($this->VARS['city'])? $this->VARS['city'] : $result['City'];
    	$this->VARS['region'] = isset($this->VARS['region'])? $this->VARS['region'] : $result['Region'];
    	$this->VARS['postal_code'] = isset($this->VARS['postal_code'])? $this->VARS['postal_code'] : $result['Postal_Code'];
    	$this->VARS['phone'] = isset($this->VARS['phone'])? $this->VARS['phone'] : $result['Phone'];
    	$this->VARS['comments1'] = isset($this->VARS['comments1']) ? $this->VARS['comments1'] : $result['comments1'];
    	$this->VARS['fax'] = isset($this->VARS['fax'])? $this->VARS['fax'] : $result['Fax'];
    	$this->VARS['salesman'] = isset($this->VARS['salesman'])? $this->VARS['salesman'] : $result['salesman'];
    	$this->VARS['sales_to_date'] = isset($this->VARS['sales_to_date'])? $this->VARS['sales_to_date'] : $result['Sales_to_Date'];
    	$this->VARS['credit_limit'] = isset($this->VARS['credit_limit'])? $this->VARS['credit_limit'] : $result['creditlimit'];
    	$this->VARS['tax_id'] = isset($this->VARS['tax_id'])? $this->VARS['tax_id'] : $result['tax_id'];
    	$this->VARS['balance'] = isset($this->VARS['balance'])? $this->VARS['balance'] : $result['Balance'];
    	$this->VARS['pastdue'] = isset($this->VARS['pastdue'])? $this->VARS['pastdue'] : $result['PastDue'];
    	$this->VARS['email'] = isset($this->VARS['email'])? $this->VARS['email'] : $result['email'];
    	$this->VARS['last_order_date'] = isset($this->VARS['last_order_date'])? $this->VARS['last_order_date'] : $result['Last_order_date'];
    	$this->VARS['last_sale_date'] = isset($this->VARS['last_sale_date'])? $this->VARS['last_sale_date'] : $result['Last_Sale_date'];
    	$this->VARS['website'] = isset($this->VARS['website'])? $this->VARS['website'] : $result['web_address'];
    	$this->VARS['net_discount'] = isset($this->VARS['net_discount'])? $this->VARS['net_discount'] : $result['net_discount'];
    	$this->VARS['discount'] = isset($this->VARS['discount'])? $this->VARS['discount'] : $result['discount'];
    	$this->VARS['terms'] = isset($this->VARS['terms'])? $this->VARS['terms'] : $result['terms'];
    	$this->VARS['jo1'] = isset($this->VARS['jo1'])? $this->VARS['jo1'] : $result['JO1'];
    	$this->VARS['cbg'] = isset($this->VARS['cbg'])? $this->VARS['cbg'] : $result['CBG'];
    	$this->VARS['ijo'] = isset($this->VARS['ijo'])? $this->VARS['ijo'] : $result['IJO'];
    	$this->VARS['ljg'] = isset($this->VARS['ljg'])? $this->VARS['ljg'] : $result['LJG'];
    	$this->VARS['rjo'] = isset($this->VARS['rjo'])? $this->VARS['rjo'] : $result['RJO'];
    	$this->VARS['sjo'] = isset($this->VARS['sjo'])? $this->VARS['sjo'] : $result['SJO'];
    	$this->VARS['ship_name'] = isset($this->VARS['ship_name'])? $this->VARS['ship_name'] : $result['ship_name'];
    	$this->VARS['bad_address'] = isset($this->VARS['bad_address'])? $this->VARS['bad_address'] : $result['Bad_Address'];
    	//$this->VARS['no_mail'] = isset($this->VARS['no_mail'])? $this->VARS['no_mail'] : $result['']
    	$this->VARS['inactive'] = isset($this->VARS['inactive'])? $this->VARS['inactive'] : $result['inactive'];
    	$this->VARS['ship_address1'] = isset($this->VARS['ship_address1'])? $this->VARS['ship_address1'] : $result['ship_address1'];
    	$this->VARS['cod'] = isset($this->VARS['cod'])? $this->VARS['cod'] : $result['COD'];
    	$this->VARS['past_due'] = isset($this->VARS['past_due'])? $this->VARS['past_due'] : $result['past_due'];
    	$this->VARS['do_not_ship'] = isset($this->VARS['do_not_ship'])? $this->VARS['do_not_ship'] : $result['do_not_ship'];
    	$this->VARS['ship_address2'] = isset($this->VARS['ship_address2'])? $this->VARS['ship_address2'] : $result['ship_address2'];
    	$this->VARS['mailing'] = isset($this->VARS['mailing'])? $this->VARS['mailing'] : $result['mailing'];
    	$this->VARS['special'] = isset($this->VARS['special'])? $this->VARS['special'] : $result['Special'];
    	$this->VARS['ojm'] = isset($this->VARS['ojm'])? $this->VARS['ojm'] : $result['OJM'];
    	$this->VARS['ship_city'] = isset($this->VARS['ship_city'])? $this->VARS['ship_city'] : $result['ship_city'];
    	$this->VARS['ship_state'] = isset($this->VARS['ship_state'])? $this->VARS['ship_state'] : $result['ship_state'];
    	$this->VARS['ship_zip'] = isset($this->VARS['ship_zip'])? $this->VARS['ship_zip'] : $result['ship_zip'];
    	$this->VARS['special_note'] = isset($this->VARS['special_note'])? $this->VARS['special_note'] : $result['comments2'];
    }
}
?>
