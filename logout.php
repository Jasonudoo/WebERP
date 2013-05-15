<?php
/**
 * @copyright Copyright(2010) All Right Reserved.
 * @filesource: login,v$
 * @package:
 *
 * @author Jason Williams <jasonudoo@gmail.com>
 * @version $Id: v 1.0 2010-05-20 Jason Exp $
 *
 * @abstract:
 */

define('PROJECT_START', true);
define('PROJECT_ROOT', dirname(__FILE__));

require_once PROJECT_ROOT."/includes/include.php";
require_once PROJECT_ROOT."/page/logout.php";

$prg = new LogoutPage();
$prg->Run();
?>