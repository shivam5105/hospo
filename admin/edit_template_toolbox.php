<?php
include_once("dbconfig.php");
loginCheck();
$HighLightedTab =14;
$obj=new App\Classes\TemplateToolboxClass();

if(isset($_GET['id']) && (int)$_GET['id'] > 0){
	   $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT) ? filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT) : 0;
	$current=$obj->edit($id);
	 
if(isset($_POST['submit']) && $_POST['submit']=='Update'){
	$obj->update($current,trim_data($_POST),$_FILES);

}   
	   
}
$obj=new App\Classes\TemplateToolboxCategoryClass();
$cats=$obj->lists();
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo PROJECT_NAME; ?> - Edit Template Toolbox </title>
	<?php include_once('common-head.php'); ?>

</head>
<body>
	<?php include_once('header.php'); ?>
	<div class="title-row">
		<a href="<?php echo BASEURL; ?>/license_transport.php" class="button fancy title-btn primary">Manage Template Toolbox </a>
		<h1 class="title">Edit New Template Toolbox </h1>
	</div>

	<form action="" method="post" name="add_page_form" id="add_page_form" enctype="multipart/form-data">
		<fieldset>
			<legend>Edit Template Toolbox </legend>
			
			<div class="row">
				<div class="col-8">
					<?php field_start("Title","title"); ?>
						<input type="text" name="title" id="title" required value="<?php echo $current->title; ?>"  />
					<?php field_end(); ?>

					<?php field_start("Description","description"); ?>
						<?php
						if(empty($_POST["description"]))
						{
							$_POST["description"] = "";
						}
						?>
						<textarea  name="description" required> <?php echo $current->description; ?></textarea>
					<?php field_end(); ?>
					
						<?php field_start("Category","title"); ?>
								<select  name="category_id"  required>
                                 <option value="">--Select--</option>
								 <?php foreach($cats as $obj){ ?>
								        <option <?php if($current->category_id==$obj->id){echo 'selected';}?> value="<?=$obj->id;?>"  ><?=$obj->name;?></option>

								 <?php } ?>
                             </select>
						<?php field_end(); ?>
						<?php field_start("File","title"); ?>
                           <div class="uplod-img">
							<a   href="<?php echo SITEBASEURL.'/uploads/templatetoolboxes/'.$current->file_url; ?>"  target="_blank" >View old file
	                              <input type="file" class="custom-upld" required name="file_url"  ></a>
	                       </div>

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