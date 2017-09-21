<?php
include_once("dbconfig.php");
loginCheck();
$HighLightedTab = 6;
$obj=new App\Classes\LicenseTransportClass();

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
	<title><?php echo PROJECT_NAME; ?> - Add Licence & transport</title>
	<?php include_once('common-head.php'); ?>

</head>
<body>
	<?php include_once('header.php'); ?>
	<div class="title-row">
		<a href="<?php echo BASEURL; ?>/license_transport.php" class="button fancy title-btn primary">Manage Licence & transport</a>
		<h1 class="title">Add New Licence & transport</h1>
	</div>

	<form action="" method="post" name="add_page_form" id="add_page_form">
		<fieldset>
			<legend>Add Licence & transport</legend>
			
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