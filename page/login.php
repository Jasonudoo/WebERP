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

class LoginPage extends Page {
    
    public function __construct() {
        parent::$isLoginPage = TRUE;
        parent::__construct();
    }
    public function Run() {
        $user = new User();
        $escape_time = 20 * 60;
        if($this->isPostCallback()){
            $result = array();
            if($_POST['a'] == "login"){
                $userInfo = $user->login($_POST['u'], $_POST['p']);
                if(!$userInfo){
                    $result['error'] = 1;
                    $result['message'] = "";
                } else {
                    $result['error'] = 0;
                    $result['message'] = "main.php";
                }
                if($_POST['r'] == "ajax"){
                    print json_encode($result);
                    exit;
                }
            }   
        }
    }
}
?>
