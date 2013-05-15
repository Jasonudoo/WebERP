<?php
/**
 * @copyright Copyright(2010) All Right Reserved.
 * @filesource: config.php,v$
 * @package: include
 *
 * @author Jason Williams <jasonudoo@gmail.com>
 * @version $Id: v 1.0 2010-05-20 Jason Exp $
 *
 * @abstract: 
 */
if(!defined('PROJECT_START')){
    exit('Access Denied');
}

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'andreacandeladb');

/** MySQL database username */
define('DB_USER', 'netwebx_andrea');

/** MySQL database password */
define('DB_PASSWORD', 'U=S?l*nf0u{I');

/** MySQL hostname */
define('DB_HOST', 'mysql.netwebx.com');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/** The Cookie Name of User_Name */
define('CUSER_USERNAME', 'dkiweokadkwe');

/** The Cookie Name of Session */
define('CSESSIONID', 'dwkekadfwe94dkwl');

/** The Session Expired Seconds */
define('SESSION_EXPIRED', 86400);

/** The Locked Session Expired Seconds */
define('SESSION_LOCK_EXPIRED', 3*86400);

define('WS_DEBUG', FALSE);
define('SAVEQUERIES', FALSE);

/** Table prefix. */
$table_prefix  = 'tbl_';

if(PHP_VERSION < '4.1.0'){
	$_GET = &$HTTP_GET_VARS;
	$_POST = &$HTTP_POST_VARS;
	$_COOKIE = &$HTTP_COOKIE_VARS;
	$_SERVER = &$HTTP_SERVER_VARS;
	$_ENV = &$HTTP_ENV_VARS;
	$_FILES = &$HTTP_POST_FILES;
}
?>
