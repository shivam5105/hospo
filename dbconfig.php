<?php
require_once("settings.php");
if(strtolower(trim($_SERVER['SERVER_NAME'])) == 'localhost')
{
	define("BASEURL", "http://localhost/github/hospo");
	define("BASEPATH", getenv("DOCUMENT_ROOT")."/github/hospo");
}
else
{
	define("BASEURL", "http://".DOMAIN."/hospo");
	define("BASEPATH", "/home1/thelabel/public_html/hospo");
}



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