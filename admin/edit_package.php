<?php
include_once("dbconfig.php");
loginCheck();
$HighLightedTab =10;
$obj=new App\Classes\PackagesClass();

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
	<title><?php echo PROJECT_NAME; ?> - Edit Package</title>
	<?php include_once('common-head.php'); ?>

</head>
<body>
	<?php include_once('header.php'); ?>
	<div class="title-row">
		<a href="<?php echo BASEURL; ?>/packages.php" class="button fancy title-btn primary">Manage Package</a>
		<h1 class="title">Edit Package</h1>
	</div>

	<form action="" method="post" name="add_page_form" id="add_page_form">
		<input type="hidden" name="submitted" id="submitted" value="1" />
		<fieldset>
			<legend>Edit Package</legend>
			
			<div class="row">
				<div class="col-8">
					<?php field_start("Package Name","name"); ?>
						<input type="text" name="name" id="name" required value="<?php echo $current->name; ?>"  />
					<?php field_end(); ?>
                <?php field_start("Package Amount","price"); ?>
						<input type="number" name="price" id="price" required value="<?php echo $current->price; ?>"  />
					<?php field_end(); ?>
					<?php field_start("Description","description"); ?>
						<?php
						if(empty($_POST["description"]))
						{
							$_POST["description"] = "";
						}
						?>
						<textarea  name="description"> <?php echo $current->description; ?></textarea>
					<?php field_end(); ?>
				</div>
				<div class="col-4">
					<div class="sidebar-wrapper">
					 <div class="field">
						<b>Role :</b> <?php echo  $current->role->title;?>
						</div>
						<?php field_start("Type","type"); ?>
							<input type="radio" name="type" id="year" value="year" <?php if($current->type == "year"){ echo "checked='checked'"; } ?> />
							<label for="year">Yearly</label>
							<input type="radio" name="type" id="month" value="month" <?php if($current->type == "month"){ echo "checked='checked'"; } ?> />
							<label for="month">Monthy</label>
							<input type="radio" name="type" id="free" value="free" <?php if($current->type == "free"){ echo "checked='checked'"; } ?> />
							<label for="free">Free</label>
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