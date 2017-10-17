<?php
include_once("dbconfig.php");
loginCheck();
$HighLightedTab =11;
$obj=new App\Classes\SpecialSkillsClass();

if(isset($_GET['id']) && (int)$_GET['id'] > 0){
	   $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT) ? filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT) : 0;
	$current=$obj->edit($id);
	 
if(isset($_POST['submit']) && $_POST['submit']=='Update'){
	$obj->update($current,trim_data($_POST));

}   
	   
}

?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo PROJECT_NAME; ?> - Edit Special Skill</title>
	<?php include_once('common-head.php'); ?>

</head>
<body>
	<?php include_once('header.php'); ?>
	<div class="title-row">
		<a href="<?php echo BASEURL; ?>/special_skills.php" class="button fancy title-btn primary">Manage Special Skills</a>
		<h1 class="title">Edit New Special Skill</h1>
	</div>

	<form action="" method="post" name="add_page_form" id="add_page_form">
		<fieldset>
			<legend>Edit Special Skill</legend>
			
			<div class="row">
				<div class="col-8">
					<?php field_start("Title","name"); ?>
						<input type="text" name="name" id="name" required value="<?php echo $current->name; ?>"  />
					<?php field_end(); ?>

					
				</div>
				<div class="col-4">
					<div class="sidebar-wrapper">
						
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