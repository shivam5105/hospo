<?php
include_once("dbconfig.php");

if(!empty($_GET) && $_GET['action']=='get_employees'){
	$user=new App\Classes\UserClass();
    //$user->isEmployee();
   $user->employeePagination($_GET['page']);
	
}

if(!empty($_GET) && $_GET['action']=='get_shorlists'){
	$user=new App\Classes\UserClass();
	//$user->isEmployee();
	$obj=new App\Classes\ShortlistedClass();

   $obj->whomIshortlistedAjax($_GET['page']);
	
}	
if(!empty($_GET) && $_GET['action']=='remove_shortlist'){
	$user=new App\Classes\UserClass();
	//$user->isEmployee();
	$obj=new App\Classes\ShortlistedClass();

   $obj->removeShorlist($_GET['touser']);
	
}
if(!empty($_GET) && $_GET['action']=='shortlist_user'){
	$user=new App\Classes\UserClass();
	//$user->isEmployee();
	$obj=new App\Classes\ShortlistedClass();

   $obj->shortlistUser($_GET['touser']);
	
}

if(!empty($_POST)  && $_REQUEST['action']=='login'){
	$user=new App\Classes\UserClass();
    $user->login($_POST);
}
	
if(!empty($_REQUEST)  && $_REQUEST['action']=='logout'){
	$user=new App\Classes\UserClass();
    $user->logout();
}

