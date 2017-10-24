<?php
include_once("dbconfig.php");
loginCheck();
$HighLightedTab =15;
if(isset($_POST['submit']) && $_POST['submit']=='Save'){
$obj=new App\Classes\TemplateToolboxClass();
	  $obj->store(trim_data($_POST),$_FILES);

}


$obj=new App\Classes\TemplateToolboxCategoryClass();
$cats=$obj->lists();
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo PROJECT_NAME; ?> - Add Template Toolbox </title>
	<?php include_once('common-head.php'); ?>

</head>
<body>
	<?php include_once('header.php'); ?>
	<div class="title-row">
		<a href="<?php echo BASEURL; ?>/template_toolbox.php" class="button fancy title-btn primary">Manage Template Toolbox </a>
		<h1 class="title">Add New Template Toolbox </h1>
	</div>

	<form action="" method="post" name="add_page_form" id="add_page_form" enctype="multipart/form-data">
		<input type="hidden" name="submitted" id="submitted" value="1" />
		<fieldset>
			<legend>Add Template Toolbox </legend>
			
			<div class="row">
				<div class="col-8">
					<?php field_start("Title","name"); ?>
						<input type="text" name="title" id="title" required value="<?php echo htmlize(@$_POST['title']); ?>"  />
					<?php field_end(); ?>

					<?php field_start("Description","description"); ?>
						<?php
						if(empty($_POST["description"]))
						{
							$_POST["description"] = "";
						}
						?>
						<textarea  name="description" required> <?php echo htmlize(@$_POST['description']); ?></textarea>
					<?php field_end(); ?>
					
						<?php field_start("Category","title"); ?>
								<select  name="category_id"  required>
                                 <option value="">--Select--</option>
								 <?php foreach($cats as $obj){ ?>
								        <option value="<?=$obj->id;?>"  ><?=$obj->name;?></option>

								 <?php } ?>
                             </select>
						<?php field_end(); ?>
						<?php field_start("File","title"); ?>
                           <div class="uplod-img">
						
	                              <input type="file" class="custom-upld" required name="file_url"  >
	                       </div>

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