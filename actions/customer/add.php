<?php
/**
 * @copyright Copyright(2010) All Right Reserved.
 * @filesource: add.php,v$
 * @package: customer
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
<div class="page_title"> Add Customer </div>
<!-- Begin Content --> 
<form action="main.php?u=customer&actions=add" method="post" name="main" id="main"> 
	<table style="width: 100%;"> 
		<tr> 
			<td style="width: 150px;" class="request_support">Company Name : </td> 
			<td class="request_support"> 
				<input style="width: 250px;" type="text" name="company_name" id="company_name" value="<?php echo dhtmlspecialchars($prg->VARS['company_name']); ?>" title="Please enter the company name. It is required!" /> 
				<div class="errormsg" id="errormsg_company_name"></div>
			</td>
			<td style="width: 120px;" class="request_support">Customer ID : </td>
			<td class="request_support">
				<input style="width: 220px;" type="text" name="customer_id" id="customer_id" value="<?php echo dhtmlspecialchars($prg->VARS['customer_id']); ?>" title="Please enter the customer ID. It is required! If it is empty, System will generate an serial number for the customer!" /> 
				<div class="errormsg" id="errormsg_customer_id"></div>
			</td>
		</tr> 
		<tr> 
			<td class="request_support">Company Address 1 : </td>	
			<td class="request_support"> 
				<input style="width: 250px;" type="text" name="address1" id="address1" value="<?php echo dhtmlspecialchars($prg->VARS['address1']); ?>" title="Please enter the customer's address. It is optional!" /> 
			</td>
			<td class="request_support">Store Number : </td>	
			<td class="request_support"> 
				<input style="width: 220px;" type="text" name="store_number" id="store_number" value="<?php echo dhtmlspecialchars($prg->VARS['store_number']); ?>" title="Please enter the customer's store number. It is required!" /> 
				<div class="errormsg" id="errormsg_store_number"></div>
			</td>
		</tr> 
		<tr> 
			<td class="request_support">Company Address 2: </td>	
			<td class="request_support"> 
				<input style="width: 250px;" type="text" name="address2" id="address2" value="<?php echo dhtmlspecialchars($prg->VARS['address2']); ?>" title="Please enter the customer's address. It is options!" /> 
			</td>
			<td class="request_support">Contact Name : </td>	
			<td class="request_support"> 
				<input style="width: 220px;" type="text" name="contact_name" id="contact_name" value="<?php echo dhtmlspecialchars($prg->VARS['contact_name']); ?>" title="Please enter the customer's contact name. It is required!" /> 
				<div class="errormsg" id="errormsg_contact_name"></div>
			</td>
		</tr> 
		<tr> 
			<td class="request_support">City/State/Zip : </td>	
			<td class="request_support">
				<input style="width: 80px;" type="text" name="city" id="city" value="<?php echo dhtmlspecialchars($prg->VARS['city']); ?>" title="Please enter the customer's work city. It is required!" />
				/<input style="width: 100px;" type="text" name="region" id="region" value="<?php echo dhtmlspecialchars($prg->VARS['region']);?>" title="Please select one of state in the drop-dowm menu. It is required!" /> 
				/<input style="width: 50px;" type="text" name="postal_code" id="postal_code" value="<?php echo dhtmlspecialchars($prg->VARS['postal_code']); ?>" title="Please enter the postal code. It is required!" />
				<div class="errormsg" id="errormsg_city"></div>
			</td>
			<td class="request_support">Phone : </td>	
			<td class="request_support"> 
				<input style="width: 220px;" type="text" name="phone" id="phone" value="<?php echo dhtmlspecialchars($prg->VARS['phone']); ?>" title="Please enter the customer's phone. It is required!" /> 
				<div class="errormsg" id="errormsg_phone"></div>
			</td>
		</tr> 
		<tr> 
			<td class="request_support" rowspan="3">Comments : </td>	
			<td class="request_support" rowspan="3"> 
				<textarea name="comments1" style="width: 250px;" rows="5" wrap=VIRTUAL title="Please enter the comment on this customer. It is options!" ><?php echo dhtmlspecialchars($prg->VARS['comments1']);?></textarea>
			</td>
			<td class="request_support">Fax : </td>
			<td class="request_support"> 
				<input style="width: 220px;" type="text" name="fax" id="fax" value="<?php echo dhtmlspecialchars($prg->VARS['fax']); ?>" title="Please enter the fax. It is required!" /> 
				<div class="errormsg" id="errormsg_fax"></div>
			</td>
		</tr>
		<tr>
			<td class="request_support">Sales Rep : </td>
			<td class="request_support"> 
				<select style="width: 220px;" name="salesman" id="salesman" title="Please select one of the salesman in the drop down menu, It is required!" >
					<option value=""></option>
					<option value="Salesman1">Salesman1</option>
					<option value="Salesman2">Salesman2</option>
					<option value="Salesman3">Salesman3</option>
					<option value="Salesman4">Salesman4</option>
					<option value="Salesman5">Salesman5</option>
				</select>				
				<div class="errormsg" id="errormsg_salesman"></div>
			</td>
		</tr>
		<tr>
			<td class="request_support">Sales/Limit : </td>
			<td class="request_support"> 
				<input style="width: 110px;" type="text" name="sales_to_date" id="sales_to_date" class="alignRight" value="<?php echo dhtmlspecialchars($prg->VARS['sales_to_date']); ?>" title="Please enter the " /> 
				/ <input style="width: 100px;" type="text" name="credit_limit" id="credit_limit" class="alignRight" value="<?php echo dhtmlspecialchars($prg->VARS['credit_limit']); ?>" title="Please enter the credit limit for the customer. It is required!" /> 
				<div class="errormsg" id="errormsg_sales"></div>
			</td>
		</tr>
		<tr>
			<td class="request_support">Tax Id : </td>	
			<td class="request_support"> 
				<input style="width: 250px;" type="text" name="tax_id" id="tax_id" value="<?php echo dhtmlspecialchars($prg->VARS['tax_id']); ?>" title="Please enter the customer's tax reference. It is required!"/> 
				<div class="errormsg" id="errormsg_tax_id"></div>
			</td>
			<td class="request_support">Balance/Past : </td>	
			<td class="request_support"> 
				<input style="width: 110px;" type="text" name="balance" id="balance" class="alignRight" value="<?php echo dhtmlspecialchars($prg->VARS['balance']); ?>" title="Please enter the customer's balance. It is required!" /> 
				/ <input style="width: 100px;" type="text" name="pastdue" id="pastdue" class="alignRight" value="<?php echo dhtmlspecialchars($prg->VARS['pastdue']); ?>" title="Please enter the past due. It is optional!"/> 
				<div class="errormsg" id="errormsg_balance"></div>
			</td>
		</tr>
		<tr>
			<td class="request_support">Email : </td>	
			<td class="request_support"> 
				<input style="width: 250px;" type="text" name="email" id="email" value="<?php echo dhtmlspecialchars($prg->VARS['email']); ?>" title="Please enter the customer's email address. It is required! "/> 
				<div class="errormsg" id="errormsg_email"></div>
			</td>
			<td class="request_support">Last Order/Inv : </td>	
			<td class="request_support"> 
				<input style="width: 110px;" type="text" name="last_order_date" id="last_order_date" class="alignRight" value="<?php echo dhtmlspecialchars($prg->VARS['last_order_date']); ?>" title="Please pick up a date in the calendar. The default date formated is 'YYYY-MM-DD'. It is optional!" /> 
				/ <input style="width: 100px;" type="text" name="last_sale_date" id="last_sale_date" class="alignRight" value="<?php echo dhtmlspecialchars($prg->VARS['last_sale_date']); ?>" title="Please pick up a date in the calendar. The default date formated is 'YYYY-MM-DD'. It is optional! " /> 
				<div class="errormsg" id="errormsg_date"></div>
			</td>
		</tr>
		<tr>
			<td class="request_support">Website : </td>	
			<td class="request_support"> 
				<input style="width: 250px;" type="text" name="website" id="website" value="<?php echo dhtmlspecialchars($prg->VARS['website']); ?>" title="Please enter the customer's web site address. It is optional!" />
				<div class="errormsg" id="errormsg_website"></div> 
			</td>
			<td class="request_support">Net Discount/Discount : </td>	
			<td class="request_support"> 
				<input style="width: 110px;" type="text" name="net_discount" id="net_discount" class="alignRight" value="<?php echo dhtmlspecialchars($prg->VARS['net_discount']); ?>" title="Please enter the net discount for this customer. It is optional!" /> 
				/ <input style="width: 100px;" type="text" name="discount" id="discount" class="alignRight" value="<?php echo dhtmlspecialchars($prg->VARS['discount']); ?>" title="Please enter the discount for this customer. It is optional!" /> 
				<div class="errormsg" id="errormsg_discount"></div>
			</td>
		</tr>
		<tr>
			<td class="request_support">Terms : </td>	
			<td class="request_support"> 
				<select style="width: 250px" name="terms" id="terms" title="Please select one of the terms in the following drop-down list!">
					<option value=""></option>
					<option value="20">Due 20th Of the Following Month</option>
					<option value="30">Due By End Of The Following Month</option>
					<option value="7">Payment due within 7 days</option>
					<option value="CA">Cash Only</option>				
				</select>
				<div class="errormsg" id="errormsg_terms"></div>
			</td>
			<td class="request_support" colspan="2" align="center">
			<input type="checkbox" name="jo1" id="jo1" value="Y" />10
			&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="checkbox" name="cbg" id="cbg" value="Y" />CBG
			&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="checkbox" name="ijo" id="ijo" value="Y" />IJO
			&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="checkbox" name="ljg" id="ljg" value="Y" />LJG
			&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="checkbox" name="rjo" id="rjo" value="Y" />RJO
			&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="checkbox" name="sjo" id="sjo" value="Y" />SJO
			</td>
		</tr>
		<tr>
			<td class="request_support">Ship Name : </td>	
			<td class="request_support"> 
				<input style="width: 250px;" type="text" name="ship_name" id="ship_name" value="<?php echo dhtmlspecialchars($prg->VARS['ship_name']); ?>" title="Please enter the shippment name. It is optional!" /> 
			</td>
			<td class="request_support" colspan="2" algin="center">
			<input type="checkbox" name="bad_address" id="bad_address" value="Y" />BAD Address
			&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="checkbox" name="no_mail" id="no_mail" value="Y" />No Mail
			&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="checkbox" name="inactive" id="inactive" value="Y" />Inactive
			</td>
		</tr>
		<tr>
			<td class="request_support">Ship Address1 : </td>
			<td class="request_support">
				<input style="width: 250px;" type="text" name="ship_address1" id="ship_address1" value="<?php echo dhtmlspecialchars($prg->VARS['ship_address1']); ?>" title="Please enter the shippment address. It is optional! " /> 
			</td>
			<td class="request_support" colspan="2" algin="center">
			<input type="checkbox" name="cod" id="cod" value="Y" />COD
			&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="checkbox" name="past_due" id="past_due" value="Y" />Past Due
			&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="checkbox" name="do_not_ship" id="do_not_ship" value="Y" />Do Not Ship
			</td>
		</tr>
		<tr>
			<td class="request_support">Ship Address2 : </td>
			<td class="request_support">
				<input style="width: 250px;" type="text" name="ship_address2" id="ship_address2" value="<?php echo dhtmlspecialchars($prg->VARS['ship_address2']); ?>" title="Please enter another shippment address. It is optional!" /> 
			</td>
			<td class="request_support" colspan="2" align="center">
			<input type="checkbox" name="mailing" id="mailing" value="Y" />eMail Ad Ok
			&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="checkbox" name="special" id="special" value="Y" />Special No AR
			&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="checkbox" name="ojm" id="ojm" value="Y" />OJM
</td>
		</tr>
		<tr>
		<tr> 
			<td class="request_support">City/State/Zip : </td>	
			<td class="request_support">
				<input style="width: 80px;" type="text" name="ship_city" id="ship_city" value="<?php echo dhtmlspecialchars($prg->VARS['ship_city']); ?>" title="Please enter the shippment city. It is optional!" />
				/ <input style="width: 100px;" type="text" name="ship_state" id="ship_state" value="<?php echo dhtmlspecialchars($prg->VARS['ship_state'])?>" title="Please select one of the state for the shippment in the following drop-down list. It is optional!" /> 
				/ <input style="width: 50px;" type="text" name="ship_zip" id="ship_zip" value="<?php echo dhtmlspecialchars($prg->VARS['ship_zip']); ?>" title="Please enter the shippment postal code. It is optional! "/>
			</td>
			<td colspan="2" class="request_support">&nbsp;</td>		
		</tr>
		<tr>
			<td class="request_support">Special Notes : </td>
			<td class="request_support" colspan="3">
			<textarea style="width: 90%;" rows="6" wrap=VIRTUAL name="special_note" id="special_note" title="Please enter the special notes for the customer. It is optional!"><?php echo dhtmlspecialchars($prg->VARS['special']);?></textarea>
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
				<!--
				<a style="display: inline-block" class="btn-m blue">View Invoice</a>
				&nbsp;&nbsp;&nbsp;
				<a style="display: inline-block" class="btn-m blue">View Order</a> 
				-->
			</td> 
		</tr> 		
	</table> 
</form>
<div id="dialog-confirm">
</div>


<?php require_once PROJECT_ROOT."/lib/footer.php"; ?>
