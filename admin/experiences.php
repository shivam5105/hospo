<?php
include_once("dbconfig.php");
loginCheck();
$HighLightedTab =12;
$obj=new App\Classes\TotalExperienceClass();
if(isset($_GET['mode']) && $_GET['mode'] == 'delete' && isset($_GET['id']) && (int)$_GET['id'] > 0){
	$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT) ? filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT) : 0;

	if($catobj->delete($id))
	{
				flash('msg', 'Experience deleted successfully.', 'success', 'experiences.php');

	}

}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo PROJECT_NAME; ?> - Manage Experiences</title>
	<?php include_once('common-head.php'); ?>
</head>
<body>
	<?php include_once('header.php'); ?>
	<div class="title-row">
			<a href="<?php echo BASEURL; ?>/experiences.php" class="button fancy title-btn primary">Manage Experiences</a>
			<a href="<?php echo BASEURL; ?>/add_experience.php" class="button fancy title-btn primary">Add Experience</a>

		<h1 class="title">Manage Experiences</h1>
	</div>
	<div class="row fiterouter">
		<div class="col-4"></div>
			<div class="col-6">

			</div>
	</div>
	<?php
    $exp=$obj->get();
		if(count($exp->data)){

		       $exp->pagination->render();
			}
		?>
		<table class="dtable">
			<thead>
				<tr>
					<th width="20">S.No</th>
					<th>Title</th>

					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
			<?php
			if(count($exp->data)){
				$i=1;
				foreach($exp->data as $data){
			?>
			<tr>
						<td><?php echo  $i; ?></td>
						<td><?php echo  $data->title.' '.$data->type;?></td>



						<td>


							<a title="Edit" href="<?php echo BASEURL; ?>/edit_experience.php?id=<?php echo $data->id; ?>" class="edit">Edit</a>
							<a title="Delete" class="delete" href="javascript:confirmDelete('?mode=delete&id=<?php echo $data->id; ?>')">Delete</a>

						</td>
					</tr>
				<?php $i++; }  }?>
			</tbody>
		</table>
		<?php
			if(count($exp->data)){

		       $exp->pagination->render();
			}

	?>
	<?php include_once('footer.php'); ?>
</body>
</html>

