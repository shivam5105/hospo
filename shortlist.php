<?php
include_once("dbconfig.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>HOSPO</title>
	<?php include_once("common-head.php"); ?>


</head>

<body class="jobseeker">
<?php include_once("header.php"); 
$user=new App\Classes\UserClass();

$jobseekers=$user->employees();


?>

<!--head-->
<div class="job-menu-back">
<div class="container">
<div class="row">
        <div class="job-menu hospo-cus-pad">
        	<a  href="#">Browse Jobseekers</a>
        	<a class="mnu-active" href="#">My Shortlist</a>
        	<a href="#">Account</a>
        </div>
</div>
</div>
</div>


<!--top-sec-->


<section class="job-head">
	
	<div class="container">

		<div class="row">
			<div class="job-heading-part hospo-cus-pad">

				<div class="heading">
					<h1>Browse great<br>
                    hospo staff by...
                    </h1>
					
				</div>
				<div class="filter-first">
				<ul>
					<li>
						<select>
                            <option selected disabled hidden>Any Roles</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                        </select>
					</li>
					<li>
						<select>
                            <option selected disabled hidden>Any Hours</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                        </select>
					</li>
					<li>
						<!--<select>
                            <option selected disabled hidden>Any Location</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            </select>-->
                            <form>
                            <input type="text" name="Any Location" placeholder="Any Location">
                            </form>
					</li>
				</ul>
					
				</div>

				<div class="filter-first t-pos">
				<div class="filter-reset tog-fil"><i class="fa fa-caret-up" aria-hidden="true"></i><i style="display:none;" class="fa fa-caret-down" aria-hidden="true"></i><h4>advanced filters</h4></div>
				<div class="filter-reset r-all"> <h4><span class="before-x">x</span> reset all filters</h4> </div>
				<ul class="job-drop-up">
					<li>
						<select>
                            <option selected disabled hidden>Special Skills</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                        </select>
					</li>
					<li>
						<select>
                            <option selected disabled hidden>License & Transport</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                        </select>
					</li>
					<li>
						<select>
                            <option selected disabled hidden>General Availability</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                        </select>
					</li>
				</ul>
					
				</div>


				<div class="sec-btn-pos job"><a href="">search</a></div>
				
			</div>
			
		</div>
		
	</div>


</section>


<!--job-section-->

<div class="job-third top-minus">
	
	<div class="container w-con">

		<div class="row">

			<div class="col-sm-4 hospo-cus-pad b-s">
			<div class="job-tab">

				<div class="job-cover">

					<div class="profile-pic" style="background-image: url(images/profile.jpg);">

						 <img class="pro-sts" src="images/crown.png" alt="">
						
					</div>
					<div class="active-status"><h2>Interested</h2></div>

					<h2 class="pro-name">george</h2>
					<div class="work">

						<p>Barista, Waiter, Bar staff</p>
						
					</div>

					<div class="info">
					<p class="location">	Auckland</p>
                      <span>2+ Years Experience<br>
                      Shaky Isles, McDonalds</span>
					</div>
					<div class="view-more">view more</div>


					<div class="two-btn">
					
					<div id="tooltip" class="sec-btn-pos pro-btn"><a>contact</a></div>
					<div class="tooltips">

						<p>Phone</p>
                        <span>021 1234 5678</span>

                        <p>Email</p>
                        <span>george@clooney.co.nz</span>
						<div class="nip"></div>
					</div>
					<div class="sec-btn-pos pro-btn disabled-btn"><a href="#">remove</a></div>
					</div>
				</div>
				</div>
			</div>


			<div class="col-sm-4 hospo-cus-pad b-s">
			<div class="job-tab">

				<div class="job-cover">

					<div class="profile-pic" style="background-image: url(images/profile.jpg);">

						 <img class="pro-sts" src="images/crown.png" alt="">
						
					</div>
					<div class="active-status"><h2>Interested</h2></div>

					<h2 class="pro-name">george</h2>
					<div class="work">

						<p>Barista, Waiter, Bar staff</p>
						
					</div>

					<div class="info">
					<p class="location">	Auckland</p>
                      <span>2+ Years Experience<br>
                      Shaky Isles, McDonalds</span>
					</div>
					<div class="view-more">view more</div>


					<div class="two-btn">
										<div id="tooltip" class="sec-btn-pos pro-btn"><a>contact</a></div>
					<div class="tooltips">

						<p>Phone</p>
                        <span>021 1234 5678</span>

                        <p>Email</p>
                        <span>george@clooney.co.nz</span>
						<div class="nip"></div>
					</div>
					<div class="sec-btn-pos pro-btn disabled-btn"><a href="">remove</a></div>
					</div>
				</div>
				</div>
			</div>


			<div class="col-sm-4 hospo-cus-pad b-s">
			<div class="job-tab">

				<div class="job-cover">

					<div class="profile-pic" style="background-image: url(images/profile.jpg);">

						 <img class="pro-sts" src="images/crown.png" alt="">
						
					</div>
					<div class="active-status"><h2>Interested</h2></div>

					<h2 class="pro-name">george</h2>
					<div class="work">

						<p>Barista, Waiter, Bar staff</p>
						
					</div>

					<div class="info">
					<p class="location">	Auckland</p>
                      <span>2+ Years Experience<br>
                      Shaky Isles, McDonalds</span>
					</div>
					<div class="view-more">view more</div>


					<div class="two-btn">
					<div id="tooltip" class="sec-btn-pos pro-btn"><a>contact</a></div>
					<div class="tooltips">

						<p>Phone</p>
                        <span>021 1234 5678</span>

                        <p>Email</p>
                        <span>george@clooney.co.nz</span>
						<div class="nip"></div>
					</div>
					<div class="sec-btn-pos pro-btn disabled-btn"><a href="">remove</a></div>
					</div>
				</div>
				</div>
			</div>
			
		</div>
		
	</div>


</div>
<!--job sec row-->



<div class="job-third">
	
	<div class="container w-con">

		<div class="row">

			<div class="col-sm-4 hospo-cus-pad b-s">
			<div class="job-tab">

				<div class="job-cover">

					<div class="profile-pic" style="background-image: url(images/profile.jpg);">

						 <img class="pro-sts" src="images/crown.png" alt="">
						
					</div>
					<div class="active-status"><h2>Interested</h2></div>

					<h2 class="pro-name">george</h2>
					<div class="work">

						<p>Barista, Waiter, Bar staff</p>
						
					</div>

					<div class="info">
					<p class="location">	Auckland</p>
                      <span>2+ Years Experience<br>
                      Shaky Isles, McDonalds</span>
					</div>
					<div class="view-more">view more</div>


					<div class="two-btn">
					<div id="tooltip" class="sec-btn-pos pro-btn"><a>contact</a></div>
					<div class="tooltips">

						<p>Phone</p>
                        <span>021 1234 5678</span>

                        <p>Email</p>
                        <span>george@clooney.co.nz</span>
						<div class="nip"></div>
					</div>
					<div class="sec-btn-pos pro-btn disabled-btn"><a href="">remove</a></div>
					</div>
				</div>
				</div>
			</div>


			<div class="col-sm-4 hospo-cus-pad b-s">
			<div class="job-tab">

				<div class="job-cover">

					<div class="profile-pic" style="background-image: url(images/profile.jpg);">

						 <img class="pro-sts" src="images/crown.png" alt="">
						
					</div>
					<div class="active-status"><h2>Interested</h2></div>

					<h2 class="pro-name">george</h2>
					<div class="work">

						<p>Barista, Waiter, Bar staff</p>
						
					</div>

					<div class="info">
					<p class="location">	Auckland</p>
                      <span>2+ Years Experience<br>
                      Shaky Isles, McDonalds</span>
					</div>
					<div class="view-more">view more</div>


					<div class="two-btn">
										<div id="tooltip" class="sec-btn-pos pro-btn"><a>contact</a></div>
					<div class="tooltips">

						<p>Phone</p>
                        <span>021 1234 5678</span>

                        <p>Email</p>
                        <span>george@clooney.co.nz</span>
						<div class="nip"></div>
					</div>
					<div class="sec-btn-pos pro-btn disabled-btn"><a href="">remove</a></div>
					</div>
				</div>
				</div>
			</div>


			<div class="col-sm-4 hospo-cus-pad b-s">
			<div class="job-tab">

				<div class="job-cover">

					<div class="profile-pic" style="background-image: url(images/profile.jpg);">

						 <img class="pro-sts" src="images/crown.png" alt="">
						
					</div>
					<div class="active-status"><h2>Interested</h2></div>

					<h2 class="pro-name">george</h2>
					<div class="work">

						<p>Barista, Waiter, Bar staff</p>
						
					</div>

					<div class="info">
					<p class="location">	Auckland</p>
                      <span>2+ Years Experience<br>
                      Shaky Isles, McDonalds</span>
					</div>
					<div class="view-more">view more</div>


					<div class="two-btn">
										<div id="tooltip" class="sec-btn-pos pro-btn"><a>contact</a></div>
					<div class="tooltips">

						<p>Phone</p>
                        <span>021 1234 5678</span>

                        <p>Email</p>
                        <span>george@clooney.co.nz</span>
						<div class="nip"></div>
					</div>
					<div class="sec-btn-pos pro-btn disabled-btn"><a href="">remove</a></div>
					</div>
				</div>
				</div>
			</div>
			
		</div>
		
	</div>


</div>

<!--third row-->



<div class="job-third">
	
	<div class="container w-con">

		<div class="row">

			<div class="col-sm-4 hospo-cus-pad b-s">
			<div class="job-tab no-border">

				<div class="job-cover">

					<div class="profile-pic" style="background-image: url(images/profile.jpg);">

						 <img class="pro-sts" src="images/crown.png" alt="">
						
					</div>
					<div class="active-status"><h2>Interested</h2></div>

					<h2 class="pro-name">george</h2>
					<div class="work">

						<p>Barista, Waiter, Bar staff</p>
						
					</div>

					<div class="info">
					<p class="location">	Auckland</p>
                      <span>2+ Years Experience<br>
                      Shaky Isles, McDonalds</span>
					</div>
					<div class="view-more">view more</div>


					<div class="two-btn">
										<div id="tooltip" class="sec-btn-pos pro-btn"><a>contact</a></div>
					<div class="tooltips">

						<p>Phone</p>
                        <span>021 1234 5678</span>

                        <p>Email</p>
                        <span>george@clooney.co.nz</span>
						<div class="nip"></div>
					</div>
					<div class="sec-btn-pos pro-btn disabled-btn"><a href="">remove</a></div>
					</div>
				</div>
				</div>
			</div>


			<div class="col-sm-4 hospo-cus-pad b-s">
			<div class="job-tab no-border">

				<div class="job-cover">

					<div class="profile-pic" style="background-image: url(images/profile.jpg);">

						 <img class="pro-sts" src="images/crown.png" alt="">
						
					</div>
					<div class="active-status"><h2>Interested</h2></div>

					<h2 class="pro-name">george</h2>
					<div class="work">

						<p>Barista, Waiter, Bar staff</p>
						
					</div>

					<div class="info">
					<p class="location">	Auckland</p>
                      <span>2+ Years Experience<br>
                      Shaky Isles, McDonalds</span>
					</div>
					<div class="view-more">view more</div>

					<div class="two-btn">
										<div id="tooltip" class="sec-btn-pos pro-btn"><a>contact</a></div>
					<div class="tooltips">

						<p>Phone</p>
                        <span>021 1234 5678</span>

                        <p>Email</p>
                        <span>george@clooney.co.nz</span>
						<div class="nip"></div>
					</div>
					<div class="sec-btn-pos pro-btn disabled-btn"><a href="">remove</a></div>
					</div>
				</div>
				</div>
			</div>


			<div class="col-sm-4 hospo-cus-pad b-s">
			<div class="job-tab no-border">

				<div class="job-cover">

					<div class="profile-pic" style="background-image: url(images/profile.jpg);">

						 <img class="pro-sts" src="images/crown.png" alt="">
						
					</div>
					<div class="active-status"><h2>Interested</h2></div>

					<h2 class="pro-name">george</h2>
					<div class="work">

						<p>Barista, Waiter, Bar staff</p>
						
					</div>

					<div class="info">
					<p class="location">	Auckland</p>
                      <span>2+ Years Experience<br>
                      Shaky Isles, McDonalds</span>
					</div>
					<div class="view-more">view more</div>

					<div class="two-btn">
										<div id="tooltip" class="sec-btn-pos pro-btn"><a>contact</a></div>
					<div class="tooltips">

						<p>Phone</p>
                        <span>021 1234 5678</span>

                        <p>Email</p>
                        <span>george@clooney.co.nz</span>
						<div class="nip"></div>
					</div>
					<div class="sec-btn-pos pro-btn disabled-btn"><a href="">remove</a></div>
					</div>
				</div>
				</div>
			</div>
			
		</div>
		
	</div>


</div>

<!--job fourth row-->




<div class="job-third">
	
	<div class="container w-con">

		<div class="row">

			<div class="col-sm-4 hospo-cus-pad b-s">
			<div class="job-tab no-border">

				<div class="job-cover">

					<div class="profile-pic" style="background-image: url(images/profile.jpg);">

						 <img class="pro-sts" src="images/crown.png" alt="">
						
					</div>
					<div class="active-status"><h2>Interested</h2></div>

					<h2 class="pro-name">george</h2>
					<div class="work">

						<p>Barista, Waiter, Bar staff</p>
						
					</div>

					<div class="info">
					<p class="location">	Auckland</p>
                      <span>2+ Years Experience<br>
                      Shaky Isles, McDonalds</span>
					</div>
					<div class="view-more">view more</div>

					<div class="two-btn">
										<div id="tooltip" class="sec-btn-pos pro-btn"><a>contact</a></div>
					<div class="tooltips">

						<p>Phone</p>
                        <span>021 1234 5678</span>

                        <p>Email</p>
                        <span>george@clooney.co.nz</span>
						<div class="nip"></div>
					</div>
					<div class="sec-btn-pos pro-btn disabled-btn"><a href="">remove</a></div>
					</div>
				</div>
				</div>
			</div>


			<div class="col-sm-4 hospo-cus-pad b-s">
			<div class="job-tab no-border a-color">

				<div class="job-cover">

					<div class="profile-pic" style="background-image: url(images/profile.jpg);">

						 <img class="pro-sts" src="images/crown.png" alt="">
						
					</div>
					<div class="active-status"><h2>Interested</h2></div>

					<h2 class="pro-name">george</h2>
					<div class="work">

						<p>Barista, Waiter, Bar staff</p>
						
					</div>

					<div class="info">
					<p class="location">	Auckland</p>
                      <span>2+ Years Experience<br>
                      Shaky Isles, McDonalds</span>
					</div>
					<div class="view-more">view more</div>

					<div class="two-btn">
										<div id="tooltip" class="sec-btn-pos pro-btn"><a>contact</a></div>
					<div class="tooltips">

						<p>Phone</p>
                        <span>021 1234 5678</span>

                        <p>Email</p>
                        <span>george@clooney.co.nz</span>
						<div class="nip"></div>
					</div>
					<div class="sec-btn-pos pro-btn disabled-btn"><a href="">remove</a></div>
					</div>
				</div>
				</div>
			</div>
			
		</div>
		
	</div>


</div>







<div class="load">
	
<!--
	<p>Loading More..</p>

-->
</div>




<!-- full profile -->

<section class="full-pro">
   <div class="profile-cover">
   <div class="close"></div>
	<div class="container">
	 <div class="row">
	  <div class="pro-detail-cover">
	    <div class="f-info">
		<h2 class="pro-name">george</h2>
		<div class="active-status"><h2>Interested</h2></div>
		<div class="work">
		<p>Barista, Waiter, Bar staff</p>						
		</div>
	    <div class="info">
	      <address>
	      	
	        <p class="location">Auckland</p>
            <span>2+ Years Experience<br>
            Shaky Isles, McDonalds
            </span></address>
	    </div>
	    </div>
	    <div class="f-profile">
	    	<div class="profile-pic" style="background-image: url(images/profile.jpg);">

				 <img class="pro-sts" src="images/crown.png" alt="">
						
			</div>
	    	<div class="sec-btn-pos pro-btn disabled-btn"><a href="">remove</a></div>
	    </div>
	   </div> 
	 </div>
	</div>
   

<!--contact-info-->
<div class="container h3-bot">

	<div class="row ">
 
 	<div class="con-bot"><h3>contact info</h3></div>
		<div class="col-sm-4">
		<div class="con-det-info">

		<p>Phone</p>
      <span>021 1234 5678</span>
			
		</div>
		</div>
		<div class="col-sm-4">
		<div class="con-det-info">
			<p>Email</p>
            <span>george@clooney.co.nz</span>
		</div>
		</div>
		<div class="col-sm-offset-4">
		</div>
		
	</div>

    <div class="about-padd">
		<div class="row">
 
 	    <div class="about-bot"><h3>about</h3></div>
		<div class="col-sm-4">
		<div class="con-det-info">

		<p>Hours Required</p>
        <span> Part-Time</span>
			
		</div>
		</div>
		<div class="col-sm-4">
		<div class="con-det-info">
			<p>Current Situation</p>
        <span> Student</span>
		</div>
		</div>
		<div class="col-sm-4">
		<div class="con-det-info">
		<p>License & Transport</p>
        <span> Restricted License</span>
        </div>
		</div>
		
	</div>
</div>
	<div class="about-me-text">
<div class="row">
	<h4>about me</h4>
	<p>
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et 
		
	</p>
	</div>	
	</div>

	<!---->

	<div class="shifts">
     <div class="row">
		<h3 class="ava-bot">availability</h3>
		
		<div class="schedule">

			<ul class="week">
			    <li class="a-title">mon</li>
				<li><p>morning</p></li>
				<li><p>noon</p></li>
				<li><p class="prsnt">night</p></li>

			</ul>
			<ul class="week">
				<li class="a-title">tue</li>
				<li><p class="prsnt">morning</p></li>
				<li><p class="prsnt">noon</p></li>
				<li><p class="prsnt">night</p></li>
				
			</ul>
			<ul class="week">
				<li class="a-title">wed</li>
				<li><p>morning</p></li>
				<li><p>noon</p></li>
				<li><p class="prsnt">night</p></li>
				
			</ul>
			<ul class="week">
				<li class="a-title">thu</li>
				<li><p>morning</p></li>
				<li><p class="prsnt">noon</p></li>
				<li><p class="prsnt">night</p></li>
				
			</ul>
			<ul class="week">
				<li class="a-title">fri</li>
				<li><p class="prsnt">morning</p></li>
				<li><p class="prsnt">noon</p></li>
				<li><p class="prsnt">night</p></li>
				
			</ul>
			<ul class="week">
				<li class="a-title">sat</li>
				<li><p class="prsnt">morning</p></li>
				<li><p class="prsnt">noon</p></li>
				<li><p class="prsnt">night</p></li>
				
			</ul>
			<ul class="week">
				<li class="a-title">sun</li>
				<li><p>morning</p></li>
				<li><p>noon</p></li>
				<li><p>night</p></li>
				
			</ul>
			
		</div>
      </div>
	</div>
	<!---->

<div class="">
<div class="row">	
	<div class="full-pro-work">

		<h3 class="work-bot">Work Experience</h3>


		<div class="all-dtl">

			<h4>McDonalds</h4>
             <address>
             	
               Auckland, New Zealand<br>
                Shift Supervisor<br>
                April 2014 - Present<br></address> 
<p>
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.
	</p>		

		</div>

				<div class="all-dtl">

			<h4>Shaky Isles</h4>
            <address>
                Auckland, New Zealand<br>
                Shift Supervisor<br>
                April 2014 - Present<br>
            </address>
<p>
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.
	</p>		

		</div>
		
	</div>
</div>
</div>

</div>
</div>

</section>



<?php include_once("footer.php"); ?>



<script type="text/javascript">
var page=2;
$(document).on('click','.load',function () {
  $(this).find('p').text('Loading...');
  var loader= $(this).find('p');
        $.ajax({
      url: 'ajaxrequest.php?action=get_employees&page='+page,
      type: 'GET',
           success: function(response){
			   page++;
			   response=JSON.parse(response)
             if(response.length){
               loader.text('Load More..');
     var str='<div class="job-third"><div class="container w-con"><div class="row">';
	 var j=1;
	$.each(response, function (i) { 
        str+='<div class="col-sm-4 hospo-cus-pad b-s"><div class="job-tab"><div class="job-cover"><div class="profile-pic" style="background-image: url(<?php echo BASEURL;?>'+'/uploads/profile/'+response[i].user_profile.profile+');"> <img class="pro-sts" src="images/crown.png" alt=""></div><div class="active-status"><h2>ative 2 days ago</h2></div><h2 class="pro-name">'+response[i].user_profile.first_name+' '+ response[i].user_profile.last_name+'</h2><div class="work"><p>Bar &amp; Beverage Service,Hotel Guest Services,Waiter</p></div><div class="info"><p class="location">mumbai</p> <span>2+ Years Experience<br> Shaky Isles, McDonalds</span></div><div class="view-more"><a href="">view more</a></div><div class="sec-btn-pos pro-btn"><a href="">shortlist</a></div></div></div></div>'; 
		if (j % 3 == 0 ) {  str+='</div></div></div><div class="job-third"><div class="container w-con"><div class="row">'; } 
       j++;
    });
	
	 
	str+='</div></div></div>';
	$('.jobs:last').after(str);
	
              }else{
				 loader.hide(); 
				  
			  }
            }
   });
});
</script>




</body>
</html>