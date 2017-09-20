<?php
include_once("dbconfig.php");

if(trim($_POST['mode']) == 'SendForgotPasswordLink' && trim($_POST['email']) != "")
{
	include_once("../email/settings.php");
	include_once("../email/postmark/Mail.php");
	$email = rawurldecode(trim($_POST["email"]));

	$result = $mysqli->query("SELECT * FROM users WHERE email='".$email."'");
	if($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc())
		{
			$email		= trim($row['email']);
			$password 	= trim($row['password']);
			$FullName 	= trim($row['full_name']);
			$UserName 	= trim($row['username']);
			$UserID 	= trim($row['id']);

			ob_start();
			?>
			<div style="width:580px; background-color:#d2d2d2; padding:10px;">
				<div style="padding:20px 15px; background-color:#fff; word-wrap:break-word;">
					<?php
					$ServerPath = trim($_SERVER['SERVER_NAME']);

					if(strtolower($ServerPath) == 'localhost')
					{
						$ServerPath = "http://localhost/hospo";
					}
					else
					{
						$ServerPath .= "/hospo";
					}
					?>
					<img src="<?php echo $ServerPath; ?>/assets/images/logo-orange.png" alt="Hospo" title="Hospo" />
					<div style="height:1px; border-bottom:1px solid #d2d2d2; margin-top:5px;">&nbsp;</div>
					<br /><br />
					Hi <?php echo $FullName; ?>,<br /><br />
					There was recently a request to change the password for your account.<br>
					If you requested this password change, please reset your password here:<br /><br />
					
					<?php /*
					<?php echo $ServerPath; ?>/forgot-password.php?t=<?php echo $password; ?>&it=<?php echo base64_encode($UserID."-::-".time());?>
					*/?>
					<div style="text-align:center;">
						<a href="<?php echo $ServerPath; ?>/aforgot-password/<?php echo $password; ?>/<?php echo base64_encode($UserID."-::-".time());?>" style="color: #fff; background-color:#fcc062; text-decoration: none; border-radius: 3px; padding: 5px 19px 7px 19px; font-size: 16px; white-space: nowrap; font-family: Helvetica Neue,Helvetica,Arial,sans-serif; letter-spacing:1px;">RESET PASSWORD</a>
					</div>
					<br /><br>
					If you did not make this request, you can ignore this message and your password will remain the same.

					<br /><br />
					Regards,<br />
					Hospo
				</div>
			</div>
			<?php
			$Message = ob_get_contents();
			ob_get_clean();

			$MailSent = Mail::compose(POSTMARKAPP_API_KEY)
					->from('social@thestudiobooth.com', "StudioBooth")
					->addTo($email)
					->subject("Hi ".$FullName.', Reset password link')
					->messageHtml($Message)
					/*->addAttachment($file)
					->tag($email->{'from'})*/
					->send();

			if($MailSent)
			{
				echo "Success-::-Mail sent successfully.";
			}
			else
			{
				echo "Error-::-Unable to send mail. Please try again.";
			}
		}
	}
	else
	{
		echo "Error-::-Sorry, '".$email."' email-id is not registered with us.";
	}
}
if(trim($_POST['mode']) == 'ResetHomeBgImage')
{
	$mysqli->query("UPDATE home_page SET background_image_id = '0'");
	echo "success";
}
?>