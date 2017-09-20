<?php
include_once("dbconfig.php");
loginCheck();
$HighLightedTab = 4;

if(isset($_POST) && isset($_POST['submitted']) && $_POST['submitted'] == 1)
{
	$_POST 			= trim_data($_POST);
	$ErrorMessage 	= array();

	/*if(trim($_POST['title']) == "")
	{
		$ErrorMessage['error'][] = "Please enter 'Title'.";
	}*/
	if(count($ErrorMessage) < 1)
	{
		$time 			= time();
		$title 			= $_POST['title'];
		$title 			= $mysqli->real_escape_string($title);
		$bg_image_str 	= "";

		if(isset($_FILES) && isset($_FILES['background_image']) && !empty($_FILES['background_image']['name']))
		{
			$bg_image_id 	= upload_media($_FILES['background_image']);
			$bg_image_str 	= "background_image_id = '".$bg_image_id."',";
		}

		$sql = "UPDATE home_page SET
		title = '".$title."',
		$bg_image_str
		updatedon = '".$time."'";

		$query = $mysqli->query($sql);

		for($i = 1; $i <= 6; $i++)
		{
			$heading 		= $mysqli->real_escape_string($_POST['heading'.$i]);
			$sub_heading 	= $mysqli->real_escape_string($_POST['sub_heading'.$i]);
			$price 			= $mysqli->real_escape_string($_POST['price'.$i]);
			$description 	= $mysqli->real_escape_string($_POST['description'.$i]);
			$button_text 	= $mysqli->real_escape_string($_POST['button_text'.$i]);
			$button_link 	= $mysqli->real_escape_string($_POST['button_link'.$i]);
			$button_target 	= isset($_POST['button_target'.$i]) ? $_POST['button_target'.$i] : 0;

			$check_query 	= $mysqli->query("SELECT * FROM tab_details WHERE content_type = 'Home Tab ".$i."'");
			if($check_query->num_rows > 0)
			{
				$sql = "UPDATE tab_details SET
				heading = '".$heading."',
				sub_heading = '".$sub_heading."',
				price = '".$price."',
				description = '".$description."',
				button_text = '".$button_text."',
				button_link = '".$button_link."',
				button_target = '".$button_target."',
				updatedon = '".$time."'
				WHERE content_type = 'Home Tab ".$i."'";
			}
			else
			{
				$sql = "INSERT INTO tab_details SET
				content_type = 'Home Tab ".$i."',
				heading = '".$heading."',
				sub_heading = '".$sub_heading."',
				price = '".$price."',
				description = '".$description."',
				button_text = '".$button_text."',
				button_link = '".$button_link."',
				updatedon = '".$time."',
				createdon = '".$time."'";
			}
			$query = $mysqli->query($sql);
		}
		
		if($query)
		{
			$ErrorMessage['success'][] = "Home page updated successfully!";
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo PROJECT_NAME; ?> - Home Page</title>
	<?php include_once('common-head.php'); ?>
	<script type="text/javascript">
		$(document).ready(function(){
			$(document).on("click", ".reset-home-bg-image", function(){
				if(confirm("Are you sure?"))
				{
					var Data = "&mode=ResetHomeBgImage";
					$.ajax({
						type: "POST",
						url: "dbbyajax.php",
						cache: false,
						data: Data,
						success: function(response){
							$(".home_curr_bg_image").hide();
						}
					});
				}
			});
		});
	</script>
</head>
<body>
	<?php include_once('header.php'); ?>
	<div class="title-row">
		<a href="<?php echo BASEURL; ?>/manage_pages.php" class="button fancy title-btn primary">Manage Pages</a>
		<a href="<?php echo BASEURL; ?>/add_page.php" class="button fancy title-btn primary">Add Page</a>
		<h1 class="title">Home Page</h1>
	</div>
	<?php
	$home_query = $mysqli->query("SELECT * FROM home_page");
	$home_row	= $home_query->fetch_array();
	?>
	<form action="" method="post" name="add_home_page_form" id="add_home_page_form" enctype="multipart/form-data">
		<input type="hidden" name="submitted" id="submitted" value="1" />
		<fieldset>
			<legend>Home Page</legend>
			<div class="row">
				<div class="col-12">
					<?php field_start("Title","title"); ?>
						<input type="text" name="title" id="title" value="<?php echo htmlize(@$home_row['title']); ?>"  />
					<?php field_end(); ?>
					<?php
					$x = 0;
					$cols = 3;
					for($i = 1; $i <= 6; $i++)
					{
						$tab_query = $mysqli->query("SELECT * FROM tab_details WHERE content_type = 'Home Tab ".$i."'");

						if($tab_query->num_rows > 0)
						{
							$tab_row = $tab_query->fetch_array();

							$_POST['heading'.$i] 		= $tab_row['heading'];
							$_POST['sub_heading'.$i]	= $tab_row['sub_heading'];
							$_POST['price'.$i]			= $tab_row['price'];
							$_POST['description'.$i]	= $tab_row['description'];
							$_POST['button_text'.$i]	= $tab_row['button_text'];
							$_POST['button_link'.$i]	= $tab_row['button_link'];
							$_POST['button_target'.$i]	= $tab_row['button_target'];
						}
						if($x == 0)
						{
							?>
							<div class="row">
							<?php
						}
						?>
						<div class="col-4">
							<div class="tab-groups">
								<fieldset>
									<legend>Tab <?php echo $i; ?></legend>
									<?php field_start("Heading","heading"); ?>
										<input type="text" name="heading<?php echo $i; ?>" id="heading<?php echo $i; ?>" value="<?php echo htmlize(@$_POST['heading'.$i]); ?>"  />
									<?php field_end(); ?>
									<?php field_start("Sub-Heading","sub_heading".$i); ?>
										<input type="text" name="sub_heading<?php echo $i; ?>" id="sub_heading<?php echo $i; ?>" value="<?php echo htmlize(@$_POST['sub_heading'.$i]); ?>"  />
									<?php field_end(); ?>
									<?php field_start("Price","price".$i); ?>
										<input type="text" name="price<?php echo $i; ?>" id="price<?php echo $i; ?>" value="<?php echo htmlize(@$_POST['price'.$i]); ?>"  />
									<?php field_end(); ?>
									<?php field_start("Description","description".$i); ?>
										<textarea row="3" name="description<?php echo $i; ?>" id="description<?php echo $i; ?>"><?php echo htmlize(@$_POST['description'.$i]); ?></textarea>	
									<?php field_end(); ?>
									<?php field_start("Button Text","button_text".$i); ?>
										<input type="text" name="button_text<?php echo $i; ?>" id="button_text<?php echo $i; ?>" value="<?php echo htmlize(@$_POST['button_text'.$i]); ?>"  />
									<?php field_end(); ?>
									<?php field_start("Button Link","button_link".$i); ?>
										<input type="text" name="button_link<?php echo $i; ?>" id="button_link<?php echo $i; ?>" value="<?php echo htmlize(@$_POST['button_link'.$i]); ?>"  />
									<?php field_end(); ?>
									<?php field_start("Open link in a new tab","button_target".$i); ?>
										<input type="checkbox" name="button_target<?php echo $i; ?>" id="button_target<?php echo $i; ?>" value="1" <?php if(@$_POST['button_target'.$i]){ echo "checked='checked'"; } ?> />
									<?php field_end(); ?>
								</fieldset>
							</div>
						</div>
						<?php
						$x++;
						if($cols == $x)
						{
							$x = 0;
							?>
							</div>
							<?php
						}
					}
					if($x > 0)
					{
						?>
						</div>
						<?php
					}
					?>
					<?php field_start("Background Image","background_image"); ?>
						<input type="file" name="background_image" id="background_image" />
					<?php field_end(); ?>
					<?php
					if($home_row['background_image_id'] > 0)
					{
						$image_query = $mysqli->query("SELECT * FROM media WHERE id='".$home_row['background_image_id']."'");
						if($image_query->num_rows > 0)
						{
							$img_row 	= $image_query->fetch_array();
							$file_name 	= $img_row['file_name'];
							$createdon 	= $img_row['createdon'];
							$folder 	= date("Y/m/d/", $createdon);
							?>
							<div class="home_curr_bg_image">
								<?php field_start("Current Background Image"); ?>
									<div>
										<img src="<?php echo "../uploads/org/".$folder.$file_name; ?>" alt="" />
									</div>
									<a href="javascript:void(0);" class="reset-home-bg-image red">Reset Background Image</a>
								<?php field_end(); ?>
							</div>
							<?php
						}
						else
						{
							$mysqli->query("UPDATE home_page SET background_image_id = '0'");
						}
					}
					?>
					<?php field_start(); ?>
						<?php submit_button("Update"); ?>
					<?php field_end(); ?>
				</div>
			</div>
		</fieldset>
	</form>

	<?php include_once('footer.php'); ?>
</body>
</html>