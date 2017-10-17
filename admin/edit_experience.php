<?php
include_once("dbconfig.php");
loginCheck();
$HighLightedTab =10;
$obj=new App\Classes\TotalExperienceClass();

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
	<title><?php echo PROJECT_NAME; ?> - Edit Experience</title>
	<?php include_once('common-head.php'); ?>

</head>
<body>
	<?php include_once('header.php'); ?>
	<div class="title-row">
		<a href="<?php echo BASEURL; ?>/experiences.php" class="button fancy title-btn primary">Manage Experiences</a>
		<h1 class="title">Edit Experience</h1>
	</div>

	<form action="" method="post" name="add_page_form" id="add_page_form">
		<input type="hidden" name="submitted" id="submitted" value="1" />
		<fieldset>
			<legend>Edit Experience</legend>
			
			<div class="row">
				<div class="col-8">
					<?php field_start("Title","title"); ?>
						<input type="text" name="title" id="title" required value="<?php echo $current->title; ?>"  />
					<?php field_end(); ?>
               <?php field_start("Type","type"); ?>
								<select name="type"  required>
		     				
                                 <option selected disabled hidden value="">select..</option>
                                 <option value="" <?php if($current->type==''){ echo 'selected';} ?>>None</option>
                                 <option value="years" <?php if($current->type=='years'){ echo 'selected';} ?>>Years</option>
                                 <option value="months" <?php if($current->type=='months'){ echo 'selected';} ?>>Months</option>
                             </select>
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