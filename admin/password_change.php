<?php
include_once("dbconfig.php");
loginCheck();
$error_msg = "";
$HighLightedTab = 2;
$user=new App\Classes\UserClass();

if(isset($_GET['id']) && (int)$_GET['id'] > 0){
		$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT) ? filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT) : 0;
       $currentuser=$user->getEmployeeEmailByUserid($id);
	   
}
	
if(isset($_POST['submit']) && $_POST['submit']=='Change Password'){
	$user->changePassword($_POST,$_GET['id']);
}	

?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo PROJECT_NAME; ?> - Change Password</title>
	<?php include_once('common-head.php'); ?>
	
</head>
<body>
	<?php include_once('header.php'); ?>
	<div class="title-row">
		<h1 class="title">Change Password</h1>
		<a onclick="goBack()" class="button fancy title-btn primary"><i class="ion-ios-undo"></i> Go Back</a>

	</div>
    <ul style="margin-left:20px; list-style-type: disc;">
        <li>Passwords must be at least 8 characters long*</li>
        <li>Passwords must contain
			<ul style="margin-left:30px; list-style-type: square;">
				<li>At least one upper case letter (A-Z)</li>
				<li>At least one lower case letter (a-z)</li>
				<li>At least one number (0-9)</li>
			</ul>
        </li>
        <li>Your password and confirmation must match exactly</li>
    </ul>
	<br>
    <form action="" method="post" id="passwordchange" name="changepass_form" onsubmit="return ValidateChanagePassForm();">
		<fieldset>
			<legend>Change Password for <?php echo $currentuser->email; ?></legend>


			<?php field_start("New Password","NewPassword"); ?>
				<input type="password" required name="password" class="password" id="NewPassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"/>
			<?php field_end(); ?>

			<?php field_start("Confirm Password","ConfirmPassword"); ?>
				<input type="password"  required name="confirm_password" class="confirm_password" id="ConfirmPassword"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"/>
			<?php field_end(); ?>

			<?php submit_button("Change Password"); ?>

		</fieldset>
    </form>
	<?php include_once 'footer.php';  ?>	
</body>
</html>