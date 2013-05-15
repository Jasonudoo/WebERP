<?php
/**
 * @copyright Copyright(2010) All Right Reserved.
 * @filesource: header.php,v$
 * @package: lib
 *
 * @author Jason Williams <jasonudoo@gmail.com>
 * @version $Id: v 1.0 2010-05-20 Jason Exp $
 *
 * @abstract:
 */
if (!defined('PROJECT_START')) {
    exit('Access Denied');
}
global $main, $prg;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >
<head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Andrea Candela - <?php if(isset($prg->PageTitle)) echo $prg->PageTitle; ?> </title>
    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <link rel="stylesheet" type="text/css" href="css/menu.css" />
    <link rel="stylesheet" type="text/css" href="css/btn.css" />
    <link rel="stylesheet" type="text/css" href="css/base/jquery.ui.all.css" />
	<link rel="stylesheet" type="text/css" href="scripts/ext/resources/css/ext-all.css" />
    <!-- Include javascript libraries -->
    <script type="text/javascript" src="scripts/jquery/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="scripts/jquery/jquery-ui-1.8.1.custom.min.js"></script>
	<script type="text/javascript" src="scripts/ext/adapter/jquery/ext-jquery-adapter.js"></script>
	<script type="text/javascript" src="scripts/ext/adapter/ext/ext-base.js"></script>
	<script type="text/javascript" src="scripts/ext/ext-all.js"></script>
    <?php if(isset($prg->Script)) echo $prg->Script;?>
</head>

<body>
<div style="width: 976px; margin: auto; color: #fff; font-weight: bold; size: 10px; height: 50px; margin-top: 18px;">
    <table style="width: 100%;">
        <tr>
            <td></td>
            <td>&nbsp;</td>
            <td style="text-align: right; font-size: 11px; font-weight: normal; vertical-align: middle;">
                <a class="headerLinkRight" href="logout.php">Logout<img src="images/new/orange-arrow.png" style="vertical-align: middle; border: 0px; margin-left: 6px;" alt="Logout" /></a>
            </td>
        </tr>
    </table>
</div>

<div style="width: 980px; margin: auto;">
    <table style="border-collapse: collapse; width: 100%; display: block;">
        <tr>
            <td><a class="homeTab" href="main.php"></a></td>
            <?php if($main->page == "customer"){ ?>
            <td><a class="managedTabSelected" href="main.php?u=customer&actions=list"></a></td>
            <?php }else{ ?>
            <td><a class="managedTab" href="main.php?u=customer&actions=list"></a></td>
            <?php }?>
            <?php if($main->page == "product"){?>
            <td><a class="myAccountTabSelected" href="main.php?u=product"></a></td>
            <?php }else{?>
            <td><a class="myAccountTab" href="main.php?u=product"></a></td>
            <?php }?>
            <?php if($main->page == "order"){?>
            <td><a class="cloudTabSelected" href="main.php?u=order&action=list"></a></td>
            <?php }else{?>
            <td><a class="cloudTab" href="main.php?u=order&action=list"></a></td>
            <?php }?>
            <?php if($main->page == "invoice"){ ?>
            <td><a class="dedicatedTabSelected" href="main.php?u=invoice&actions=list"></a></td>
            <?php }else{?>
            <td><a class="dedicatedTab" href="main.php?u=invoice&actions=list"></a></td>
            <?php }?>
            <td class="spacerTab">
                <div style="width: 100%; text-align: right;">Welcome <span id="welcome_text" style="padding-right: 15px; font-weight: bold;"><?php echo dhtmlspecialchars($main->Session->UserInfo->User_Name); ?></span></div>
            </td>

        </tr>
    </table>
    <table style="width: 100%; border-collapse: collapse; display: block;">
        <tr>
<?php if($main->page == "customer"){ ?>        
            <td class="menuSpacer menuBG_managed">&nbsp;</td>
            <td class="menuBG_managed" style="width: 185px; text-align: left;">
                <a class="menuLinks" href="main.php?u=customer&actions=add">Add Customer</a>
            </td>
            <td class="menuBG_managed" style="width: 185px; text-align:left;">
                <a class="menuLinks" href="main.php?u=customer&actions=list">Customer List</a>
            </td>
            <td style="width: 669px;" class="menuBG_managed">&nbsp;</td>
<?php }
    if($main->page == "order"){?>
            <td class="menuSpacer menuBG_cloud">&nbsp;</td>
            <td class="menuBG_cloud" style="width: 185px; text-align: left;">
                <a class="menuLinks" href="main.php?u=order&actions=add">Add Order</a>
            </td>
            <td class="menuBG_cloud" style="width: 185px; text-align: left;">
                <a class="menuLinks" href="main.php?u=order&actions=list">Order List</a>
            </td>
            <td style="width: 669px;" class="menuBG_cloud">&nbsp;</td>    
<?php }
    if($main->page == "invoice"){?>
            <td class="menuSpacer menuBG_dedicated">&nbsp;</td>
            <td class="menuBG_dedicated" style="width: 185px; text-align: left;">
                <a class="menuLinks" href="main.php?u=invoice&actions=add">Add Invoice</a>
            </td>
            <td class="menuBG_dedicated" style="width: 185px; text-align: left;">
                <a class="menuLinks" href="main.php?u=invoice&actions=list">Invoice List</a>
            </td>
            <td style="width: 669px;" class="menuBG_dedicated">&nbsp;</td>    
<?php }
	if($main->page == "product"){?>
            <td class="menuSpacer menuBG_my-account">&nbsp;</td>
            <td class="menuBG_my-account" style="width: 185px; text-align: left;">
                <a class="menuLinks" href="main.php?u=product&actions=add">Add Product</a>
            </td>
            <td class="menuBG_my-account" style="width: 185px; text-align: left;">
                <a class="menuLinks" href="main.php?u=product&actions=list">Product List</a>
            </td>
            <td style="width: 669px;" class="menuBG_my-account">&nbsp;</td>    
	<?php }?>
        </tr>
    </table>

</div>

<div style="width: 980px; margin: auto; background-color: #fff; min-height: 400px;">
    <div style="padding: 10px 0px 10px 0px; width: 952px; margin: auto;">
