<?php
include_once("dbconfig.php");

if(!empty($_POST)){
	$user=new App\Classes\UserClass();
    $user->login($_POST);
}
	

