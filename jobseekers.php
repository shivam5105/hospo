<?php
include_once("dbconfig.php");
$user=new App\Classes\UserClass();
   //$user->isManager();
$jobseekers=$user->employees();


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
        	<a class="mnu-active" href="jobseekers.php">Browse Jobseekers</a>
        	<a href="shortlist.php">My Shortlist</a>
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
					<h1>Refine shortlist by...<br>
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

<?php  if(count($jobseekers)){?>

<div class="jobs job-third <?php $i=0; if($i==0){ echo 'top-minus';} ?>">
	
	<div class="container w-con">

		<div class="row">
<?php 
$i=1;
foreach($jobseekers as $seeker){
?>
			<div class="col-sm-4 hospo-cus-pad b-s">
			<div class="job-tab">
				<div class="job-cover">

					<div class="profile-pic" style="background-image: url(<?php echo BASEURL.'/uploads/profile/'.$seeker->userProfile->profile; ?>);">

						 <img class="pro-sts" src="images/crown.png" alt="">
						
					</div>
					<div class="active-status"><h2>ative 2 days ago</h2></div>

					<h2 class="pro-name"><?php echo $seeker->userProfile->first_name.''.$seeker->userProfile->last_name; ?></h2>
					<div class="work">

						<p><?php 
						$str='';
						foreach($seeker->EmployeeCategories as $cat){
						$str.=$cat->category->name.',';
						}
						echo trim($str,',')
						?></p>
						
					</div>

					<div class="info">
					<p class="location">	<?php echo $seeker->userProfile->location; ?></p>
                      <span>2+ Years Experience<br>
                      Shaky Isles, McDonalds</span>
					</div>
					<div class="view-more"><a href="">view more</a></div>


					<div class="sec-btn-pos pro-btn"><a onclick="addShortlist($(this),<?php echo $seeker->id;?>)">shortlist</a></div>
				</div>
				</div>
			</div>

<?php 
if ( $i % 3 == 0 ) {  echo '</div></div></div><div class="job-third"><div class="container w-con"><div class="row">'; } 

$i++ ;
}
?>
			
			
		</div>
		
	</div>


</div>
<?php }else{ ?>
<div class="container w-con noresult">
 No Jobseekers
</div>
<?php } ?>


<?php if(count($jobseekers)==9){ ?>

<div class="load loadseekers">
	

	<p>Load More..</p>


</div>
<?php } ?>



<?php include_once("footer.php"); ?>



</body>
</html>


