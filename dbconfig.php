<?php
require_once("settings.php");
if(strtolower(trim($_SERVER['SERVER_NAME'])) == 'localhost')
{
	define("BASEURL", "http://localhost/github/gitcode/hospo");
	define("BASEPATH", getenv("DOCUMENT_ROOT")."/github/gitcode/hospo");
}
else
{
	define("BASEURL", "http://".DOMAIN."/hospo");
	define("BASEPATH", "/home1/thelabel/public_html/hospo");
}

define("PAYPAL_URL", "https://www.sandbox.paypal.com/cgi-bin/webscr");
define("PAYPAL_SSL_URL", "ssl://www.sandbox.paypal.com");
define("PAYPAL_ID", "demo123@seller.com");

define("PAYPAL_NOTIFY_URL", BASEURL.'/notify.php?action=notify');
define("PAYPAL_CANCEL_URL", BASEURL.'/signup.php?action=success');
define("PAYPAL_RETURN_URL",BASEURL.'/signup.php?action=cancel');



define("LEARNCOACH_API",'https://tlp.learncoach.co.nz/api/');
define("LEARNCOACH_EMAIL",'vinesh@studiosix.nz');
define("LEARNCOACH_PASSWORD",'Hospo12345');

require_once("functions.php");


require_once "vendor/autoload.php";

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => HOST,
    'database'  => DATABASE,
    'username'  =>USER,
    'password'  => PASSWORD,
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();
?>