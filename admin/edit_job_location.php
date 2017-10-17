<?php
include_once("dbconfig.php");
loginCheck();
$HighLightedTab = 11;
$obj=new App\Classes\JobLocationsClass();

if(isset($_GET['id']) && (int)$_GET['id'] > 0){
	   $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT) ? filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT) : 0;
	$currentobj=$obj->edit($id);
	 
if(isset($_POST['submit']) && $_POST['submit']=='Update'){
	$obj->update($currentobj,trim_data($_POST));

}   
$cattype='';
if(isset($_GET['parent_id']) && !empty($_GET['parent_id'])){
	$cattype='Sub';

}	   
}

?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo PROJECT_NAME; ?> - Edit  Job <?php echo $cattype;?> Location</title>
	<?php include_once('common-head.php'); ?>

</head>
<body>
	<?php include_once('header.php'); ?>
	<div class="title-row">
		<a href="<?php echo BASEURL; ?>/job_locations.php" class="button fancy title-btn primary">Manage Job Locations</a>
		<h1 class="title">Edit Job <?php echo $cattype;?> Location</h1>
	</div>

	<form action="" method="post" name="add_page_form" id="add_page_form">
		<input type="hidden" name="submitted" id="submitted" value="1" />
		<fieldset>
			<legend>Edit Job <?php echo $cattype;?> Location</legend>
			
			<div class="row">
				<div class="col-8">
					<?php
					if(isset($_GET['parent_id']) && !empty($_GET['parent_id'])){
		           $locations=$obj->getParentcats();

					
					field_start("Location","title"); ?>
								<select  name="parent"  required>
                                 <option selected disabled hidden>select..</option>
								 <?php foreach($locations as $obj){ ?>
								        <option <?php if($obj->id==$_GET['parent_id']){echo 'selected';} ?> value="<?=$obj->id;?>"  ><?=$obj->name;?></option>

								 <?php } ?>
                             </select>
						<?php field_end();
							
							
							}
							?>
					<?php field_start($cattype. " Location Name","name"); ?>
						<input type="text" name="name" id="name" required value="<?php echo $currentobj->name; ?>"  />
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