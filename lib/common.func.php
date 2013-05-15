<?php
/**
 * @copyright Copyright(2009) [INFINITENINE.COM!] All Right Reserved.
 * @filesource: common.func.php,v$
 * @package: lib
 *
 * @author Jason Williams <jasonudoo@gmail.com>
 * @version $Id: v 1.0 YYYY-MM-DD Jason Exp $
 *
 * @abstract:
 */
if (!defined('PROJECT_START')) {
    exit('Access Denied');
}

function gen_invoice_number() {

}

function str_encode($data, $key) {
    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_ECB);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    return urlencode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $data, MCRYPT_MODE_ECB, $iv));
}

function str_decode($data, $key) {
    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_ECB);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    return mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, urldecode($data), MCRYPT_MODE_ECB, $iv);
}

function getRandString($len = 6, $format = 'ALL') {
    switch ($format) {
        case 'ALL':
            $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            break;
        case 'CHAR':
            $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
            break;
        case 'NUMBER':
            $chars = '0123456789';
            break;
        case 'WELL':
            $chars = 'ABCDEFGHIJKLMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz23456789';
            break;
        default:
            $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz23456789';
            break;
    }
    
    $string = "";
    while (strlen($string) < $len)
        $string .= substr($chars, (mt_rand() % strlen($chars)), 1);
    return $string;
}


function checkUserAgentString($p_value) {
    $userAgent = array();
    $agent = $p_value;
    $products = array();
    
    $pattern = "([^/[:space:]]*)"."(/([^[:space:]]*))?"."([[:space:]]*\[[a-zA-Z][a-zA-Z]\])?"."[[:space:]]*"."(\\((([^()]|(\\([^()]*\\)))*)\\))?"."[[:space:]]*";
    
    while (strlen($agent) > 0) {
        if ($l = ereg($pattern, $agent, $a)) {
            // product, version, comment
            array_push($products, array($a[1], $a[3], $a[6]));
            $agent = substr($agent, $l);
        } else {
            $agent = "";
        }
    }
    // Directly catch these
    foreach ($products as $product) {
        switch (strtolower($product[0])) {
            case 'firefox':
            case 'netscape':
            case 'safari':
            case 'camino':
            case 'mosaic':
            case 'galeon':
            case 'opera':
            case 'chrome':
                $userAgent[0] = $product[0];
                $userAgent[1] = $product[1];
                break;
        }
        if (count($userAgent) > 0) {
            break;
        }
    }
    if (count($userAgent) == 0) {
        // Mozilla compatible (MSIE, konqueror, etc)
        if ($products[0][0] == 'Mozilla' && !strncmp($products[0][2], 'compatible;', 11)) {
            $userAgent = array();
            if ($cl = ereg("compatible; ([^ ]*)[ /]([^;]*).*", $products[0][2], $ca)) {
                $userAgent[0] = $ca[1];
                $userAgent[1] = $ca[2];
            } else {
                $userAgent[0] = $products[0][0];
                $userAgent[1] = $products[0][1];
            }
        } else {
            $userAgent = array();
            $userAgent[0] = $products[0][0];
            $userAgent[1] = $products[0][1];
        }
    }
    // Get runing OS and version
    $oslist = array(
        // Match user agent string with operating systems
        'Windows 3.11'=>'Win16', 'Windows 95'=>'(Windows 95)|(Win95)|(Windows_95)', 'Windows 98'=>'(Windows 98)|(Win98)', 'Windows 2000'=>'(Windows NT 5.0)|(Windows 2000)', 'Windows XP'=>'(Windows NT 5.1)|(Windows XP)', 'Windows Server 2003'=>'(Windows NT 5.2)', 'Windows Vista'=>'(Windows NT 6.0)', 'Windows 7'=>'(Windows NT 7.0)', 'Windows NT 4.0'=>'(Windows NT 4.0)|(WinNT4.0)|(WinNT)|(Windows NT)', 'Windows ME'=>'Windows ME', 'Open BSD'=>'OpenBSD', 'Sun OS'=>'SunOS', 'Linux'=>'(Linux)|(X11)', 'Mac OS'=>'(Mac_PowerPC)|(Macintosh)', 'QNX'=>'QNX', 'BeOS'=>'BeOS', 'OS/2'=>'OS/2', 'Search Bot'=>'(nuhk)|(Googlebot)|(Yammybot)|(Openbot)|(Slurp)|(MSNBot)|(Ask Jeeves/Teoma)|(ia_archiver)');
    // Loop through the array of user agents and matching operating systems
    foreach ($oslist as $CurrOS=>$Match) {
        // Find a match
        if (eregi($Match, $products[0][2])) {
            // We found the correct match
            break;
        }
    }
    $userAgent[2] = $CurrOS;
    return $userAgent;
}
/**
 * @function daddslashes
 * @return string
 */
function daddslashes($string, $force = 0) {
    !defined('MAGIC_QUOTES_GPC') && define('MAGIC_QUOTES_GPC', get_magic_quotes_gpc());
    if (!MAGIC_QUOTES_GPC || $force) {
        if (is_array($string)) {
            foreach ($string as $key=>$val) {
                $string[$key] = daddslashes($val, $force);
            }
        } else {
            $string = addslashes($string);
        }
    }
    return $string;
}
function dhtmlspecialchars(&$string) {
    if (is_array($string)) {
        foreach ($string as $key=>$val) {
            $string[$key] = dhtmlspecialchars($val);
        }
    } else {
        $string = preg_replace('/&amp;((#(\d{3,5}|x[a-fA-F0-9]{4})|[a-zA-Z][a-z0-9]{2,5});)/', '&\\1', str_replace(array('&', '"', '<', '>'), array('&amp;', '&quot;', '&lt;', '&gt;'), $string));
    }
    return $string;
}
function isdate($p_str, $p_delimeter = "") {
    if ($p_delimeter == "") {
        for ($i = 0; $i < strlen($p_str); $i++) {
            switch (substr($p_str, $i, 1)) {
                case "-":
                    $p_delimeter = "-";
                    break;
                case "/":
                    $p_delimeter = "/";
                    break;
                case ":":
                    $p_delimeter = ":";
                    break;
                case ".":
                    $p_delimeter = ".";
                    break;
                case ",":
                    $p_delimeter = ",";
                    break;
                case "'":
                    $p_delimeter = "'";
                    break;
            }
            if ($p_delimeter <> "")
                break;
        }
    }
    $parts = @explode($p_delimeter, $p_str);
    $year = $parts[0];
    $month = $parts[1];
    $day = $parts[2];
    if (isint($year) && isint($month) && isint($day)) {
        if (checkdate($month, $day, $year))
            return true;
        else
            return false;
    } else
        return false;
}
function isemail($p_addr) {
    if (eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*$", $p_addr))
        return true;
    else
        return false;
}
function iscode($p_str) {
    if (trim($p_str) == "")
        return false;
    $len = strlen($p_str);
    for ($i = 0; $i < $len; $i++) {
        $char = substr($p_str, $i, 1);
        if (eregi("^[_a-z0-9]$", $char))
            continue;
        else
            return false;
    }
    return true;
}

/**
 * Kill website execution and display HTML message with error message.
 *
 * Call this function complements the die() PHP function. The difference is that
 * HTML will be displayed to the user. It is recommended to use this function
 * only, when the execution should not continue any further. It is not
 * recommended to call this function very often and try to handle as many errors
 * as possible siliently.
 *
 * @since 2.0.4
 *
 * @param string $message Error message.
 * @param string $title Error title.
 * @param string|array $args Optional arguements to control behaviour.
 */
function ws_die( $message, $title = '', $args = array() ) {
	$defaults = array( 'response' => 500 );

	$have_gettext = function_exists('__');

	if ( function_exists( 'is_ws_error' ) && is_ws_error( $message ) ) {
		if ( empty( $title ) ) {
			$error_data = $message->get_error_data();
			if ( is_array( $error_data ) && isset( $error_data['title'] ) )
				$title = $error_data['title'];
		}
		$errors = $message->get_error_messages();
		switch ( count( $errors ) ) :
		case 0 :
			$message = '';
			break;
		case 1 :
			$message = "<p>{$errors[0]}</p>";
			break;
		default :
			$message = "<ul>\n\t\t<li>" . join( "</li>\n\t\t<li>", $errors ) . "</li>\n\t</ul>";
			break;
		endswitch;
	} elseif ( is_string( $message ) ) {
		$message = "<p>$message</p>";
	}

	if ( isset( $r['back_link'] ) && $r['back_link'] ) {
		$back_text = $have_gettext? __('&laquo; Back') : '&laquo; Back';
		$message .= "\n<p><a href='javascript:history.back()'>$back_text</p>";
	}

	if( !headers_sent() ){
		nocache_headers();
		header( 'Content-Type: text/html; charset=utf-8' );
	}

	if ( empty($title) ) {
		$title = $have_gettext? __('Website &rsaquo; Error') : 'Website &rsaquo; Error';
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- Ticket #11289, IE bug fix: always pad the error page with enough characters such that it is greater than 512 bytes, even after gzip compression abcdefghijklmnopqrstuvwxyz1234567890aabbccddeeffgghhiijjkkllmmnnooppqqrrssttuuvvwwxxyyzz11223344556677889900abacbcbdcdcededfefegfgfhghgihihjijikjkjlklkmlmlnmnmononpopoqpqprqrqsrsrtstsubcbcdcdedefefgfabcadefbghicjkldmnoepqrfstugvwxhyz1i234j567k890laabmbccnddeoeffpgghqhiirjjksklltmmnunoovppqwqrrxsstytuuzvvw0wxx1yyz2z113223434455666777889890091abc2def3ghi4jkl5mno6pqr7stu8vwx9yz11aab2bcc3dd4ee5ff6gg7hh8ii9j0jk1kl2lmm3nnoo4p5pq6qrr7ss8tt9uuvv0wwx1x2yyzz13aba4cbcb5dcdc6dedfef8egf9gfh0ghg1ihi2hji3jik4jkj5lkl6kml7mln8mnm9ono -->
<html xmlns="http://www.w3.org/1999/xhtml" <?php if ( function_exists( 'language_attributes' ) ) language_attributes(); ?>>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo $title ?></title>
	<link rel="stylesheet" href="<?php echo $admin_dir; ?>css/install.css" type="text/css" />
</head>
<body id="error-page">
	<?php echo $message; ?>
</body>
</html>
<?php
	die();
}

?>
