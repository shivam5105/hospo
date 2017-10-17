<?php
include_once("dbconfig.php");
loginCheck();
$HighLightedTab = 6;
$catobj=new App\Classes\CategoryClass();

if(isset($_GET['id']) && (int)$_GET['id'] > 0){
	   $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT) ? filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT) : 0;
	$currentCat=$catobj->edit($id);
	 
if(isset($_POST['submit']) && $_POST['submit']=='Update'){
	$catobj->update($currentCat,trim_data($_POST));

}   
	   
}

?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo PROJECT_NAME; ?> - Edit Job Category</title>
	<?php include_once('common-head.php'); ?>

</head>
<body>
	<?php include_once('header.php'); ?>
	<div class="title-row">
		<a href="<?php echo BASEURL; ?>/job_categories.php" class="button fancy title-btn primary">Manage Job Categories</a>
		<h1 class="title">Edit Job Category</h1>
	</div>

	<form action="" method="post" name="add_page_form" id="add_page_form">
		<input type="hidden" name="submitted" id="submitted" value="1" />
		<fieldset>
			<legend>Edit Job Category</legend>
			
			<div class="row">
				<div class="col-8">
					<?php field_start("Category Name","name"); ?>
						<input type="text" name="name" id="name" required value="<?php echo $currentCat->name; ?>"  />
					<?php field_end(); ?>

					<?php field_start("Description","description"); ?>
						<?php
						if(empty($_POST["description"]))
						{
							$_POST["description"] = "";
						}
						?>
						<textarea  name="description"> <?php echo $currentCat->description; ?></textarea>
					<?php field_end(); ?>
				</div>
				<div class="col-4">
					<div class="sidebar-wrapper">
						<?php field_start("Status","active"); ?>
							<input type="radio" name="status" id="active" value="1" <?php if($currentCat->status != "0"){ echo "checked='checked'"; } ?> />
							<label for="active">Active</label>
							<input type="radio" name="status" id="inactive" value="0" <?php if($currentCat->status == "0"){ echo "checked='checked'"; } ?> />
							<label for="inactive">In-Active</label>
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