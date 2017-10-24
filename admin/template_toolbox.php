<?php
include_once("dbconfig.php");
loginCheck();
$HighLightedTab =15;
$obj=new App\Classes\TemplateToolboxClass();

if(isset($_GET['mode']) && $_GET['mode'] == 'delete' && isset($_GET['id']) && (int)$_GET['id'] > 0){
	$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT) ? filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT) : 0;
	
	if($obj->delete($id))
	{
				flash('msg', 'Template toolbox  deleted successfully.', 'success', 'template_toolbox.php');

	}
	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo PROJECT_NAME; ?> - Manage Template Toolbox </title>
	<?php include_once('common-head.php'); ?>
</head>
<body>
	<?php include_once('header.php'); ?>
	<div class="title-row">
			<a href="<?php echo BASEURL; ?>/template_toolbox.php" class="button fancy title-btn primary">Manage Template Toolbox </a>
		<a href="<?php echo BASEURL; ?>/add_template_toolbox.php" class="button fancy title-btn primary">Add Template Toolbox </a>
		<h1 class="title">Manage Template Toolbox </h1>
	</div>
	<div class="row fiterouter">
		<div class="col-4"></div>
			<div class="col-6">

			</div>
	</div>
	<?php
    $obj=$obj->get();
		if(count($obj->data)){

		       $obj->pagination->render();
			}
		?>	
		<table class="dtable">
			<thead>
				<tr>
					<th width="20">S.No</th>
					<th>Title</th>
					<th>Description</th>
					<th>Category</th>
					<th>File Link</th>
				
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
			<?php 
			if(count($obj->data)){
				$i=1;
				foreach($obj->data as $val){
			?>
			<tr>
						<td><?php echo  $i; ?></td>
						<td><?php echo  $val->title;?></td>
						<td><?php echo  $val->description;?></td>
						<td><?php echo  $val->templatetoolcat->name;?></td>
											<td><a href="<?php echo SITEBASEURL.'/uploads/templatetoolboxes/'.$val->file_url; ?>" target="_blank">View</a></td>


						<td>

	
							<a title="Edit" href="<?php echo BASEURL; ?>/edit_template_toolbox.php?id=<?php echo $val->id; ?>" class="edit">Edit</a>
							<a title="Delete" class="delete" href="javascript:confirmDelete('?mode=delete&id=<?php echo $val->id; ?>')">Delete</a>
						</td>
					</tr>
				<?php $i++; }  }?>
			</tbody>
		</table>
		<?php
			if(count($obj->data)){

		       $obj->pagination->render();
			}

	?>
	<?php include_once('footer.php'); ?>
</body>
</html>

