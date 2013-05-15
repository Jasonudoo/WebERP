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
require_once PROJECT_ROOT."/object/Product.php";

class ProductPage extends Page{
	public function __construct() {
        parent::__construct();
    }
    public function Run() {	
		$act = isset($_REQUEST['actions']) ? $_REQUEST['actions'] : "list";
		switch($act){
			case "add" :
				$output_url = "add.php";
				$this->addProduct();
				break;
			case "delete" :
				$output_url = "delete.php";
				$this->PageTitle = "Delete Product";
				break;
			case "edit" :
				$output_url = "update.php";
				$this->PageTitle = "Edit Product";
				break;
			default :
				$output_url = "list.php";
				$this->searchProduct();
				break;
		}
		$filename = PROJECT_ROOT."/actions/product/".$output_url;
		if( file_exists($filename) ){
			require_once($filename);
		}
		else{
			$this->gotoErrorPage();
		}
    	
    }
    
    public function addProduct(){
		$this->PageTitle = "Add Prodcut";
        $this->Script =<<<EOT
<link rel="stylesheet" type="text/css" href="css/tipTip.css" />
<script type="text/javascript" src="scripts/jquery/jquery.form.js"></script>
<script type="text/javascript" src="scripts/jquery/jquery.tipTip.js"></script>
<script type="text/javascript" src="scripts/apps/addproduct.js"></script>
<style type="text/css"> 
    td.request_support {text-align: left; padding: 4px; border-bottom: 1px dotted #acacac; }
</style>
EOT;

        if($this->isPostCallback()){
        	$product = new Product();
        	$result = array();
        	
            if(isset($_POST['special_form_command']) && $_POST['special_form_command'] == "add"){
        	}
        	
            if($_POST["a"] == "check_bar"){
            	$msg[0] = "This information is required!";
            	$msg[1] = "The product bar code is not correct! The correct bar code should only contain letters and numbers and must start with a letter and the length.";
            	$msg[2] = "The product bar code exists! Please input a new one!";
            	$error_code = $product->checkBarcodeValid($_POST['barcode']);
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
            
            if($_POST["a"] == "create_bar"){
            	$cust = $product->genBarCode();
            	$result['barcode'] = $cust;
            	echo json_encode($result);
            	exit;
            }
			
            if($_POST['a'] == "check_id"){
            	$msg[0] = "This information is required!";
            	$msg[1] = "The product id is not correct! The correct product id should only contain letters and numbers and must start with a letter and the length.";
            	$msg[2] = "The product id exists! Please input a new one!";
            	$error_code = $product->checkProductIDValid($_POST['pid']);
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
            if($_POST["a"] == "create_id"){
            	$cust = $product->genProductID();
            	$result['ID'] = $cust;
            	echo json_encode($result);
            	exit;
            }
            
        }
    }
    
    public function searchProduct(){
		$this->PageTitle = "Product List";
        $this->Script =<<<EOT
<link rel="stylesheet" type="text/css" href="scripts/ext/examples/shared/icons/silk.css" />
<script type="text/javascript" src="scripts/apps/listproduct.js?1112"></script>
EOT;
		if( $this->isPostCallback() ){
			$start = isset($_POST['start']) ? intval($_POST['start']) : 0;
			$limit = isset($_POST['limit']) ? intval($_POST['limit']) : 50;
			$sortname = isset($_POST['sort']) ? $_POST['sort'] : "Bar";
			$sortorder = isset($_POST['dir']) ? $_POST['dir'] : 'ASC';
        	$schWord = "";

        	$product = new Product();
        	$result = $product->search($schWord, $sortname, $sortorder, $start, $limit);
        	echo json_encode($result);
        	exit;
		}
		
    }
}
?>