<?php
/**
 * @copyright Copyright(2010) All Right Reserved.
 * @filesource: index.php,v$
 * @package:
 *
 * @author Jason Williams <jasonudoo@gmail.com>
 * @version $Id: v 1.0 2010-02-10 Jason Exp $
 *
 * @abstract: 
 */

phpinfo();
define('PROJECT_START', true);
define('PROJECT_ROOT', dirname(__FILE__));

require_once PROJECT_ROOT."/includes/include.php";
require_once PROJECT_ROOT."/page/index.php";
$prg = new Index();
?>
<html>
<head>
<meta http-equiv="refresh" content="2;url=login.php">
</head>
</html>
