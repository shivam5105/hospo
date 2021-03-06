<!DOCTYPE html>
<html lang="en">
<head>
	<title>HOSPO</title>
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

<body class="jobseeker">
<?php include_once("header.php"); 

$managerSubscription=$user->isManager();

if($managerSubscription=='Active'){

	$categories=$user->categories();
	$licensetransport=$user->licenseTransport();
	$allskills=$user->allskills();
	$shortobj=new App\Classes\ShortlistedClass();
	$licenseobj=new App\Classes\JobLocationsClass();

	 $locations=$licenseobj->getParentcats();

	if(isset($_REQUEST['submit']) && $_REQUEST['submit']=='search'){
		$shortlisted=$shortobj->whomIshortlisted($_REQUEST);

}else{

		$shortlisted=$shortobj->whomIshortlisted();
	}

}
?>
<!--head-->
<div class="job-menu-back">
<div class="container">
<div class="row">
        <div class="job-menu hospo-cus-pad">
        <a href="jobseekers.php">Browse Jobseekers</a>
        	<a  class="mnu-active"  href="shortlist.php">My Shortlist</a>
        	<a href="#">Account</a>
        </div>
</div>
</div>
</div>
<?php if($managerSubscription=='Active'){ ?>

<section class="job-head">
	
	<div class="container">

		<div class="row">
		   <form name="filters" method="get" action="shortlist.php#mainresult">
			<div class="job-heading-part hospo-cus-pad">
              
				<div class="heading">
												<h1>Refine shortlist by...<br>

					
				</div>
				<div class="filter-first">
				<ul>
					<li>
						<select name="category">
                            <option value="">Any Roles</option>
							<?php foreach($categories as $category){ ?>
                                   <option <?php if($category->id==@$_GET['category']){echo 'selected';} ?> value="<?php echo $category->id ?>"><?php echo $category->name ?></option>
							<?php } ?>	   
                            </select>
					</li>
					<li>
						<select name="part_or_full" >
                            <option value="">Any Hours</option>
                             <option <?php if('Part'==@$_GET['part_or_full']){echo 'selected';} ?> value="Part">Part-time</option>
                            <option <?php if('Full'==@$_GET['part_or_full']){echo 'selected';} ?> value="Full">Full-time</option>
                        </select>
					</li>
					<li>
						<!--<select>
                            <option selected disabled hidden>Any Location</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            </select>-->
                           
                            <input value="<?php echo  @$_GET['location'];?>" type="text" name="location" placeholder="Location">
							
							
                     <select name="location"  >
						  <option selected disabled hidden value="">Town/City</option>
                               <?php  foreach($locations as $location){ ?>
									  <option value="<?php echo $location->id; ?>" class="optionGroup" <?php if(isset($_GET['location']) && ($location->id==$_GET['location'])){echo 'selected';} ?> ><?php echo $location->name; ?></option>
									  <?php foreach($location->subLocation as $sublocation){ ?>
										<option class="optionChild" <?php if(isset($_GET['location']) && ($sublocation->id==$_GET['location'])){echo 'selected';} ?>  value="<?php echo $sublocation->id; ?>">&nbsp;&nbsp;&nbsp;<?php echo $sublocation->name; ?></option>
									<?php } ?>
									  
							   <?php  } ?>
						 
						</select>
                          
					</li>
				</ul>
					
				</div>

				<div class="filter-first t-pos">
				<div class="filter-reset tog-fil"><i class="fa fa-caret-up" aria-hidden="true"></i><i style="display:none;" class="fa fa-caret-down" aria-hidden="true"></i><h4>advanced filters</h4></div>
				<div class="filter-reset r-all"> <h4 onclick="javascript:window.location.href='shortlist.php'"><span class="before-x">x</span> reset all filters</h4> </div>
				<ul class="job-drop-up" style="<?php if((isset($_GET['skill'])  && $_GET['skill']!='')||(isset($_GET['license_transport'])  && $_GET['license_transport']!='')){echo 'display:block;';}else{echo 'display:none;';} ?>">
					<li>
						<select name="skill" >
                            <option value="">Special Skills</option>
							
                            <?php foreach($allskills as $obj){ ?>
								        <option <?php if($obj->id==@$_GET['skill']){echo 'selected';} ?> value="<?=$obj->id;?>"><?=$obj->name;?></option>

								 <?php } ?>
                        </select>
					</li>
					<li>
						<select name="license_transport">
                            <option value="">License & Transport</option>
                            <?php foreach($licensetransport as $obj){ ?>
								        <option <?php if($obj->id==@$_GET['license_transport']){echo 'selected';} ?> value="<?=$obj->id;?>"><?=$obj->name;?></option>

								 <?php } ?>
                        </select>
					</li>
					<li>
							<select name="availability">
                            <option selected disabled hidden>General Availability</option>
                                 <option <?php if('Anytime'==@$_GET['availability']){echo 'selected';} ?> value="Anytime">Anytime</option>
                            <option <?php if('Weekdays'==@$_GET['availability']){echo 'selected';} ?> value="Weekdays">Weekdays</option>
                            <option <?php if('Weekends'==@$_GET['availability']){echo 'selected';} ?> value="Weeknights">Weekends</option>
                            <option <?php if('Weekends'==@$_GET['availability']){echo 'selected';} ?> value="Weekends">Weekends</option>
                        </select>
					</li>
				</ul>
					
				</div>


				<div class="sec-btn-pos job"><button name="submit" type="submit" value="search">search</button></div>
				
			</div>
			 </form>
		</div>
		
	</div>


</section>




	<div id="mainresult">

<?php if(count($shortlisted)){ ?>
<!--job-section-->

<div class="shortlisted job-third <?php $i=0; if($i==0){ echo 'top-minus';} ?>">
	
	<div class="container w-con">

		<div class="row">
<?php 
$i=1;
foreach($shortlisted as $shorted){
	
?>
			<div class="col-sm-4 hospo-cus-pad b-s">
			<div class="job-tab <?php if($shorted->touser->role->slug=='employee'){ echo 'no-border'; }?>">

				<div class="job-cover">

					<div class="profile-pic" style="background-image: url(<?php echo BASEURL.'/uploads/profile/'.$shorted->touser->userProfile->profile; ?>);">
                       <?php if($shorted->touser->role->slug=='superemployee'){?>
						   
						    						 <img class="pro-sts" src="assets/images/crown.png" alt="">

						   <?php } ?>
						
					</div>
					<?php if($shorted->is_interested){ ?>
					<div class="active-status"><h2>Interested</h2></div>
                       <?php } ?>
					<h2 class="pro-name"><?php echo $shorted->touser->userProfile->first_name.' '.$shorted->touser->userProfile->last_name; ?></h2>
					<div class="work">

						<p><?php 
						$str='';
						foreach($shorted->touser->EmployeeCategories as $cat){
						$str.=$cat->category->name.',';
						}
						echo trim($str,',')
						?></p>
						
					</div>

					<div class="info">
					<p class="location">	<?php echo @$shorted->touser->userProfile->joblocation->name; ?></p>
					
                    <span><?php if($seeker->userProfile->totalexperience->type){ echo $seeker->userProfile->totalexperience->title.' '.ucfirst($seeker->userProfile->totalexperience->type).' Experience';}else{ echo $seeker->userProfile->totalexperience->title;} ?><br>
                      Shaky Isles, McDonalds</span>
					</div>
					<div class="view-more" action="shortlist" user_id="<?php echo $shorted->to_id;?>">view more</div>


					<div class="two-btn">
					
					<div id="tooltip" class="sec-btn-pos pro-btn"><a>contact</a></div>
					<div class="tooltips">

						<p>Phone</p>
                        <span><?php echo $shorted->touser->phone; ?></span>

                        <p>Email</p>
                        <span><?php echo $shorted->touser->email; ?></span>
						<div class="nip"></div>
					</div>
					<div class="sec-btn-pos pro-btn disabled-btn"><a  onclick="removeShortlist($(this),<?php echo $shorted->touser->id;?>)">remove</a></div>
					</div>
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
<!--job sec row-->

<?php }else{ ?>
<div class="container w-con noresult">
 No Shortlist
</div>
<?php } ?>



<?php if(count($shortlisted)==9){ ?>

<div class="load loadshorted" params="<?php echo $_SERVER['QUERY_STRING']; ?>">
	

	<p>Load More..</p>


</div>
<?php } ?>

</div>

<!-- full profile -->

<section class="full-pro">
 

</section>

<?php }else{ ?>
<section class="nosubscription">
 <h3>Membership Expired</h3>
</section>
<?php } ?>

<?php include_once("footer.php"); ?>







</body>
</html>