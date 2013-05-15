<?php
/**
 * @copyright Copyright(2010) All Right Reserved.
 * @filesource:include.php,v$
 * @package: include
 *
 * @author Jason Williams <jasonudoo@gmail.com>
 * @version $Id: v 1.0 2010-02-10 Jason Exp $
 *
 * @abstract: 
 */

//error_reporting(0);
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 'on');
date_default_timezone_set('America/Los_Angeles');
set_magic_quotes_runtime(0);
ini_set("register_globals", 0);

require_once PROJECT_ROOT."/includes/config.php";
require_once PROJECT_ROOT."/lib/common.func.php";
require_once PROJECT_ROOT."/object/Error.php";
require_once PROJECT_ROOT."/object/Module.php";
require_once PROJECT_ROOT."/object/Page.php";
require_once PROJECT_ROOT."/object/Session.php";

?>