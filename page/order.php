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

class OrderPage extends Page{
	public function __construct() {
        parent::__construct();
    }
    public function Run() {	
		$act = isset($_REQUEST['actions']) ? $_REQUEST['actions'] : "list";
		switch($act){
			case "add" :
				$output_url = "add.php";
				$this->PageTitle = "Add Order";
				break;
			case "delete" :
				$output_url = "delete.php";
				$this->PageTitle = "Delete Order";
				break;
			case "edit" :
				$output_url = "update.php";
				$this->PageTitle = "Edit Order";
				break;
			default :
				$output_url = "list.php";
				$this->PageTitle = "Order List";
				break;
		}
		$filename = PROJECT_ROOT."/actions/order/".$output_url;
		if( file_exists($filename) ){
			require_once($filename);
		}
		else{
			$this->gotoErrorPage();
		}
    }
}
?>