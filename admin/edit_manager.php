<?php
include_once("dbconfig.php");
loginCheck();
$HighLightedTab = 9;
$user=new App\Classes\UserClass();

$categories=$user->categories();
$licensetransport=$user->licenseTransport();
$days=$user->weekDays();


if(isset($_GET['id']) && (int)$_GET['id'] > 0){
	   $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT) ? filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT) : 0;
		
	   $currentuser=$user->managerdetails($id);
	   
	 
	   
	   
}
if(isset($_POST['submit']) && $_POST['submit']=='Update'){
	
	$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT) ? filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT) : 0;

	$user->editManager($currentuser,trim_data($_POST));

}


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
		<a href="<?php echo BASEURL; ?>/managers.php" class="button fancy title-btn primary">Manage Managers</a>
		<h1 class="title">Edit Manager Details</h1>
	</div>

	<form method="post" name="add_page_form" id="add_page_form" class="manager_edit" action="" enctype="multipart/form-data">
		<fieldset>
			<legend>Edit Manager Details</legend>
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
				
					
				
			
				
	
				</div>
				<div class="col-4">
					<div class="sidebar-wrapper">
					<div class="field ">
					<label for="active">Membership Status :</label>
					<div class="field-element">
    					<?php if(!empty($currentuser->membership_status)){ echo  $currentuser->membership_status;}else{echo 'NA';}?>
						</div>
						
						</div>
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
					
             
				</div>
			</div>
		</fieldset>
	</form>

	<?php include_once('footer.php'); ?>
</body>
</html>