<?php
require_once("../settings.php");
if(strtolower(trim($_SERVER['SERVER_NAME'])) == 'localhost')
{
	define("BASEURL", "http://localhost/github/hospo/admin");
	define("BASEPATH", getenv("DOCUMENT_ROOT")."/github/hospo/admin");
	define("SITEBASEPATH", getenv("DOCUMENT_ROOT")."/github/hospo");

	define("SITEBASEURL", "http://localhost/github/hospo");

}
else
{
	define("BASEURL", "http://".DOMAIN."/hospo/admin");
	define("BASEPATH", getenv("DOCUMENT_ROOT")."/hospo/admin");
	define("SITEBASEPATH", getenv("DOCUMENT_ROOT")."/hospo");
	define("SITEBASEURL", "http://".DOMAIN."/hospo");
}
$menu_locations = array(
		"header-left-menu" => "Header Menu",
		"footer-col1" => "Footer Column 1 Menu",
		"footer-col2" => "Footer Column 2 Menu",
		"footer-col3" => "Footer Column 3 Menu",
		"footer-col4" => "Footer Column 4 Menu",
	);
require_once("Zebra_Pagination.php");
require_once("functions.php");
require_once("editor/fckeditor.php");



require_once SITEBASEPATH."/vendor/autoload.php";

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
