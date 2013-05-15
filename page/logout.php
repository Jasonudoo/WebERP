<?php
/**
 * @copyright Copyright(2010) All Right Reserved.
 * @filesource: login.php,v$
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

require_once PROJECT_ROOT."/object/User.php";

class LogoutPage extends Page {
    
    public function __construct() {
    	parent::$isLoginPage = TRUE;
        parent::__construct();
    }
    
    public function Run(){
    	$user = new User();
    	$user->signout();
    }
}