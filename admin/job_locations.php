<?php
include_once("dbconfig.php");
loginCheck();
$HighLightedTab =13;
$obj=new App\Classes\JobLocationsClass();

if(isset($_GET['mode']) && $_GET['mode'] == 'delete' && isset($_GET['id']) && (int)$_GET['id'] > 0){
	$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT) ? filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT) : 0;

	if($obj->delete($id))
	{
				flash('msg', 'Job Location deleted successfully.', 'success', 'job_locations.php');

	}

}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo PROJECT_NAME; ?> - Manage Job Locations</title>
	<?php include_once('common-head.php'); ?>
</head>
<body>
	<?php include_once('header.php'); ?>
	<div class="title-row">
			<a href="<?php echo BASEURL; ?>/job_locations.php" class="button fancy title-btn primary">Manage Locations</a>
		<a href="<?php echo BASEURL; ?>/add_job_location.php" class="button fancy title-btn primary">Add Location</a>
		<h1 class="title">Manage Job Locations</h1>
	</div>
	<div class="row fiterouter">
		<div class="col-4"></div>
			<div class="col-6">

			</div>
	</div>
	<?php
    $joblocation=$obj->getmainCat();
		if(count($joblocation->data)){

		       $joblocation->pagination->render();
			}
		?>
		<table class="dtable">
			<thead>
				<tr>
					<th width="20">S.No</th>
					<th>Locations</th>
					<th>Sub-Locations</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
			<?php
			if(count($joblocation->data)){
				$i=1;
				foreach($joblocation->data as $data){
			?>
			<tr>
						<td><?php echo  $i; ?></td>
						<td><?php echo  $data->name;?></td>
						<td>

						 <?php $i=1; foreach ($data->subLocation as $sub){ ?>
						 <div>
				<span >
				        <?php echo  $i.'. ' . $sub->name;?>
						</span>
						<span >
					  <a class="edit" href="<?php echo BASEURL; ?>/edit_job_location.php?id=<?php echo $sub->id; ?>&parent_id=<?php echo $data->id; ?>">Edit</a>
					  <a class="delete" href="javascript:confirmDelete('?mode=delete&id=<?php echo $sub->id; ?>')">Delete</a>
					  </span>
					  </div>
					  <?php $i++;}	?>





				  </td>

						<td>

						<a class="btn btn-default" href="<?php echo BASEURL; ?>/add_job_location.php?parent_id=<?php echo $data->id; ?>">Add Sub location</a>
							<a title="Edit" href="<?php echo BASEURL; ?>/edit_job_location.php?id=<?php echo $data->id; ?>" class="edit">Edit</a>
							<a title="Delete" class="delete" href="javascript:confirmDelete('?mode=delete&id=<?php echo $data->id; ?>')">Delete</a>
						</td>
					</tr>
				<?php $i++; }  }?>
			</tbody>
		</table>
		<?php
			if(count($joblocation->data)){

		       $joblocation->pagination->render();
			}

	?>
	<?php include_once('footer.php'); ?>
</body>
</html>

