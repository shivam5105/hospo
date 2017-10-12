<?php
session_start();
ini_set("display_errors",0);
//error_reporting(E_ALL);

if(strtolower(trim($_SERVER['SERVER_NAME'])) == 'localhost')
{
	define("HOST", "localhost");     	// The host you want to connect to.
	define("DATABASE", "thelabel_hospodb");    	// The database name.
	define("USER", "root");    			// The database username. 
	define("PASSWORD", "");    			// The database password.
}
else
{
	define("HOST", "localhost");     	// The host you want to connect to.
	define("DATABASE", "thelabel_hospodb");    	// The database name.
	define("USER", "thelabel_hospo");    			// The database username. 
	define("PASSWORD", "2g&Zv~d+}(oO");    			// The database password.
}
define("DOMAIN", $_SERVER['SERVER_NAME']);
define("PROJECT_NAME", "Hospo");

define("ROOT_DIR", __DIR__);

date_default_timezone_set('America/New_York');

/* DB CONNECTION */
$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);

define("PAYPAL_URL", "https://www.sandbox.paypal.com/cgi-bin/webscr");
define("PAYPAL_SSL_URL", "ssl://www.sandbox.paypal.com");
define("PAYPAL_ID", "raks.bisht-facilitator@gmail.com");
define("CURRENCY_CODE", "USD");

define("PAYPAL_NOTIFY_URL", BASEURL.'/notify.php?action=notify');
define("PAYPAL_CANCEL_URL", BASEURL.'/signup.php?action=cancel');
define("PAYPAL_RETURN_URL",BASEURL.'/signup.php?action=success');


?>