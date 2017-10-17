<?php
include_once("dbconfig.php");
loginCheck();
$HighLightedTab =11;
if(isset($_POST['submit']) && $_POST['submit']=='Save'){
$obj=new App\Classes\SpecialSkillsClass();
	  $obj->store(trim_data($_POST));

}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo PROJECT_NAME; ?> - Add Special Skill</title>
	<?php include_once('common-head.php'); ?>

</head>
<body>
	<?php include_once('header.php'); ?>
	<div class="title-row">
		<a href="<?php echo BASEURL; ?>/special_skills.php" class="button fancy title-btn primary">Manage Special Skills</a>
		<h1 class="title">Add New Special Skill</h1>
	</div>

	<form action="" method="post" name="add_page_form" id="add_page_form">
		<input type="hidden" name="submitted" id="submitted" value="1" />
		<fieldset>
			<legend>Add Special Skill</legend>
			
			<div class="row">
				<div class="col-8">
					<?php field_start("Title","name"); ?>
						<input type="text" name="name" id="name" required value="<?php echo htmlize(@$_POST['name']); ?>"  />
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