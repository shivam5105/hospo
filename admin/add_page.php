<?php
include_once("dbconfig.php");
loginCheck();
$HighLightedTab = 3;

if(isset($_POST) && isset($_POST['submitted']) && $_POST['submitted'] == 1)
{
	$_POST 			= trim_data($_POST);
	$ErrorMessage 	= array();

	if(trim($_POST['title']) == "")
	{
		$ErrorMessage['error'][] = "Please enter 'Title'.";
	}
	if(trim($_POST['description']) == "")
	{
		$ErrorMessage['error'][] = "Please enter 'Description'.";
	}
	if(count($ErrorMessage) < 1)
	{
		$time 	= time();
		$title 	= $_POST['title'];
		$slug 	= createSlug($title);

		$title 			= $mysqli->real_escape_string($title);
		$description 	= $mysqli->real_escape_string($_POST['description']);

		$sql = "INSERT INTO pages SET
		title = '".$title."',
		slug = '".$slug."',
		description = '".$description."',
		status = '".$_POST['status']."',
		template = '".$_POST['template']."',
		createdon = '".$time."',
		updatedon = '".$time."'";
		$query = $mysqli->query($sql);
		
		if($query)
		{
			$ErrorMessage['success'][] = "Page added successfully!";
			$_POST = false;
		}
		else
		{
			$ErrorMessage['error'][] = "Oops! something went wrong. Please try again.";
			$ErrorMessage['error'][] = $mysqli->error;
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo PROJECT_NAME; ?> - Add New Page</title>
	<?php include_once('common-head.php'); ?>
	<script type="text/javascript">
		$(document).ready(function(){
			$(document).on('submit', "#add_page_form", function(){
				var error 		= "";
				var title 		= $.trim($("#title").val());
				var description = $.trim($("#description").val());

				if(title == "" || title == null)
				{
					error += "Please enter 'Title'.\n";
				}
				if(description == "" || description == null)
				{
					//error += "Please enter 'Description'.\n";
				}

				if(error != '')
				{
					alert(error);
					return false;
				}
				return true;
			});
		});
	</script>
</head>
<body>
	<?php include_once('header.php'); ?>
	<div class="title-row">
		<a href="<?php echo BASEURL; ?>/manage_pages.php" class="button fancy title-btn primary">Manage Pages</a>
		<h1 class="title">Add New Page</h1>
	</div>

	<form action="" method="post" name="add_page_form" id="add_page_form">
		<input type="hidden" name="submitted" id="submitted" value="1" />
		<fieldset>
			<legend>Add Page</legend>
			
			<div class="row">
				<div class="col-8">
					<?php field_start("Title","title"); ?>
						<input type="text" name="title" id="title" value="<?php echo htmlize(@$_POST['title']); ?>"  />
					<?php field_end(); ?>

					<?php field_start("Description","description"); ?>
						<?php
						if(empty($_POST["description"]))
						{
							$_POST["description"] = "";
						}
						$Editor = new FCKeditor("description") ;
						$Editor->Width		= '99%' ;
						$Editor->Height		= '200' ;
						$Editor->ToolbarSet = "Default";
						$Editor->Value		= html_entity_decode($_POST["description"]) ;
						$Editor->Create() ;
						?>
					<?php field_end(); ?>
				</div>
				<div class="col-4">
					<div class="sidebar-wrapper">
						<?php field_start("Status","active"); ?>
							<input type="radio" name="status" id="active" value="1" <?php if(@$_POST['status'] != "0"){ echo "checked='checked'"; } ?> />
							<label for="active">Active</label>
							<input type="radio" name="status" id="inactive" value="0" <?php if(@$_POST['status'] == "0"){ echo "checked='checked'"; } ?> />
							<label for="inactive">In-Active</label>
						<?php field_end(); ?>

						<?php field_start("Template","template"); ?>
							<select name="template" id="template">
								<option value="">Default Template</option>
								<?php
								$valid_files = get_template_files(BASEPATH.'/../');
								foreach ($valid_files as $key => $files)
								{
									$file_name = $files['file_name'];
									$template = $files['Template'];
									$selected = "";
									if(@$_POST['template'] == $file_name)
									{
										$selected = "selected='selected'";
									}
									?>
									<option value="<?php echo $file_name; ?>" <?php echo $selected; ?>><?php echo $template; ?></option>
									<?php
								}
								?>
							</select>
						<?php field_end(); ?>

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