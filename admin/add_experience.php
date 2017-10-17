<?php
include_once("dbconfig.php");
loginCheck();
$HighLightedTab =10;
if(isset($_POST['submit']) && $_POST['submit']=='Save'){
$obj=new App\Classes\TotalExperienceClass();

	  $obj->store(trim_data($_POST));

}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo PROJECT_NAME; ?> - Add Experience</title>
	<?php include_once('common-head.php'); ?>

</head>
<body>
	<?php include_once('header.php'); ?>
	<div class="title-row">
		<a href="<?php echo BASEURL; ?>/experiences.php" class="button fancy title-btn primary">Manage Experiences</a>
		<h1 class="title">Add New Experience</h1>
	</div>

	<form action="" method="post" name="add_page_form" id="add_page_form">
		<input type="hidden" name="submitted" id="submitted" value="1" />
		<fieldset>
			<legend>Add Experience</legend>
			
				<div class="row">
				<div class="col-8">
					<?php field_start("Title","title"); ?>
						<input type="text" name="title" id="title" required  />
					<?php field_end(); ?>
               <?php field_start("Type","type"); ?>
								<select name="type"  required>
		     				
                                 <option selected disabled hidden value="">select..</option>
                                 <option value="" >None</option>
                                 <option value="years" >Years</option>
                                 <option value="months">Months</option>
                             </select>
						<?php field_end(); ?>
				
				</div>
				<div class="col-4">
					<div class="sidebar-wrapper">
						<?php field_start(); ?>
							<?php submit_button(); ?>
						<?php field_end(); ?>
					</div>
				</div>
			</div>
		</fieldset>
	</form>

	<?php include_once('footer.php'); ?>
</body>
</html>