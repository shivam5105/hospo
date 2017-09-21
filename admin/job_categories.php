<?php
include_once("dbconfig.php");
loginCheck();
$HighLightedTab =6;
$catobj=new App\Classes\CategoryClass();

if(isset($_GET['mode']) && $_GET['mode'] == 'delete' && isset($_GET['id']) && (int)$_GET['id'] > 0){
	$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT) ? filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT) : 0;
	
	if($catobj->delete($id))
	{
				flash('msg', 'Category deleted successfully.', 'success', '?');

	}
	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo PROJECT_NAME; ?> - Manage Job Categories</title>
	<?php include_once('common-head.php'); ?>
</head>
<body>
	<?php include_once('header.php'); ?>
	<div class="title-row">
			<a href="<?php echo BASEURL; ?>/job_categories.php" class="button fancy title-btn primary">Manage Categories</a>
		<a href="<?php echo BASEURL; ?>/add_category.php" class="button fancy title-btn primary">Add Category</a>
		<h1 class="title">Manage Job Categories</h1>
	</div>
	<div class="row fiterouter">
		<div class="col-4"></div>
			<div class="col-6">

			</div>
	</div>
	<?php
    $categories=$catobj->get();
		if(count($categories->data)){

		       $categories->pagination->render();
			}
		?>	
		<table class="dtable">
			<thead>
				<tr>
					<th width="20">S.No</th>
					<th>Name</th>
					<th>Description</th>
                   <th>Status</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
			<?php 
			if(count($categories->data)){
				$i=1;
				foreach($categories->data as $cat){
			?>
			<tr>
						<td><?php echo  $i; ?></td>
						<td><?php echo  $cat->name;?></td>
					<td><?php echo  $cat->description;?></td>
						<td align="center"><?php if($cat->status){  echo '<span class="label label-success">Active</span>'; }else{  echo '<span class="label label-danger">In-Active</span>';} ?></td>

						<td>

	
							<a title="Edit" href="<?php echo BASEURL; ?>/edit_category.php?id=<?php echo $cat->id; ?>" class="edit">Edit</a>
							<a title="Delete" class="delete" href="javascript:confirmDelete('?mode=delete&id=<?php echo $cat->id; ?>')">Delete</a>
						</td>
					</tr>
				<?php $i++; }  }?>
			</tbody>
		</table>
		<?php
			if(count($categories->data)){

		       $categories->pagination->render();
			}

	?>
	<?php include_once('footer.php'); ?>
</body>
</html>

