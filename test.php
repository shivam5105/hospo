<?php
include_once("dbconfig.php");
$user=new App\Classes\UserClass();
$roles=$user->roles();
$categories=$user->categories();
$days=$user->weekDays();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>HOSPO | Signup</title>
	<?php include_once("common-head.php"); ?>
</head>

<body class="sign-up">

<?php 

	include_once("header.php");
	if(isset($_POST['submit']) && $_POST['submit']=='submit'){
		$user=new App\Classes\UserClass();
		$response=$user->signup($_POST);

	}
	
	if(isset($_REQUEST['code']) && !empty($_REQUEST['code'])){
		$user->emailConfirm($_REQUEST['code']);
		}


?>


<section class="contact-cover">

	<div class="container">
	  <div class="row">

	    <div class="col-sm-7">
		  <div class="cont-head">
  
		  	<h1>account</h1>
		  	
		  </div>
		  <div class="form-prt">
  
		  	<form class="account-dtls signupform" method="post" action="">
		  	<h5>Account Details</h5>
		  	<p class="half-prt">
		  		<input  type="text" name="first_name"  placeholder="first name" pattern="^[A-Za-z0-9 ]{1,}" title="Invalid Input">
		  		<input  type="text" name="last_name"  placeholder="last name" pattern="^[A-Za-z0-9 ]{1,}" title="Invalid Input">
		  	</p>
		  	<p class="full-prt">	
		  		<input type="text" name="phone"  placeholder="Phone" pattern="^[0-9]{9,}" title="Invalid Input">
		  		<input type="email" name="email"  value="" placeholder="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
		  	</p>
		  	<p class="half-prt">	
		  		<input type="password"  class="password" name="password"  value="" placeholder="password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
		  		<input type="password"  class="confirm_password" name="confirm_password"  value="" placeholder="confirm password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
		  	</p>
		  	<p class="full-prt">
				  <select name="account" id="account"  pattern="^[A-Za-z]{1,}" title="Invalid Input">
                                 <option selected disabled hidden value="">Account type</option>
								 <?php foreach($roles as $role){ ?>
								      <option value="<?php echo $role->slug; ?>"><?php echo $role->title; ?></option>
																  
								 <?php } ?>
                             </select>
		  		<input type="text" name="promocode" value="" placeholder="prmocode(Optional)" pattern="^[A-Za-z0-9 ]" title="Invalid Input">
		  	</p>
		  		

		  	<div class="payment ">
		  		<h5>Payment Details</h5>
		  		<p class="full-prt">
		  		<input type="text" name="card num" value="" placeholder="card number*">
		  		</p>
		  		<p class="crd-dtl">
		  		<input type="text" name="phone" value="" placeholder="'Name On Card*">
		  		<input type="text" name="phone" value="" placeholder="mm/yy*">
		  		<input type="text" name="phone" value="" placeholder="mm/yy*">
		  		</p>
		    </div>
		  	
		  	
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
				<div class="sin-btn "><button type="submit" name="submit" value="submit" class="paymentbtn sbmt" >save & update profile</button></div>

		</div> 



	  </div>
	</div>
	


</section>

<!--uploading part-->
<div class="uploading employee">
	<div class="container">
	<div class="uplod-img">
	<p>Upload <br> Profile Photo</p>
	<input type="file" class="custom-upld" accept="image/*" name="profile" >
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
					<li><input type="radio"  name="current_status"  value="Employed" >Employed</li>
					<li><input type="radio"   name="current_status" value="Unemployed" >Unemployed</li>
					<li><input type="radio"  name="current_status" value="Studying">Studying</li>

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
		     				<select name="part_or_full" >
		     				
                                 <option selected disabled hidden value="">select..</option>
                                 <option value="Part">Part-time</option>
                                 <option value="Full">Full-time</option>
                             </select>
		     			</li>
		     			<li>
		     			<div class="sin-d-h"> <p>Where do you live?</p> </div>
						 <input type="text" name="location"  value="" placeholder="Where do you live?">
						 
		     			</li>
		     		</ul>
		     			
		     		</div>
     
			

		 </div>
		
	
		

		<div class="signup-drop-down">

		     <div class="filter-first t-pos">
		     		
		     		

		     		<ul>
		     			<li class="blk">
		     			<div class="sin-d-h"><p>Any spcial skills?</p></div>
						 <input type="text"  name="skills" value=""  placeholder="Enter Skills as comma seperated" pattern="^[A-Za-z -,.]{1,}" title="Skills as comma seperated only">
						 
		     			</li>
		     			<li>
		     			<div class="sin-d-h"> <p>License & Transport</p> </div>
		     				<select >
                                 <option selected disabled hidden>select..</option>
                                 <option value="1">One</option>
                                 <option value="2">Two</option>
                             </select>
		     			</li>
		     		</ul>
		     			
		     		</div>
     
			</div>

		 
		



	<div class="col">
		<div class="about-u">

		<p>About You:</p>
		<textarea placeholder="Add a short blurb to your profile" minlength="50"    title="Should be atleast 50 characters"   name="about"></textarea>
			
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
                <?php foreach($days as $key=>$day){?>
			<ul class="week">
			    <li class="a-title day"><?php echo $day; ?></li>
				<li><p> <input id="morning<?php echo $day.'_'.$key; ?>" class="hidden <?php echo $day; ?>" type="checkbox" name="<?php echo strtolower($day); ?>[]" value="morning"><label for="morning<?php echo $day.'_'.$key; ?>">morning</label></p></li>
				<li><p><input id="noon<?php echo $day.'_'.$key; ?>" class="hidden <?php echo $day; ?>"  type="checkbox" name="<?php echo strtolower($day); ?>[]" value="noon"><label for="noon<?php echo $day.'_'.$key; ?>">noon</label></p></li>
				<li><p><input id="night<?php echo $day.'_'.$key; ?>" class="hidden <?php echo $day; ?>"  type="checkbox" name="<?php echo strtolower($day); ?>[]" value="night"><label for="night<?php echo $day.'_'.$key; ?>">night</label></p></li>

			</ul>
			<?php } ?>
		
			
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
		  		<input type="text" name="employer[]" value=""  placeholder="Employer" pattern="^[A-Za-z0-9 ]{1,}" title="Invalid Input">
		  		<input type="text" name="job_location[]" value=""  placeholder="Location"   pattern="^[a-zA-Z0-9\s,'-]*$"   title="Invalid Input" >
		  	    </p>
		  		<p class="crd-dtl blk">
		  		<input type="text" name="job_title[]" value=""   placeholder="job title" pattern="^[a-zA-Z0-9\s,'-]*$"   title="Invalid Input">
		  		<input type="text" name="start_date[]" value=""  placeholder="mm/yy" pattern="^[0-9]{2,}/[0-9]{2,}$"   title="Invalid format">
		  		<input type="text" name="end_date[]" value=""  placeholder="mm/yy" pattern="^[0-9]{2,}/[0-9]{2,}$"   title="Invalid format" >
		  		</p>


		  		<div class="about-u">

		        
		        <textarea placeholder="Tell us about the position..." name="job_description[]" minlength="50"    title="Please write atleast 50 characters" ></textarea>
			
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


</form>
</div>

<?php include_once("footer.php"); ?>





</body>
</html>