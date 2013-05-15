DROP DATABASE andreacandeladb;
CREATE DATABASE andreacandeladb;
USE andreacandeladb;

DROP TABLE IF EXISTS `tbl_inventory`;
CREATE TABLE IF NOT EXISTS `tbl_inventory` (
	`Key` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
	`Bin` DECIMAL(15,2) NOT NULL,
	`Bar` VARCHAR(12) NOT NULL,
	`Qty` INTEGER UNSIGNED NOT NULL DEFAULT 1,
	`Product_ID` VARCHAR(50) NOT NULL,
	`Date` DATETIME NOT NULL,
	`Userid` VARCHAR(50) NULL,
	PRIMARY KEY(`Key`)
)ENGINE=MyISAM AUTO_INCREMENT=10000 CHARACTER SET utf8;

DROP TABLE IF EXISTS `tbl_customer`;
CREATE TABLE IF NOT EXISTS `tbl_customer` (
	`Customer_ID` VARCHAR(10) NOT NULL,
	`Store_Number` VARCHAR(10) NOT NULL,
	`Company_Name` VARCHAR(30) NULL,
	`Contact_Name` VARCHAR(30) NULL,
	`Address1` VARCHAR(30) NULL,
	`Address2` VARCHAR(30) NULL,
	`City` VARCHAR(20) NOT NULL,
	`Region` VARCHAR(20) NULL,
	`Postal_Code` VARCHAR(10) NULL,
	`Country` VARCHAR(30) NULL,
	`Phone` VARCHAR(14) NULL,
	`Fax` VARCHAR(14) NULL,
	`comments1` VARCHAR(250) NULL,
	`comments2` VARCHAR(250) NULL,
	`ship_name` VARCHAR(30) NULL,
	`ship_address1` VARCHAR(30) NULL,
	`ship_address2` VARCHAR(30) NULL,
	`ship_city` VARCHAR(20) NULL,
	`ship_state` VARCHAR(20) NULL,
	`ship_zip` VARCHAR(10) NULL,
	`shipping_method` VARCHAR(10) NULL,
	`salesman` VARCHAR(20) NOT NULL DEFAULT 'office',
	`residual` DECIMAL(15,4) NOT NULL DEFAULT 0.0000,
	`Sales_to_Date` DECIMAL(15,4) NOT NULL DEFAULT 0.0000,
	`Last_Sale_date` DATETIME NULL,
	`Description` VARCHAR(15) NULL,
	`discount` DECIMAL(3,3) NOT NULL DEFAULT 0.000,
	`net_discount` DECIMAL(3,3) NOT NULL DEFAULT 0.000,
	`tax_id` VARCHAR(20) NULL,
	`terms` VARCHAR(15),
	`Special` ENUM('Y','N') NOT NULL,
	`email` VARCHAR(50) NULL,
	`web_address` VARCHAR(50) NULL,
	`past_due` ENUM('Y','N') NOT NULL,
	`do_not_ship` ENUM('Y','N') NOT NULL,
	`mailing` ENUM('Y','N') NOT NULL,
	`OJM` ENUM('Y','N') NOT NULL,
	`GUID` VARCHAR(50) NOT NULL,
	`COD` ENUM('Y','N') NOT NULL,
	`Last_order_date` DATETIME NULL,
	`Last_called` DECIMAL(15,4) NULL,
	`called_by` DECIMAL(15,4) NULL,
	`call` ENUM('Y','N') NOT NULL,
	`added` DATETIME NULL,
	`BIG` ENUM('Y','N') NOT NULL,
	`CBG` ENUM('Y','N') NULL,
	`IJO` ENUM('Y','N') NOT NULL,
	`LJG` ENUM('Y','N') NOT NULL,
	`RJO` ENUM('Y','N') NOT NULL,
	`SJO` ENUM('Y','N') NOT NULL,
	`JO1` ENUM('Y','N') NOT NULL,
	`JO2` ENUM('Y','N') NOT NULL,
	`Bad_Address` ENUM('Y','N') NOT NULL,
	`NO_Span` ENUM('Y','N') NOT NULL,
	`Balance` DECIMAL(15,4) NULL,
	`creditlimit` DECIMAL(15,4) NULL,
	`PastDue` DECIMAL(15,4) NULL,
	`store` VARCHAR(3) NOT NULL,
	`inactive` ENUM('Y', 'N') NOT NULL,
	`edate` DATETIME NULL,
	PRIMARY KEY(`Store_Number`)
)ENGINE=MyISAM CHARACTER SET utf8;

DROP TABLE IF EXISTS `tbl_terms`;
CREATE TABLE IF NOT EXISTS `tbl_terms`(
	`terms` VARCHAR(15) NOT NULL,
	`code` INTEGER NOT NULL,
	`due` INTEGER NOT NULL,
	PRIMARY KEY(`terms`)
)ENGINE=MyISAM CHARACTER SET utf8;

DROP TABLE IF EXISTS `tbl_inventory_track`;
CREATE TABLE IF NOT EXISTS `tbl_inventory_track`(
	`Key` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
	`Product_ID` VARCHAR(14) NULL,
	`Bar` VARCHAR(12) NULL,
	`Quantity` DECIMAL(18,2) NULL,
	`New_Qty` DECIMAL(18,2) NULL,
	`Company` VARCHAR(3) NULL,
	`Date` DATETIME NOT NULL,
	`Source` VARCHAR(40) NULL,
	PRIMARY KEY(`Key`)
)ENGINE=MyISAM AUTO_INCREMENT=10000 CHARACTER SET utf8;

DROP TABLE IF EXISTS `tbl_products`;
CREATE TABLE IF NOT EXISTS `tbl_products`(
	`Bar` VARCHAR(12) NOT NULL,
	`Product_ID` VARCHAR(15) NOT NULL,
	`US_Style` VARCHAR(6) NOT NULL,
	`HK_Style` VARCHAR(15) NOT NULL,
	`Vendor` VARCHAR(5) NULL,
	`Title` VARCHAR(50) NULL,
	`Stone_Code` VARCHAR(5) NULL,
	`Category_Code` VARCHAR(5) NULL,
	`Lau_Stock` DECIMAL(8,2) NOT NULL,
	`Ojm_Stock` DECIMAL(8,2) NOT NULL,
	`QOH` INTEGER NOT NULL,
	`Reorder` INTEGER NOT NULL,
	`Unit_Price` DECIMAL(15,4) NOT NULL,
	`Product_Cost` DECIMAL(15,4) NOT NULL,
	`Raw_Cost` DECIMAL(15,4) NOT NULL,
	`Net` ENUM('Y','N') NOT NULL,
	`Promo` ENUM('Y','N') NULL,
	`Tag1` VARCHAR(15) NULL,
	`Tag3` VARCHAR(15) NULL,
	`Tag4` DECIMAL(15,4) NOT NULL,
	`D_wt` DECIMAL(8,2) NOT NULL,
	`S_wt` DECIMAL(8,2) NOT NULL,
	`Stone` VARCHAR(25) NOT NULL DEFAULT 'unkn',
	`Cut` VARCHAR(25) NULL DEFAULT 'unkn',
	`Setting` VARCHAR(25) NULL DEFAULT 'unkn',
	`Metal` VARCHAR(5) NULL DEFAULT 'unkn',
	`Shape` VARCHAR(25) NULL DEFAULT 'unkn',
	`Category` VARCHAR(25) NOT NULL DEFAULT 'unkn',
	`Image` VARCHAR(25) NOT NULL DEFAULT 'none.gif',
	`Size` VARCHAR(50) NOT NULL DEFAULT 'unkn',
	`Keywords` VARCHAR(200) NULL,
	`WebHide` ENUM('Y','N') NULL,
	`WebPrice` DECIMAL(15,4) NULL,
	`WebModel` VARCHAR(8) NULL,
	`Special` VARCHAR(3) NULL,
	`Added` DATETIME NOT NULL,
	`Box` ENUM('Y','N') NOT NULL,
	`BoxBar` INTEGER NULL,
	`lastTrans` VARCHAR(40) NULL,
	`Cost` ENUM('Y','N') NOT NULL,
	`Created` DATETIME NOT NULL,
	PRIMARY KEY(`Bar`)
)ENGINE=MyISAM CHARACTER SET utf8;

DROP TABLE IF EXISTS `tbl_db_vol`;
CREATE TABLE IF NOT EXISTS `tbl_db_vol`(
	`DB_VOL` INTEGER NOT NULL,
	`track` INTEGER NOT NULL,
	`server` VARCHAR(50) NULL,
	PRIMARY KEY(`DB_VOL`)
)ENGINE=MyISAM CHARACTER SET utf8;

DROP TABLE IF EXISTS `tbl_version`;
CREATE TABLE IF NOT EXISTS `tbl_version`(
	`Version` DECIMAL(15,2) NOT NULL,
	PRIMARY KEY(`Version`)
)ENGINE=MyISAM CHARACTER SET utf8;

DROP TABLE IF EXISTS `tbl_login`;
CREATE TABLE IF NOT EXISTS `tbl_login` (
	`User_Name` VARCHAR(20) NOT NULL,
	`Pass` VARCHAR(10) NULL,
	`Admin` ENUM('Y','N') NULL,
	`Basecom` DECIMAL(15,2) NULL,
	`Job` VARCHAR(10) NULL,
	PRIMARY KEY(`User_Name`)
)ENGINE=MyISAM CHARACTER SET utf8;

DROP TABLE IF EXISTS `tbl_ra_xref`;
CREATE TABLE IF NOT EXISTS `tbl_ra_xref`(
	`RC_style` VARCHAR(14) NOT NULL,
	`AC_Style` VARCHAR(15) NULL,
	`bar` VARCHAR(12) NULL,
	PRIMARY KEY(`RC_style`)
)ENGINE=MyISAM CHARACTER SET utf8;

DROP TABLE IF EXISTS `tbl_shipping_types`;
CREATE TABLE IF NOT EXISTS `tbl_shipping_types`(
	`type_id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
	`Service` VARCHAR(22) NULL,
	`order` INTEGER NULL,
	PRIMARY KEY(`type_id`)
)ENGINE=MyISAM AUTO_INCREMENT=10000 CHARACTER SET utf8;

DROP TABLE IF EXISTS `tbl_products_deleted`;
CREATE TABLE IF NOT EXISTS `tbl_products_deleted`(
	`Bar` VARCHAR(12) NOT NULL,
	`Product_ID` VARCHAR(15) NOT NULL,
	`US_Style` VARCHAR(6) NOT NULL,
	`HK_Style` VARCHAR(15) NOT NULL,
	`Vendor` VARCHAR(5) NULL,
	`Title` VARCHAR(50) NULL,
	`Stone_Code` VARCHAR(5) NULL,
	`Category_Code` VARCHAR(5) NULL,
	`Lau_Stock` DECIMAL(8,2) NOT NULL,
	`Ojm_Stock` DECIMAL(8,2) NOT NULL,
	`QOH` INTEGER NOT NULL,
	`Reorder` INTEGER NOT NULL,
	`Unit_Price` DECIMAL(15,4) NOT NULL,
	`Product_Cost` DECIMAL(15,4) NOT NULL,
	`Raw_Cost` DECIMAL(15,4) NOT NULL,
	`Net` ENUM('Y','N') NOT NULL,
	`Promo` ENUM('Y','N') NULL,
	`Tag1` VARCHAR(15) NULL,
	`Tag3` VARCHAR(15) NULL,
	`Tag4` DECIMAL(15,4) NOT NULL,
	`D_wt` DECIMAL(8,2) NOT NULL,
	`S_wt` DECIMAL(8,2) NOT NULL,
	`Stone` VARCHAR(25) NOT NULL DEFAULT 'unkn',
	`Cut` VARCHAR(25) NULL DEFAULT 'unkn',
	`Setting` VARCHAR(25) NULL DEFAULT 'unkn',
	`Metal` VARCHAR(5) NULL DEFAULT 'unkn',
	`Shape` VARCHAR(25) NULL DEFAULT 'unkn',
	`Category` VARCHAR(25) NOT NULL DEFAULT 'unkn',
	`Image` VARCHAR(25) NOT NULL DEFAULT 'none.gif',
	`Size` VARCHAR(50) NOT NULL DEFAULT 'unkn',
	`Keywords` VARCHAR(200) NULL,
	`WebHide` ENUM('Y','N') NULL,
	`WebPrice` DECIMAL(15,4) NULL,
	`WebModel` VARCHAR(8) NULL,
	`Special` VARCHAR(3) NULL,
	`Added` DATETIME NOT NULL,
	`Box` ENUM('Y','N') NOT NULL,
	`BoxBar` INTEGER NULL,
	`lastTrans` VARCHAR(40) NULL,
	`Cost` ENUM('Y','N') NOT NULL,
	`Created` DATETIME NOT NULL,
	PRIMARY KEY(`Bar`)
)ENGINE=MyISAM CHARACTER SET utf8;

DROP TABLE IF EXISTS `tbl_invoice`;
CREATE TABLE IF NOT EXISTS `tbl_invoice`(
	`Invoice_Key` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
	`Employee_ID` VARCHAR(20) NOT NULL,
	`Sales_ID` VARCHAR(20) NOT NULL,
	`Base_Com` DECIMAL(15,2) NULL DEFAULT 0.00,
	`Ship_Via` VARCHAR(30) NULL,
	`Order_Date` DATETIME NULL,
	`Shipped_Date` DATETIME NULL,
	`Freight` DECIMAL(15,4) NOT NULL,
	`Order_Discount` DECIMAL(15,4) NULL,
	`CashDiscount` DECIMAL(15,4) NOT NULL,
	`Order_Terms` VARCHAR(15) NOT NULL DEFAULT 'COD',
	`Ship_name` VARCHAR(30) NULL,
	`Ship_Address` VARCHAR(30) NULL,
	`Ship_Address2` VARCHAR(30) NULL,
	`Ship_City` VARCHAR(20) NULL,
	`Ship_State` VARCHAR(10) NULL,
	`Ship_Zip` VARCHAR(10) NULL,
	`Ship_Country` VARCHAR(15) NULL,
	`net_discount` DECIMAL(15,3) NULL DEFAULT 0.000,
	`Invoice_Number` INTEGER NOT NULL,
	`due_date` DATETIME NULL,
	`store_No` VARCHAR(10) NOT NULL,
	`customer_order_no` VARCHAR(20) NOT NULL DEFAULT 'none',
	`Store` VARCHAR(10) NOT NULL DEFAULT 'CND',
	`memo` TEXT NULL,
	`Invoice_ID` VARCHAR(20) NOT NULL,
	`LI` VARCHAR(20) NULL,
	`Terms_Due` INTEGER NOT NULL,
	`AR` ENUM('Y','N') NOT NULL,
	`VOL` INTEGER NOT NULL,
	`Order_id` INTEGER NULL,
	PRIMARY KEY(`Invoice_Key`)
)ENGINE=MyISAM AUTO_INCREMENT=10000 CHARACTER SET utf8;

DROP TABLE IF EXISTS `tbl_order`;
CREATE TABLE IF NOT EXISTS `tbl_order`(
	`Order_id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
	`store_no` VARCHAR(10) NOT NULL,
	`Order_by` VARCHAR(25) NULL,
	`employee_id` VARCHAR(20) NOT NULL,
	`po_no` VARCHAR(20) NULL,
	`date_received` DATETIME NULL,
	`date_required` DATETIME NULL,
	`receive_via` VARCHAR(5) NULL,
	`back_order` ENUM('Y','N') NOT NULL,
	`back_order_date` DATETIME NULL,
	`expect_finish_date` DATETIME NULL,
	`action_date` DATETIME NULL,
	`ship_method` VARCHAR(30) NULL,
	`job_finished` ENUM('Y','N') NOT NULL,
	`Notes` TEXT NULL,
	`Vendor_Notes` TEXT NULL,
	`LI` VARCHAR(10) NULL,
	`InvNum` VARCHAR(10) NULL,
	`Credit_Card` ENUM('Y','N') NULL,
	`Store` VARCHAR(3) NOT NULL DEFAULT 'CND',
	`Com` DECIMAL(4,3) NOT NULL DEFAULT 0.000,
	PRIMARY KEY(`Order_id`)
)ENGINE=MyISAM AUTO_INCREMENT=10000 CHARACTER SET utf8;

DROP TABLE IF EXISTS `tbl_order_detail`;
CREATE TABLE IF NOT EXISTS `tbl_order_detail` (
	`detail_id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
	`Order_id` INTEGER NULL,
	`style` VARCHAR(6) NULL,
	`Price` DECIMAL(15,4) NOT NULL,
	`stone` VARCHAR(5) NULL,
	`product_id` VARCHAR(15) NULL,
	`quantity` DECIMAL(8,2) NOT NULL DEFAULT 1,
	`metal` VARCHAR(5) NULL,
	`size` VARCHAR(5) NULL,
	`gem_grade` VARCHAR(12) NULL,
	`back_order` ENUM('Y','N') NOT NULL,
	`BO_Date` DATETIME NULL,
	`partial_shipment` DECIMAL(8,2) NOT NULL DEFAULT 0.00,
	`partial_shipment_date` DATETIME NULL,
	`Invoiced` ENUM('Y','N') NOT NULL,
	`Posted` ENUM('Y','N') NOT NULL,
	`Vendor_ID` VARCHAR(5) NOT NULL DEFAULT 'OJM',
	PRIMARY KEY (`detail_id`)
)ENGINE=MyISAM AUTO_INCREMENT=10000 CHARACTER SET utf8;

DROP TABLE IF EXISTS `tbl_invoice_detail`;
CREATE TABLE IF NOT EXISTS `tbl_invoice_detail` (
	`detail_ID` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
	`Bar` VARCHAR(12) NULL,
	`Product_ID` VARCHAR(14) NULL,
	`description` VARCHAR(500) NULL,
	`Unit_Price` DECIMAL(15,4) NOT NULL DEFAULT 0.0000,
	`Quantity` DECIMAL(8,2) NOT NULL DEFAULT 1,
	`Discount` DECIMAL(4,3) NOT NULL DEFAULT 0.000,
	`SPDisc` ENUM('Y','N') NOT NULL,
	`Com` DECIMAL(4,2) NOT NULL DEFAULT 0.00,
	`posted` ENUM('Y','N') NOT NULL,
	`Invoice_ID` VARCHAR(20) NOT NULL,
	`cdate` DATETIME NOT NULL,
	`edate` DATETIME NOT NULL,
	PRIMARY KEY (`detail_ID`)
)ENGINE=MyISAM AUTO_INCREMENT=10000 CHARACTER SET utf8;

DROP TABLE IF EXISTS `tbl_sessions`;
CREATE TABLE IF NOT EXISTS `tbl_sessions`(
  `sessions` varchar(100) NOT NULL default '',
  `sessions_user_name` varchar(40) NULL,
  `sessions_ipadr` varchar(100) NOT NULL default '',
  `sessions_browser` varchar(64) NOT NULL default '',
  `sessions_browser_ver` varchar(10) NOT NULL default '',
  `sessions_os` varchar(64) NOT NULL default '',
  `sessions_login` INTEGER UNSIGNED NULL,
  `sessions_last` INTEGER UNSIGNED NULL,
  `sessions_lock` enum('Y','N') NOT NULL default 'N',
  PRIMARY KEY (`sessions`),
  INDEX IDX_user(`sessions_user_name`)
) ENGINE=MyISAM CHARACTER SET utf8;

