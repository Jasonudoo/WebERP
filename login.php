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
require_once PROJECT_ROOT."/page/login.php";

$prg = new LoginPage();
$prg->Run();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:s="http://www.splunk.com/xhtml-extensions/1.0" xml:lang="en" lang="en"> 
    <head> 
        <meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
        <meta http-equiv="content-language" content="en_US" /> 
        <meta http-equiv="imagetoolbar" content="no" /> 
        <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" /> 
        <title> Login -  AndreaCandela</title> 
        <link type="text/css" rel="stylesheet" href="css/login.css" />             
        <link type="text/css" href="css/ui-darkness/jquery-ui-1.8.1.custom.css" rel="stylesheet" />    
        <script type="text/javascript" src="scripts/jquery/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="scripts/jquery/jquery-ui-1.8.1.custom.min.js"></script>
        <script type="text/javascript" src="scripts/jquery/jquery.cookie.js"></script>             
        <script type="text/javascript" src="scripts/jquery/login.js"></script>             
    </head> 
    <body> 
<div id="layout" class="licenseIsTrial"> 
    <div id="userMessaging"></div> 
        <div id="protrial"> 
            <div id="protrialClose"></div> 
            <div id="protrialContent"> 
               <p><span>First time logging in?</span> The default credentials are </p><p>username: <span>admin</span><br />password: <span>changeme</span></p><p>If you've forgotten your username or password, please contact your System administrator.</p> 
            </div>                             
        </div> 
    
    <div id="authWrapper"> 
        <div id="splunkLogo"> 
        </div> 
        <div id="authContainer"> 
            <div style="padding-left:10px;padding-right:10px;">
                <div id="jserror" class="ui-state-error ui-corner-all" style="padding: 0 .7em;display:none;"> 
                    <p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span> 
                    <strong>Error:</strong> Please enter the correct user name and password!</p>
                </div>
            </div>
            <div id="mainPanel" > 
                <form id="loginForm" action="login.php" class="loginForm" method="post" autocomplete="off"> 
                    <input type="hidden" name="cval" id="cval" value="<?php echo time(); ?>"> 
                    <p> 
                        <label for="username">Username</label><br /> 
                        <input type="text" name="username" id="username"  /> 
                    </p> 
                    <p> 
                        <label for="password">Password</label><br /> 
                        <input type="password" name="password" id="password"  /> 
                    </p> 
            
                    <p class="loginButtonRow"> 
                        <input id="btnSignIn" class="splButton-primary" type="submit" value="Sign in"  /> 
                    </p> 
                        <a href="#" id="passwordHint">First time logging in?</a> 
                </form> 
            </div> 
            <div id="freeMessageContainer" class="subContainer"></div> 
        </div><!-- authContainer --> 
    </div><!-- authWrapper --> 
    <div id="infoContainer"> 
        <div id="updateCheckerContainer" class="subContainer"> 
        </div> 
        <div id="connectError"> 
        </div> 
    </div> 
    <p class="footer">&copy; 2010 NetWebx Inc.</p> 
</div> 
        <div class="splClearfix"></div> 
    </body> 
</html> 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
