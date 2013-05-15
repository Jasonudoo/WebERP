<?php
/**
 * @copyright Copyright(2010) All Right Reserved.
 * @filesource: list.php,v$
 * @package: product
 *
 * @author Jason Williams <jasonudoo@gmail.com>
 * @version $Id: v 1.0 2010-05-20 Jason Exp $
 *
 * @abstract:
 */

if (!defined('PROJECT_START')) {
    exit('Access Denied');
}

require_once PROJECT_ROOT."/lib/header.php";
?>
<!-- ############################# End Header ############################## -->
<div class="page_title"> Product List </div>
<div id="grid_table"></div>
<div id="edit-confirm"></div>
<div id="delete-confirm"></div>
<?php require_once PROJECT_ROOT."/lib/footer.php"; ?>
