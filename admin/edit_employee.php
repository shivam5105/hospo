<?php
include_once("dbconfig.php");
loginCheck();
$HighLightedTab = 3;
$user=new App\Classes\UserClass();

$categories=$user->categories();
$licensetransport=$user->licenseTransport();
$days=$user->weekDays();


if(isset($_GET['id']) && (int)$_GET['id'] > 0){
	   $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT) ? filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT) : 0;
		
	   $currentuser=$user->employeedetails($id);
	   
	  $empcats = array_column($currentuser->EmployeeCategories->toArray(), 'category_id');
	  
	  $emplicence = array_column($currentuser->EmployeeLicenseTransport->toArray(), 'licence_transport_id');	   
	   
	   $availabity=$currentuser->Availability;
	   
	   
}
if(isset($_POST['submit']) && $_POST['submit']=='Update'){
	
	   $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT) ? filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT) : 0;
		
  $user->editEmployee($currentuser,trim_data($_POST),$_FILES);

}

// $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT) ? filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT) : 0;

// if(isset($_POST) && isset($_POST['submitted']) && $_POST['submitted'] == 1)
// {
// 	$_POST 			= trim_data($_POST);
// 	$ErrorMessage 	= array();

// 	if(trim($_POST['title']) == "")
// 	{
// 		$ErrorMessage['error'][] = "Please enter 'Title'.";
// 	}
// 	if(trim($_POST['description']) == "")
// 	{
// 		$ErrorMessage['error'][] = "Please enter 'Description'.";
// 	}
// 	if(count($ErrorMessage) < 1)
// 	{
// 		$time 	= time();
// 		$title 	= $_POST['title'];
// 		$slug 	= createSlug($title);

// 		$title 			= $mysqli->real_escape_string($title);
// 		$description 	= $mysqli->real_escape_string($_POST['description']);

// 		$sql = "UPDATE pages SET
// 		title = '".$title."',
// 		slug = '".$slug."',
// 		description = '".$description."',
// 		status = '".$_POST['status']."',
// 		template = '".$_POST['template']."',
// 		updatedon = '".$time."'
// 		WHERE id = '".$id."'";
// 		$query = $mysqli->query($sql);
		
// 		if($query)
// 		{
// 			flash('msg', 'Page updated successfully.', 'success', BASEURL.'/manage_pages.php');
// 		}
// 		else
// 		{
// 			$ErrorMessage['error'][] = "Oops! something went wrong. Please try again.";
// 			$ErrorMessage['error'][] = $mysqli->error;
// 		}
// 	}
// }

?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo PROJECT_NAME; ?> - Edit Employee Details</title>
	<?php include_once('common-head.php'); ?>
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

</head>
<body>
	<?php include_once('header.php'); ?>
	<div class="title-row">
		<a href="<?php echo BASEURL; ?>/employees.php" class="button fancy title-btn primary">Manage Employees</a>
		<h1 class="title">Edit Employee Details</h1>
	</div>

	<form method="post" name="add_page_form" id="add_page_form" class="employee_edit" action="" enctype="multipart/form-data">
		<fieldset>
			<legend>Edit Employee Details</legend>
			<div class="row">
				<div class="col-8">	
					<div class="row">
							<div class="col-6">
							<?php field_start("First Name","first_name"); ?>
							<input type="text" name="first_name" id="first_name" required placeholder="first name" pattern="^[A-Za-z0-9 ]{1,}" title="Invalid Input"  value="<?php echo $currentuser->userProfile->first_name; ?>"  />
						<?php field_end(); ?>
							</div>		
							 <div class="col-6">
							 <?php field_start("Last Name","last_name"); ?>
							<input type="text" name="last_name" id="last_name"  required placeholder="last name" pattern="^[A-Za-z0-9 ]{1,}" title="Invalid Input" value="<?php echo $currentuser->userProfile->last_name; ?>"  />
						<?php field_end(); ?>
							</div>	
					</div>	
					<div class="row">
							<div class="col-6">
							<?php field_start("Phone","phone"); ?>
							<input type="text" name="phone" id="phone" value="<?php echo $currentuser->phone; ?>"  required pattern="^[0-9]{9,}" title="Invalid Input" />
						<?php field_end(); ?>
							</div>		
							 <div class="col-6">
							 <?php field_start("Email","email"); ?>
					<input type="email" name="email" id="email"required  value="<?php echo $currentuser->email;  ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"  />
						<?php field_end(); ?>
							</div>	
					</div>	
					<div class="row">
							<div class="col-6">
							<?php field_start("Are You Currently Looking For Work?","currently_looking_for_work"); ?>
							<div class="field-element">
    							<input type="radio" name="currently_looking_for_work" <?php if($currentuser->userProfile->currently_looking_for_work==1){echo 'checked';}?> id="active" value="1" >
							<label for="active">Yes</label>
							<input type="radio" name="currently_looking_for_work" id="inactive" value="0" <?php if($currentuser->userProfile->currently_looking_for_work==0){echo 'checked';}?>>
							<label for="inactive">No</label>
						</div>
						<?php field_end(); ?>
							</div>		
							 <div class="col-6">
							 <?php field_start("Promocode","prmo_code"); ?>
							<input type="text" name="prmo_code" id="prmo_code" value="<?php echo $currentuser->userProfile->prmo_code; ?>"  />
						<?php field_end(); ?>
							</div>	
					</div>	
						<div class="row">
							<div class="col-6">
							<?php field_start("Profile Pic","title"); ?>
                           <div class="uplod-img">
							<img id="profileimage" height="150" width="150"  src="<?php echo SITEBASEURL.'/uploads/profile/'.$currentuser->userProfile->profile; ?>"  />
	                              <input type="file" class="custom-upld" accept="image/*" name="profile" onchange="readURL(this);"  >
	                       </div>

						<?php field_end(); ?>
							</div>		
							 <div class="col-6">
							 <?php field_start("Part-time or full-time?","title"); ?>
								<select name="part_or_full" required>
		     				
                                 <option selected disabled hidden value="">select..</option>
                                 <option value="Part" <?php if($currentuser->userProfile->part_or_full=='Part'){ echo 'selected';} ?>>Part-time</option>
                                 <option value="Full" <?php if($currentuser->userProfile->part_or_full=='Full'){ echo 'selected';} ?>>Full-time</option>
                             </select>
						<?php field_end(); ?>
							</div>	
					      </div>	
	                    <div class="row">
							<div class="col-6">
							<?php field_start("Where do you live?","location"); ?>
							<input type="text" required name="location" id="location" value="<?php echo $currentuser->userProfile->location; ?>"  />
						<?php field_end(); ?>
							</div>		
							 <div class="col-6">
							 <?php field_start("Any special skills?","skills"); ?>
							 <?php 
							$skills='';
							foreach ($currentuser->Skills as $skill) {
							$skills.=$skill->name.',';

							}

							 ?>
							<input type="text" required name="skills" id="skills" value="<?php echo trim( $skills,',') ?>"   placeholder="Enter Skills as comma seperated" pattern="^[A-Za-z -,.]{1,}" title="Skills as comma seperated only"/>
						<?php field_end(); ?>
							</div>	
					</div>	
					 <div class="row">
							<div class="col-6">
							<?php field_start("License & Transport","title"); ?>
								<select class="multiple" name="license_transport[]" multiple required>
                                 <option selected disabled hidden>select..</option>
								 <?php foreach($licensetransport as $obj){ ?>
								        <option value="<?=$obj->id;?>"  <?php if (in_array($obj->id, $emplicence)){echo 'selected';} ?> ><?=$obj->name;?></option>

								 <?php } ?>
                             </select>
						<?php field_end(); ?>
							</div>		
							
					</div>	
				<div class="col-12">

					<?php field_start("About You","description"); ?>
					<textarea placeholder="Add a short blurb to your profile" minlength="50" title="Should be atleast 50 characters" required="" name="about"><?php echo $currentuser->userProfile->about; ?></textarea>
					<?php field_end(); ?>
				</div>	
					<div class="col-12">
						
						<div class="shifts">

							<p class="gen-avlbl">General Availability – Select all that apply</p>
							<div class="schedule">
						 <?php foreach($days as $key=>$day){ ?>
							<ul class="week">
								<li class="a-title day"><?php echo $day; ?></li>
								<?php  $avail=explode(',',$availabity->{strtolower($day)} );?>
								<li><p> <input <?php if (in_array('morning', $avail)){echo 'checked';} ?>  id="morning<?php echo $day.'_'.$key; ?>" class="hidden <?php echo $day; ?>" type="checkbox" name="<?php echo strtolower($day); ?>[]" value="morning"><label for="morning<?php echo $day.'_'.$key; ?>">morning</label></p></li>
								<li><p><input <?php if (in_array('noon', $avail)){echo 'checked';} ?> id="noon<?php echo $day.'_'.$key; ?>" class="hidden <?php echo $day; ?>"  type="checkbox" name="<?php echo strtolower($day); ?>[]" value="noon"><label for="noon<?php echo $day.'_'.$key; ?>">noon</label></p></li>
								<li><p><input  <?php if (in_array('night', $avail)){echo 'checked';} ?> id="night<?php echo $day.'_'.$key; ?>" class="hidden <?php echo $day; ?>"  type="checkbox" name="<?php echo strtolower($day); ?>[]" value="night"><label for="night<?php echo $day.'_'.$key; ?>">night</label></p></li>

							</ul>
							<?php } ?>
						   </div>

						  
						</div>
						
					</div>
				
		<div class="col-12">
			<div class="form-prt">
			<label for="experience">Experiences</label>
			<div class="experiences">
			<?php 
              foreach($currentuser->Experiences as $experience){
			?>
				<div class="experience">
				<input type="hidden" name="experiencid[]" value="<?=$experience->id?>">
					<p class="half-prt ">	
					<input type="text" value="<?=$experience->employer?>" name="employer[]" value="" required="" placeholder="Employer" pattern="^[A-Za-z0-9 ]{1,}" title="Invalid Input">
					<input type="text" name="job_location[]" value="<?=$experience->location?>" value="" required="" placeholder="Location" pattern="^[a-zA-Z0-9\s,'-]*$" title="Invalid Input">
					</p>
					<p class="crd-dtl ">
					<input type="text" name="job_title[]" value="<?=$experience->job_title?>" value="" required="" placeholder="job title" pattern="^[a-zA-Z0-9\s,'-]*$" title="Invalid Input">
					<input type="text" name="start_date[]" value="<?=$experience->start_date?>" value="" required="" placeholder="mm/yy" pattern="^[0-9]{2,}/[0-9]{2,}$" title="Invalid format">
					<input type="text" name="end_date[]" value="<?=$experience->end_date?>" value="" required="" placeholder="mm/yy" pattern="^[0-9]{2,}/[0-9]{2,}$" title="Invalid format">
					</p>


						<div class="about-u">
						     <textarea placeholder="Tell us about the position..."  required name="job_description[]" minlength="50" title="Please write atleast 50 characters"><?=$experience->job_description;?></textarea>
						</div>
				</div>
			  <?php } ?>

			</div>

			</div>
			
			  <div class="botm-btn">
					<div class="sin-btn anothr-por"><a class="addnewemp"> Add Another Position</a></div>

			  </div>

    </div>
				</div>
				<div class="col-4">
					<div class="sidebar-wrapper">
						<?php field_start("Status","active"); ?>
							<input type="radio" name="status" id="active" value="1" <?php if($currentuser->status==1){ echo "checked='checked'"; } ?> />
							<label for="active">Active</label>
							<input type="radio" name="status" id="inactive" value="0" <?php if($currentuser->status==0){ echo "checked='checked'"; } ?> />
							<label for="inactive">In-Active</label>
						<?php field_end(); ?>
						<?php field_start("Email Verified","active"); ?>
							<input type="radio" name="email_confirmed" id="active" value="1" <?php if($currentuser->email_confirmed==1){ echo "checked='checked'"; } ?> />
							<label for="active">Yes</label>
							<input type="radio" name="email_confirmed" id="inactive" value="0" <?php if($currentuser->email_confirmed==0){ echo "checked='checked'"; } ?> />
							<label for="inactive">No</label>
						<?php field_end(); ?>
						
						<?php field_start(); ?>
							<?php submit_button("Update"); ?>
						<?php field_end(); ?>
					</div>
					<div class="form-action form">
					<h3 class="section-title">I am currently...<sup>*</sup></h3>
					  <div class="field radio cf" >
					       <div>
								<label>
								<input type="radio" required name="current_status"  value="Employed" <?php if($currentuser->userProfile->current_status=='Employed'){echo 'checked';} ?>>Employed
								</label>
				          </div>
						  <div>
								<label>
								<input type="radio"  required name="current_status" value="Unemployed"  <?php if($currentuser->userProfile->current_status=='Unemployed'){echo 'checked';} ?>>Unemployed
								</label>
				          </div>
							<div>
								<label>
								<input type="radio" required name="current_status" value="Studying" <?php if($currentuser->userProfile->current_status=='Studying'){echo 'checked';} ?>>Studying
								</label>
							</div>
							
						</div>
				</div>
             <div class="form-action form">
					<h3 class="section-title">I’m looking for work in<sup>*</sup></h3>
					<div class="field radio cf" style="height:100px; overflow: auto;">
					
				<?php foreach($categories as $category){ ?>
								<div>
								<label>
								<input type="checkbox"  <?php if (in_array($category->id, $empcats)){echo 'checked';} ?> name="categories[]"  class="categories" value="<?php echo $category->id ?>"> <?php echo $category->name ?>
								</label>
								</div>
                        <?php } ?>
					</div>
				</div>
				</div>
			</div>
		</fieldset>
	</form>

	<?php include_once('footer.php'); ?>
</body>
</html>