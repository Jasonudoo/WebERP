<?php
/**
 * @copyright Copyright(2010) All Right Reserved.
 * @filesource: Page.php,v$
 * @package: object
 *
 * @author Jason Williams <jasonudoo@gmail.com>
 * @version $Id: v 1.0 2010-02-10 Jason Exp $
 *
 * @abstract:
 */
if (!defined('PROJECT_START')) {
    exit('Access Denied');
}

require_once PROJECT_ROOT."/object/Session.php";

class Page {
    
    //public variable declear section
    public $ServerVar;
    public $EnvVar;
    public $CookieVar;
    public $VARS;
    
    public $Script;
    public $PageTitle;
	public $Session;	    
    public static $isLoginPage = FALSE;
    
    //private variable declear section
    private static $INITIALIZATION = FALSE;
    
    /**
     * the object constructor function
     * @return
     */
    public function __construct() {
    	$this->Session = new Session();
        $this->Session->verify();
        if( self::$isLoginPage ){
        	if( $this->Session->Login ){
        		if(!headers_sent()){
        			header('Location:main.php');
        		}
        	}
        } else {
        	if( !$this->Session->Login){
        		if(!headers_sent()){
        			header('Location: login.php');
        		}
        	}
        }
        if (!self::$INITIALIZATION) $this->initialization();
    }
    
    /**
     * get the system variables before page loading
     * @return
     */
    private function initialization() {
        //global $_POST,$_GET,$_SERVER,$_FILES,$_COOKIE,$_ENV;
        
        $this->ServerVar = &$_SERVER;
        $this->EnvVar = &$_ENV;
        $this->CookieVar = &$_COOKIE;
        $this->VARS = daddslashes(array_merge($_POST, $_GET, $_FILES));
        //$this->VARS = array_merge($_POST, $_GET, $_FILES);
    }
    
    public function gotoErrorPage() {
        ob_start();
        header("HTTP/1.0 404 Not Found");
        ob_end();
    }
    
    /**
     * get the message content according the message index
     * @access protected
     * @param string/integer $p_code
     * @return
     */
    protected function getMessage($p_code) {
        $langFile = PROJECT_ROOT."/includes/message.inc.php";
        
        if (file_exists($langFile)) {
            include_once ($langFile);
        }
        
        if (isset($_Message[$p_code])) {
            return $_Message[$p_code];
        }
        
        return FALSE;
    }
    
    /**
     * @access protected
     * @param object $p_val
     * @return
     */
    protected function getJsonString($p_val) {
        $str = "";
        
        if (is_array($p_val)) {
            $str = json_encode($p_val);
            $str = str_replace('{', '[', $str);
            $str = str_replace('}', ']', $str);
            $str = preg_replace('%"([^"]*)":%smi', '', $str);
        
        }
        return $str;
    }
    
    private function getRequestMethod(){
		return $this->ServerVar['REQUEST_METHOD'];    	
    }
    
    public function isPostCallback(){
		if($this->ServerVar['REQUEST_METHOD'] == 'POST'){
			return TRUE;
		}
		return FALSE;
    }
    
    public function isGetCallback(){
		if($this->ServerVar['REQUEST_METHOD'] == 'GET'){
			return TRUE;
		}
		return FALSE;
    }
}

?>
