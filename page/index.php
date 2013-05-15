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

class Index extends Page{
    
	private static $_output_url = "";
	private static $_output_class = "";
    
    public function __construct() {
		parent::__construct();
    }
}
?>
