<?php
include_once("dbconfig.php");
if (isset($_POST['email'], $_POST['p']))
{
    $email = $_POST['email'];
    $password = $_POST['p']; // The hashed password.

    if (login($email, $password, $mysqli) == true)
    {
		flash( 'msg', 'Welcome to Admin Panel', 'success', BASEURL .'/dashboard.php');
    }
    else
    {
		flash( 'msg', 'Incorrect email/password.', 'error', BASEURL .'/index.php');
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo PROJECT_NAME; ?></title>
	<?php include_once('common-head.php'); ?>
	<script type="text/JavaScript" src="<?php echo BASEURL; ?>/assets/js/sha512.js"></script> 
	<script type="text/JavaScript" src="<?php echo BASEURL; ?>/assets/js/forms.js"></script>
	<style type="text/css">
		#msg-flash
		{
			margin-left:0;
		}
	</style>
</head>
<body class="login-page" onload="$('#email').focus();">
	<?php flash('msg' ); ?>	
	<div class="login">
		<?php
        if (isset($_GET['error'])) {
            echo '<p class="error">Error Logging In!</p>';
        }
        ?> 
        <form action="" method="post" name="login_form">
			<fieldset>
				<div class="logo">
					<img src="<?php echo BASEURL;?>/assets/images/logo-white.png" />
				</div>

				<?php field_start("Email","email"); ?>
					<input type="email" id="email" name="email" />
				<?php field_end(); ?>

				<?php field_start("Password","password"); ?>
					<input type="password" name="password" id="password"/>
				<?php field_end(); ?>

				<div class="action">
					<input type="submit" value="Login" onclick="formhash(this.form, this.form.password); return false;" />
					<a href="javascript:void(0);" class="forgot-password-link">Forgot Password?</a>
					<div style="clear:both;"></div>
				</div>
			</fieldset>
		</form>
	</div>
	<div class="forgot-password">
        <form action="" method="post" onsubmit="return ValidateForgotPassword();" name="forgot_pass_form">
			<fieldset>
				<div class="logo">
					<img src="<?php echo BASEURL;?>/assets/images/logo-white.png" />
				</div>
				<b>Note:</b> Reset password link will be send on your registered email id.
				<br />
				<br />
				<div id="forgot-pass-result"></div>
				
				<?php field_start("Registered Email","email"); ?>
					<input type="email" id="registered_email" name="registered_email" required />
				<?php field_end(); ?>

				<div class="action">
					<input type="submit" value="Send mail" />
					<a href="javascript:void(0);" class="forgot-password-login">Login?</a>
					<div style="clear:both;"></div>
				</div>
			</fieldset>
		</form>
	</div>
</body>
</html>