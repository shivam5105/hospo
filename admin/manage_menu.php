<?php
include_once("dbconfig.php");
loginCheck();
$HighLightedTab = 5;

if(isset($_POST) && isset($_POST['submitted']) && $_POST['submitted'] == 1)
{
	$_POST 			= trim_data($_POST);
	$ErrorMessage 	= array();

	if(count($ErrorMessage) < 1)
	{
		$menu_location = $_POST['menu_location'];
		
		$mysqli->query("DELETE FROM menus WHERE menu_location = '".$menu_location."'");

		$order_by = 0;
		if(isset($_POST['menu']) && is_array($_POST['menu']) && count($_POST['menu']) > 0)
		{
			$menu_heading	= $mysqli->real_escape_string($_POST['menu_heading']);
			foreach ($_POST['menu'] as $key => $menu_detail)
			{
				$menu_type 		= $mysqli->real_escape_string($menu_detail['menu-type']);
				$menu_name 		= $mysqli->real_escape_string($menu_detail['menu-name']);
				$menu_classes 	= $mysqli->real_escape_string($menu_detail['menu-classes']);
				$menu_target 	= isset($menu_detail['menu-target']) ? $menu_detail['menu-target'] : 0;
				$menu_url 		= "";
				$menu_page_id	= "";
				$menu_table_name= "";

				if($menu_type == "Custom Link")
				{
					$menu_url = $menu_detail['menu-url'];
				}
				else
				{
					$menu_table_name = "pages";
					$menu_page_id 	 = $menu_detail['menu-page-id'];

					$query = $mysqli->query("SELECT * FROM $menu_table_name WHERE id='".$menu_page_id."'");
					
					if($query->num_rows > 0)
					{
						$row   = $query->fetch_array();
						$title = trim($row['title']);
					}
					else
					{
						continue;
					}
					if($title == $menu_name)
					{
						/* If both are same then that meaning user did not change menu name. So it always fetch from the pages table. */
						$menu_name = "";
					}
				}
				$query = $mysqli->query("INSERT INTO menus SET
					menu_location = '".$menu_location."',
					menu_heading = '".$menu_heading."',
					menu_type = '".$menu_type."',
					menu_name = '".$menu_name."',
					menu_classes = '".$menu_classes."',
					menu_target = '".$menu_target."',
					menu_url = '".$menu_url."',
					menu_page_id = '".$menu_page_id."',
					menu_table_name = '".$menu_table_name."',
					order_by = '".$order_by."'");

				$order_by++;
			}
		}
		$_POST = false;
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo PROJECT_NAME; ?> - Manage Menus</title>
	<?php include_once('common-head.php'); ?>
	<script type="text/javascript">
		$(document).ready(function(){
			$(document).on("click",".submit-add-to-menu", function(){
				var new_menu_item_html 	= "";
				var menu_type 			= $.trim($(this).attr('data-menu-type'));
				/*var parent_li_len 		= $(".parent-menu-items-list-wrapper li").length;*/
				var parent_li_len 		= $("#tatal_parent_li").val();

				if(menu_type == 'Custom Link')
				{
					var $url 	= $("#custom-menu-item-url");
					var $name 	= $("#custom-menu-item-name");
					var url 	= $.trim($url.val());
					var name 	= $.trim($name.val());

					if(url != "" && url != null && url != "http://" && name != "" && name != null)
					{
						new_menu_item_html	+= 	'<li class="accordion-section">'+
													'<div class="section-title">'+
														'<span class="item-title">'+name+'</span>'+
														'<span class="item-type">'+menu_type+'</span>'+
														'<span class="ionicons"></span>'+
													'</div>'+
													'<div class="accordion-section-content">'+
														'<input type="hidden" name="menu['+parent_li_len+'][menu-type]" value="'+menu_type+'" />'+
														'<div class="field">'+
														    '<label>Url</label>'+
														    '<div class="field-element">'+
																'<input type="text" name="menu['+parent_li_len+'][menu-url]" value="'+url+'" />'+
															'</div>'+
														'</div>'+
														'<div class="field">'+
														    '<label>Navigation Label</label>'+
														    '<div class="field-element">'+
																'<input type="text" name="menu['+parent_li_len+'][menu-name]" value="'+name+'" />'+
															'</div>'+
														'</div>'+
														'<div class="field">'+
														    '<label>'+
																'<input type="checkbox" name="menu['+parent_li_len+'][menu-target]" value="1" />Open link in a new tab'+
															'</label>'+
														'</div>'+
														'<div class="field">'+
														    '<label>CSS Classes (optional)</label>'+
														    '<div class="field-element">'+
																'<input type="text" name="menu['+parent_li_len+'][menu-classes]" value="" />'+
															'</div>'+
														'</div>'+
														'<div class="field">'+
														    '<a href="javascript:void(0);" class="remove-menu-item">Remove</a>'+
														'</div>'+
													'</div>'+
												'</li>';
						$url.val('http://');
						$name.val('');
						parent_li_len++;
						$("#tatal_parent_li").val(parent_li_len);
					}
					else
					{
						if((url == "" || url == null || url == "http://") && name != "" && name != null)
						{
							alert("Url can not be left blank.");
						}
						else if((url == "" || url == null || url == "http://") && (name == "" || name == null))
						{
							alert("Url & Link text can not be left blank.");
						}
						else
						{
							alert("Link text can not be left blank.");
						}
					}
				}
				else
				{
					var $container = $(this).closest(".accordion-section-content");
					
					$container.find("[type='checkbox']:checked").each(function(){
						var name 	= $.trim($(this).attr("data-menu-item-name"));
						var id 		= $.trim($(this).val());

						new_menu_item_html	+= 	'<li class="accordion-section">'+
													'<div class="section-title">'+
														'<span class="item-title">'+name+'</span>'+
														'<span class="item-type">'+menu_type+'</span>'+
														'<span class="ionicons"></span>'+
													'</div>'+
													'<div class="accordion-section-content">'+
														'<input type="hidden" name="menu['+parent_li_len+'][menu-type]" value="'+menu_type+'" />'+
														'<input type="hidden" name="menu['+parent_li_len+'][menu-page-id]" value="'+id+'" />'+
														'<div class="field">'+
														    '<label>Navigation Label</label>'+
														    '<div class="field-element">'+
																'<input type="text" name="menu['+parent_li_len+'][menu-name]" value="'+name+'" />'+
															'</div>'+
														'</div>'+
														'<div class="field">'+
														    '<label>'+
																'<input type="checkbox" name="menu['+parent_li_len+'][menu-target]" value="1" />Open link in a new tab'+
															'</label>'+
														'</div>'+
														'<div class="field">'+
														    '<label>CSS Classes (optional)</label>'+
														    '<div class="field-element">'+
																'<input type="text" name="menu['+parent_li_len+'][menu-classes]" value="" />'+
															'</div>'+
														'</div>'+
														'<div class="field">'+
														    '<a href="javascript:void(0);" class="remove-menu-item">Remove</a>'+
														'</div>'+
													'</div>'+
												'</li>';
						$(this).attr("checked", false);
						parent_li_len++;
						$("#tatal_parent_li").val(parent_li_len);
					});
				}
				if(new_menu_item_html != "")
				{
					$(".parent-menu-items-list-wrapper").append(new_menu_item_html);
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
		<h1 class="title">Manage Menus</h1>
	</div>		
	<div class="row">
		<div class="col-3"></div>
		<div class="col-6">
			<form action="" method="get" class="no-border">
				<lable for="menu">Select a menu to edit</label>
				<?
				$selected_menu_location = "";
				?>
				<select name="menu" id="menu" style="width:50%">
					<?php
					$loop = 0;
					foreach ($menu_locations as $menu_key => $menu_location)
					{
						$selected = "";
						
						if(isset($_GET) && isset($_GET['menu']) && $menu_key == trim($_GET['menu']))
						{
							$selected = "selected='selected'";
						}
						if($loop == 0 || $selected != "")
						{
							$selected_menu_location = $menu_key;
						}
						?>
						<option value="<?php echo $menu_key; ?>" <?php echo $selected; ?>><?php echo $menu_location; ?></option>
						<?php
						$loop++;
					}
					?>
				</select>
				<input type="submit" value="Select" />
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-4">
			<ul class="menu-settings-list">
				<li class="accordion-section">
					<div class="section-title">
						Custom Links
						<span class="ionicons"></span>
					</div>
					<div class="accordion-section-content">
						<?php field_start("URL","custom-menu-item-url"); ?>
							<input id="custom-menu-item-url" name="custom-menu-item-url" type="text" value="http://">
						<?php field_end(); ?>

						<?php field_start("Link Text","custom-menu-item-name"); ?>
							<input id="custom-menu-item-name" name="custom-menu-item-name" type="text">
						<?php field_end(); ?>

						<?php field_start(); ?>
							<input type="submit" data-menu-type="Custom Link" class="button submit-add-to-menu right" value="Add to Menu" name="add-custom-menu-item">
						<?php field_end(); ?>
					</div>
				</li>
				<li class="accordion-section closed">
					<div class="section-title">
						Pages
						<span class="ionicons"></span>
					</div>
					<div class="accordion-section-content">
						<?php
						$query = $mysqli->query("SELECT * FROM pages WHERE status='1' ORDER BY title ASC");
						if($num = $query->num_rows)
						{
							while($row = $query->fetch_array())
							{
								$ID = $row['id'];
								$Name = $row['title'];
								?>
								<div style="padding:5px;">
									<input data-menu-item-name="<?php echo $Name; ?>" id="page-<?php echo $ID; ?>" name="page[]" type="checkbox" value="<?php echo $ID; ?>"><label for="page-<?php echo $ID; ?>"><?php echo $Name; ?></label>
								</div>
								<?php
							}
						}
						?>
						<?php field_start(); ?>
							<input type="submit" data-menu-type="Pages" class="button submit-add-to-menu right" value="Add to Menu" name="add-page-menu-item">
						<?php field_end(); ?>
					</div>
				</li>
			</ul>
		</div>
		<div class="col-8">
			<?php
			$query = $mysqli->query("SELECT * FROM menus WHERE menu_location = '".$selected_menu_location."' ORDER BY order_by ASC LIMIT 1");
			$row = $query->fetch_array();
			?>
			<form action="" method="post" name="menu_form" id="menu_form">
				<input type="hidden" name="submitted" id="submitted" value="1" />
				<input type="hidden" name="menu_location" id="menu_location" value="<?php echo $selected_menu_location; ?>" />
				<fieldset>
					<legend>Menu Structure</legend>

					<?php field_start("Menu Heading","menu_heading"); ?>
						<input id="menu_heading" name="menu_heading" type="text" value="<?php echo @$row['menu_heading']; ?>" />
					<?php field_end(); ?>

					<div class="menu-items-wrapper">
						<ul class="parent-menu-items-list-wrapper">
							<?php
							$loop = 0;
							$tatal_parent_li = $loop;
							$query = $mysqli->query("SELECT * FROM menus WHERE menu_location = '".$selected_menu_location."' ORDER BY order_by ASC");
							if($query->num_rows > 0)
							{
								while($row = $query->fetch_array())
								{
									$menu_type 		= $row['menu_type'];
									$menu_name 		= $row['menu_name'];
									$menu_classes 	= $row['menu_classes'];
									$menu_target 	= $row['menu_target'];
									$menu_url 		= $row['menu_url'];
									$menu_page_id 	= $row['menu_page_id'];
									$menu_table_name= $row['menu_table_name'];

									if($menu_table_name != "" && ($menu_name == "" || $menu_name == null))
									{
										$query2 = $mysqli->query("SELECT * FROM $menu_table_name WHERE id='".$menu_page_id."'");
					
										if($query2->num_rows > 0)
										{
											$row2   	= $query2->fetch_array();
											$menu_name 	= trim($row2['title']);
										}
									}
									?>
									<li class="accordion-section closed">
										<div class="section-title">
											<span class="item-title"><?php echo $menu_name; ?></span>
											<span class="item-type"><?php echo $menu_type; ?></span>
											<span class="ionicons"></span>
										</div>
										<div class="accordion-section-content">
											<input type="hidden" name="menu[<?php echo $loop; ?>][menu-type]" value="<?php echo $menu_type; ?>" />
											<?php
											if($menu_type != "Custom Link")
											{
												?>
												<input type="hidden" name="menu[<?php echo $loop; ?>][menu-page-id]" value="<?php echo $menu_page_id; ?>" />
												<?php
											}
											else
											{
												?>
												<div class="field">
												    <label>Url</label>
												    <div class="field-element">
														<input type="text" name="menu[<?php echo $loop; ?>][menu-url]" value="<?php echo $menu_url; ?>" />
													</div>
												</div>
												<?php
											}
											?>
											<div class="field">
											    <label>Navigation Label</label>
											    <div class="field-element">
													<input type="text" name="menu[<?php echo $loop; ?>][menu-name]" value="<?php echo $menu_name; ?>" />
												</div>
											</div>
											<div class="field">
											    <label>
													<input type="checkbox" name="menu[<?php echo $loop; ?>][menu-target]" value="1" <?php if($menu_target){ echo "checked='checked'"; } ?> />Open link in a new tab
												</label>
											</div>
											<div class="field">
											    <label>CSS Classes (optional)</label>
											    <div class="field-element">
													<input type="text" name="menu[<?php echo $loop; ?>][menu-classes]" value="<?php echo $menu_classes; ?>" />
												</div>
											</div>
											<div class="field">
											    <a href="javascript:void(0);" class="remove-menu-item">Remove</a>
											</div>
										</div>
									</li>
									<?php
									$loop++;
									$tatal_parent_li = $loop;
								}
							}
							?>
						</ul>
					</div>
					<?php field_start(); ?>
						<?php submit_button(); ?>
					<?php field_end(); ?>
				</fieldset>
			</form>
			<input type="hidden" name="tatal_parent_li" id="tatal_parent_li" value="<?php echo $tatal_parent_li; ?>" />
		</div>
	</div>
	<?php include_once('footer.php'); ?>
</body>
</html>