<?php
include_once("dbconfig.php");


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>HOSPO:Contact</title>
	<?php include_once("common-head.php"); ?>
</head>

<body class="contact">
<?php include_once("header.php"); 
	if(isset($_POST['submit']) && $_POST['submit']=='submit'){
		$contact=new App\Classes\ContactsClass();
		$response=$contact->store($_POST);

	}
?>
<!--contact-->


<section class="contact-cover">

	<div class="container">
	<div class="">
		<div class="cont-head">

			<h2>get in touch...</h2>
			
		</div>
		<div class="form-prt ">

			<form name="contactform" action="" method="post">
				<input  type="text" name="name" placeholder="Name" required pattern="^[A-Za-z0-9 ]{1,}" title="Invalid Input"><br>
				<input  type="email" name="email" placeholder="Email" required  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"><br>
				<textarea placeholder="Message" name="message" required></textarea>
			   <div class="sec-btn-pos job"><button type="submit" name="submit" value="submit" >Submit</button></div>
			</form>

		</div>
		</div>
	</div>
	


</section>


<?php include_once("footer.php"); ?>





</body>
</html>