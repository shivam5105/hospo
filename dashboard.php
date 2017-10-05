<?php
include_once("dbconfig.php");
$user=new App\Classes\UserClass();
$user->isEmployee();
$shortobj=new App\Classes\ShortlistedClass();
$profile=$user->getloginProfile();
$shortlists=$shortobj->whoShortlistedMe();

if(isset($_POST) && !empty($_POST)){
	$shortobj->interest($_POST);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>HOSPO</title>
	<?php include_once("common-head.php"); ?>


</head>

<body class="jobseeker">
<?php include_once("header.php"); 

?>
<div class="job-menu-back">
<div class="container">
<div class="row">
        <div class="job-menu hospo-cus-pad">
        	<a class="mnu-active" href="dashboard.php">Dashboard</a>
        	<a href="#">Account</a>
        </div>
</div>
</div>
</div>


<!--top-sec-->

<section class="job-head dash-h">
	
	<div class="container">

		<div class="row">
			<div class="job-heading-part hospo-cus-pad">

				<div class="heading">
					<h1>Employee<br>
                         Dashboard
                    </h1>
					
				</div>
 

 				<div class="imploye-data filter-first">
 					<form name="jobhuntform" class="jobhuntform" method="get">

				<ul class="job-drop-up ">
					<li>
						<select id="currently_looking_for_work" name="currently_looking_for_work" required>
                            <option value="">--Select Jobhunt Status--</option>
							
                            <option value="1" <?php if($profile->currently_looking_for_work==1){ echo 'selected';} ?>>Looking </option>
                            <option value="0" <?php if($profile->currently_looking_for_work==0){ echo 'selected';} ?>>Not Looking</option>
                        </select>
					</li>
					
				</ul>
 				</div>


				<div class="sec-btn-pos job"><button type="submit" name="submit">update</button></div>
				</form>
			</div>
			
		</div>
		
	</div>


</section>


<!--job-section-->

<div class="move-top">

	<div class="container">

		<div class="row">
	
         <div class="dash-mrgin hospo-cus-pad">
			<div class="dash-head-line">
			<div class="dt-head">
			<p class="s-hd">Here you’ll see companies that have shortlisted you for a potential position.</p>
			<p>See a company you’d like to work for? Show them you’re keen by marking yourself as Interested.
              Not feeling it? Take yourself off their shortlist by marking NOT Interested.
			</p>
			</div>
			<?php 
			if(count($shortlists)){
				?>
				<form method="post" action="" name="shortlistform" id="shortlistform">
				<?php 
			foreach($shortlists as $short){

			?>
			<div class="myshortlist">			

				<div class="emp-row">
					
				<ul class="inply-info">
					<li class="add-rs">
						<p class="emp-hd"><?php echo $short->fromuser->userProfile->first_name.' '. $short->fromuser->userProfile->last_name; ?></p>
						<p class="emp-wrk">Cafe</p>
						<p class="view-more">View More</p>
						
		
					</li>

					<li class="interest "><input type="radio" class="interested"  name="<?php echo $short->id;?>" value="1" placeholder=""> Interested</li>
					<li class="n-interest "><input type="radio" class="interested"  name="<?php echo $short->id;?>" value="0" placeholder=""> NOT Interested</li>
				</ul>

				</div>


			</div>
						<div class="product-info d-pop">

					<div class="flot-product">

					<div class="ver-mid">
					<div class="float-cover pos-rel">
					<div class="cl-ose">x</div>
						<h2><?php echo $short->fromuser->userProfile->first_name.' '. $short->fromuser->userProfile->last_name; ?></h2>
						
						<p class="emp-wrk">Cafe</p>
                        <div class="product-info-detail">
                        	
                        	<p class="ti-tal-dash">About The Company</p>
                            <p class="product-txt">
                                 <?php echo $short->fromuser->userProfile->about; ?>
                        	</p>

                        </div>
						</div>
					</div>


						
					</div>
					

				</div>
							<?php } ?>



				<div class="sec-btn-pos dash-btn"><button type="submit" value="save">save</button></div>
				
				</form>
			<?php }else{ ?>
			<div class="w-con noresult">
 No shortlists
</div>
							<?php } ?>
			</div>		 
          </div>
		</div>
		
	</div>
	

</div>












<!--product info-->







 

<?php include_once("footer.php"); ?>



</body>
</html>