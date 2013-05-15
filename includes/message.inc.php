<?php
/**
 * @copyright Copyright(2010) All Right Reserved.
 * @filesource: message.inc.php,v$
 * @package: include
 *
 * @author Jason Williams <jasonudoo@gmail.com>
 * @version $Id: v 1.0 2010-02-10 Jason Exp $
 *
 * @abstract: 
 */
if(!defined('PROJECT_START'))
{
    exit('Access Denied');
}

$_Message['error_username_empty'] = "Please input the username your desired!";
$_Message['error_username_invalide'] = "The username can only contain letters and numbers, must start with a letter and the length must be between 4 and 14 chars.";
$_Message['error_username_exists'] = "The username your input exists, Please input a new one!";
$_Message['success_username'] = "The username is valid";
$_Message['error_email_empty'] = "Please input an email address!";
$_Message['error_email_format'] = "Please input a correct email address!";
$_Message['error_email_registered'] = "The email address you input has been registerred, Please input a new one!";
$_Message['success_email'] = "The email is correct!";
$_Message['error_emaila_empty'] = "Please input an AlertPay email address";
$_Message['error_emaila_format'] = "Please input a correct AlertPay email address";
$_Message['error_emaila_exist'] = " The AlertPay email address is exists, Please type in a new one!";
$_Message['success_emaila'] = "The AlertPay email address is correct!";
$_Message['error_emailp_empty'] = "Please input an PayPal email address";
$_Message['error_emailp_format'] = "Please input a correct PayPal email address";
$_Message['error_emailp_exist'] = " The PayPal email address is exists, Please type in a new one!";
$_Message['success_emailp'] = "The PayPal email address is correct!";
$_Message['error_passwd_empty'] = "Please input the password to protect your account";
$_Message['error_passwd_fail'] = "The password confirmation failed!";
$_Message['success_passwd'] = "The password is correct!";
?>