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
   $user->employeePagination($_GET['page']);
	
}	

