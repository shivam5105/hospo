<!DOCTYPE html>
<html lang="en">
<head>
	<title>HOSPO | Register</title>
	<?php include_once("common-head.php"); ?>
	<style>
.optionGroup {
    font-weight: bold;
    font-style: italic;
}
    
.optionChild {
    padding-left: 18px!important;
}	
	
</style>
</head>

<body class="sign-up">

<?php 
	include_once("header.php");

if(isset($_REQUEST['action']) && $_REQUEST['action']=='cancel'){
	$user->flashFancy('Payment Failure' , 'We are really sorry for this inconvenience but there was an error when processing your payment! ', 'error');

}	
if(isset($_REQUEST['action']) && $_REQUEST['action']=='success'){
	//$user->flashFancy('Payment Successful' , 'Payment Successful! Thank you for subscribing our service !', 'success');
//$user->flashFancy('Register | Email Verify' , 'Your account has been made, <br /> please verify it by clicking the activation link that has been send to your email.', 'success');

$user->flashFancy('Signup Success' , 'Your account has been made, <br /> please login to your account!', 'success');

}	
	


$user->withoutLoginOnly();
$roles=$user->roles();
$categories=$user->categories();
$licensetransport=$user->licenseTransport();
$totalExperience=$user->totalExperience();

//$days=$user->weekDays();
$allskills=$user->allskills();

	
	
	
	if(isset($_POST['submit']) && $_POST['submit']=='submit'){
		$user=new App\Classes\UserClass();
		
		
		$response=$user->signup($_POST,$_FILES);

	}
	$licenseobj=new App\Classes\JobLocationsClass();

	 $locations=$licenseobj->getParentcats();

?>
<script type="text/javascript">
	
	  function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
              $('.uplod-img').css('display','flex');
               $('.uplod-img p').remove();
                    $('#profileimage')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
		  	<form class="account-dtls signupform" method="post" action="" enctype="multipart/form-data" >

<section class="contact-cover firstsignup">

	<div class="container">
	  <div class="row">

	    <div class="col-sm-7">
		  <div class="cont-head">
  
		  	<h1>Register</h1>
		  	
		  </div>
		  <div class="form-prt">
  
		  	<h5>Register Details</h5>
		  	<p class="half-prt">
		  		<input  type="text" class="first_name" name="first_name" required placeholder="first name" pattern="^[A-Za-z0-9 ]{1,}" title="Invalid Input">
		  		<input  type="text"  class="" name="last_name" required placeholder="last name" pattern="^[A-Za-z0-9 ]{1,}" title="Invalid Input">
		  	</p>
		  	<p class="full-prt">	
		  		<input type="text" class="phone" name="phone" required placeholder="Phone" pattern="^[0-9]{9,}" title="Invalid Input">
		  		<input type="email" class="email" name="email" required  placeholder="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
		  	</p>
		  	<p class="half-prt">	
		  		<input type="password"  class="password" name="password" required value="" placeholder="password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
		  		<input type="password"  class="confirm_password" name="confirm_password" required value="" placeholder="confirm password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
		  	</p>
		  	<p class="full-prt"><div class="drop-down">
				  <select name="account" id="account" required pattern="^[A-Za-z]{1,}" title="Invalid Input">
                                 <option value="">Account type</option>
								 <?php foreach($roles as $role){ ?>
								      <option value="<?php echo $role->slug; ?>"><?php echo $role->title; ?></option>
																  
								 <?php } ?>
                             </select></div>
		  		<input type="text" name="promocode" value="" placeholder="prmo code (Optional)" title="Invalid Input">
		  	</p>
		  		
 	<p class="full-prt managerprofile">

				<textarea placeholder="Add a short blurb about your company for potential employees" minlength="50"    title="Should be atleast 50 characters"  required="true" name="aboutcompany" id="aboutcompany"></textarea>
			

			</p>
		
		  	
		  </div>
		</div> 

		<div class="col-sm-5 botm-sav">

			<div class="sav-prt employee">

				<div class="lok-job">

		<!--***************************************-->
			<div class="main-radio billing-add">	


				<p>
					Are you currently looking for work?
				</p>
							
			  <ul>
			  <li>
			    <input type="radio" checked id="f-option" name="currently_looking_for_work" value="1">
			    <label for="f-option">yes</label>
			    
			    <div class="check"></div>
			  </li>
			  
			  <li>
			    <input type="radio" id="s-option" name="currently_looking_for_work" value="0">
			    <label for="s-option">no</label>
			    
			    <div class="check"><div class="inside"></div></div>
			  </li>
			  
			</ul>
			</div>
			</div>
		  </div>
<!--***************************************-->		
				<div class="sin-btn "><button type="submit" value="submit" name="submit"  name="submitmember" value="submitmember" class="paymentbtn sbmt submitmember" >save & update profile</button></div>

		</div> 



	  </div>
	</div>
	


</section>

<!--uploading part-->
<div class="uploading employee secondsignup">
	<div class="container">
	<div class="uplod-img">
	<p>Upload <br> Profile Photo</p>
	    <img id="profileimage" src="#"  />

	<input type="file" class="custom-upld" accept="image/*" name="profile" onchange="readURL(this);"  required="true">
	</div>	
	</div>





<div class="container  drp-dwn-lst">
	<div class="row">
	<div class="col-sm-8">
		
		<div class="row">
			<div class="col-sm-6">
		
			<div class="sqr-rdo">
		    <h5> 
                 I’m looking for work in...
		    </h5>
				<ul>
				<?php foreach($categories as $category){ ?>
					<li><input type="checkbox" name="categories[]"  class="categories" value="<?php echo $category->id ?>"> <?php echo $category->name ?></li>
				 <?php } ?>
				</ul>


			</div>
		</div>
		<div class="col-sm-6">
		    <div class="sqr-rdo">
		 <h5> 
             I am currently...
		</h5>
				<ul>
					<li><input type="radio" required="true" name="current_status"  value="Employed" >Employed</li>
					<li><input type="radio"  required="true" name="current_status" value="Unemployed" >Unemployed</li>
					<li><input type="radio" required="true" name="current_status" value="Studying">Studying</li>

				</ul>


			</div>
			
		</div>
		</div>
		</div>
		<div class="col-sm-offset-4"></div>
	</div>
	
</div>
<div class="part-job">
<div class="container ">
	<div class="row">
	<div class="col-sm-8">
	

		<div class="signup-drop-down">

		     <div class="filter-first t-pos">
		     		
		     		
		     		
		     		<ul>
		     			<li><div class="sin-d-h"><p>Part-time or full-time?</p></div>
		     				<div class="drop-down1"><select name="part_or_full" required="true">
		     				
                                 <option selected disabled hidden value="">select..</option>
                                 <option value="Part">Part-time</option>
                                 <option value="Full">Full-time</option>
                             </select></div>
		     			</li>
		     			<li>
		     			<div class="sin-d-h"> <p>Where are you looking for work?</p> </div>
					
						<div class="drop-down"> <select name="location" required="true" >
						  <option selected disabled hidden value="">Town/City</option>
                               <?php  foreach($locations as $location){ ?>
									  <option value="<?php echo $location->id; ?>" class="optionGroup" ><?php echo $location->name; ?></option>
									  <?php foreach($location->subLocation as $sublocation){ ?>
										<option class="optionChild"  value="<?php echo $sublocation->id; ?>">&nbsp;&nbsp;&nbsp;<?php echo $sublocation->name; ?></option>
									<?php } ?>
									  
							   <?php } ?>
						 
						</select></div>
		     			</li>
		     		</ul>
		     			
		     		</div>
     
			

		 </div>
		
	
		

		<div class="signup-drop-down">

		     <div class="filter-first t-pos">
		     		
		     		

		     		<ul>
		     			<li class="blk">
		     			<div class="sin-d-h"><p>Any special skills?</p></div>
						
						    <?php foreach($allskills as $obj){ ?>
                      <input type="checkbox" name="skills[]"  class="skills" value="<?php echo $obj->id ?>"> <?php echo $obj->name ?></br>
								 <?php } ?>
								 
								 

						 
						 
						 
		     			</li>
						<li>
		     			<div class="sin-d-h"> <p>How many years experience do you have?</p> </div>
		     				<div class="drop-down1"><select name="total_experience_id"  required="true">
								<option selected disabled hidden value="">select..</option>

								 <?php foreach($totalExperience as $obj){ ?>
								             <option value="<?=$obj->id;?>" ><?=$obj->title.' '.$obj->type;?></option>

								 <?php } ?>
                             </select></div>
		     			</li>
						
						
					
		     			<li>
		     			<div class="sin-d-h"> <p>License & Transport</p> </div>
		     				<div class="drop-down1"><select name="license_transport"  required="true">
							        <option selected disabled hidden value="">select..</option>

								 <?php foreach($licensetransport as $obj){ ?>
								        <option value="<?=$obj->id;?>"><?=$obj->name;?></option>

								 <?php } ?>
                             </select></div>
		     			</li>
		     		</ul>
		     			
		     		</div>
     
			</div>

		 
		



	<div class="col">
		<div class="about-u">

		<p>About You:</p>
		<textarea placeholder="Add a short blurb to your profile" minlength="50"    title="Should be atleast 50 characters"  required="true" name="about"></textarea>
			
		</div>
	</div>
	<div class="col">
		
	</div>
	</div>
	</div>
	<div class="col-sm-offset-4">
	</div>
	</div>
</div>

<div class="week-days">
<div class="container">
	<div class="row">
		<div class="col-sm-10">
		
			<div class="shifts">
    
		<p class="gen-avlbl">General Availability – Select all that apply</p>
		
		<div class="schedule">
        
			                           <ul>
									<li><input type="checkbox" name="availability[]" class="availability" value="Anytime"> Anytime</li>
				 					<li><input type="checkbox" name="availability[]" class="availability" value="Weekdays"> Weekdays</li>
				 					<li><input type="checkbox" name="availability[]" class="availability" value="Weeknights"> Weeknights</li>
				 					<li><input type="checkbox" name="availability[]" class="availability" value="Weekends"> Weekends</li>
				 			
				 				</ul>
		</div>
      
	</div>


		</div>
		<div class="col-sm-offset-2"></div>
	</div>
</div>
</div>
 

<div class="container">
	
	<div class="row">
	<div class="col-sm-8">
		
	

		<div class="form-prt">
		<h5>Experience</h5>
		<div class="experiences">
                <div class="experience">
		 		<p class="half-prt blk">	
		  		<input type="text" name="employer[]" value="" required="true" placeholder="Employer" pattern="^[A-Za-z0-9 ]{1,}" title="Invalid Input">
		  		<input type="text" name="job_location[]" value="" required="true" placeholder="Location"   pattern="^[a-zA-Z0-9\s,'-]*$"   title="Invalid Input" >
		  	    </p>
		  		<p class="crd-dtl blk">
		  		<input type="text" name="job_title[]" value=""  required="true" placeholder="job title" pattern="^[a-zA-Z0-9\s,'-]*$"   title="Invalid Input">
		  		<input type="text" name="start_date[]" value="" required="true" placeholder="mm/yy" pattern="^[0-9]{2,}/[0-9]{2,}$"   title="Invalid format">
		  		<input type="text" name="end_date[]" value="" required="true" placeholder="mm/yy" pattern="^[0-9]{2,}/[0-9]{2,}$"   title="Invalid format" >
		  		</p>


		  		<div class="about-u">

		        
		        <textarea placeholder="Tell us about the position..." required="true" name="job_description[]" minlength="50"    title="Please write atleast 50 characters" ></textarea>
			
		        </div>
		        </div>

		</div>

		</div>
		



          <div class="botm-btn">
	          	<div class="sin-btn anothr-por"><a class="addnewemp"> Add Another Position</a></div>




		          <div class="sin-btn"><button type="submit" value="submit" name="submit" class="sbmt" >save & update profile</button></div>
          </div>


         </div>
		<div class="col-sm-offset-4"></div>
	</div>




</div>



</div>
</form>
<?php include_once("footer.php"); ?>





</body>
</html>