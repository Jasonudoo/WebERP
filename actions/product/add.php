<?php
/**
 * @copyright Copyright(2010) All Right Reserved.
 * @filesource: add.php,v$
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
<div class="page_title"> Add Product </div>
<!-- Begin Content --> 
<form action="main.php?u=product&actions=add" method="post" name="main" id="main"> 
	<table style="width: 100%;"> 
		<tr> 
			<td style="width: 150px;" class="request_support">Bar Code : </td> 
			<td class="request_support"> 
				<input style="width: 250px;" type="text" name="Bar" id="Bar" value="<?php echo dhtmlspecialchars($prg->VARS['Bar']); ?>" title="Please enter the product's barcode. It is required! If it is empty, system will generate a barcode for it." /> 
				<div class="errormsg" id="errormsg_Bar"></div>
			</td>
			<td syle="width:120px;" class="request_support">Product Image : </td>
			<td class="request_support">
			<input style="width:180px" type="file" name="Image" id="Image" />
			</td>
		</tr>
		<tr>
			<td class="request_support">Product ID : </td>
			<td class="request_support">
				<input style="width: 250px;" type="text" name="Product_ID" id="Product_ID" value="<?php echo dhtmlspecialchars($prg->VARS['Product_ID']); ?>" title="Please enter the product ID. It is required! If it is empty, System will generate an serial number for the product!" /> 
				<div class="errormsg" id="errormsg_Product_ID"></div>
			</td>
			<td class="request_support">Title : </td>
			<td class="request_support">
				<input style="width:220px;" type="text" name="Title" id="Title" value="<?php echo dhtmlspecialchars($prg->VARS['Title']); ?>" title="Please enter the product's title. It is required!" />
				<div class="errormsg" id="errormsg_Title"></div>
			</td>
		</tr>
		<tr>
			<td class="request_support">US Style : </td>
			<td class="request_support">
				<input style="width:250px;" type="text" name="US_Style" id="US_Style" value="<?php echo dhtmlspecialchars($prg->VARS['US_Style']); ?>" title="Please enter the US Style value, it is required!" />
				<div class="errormsg" id="errormsg_US_Style"></div>
			</td>
			<td class="request_support">HK Style : </td>
			<td class="request_support">
				<input style="width:220px;" type="text" name="HK_Style" id="HK_Style" value="<?php echo dhtmlspecialchars($prg->VARS['HK_Style']); ?>" title="Please enter the HK Style value, it is required!" />
				<div class="errormsg" id="errormsg_HK_Style"></div>
			</td>
		</tr>
		<tr>
			<td class="request_support">Category Code : </td>
			<td class="request_support">
				<input style="width:250px;" type="text" name="Category_Code" id="Category_Code" value="<?php echo dhtmlspecialchars($prg->VARS['Category_Code']); ?>" title="Please enter the Category Code. It is required!" />
				<div class="errormsg" id="errormsg_Category_Code"></div>
			</td>
			<td class="request_support">Category : </td>
			<td class="request_support">
				<input style="width:220px" type="text" name="Category" id="Category" value="<?php dhtmlspecialchars($prg->VARS['Category']); ?>" title="Please enter the categroy, it is required!" />
				<div class="errormsg" id="errormsg_Category"></div>
			</td>
		</tr>
		<tr>
			<td class="request_support">Vendor : </td>
			<td class="request_support">
				<input style="width:250px" type="text" name="Vendor" id="Vendor" value="<?php dhtmlspecialchars($prg->VARS['Vendor']); ?>" title="Please enter the Vendor, it is required!" />
				<div class="errormsg" id="errormsg_Vendor"></div>				
			</td>
			<td class="request_support">Unit Price : </td>
			<td class="request_support">
				<input style="width:220px" type="text" name="Unit_Price" id="Unit_Price" value="<?php dhtmlspecialchars($prg->VARS['Unit_Price']); ?>" title="Please enter the price unit price, it is required!" />
				<div class="errormsg" id="errormsg_Unit_Price"></div>
			</td>
		</tr>
		<tr>
			<td class="request_support">Product Cost : </td>
			<td class="request_support">
				<input style="width:250px" type="text" name="Product_Cost" id="Product_Cost" value="<?php dhtmlspecialchars($prg->VARS['Product_Cost']); ?>" title="Please enter the product cost, it is required!" />
				<div class="errormsg" id="errormsg_Product_Cost"></div>
			</td>
			<td class="request_support">Raw Cost : </td>
			<td class="request_support">
				<input style="width:220px" type="text" name="Raw_Cost" id="Raw_Cost" value="<?php dhtmlspecialchars($prg->VARS['Raw_Cost']); ?>" title="Please enter the raw cost value, it is required!" />
				<div class="errormsg" id="errormsg_Raw_Cost"></div>
			</td>
		</tr>
		<tr>
			<td class="request_support">Lau Stock : </td>
			<td class="request_support">
				<input style="width:250px" type="text" name="Lau_Stock" id="Lau_Stock" value="<?php echo dhtmlspecialchars($prg->VARS['Lau_Stock']); ?>" title="Please enter the lau stock, it is required!" />
				<div class="errormsg" id="errormsg_Lau_Stock"></div>
			</td>
			<td class="request_support">OJM Stock : </td>
			<td class="request_support">
				<input style="width:220px" type="text" name="Ojm_Stock" id="Ojm_Stock" value="<?php echo dhtmlspecialchars($prg->VARS['Ojm_Stock']); ?>" title="Please enter the ojm stock, it is required!" />
				<div class="errormsg" id="errormsg_Ojm_Stock"></div>
			</td>
		</tr>
		<tr>
			<td class="request_support">Stone_Code : </td>
			<td class="request_support">
				<input style="width:250px" type="text" name="Stone_Code" id="Stone_Code" value="<?php echo dhtmlspecialchars($prg->VARS['Stone_Code']); ?>" title="Please enter the Stone Code. It is optional!" />
				<div class="errormsg" id="errormsg_Stone_Code"></div>
			</td>
			<td class="request_support">Stone : </td>
			<td class="request_support">
				<input style="width:220px" type="text" name="Stone" id="Stone" value="<?php echo dhtmlspecialchars($prg->VARS['Stone']); ?>" title="Please eneter the Stone value, it is optional!" />
				<div class="errormsg" id="errormsg_Stone"></div>
			</td>
		</tr>
		<tr>
			<td class="request_support">Cut : </td>
			<td class="request_support">
				<input style="width:250px" type="text" name="Cut" id="Cut" value="<?php echo dhtmlspecialchars($prg->VARS['Cut']); ?>" title="Please enter the cut value, it is optional!" />
				<div class="errormsg" id="errormsg_Cut"></div>
			</td>
			<td class="request_support">Setting : </td>
			<td class="request_support">
				<input style="width:220px" type="text" name="Setting" id="Setting" value="<?php echo dhtmlspecialchars($prg->VARS['Setting']); ?>" title="Please enter the setting value, it is optional!" />
				<div class="errormsg" id="errormsg_Setting"></div>
			</td>
		</tr>
		<tr>
			<td class="request_support">Metal : </td>
			<td class="request_support">
				<input style="width:250px" type="text" name="Metal" id="Metal" value="<?php echo dhtmlspecialchars($prg->VARS['Metal']); ?>" title="Please enter the metal value, it is optional!" />
				<div class="errormsg" id="errormsg_Metal"></div>
			</td>
			<td class="request_support">Shape : </td>
			<td class="request_support">
				<input style="width:220px" type="text" name="Shape" id="Shape" value="<?php echo dhtmlspecialchars($prg->VARS['Shape']); ?>" title="Please enter the shape value, it is optional!" />
				<div class="errormsg" id="errormsg_Shape"></div>
			</td>
		</tr>
		<tr>
			<td class="request_support"><input type="checkbox" name="WebHide" id="WebHide" value="Y" 
			<?php 
				$webhide = ""; 
				if(isset($prg->VARS['WebHide']) && $prg->VARS['WebHide'] == "Y"){
					echo "checked";  
					$webhide = "disable=disable";
				}
			?> /> Web Price : </td>
			<td class="request_support">
				<input style="width:250px" type="text" name="WebPrice" id="WebPrice" <?php  echo $webhide; ?> value="<?php echo dhtmlspecialchars($prg->VARS['WebPrice']); ?>" title="Please enter the web price, it is optional!" />
				<div class="errormsg" id="errormsg_WebPrice"></div>
			</td>
			<td class="request_support">Web Model : </td>
			<td class="request_support">
				<input style="width:220px" type="text" name="WebModel" id="WebModel" <?php echo $webhide; ?> value="<?php echo dhtmlspecialchars($prg->VARS['WebModel']); ?>" title="Please enter the web model, it is optional!" />
				<div class="errormsg" id="errormsg_WebModel"></div>
			</td>
		</tr>
		<tr>
			<td class="request_support"><input type="checkbox" name="Box" id="Box" value="Y" 
			<?php
				$boxhide = "";
				if(isset($prg->VARS['Box']) && $prg->VARS['Box'] == "Y") {
					echo "checked";
					$boxhide = "disable=disable";
				} 
			?> />Box Bar : </td>
			<td class="request_support">
				<input style="width:250px" type="text" name="BoxBar" id="BoxBar" <?php echo $boxhide; ?> value="<?php echo dhtmlspecialchars($prg->VARS['BoxBar']); ?>" title="Please enter the box barcode, it is optional!" />
				<div class="errormsg" id="errormsg_BoxBar"></div>
			</td>
			<td class="request_support">Size : </td>
			<td class="request_support">
				<input style="width:220px" type="text" name="Size" id="Size" value="<?php echo dhtmlspecialchars($prg->VARS['Size']); ?>" title="Please enter the product size, it is optional!" />
				<div class="errormsg" id="errormsg_Size"></div>
			</td>
		</tr>
		<tr> 
			<td colspan="4" style="padding: 4px; text-align: center;"> 
				<input type="hidden" name="special_form_command" id="special_form_command" value="add" />
				<input type="hidden" name="ajax" id="ajax" value="1" />
				<input type="submit" name="btnAdd" id="btnAdd" class="btn-s blue" value="Add" />
				&nbsp;&nbsp;&nbsp;
				<input type="button" name="btnReset" id="btnReset" class="btn-s blue" value="Reset" />
				&nbsp;&nbsp;&nbsp;
			</td> 
		</tr> 		
	</table>
</form>
<?php 
/*
	`QOH` INTEGER NOT NULL,
	`Reorder` INTEGER NOT NULL,
	`Net` ENUM('Y','N') NOT NULL,
	`Promo` ENUM('Y','N') NULL,
	`Tag1` VARCHAR(15) NULL,
	`Tag3` VARCHAR(15) NULL,
	`Tag4` DECIMAL(15,4) NOT NULL,
	`D_wt` DECIMAL(8,2) NOT NULL,
	`S_wt` DECIMAL(8,2) NOT NULL,
	`Keywords` VARCHAR(200) NULL,
	`Special` VARCHAR(3) NULL,
	`Added` DATETIME NOT NULL,
	`lastTrans` VARCHAR(40) NULL,
	`Cost` ENUM('Y','N') NOT NULL,
	`Created` DATETIME NOT NULL,
*/
?>
<?php require_once PROJECT_ROOT."/lib/footer.php"; ?>
