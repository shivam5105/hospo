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
define("CURRENCY_CODE", "USD");

date_default_timezone_set('America/New_York');

/* DB CONNECTION */
$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);




?>