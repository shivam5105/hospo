<?php
include_once("dbconfig.php");
loginCheck();
$HighLightedTab =11;
$obj=new App\Classes\SpecialSkillsClass();

if(isset($_GET['mode']) && $_GET['mode'] == 'delete' && isset($_GET['id']) && (int)$_GET['id'] > 0){
	$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT) ? filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT) : 0;
	
	if($obj->delete($id))
	{
				flash('msg', 'Special Skills deleted successfully.', 'success', 'special_skills.php');

	}
	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo PROJECT_NAME; ?> - Manage Special Skills</title>
	<?php include_once('common-head.php'); ?>
</head>
<body>
	<?php include_once('header.php'); ?>
	<div class="title-row">
			<a href="<?php echo BASEURL; ?>/special_skills.php" class="button fancy title-btn primary">Manage Special Skills</a>
		<a href="<?php echo BASEURL; ?>/add_special_skill.php" class="button fancy title-btn primary">Add Special Skills</a>
		<h1 class="title">Manage Special Skills</h1>
	</div>
	<div class="row fiterouter">
		<div class="col-4"></div>
			<div class="col-6">

			</div>
	</div>
	<?php
    $skillsobj=$obj->get();
		if(count($skillsobj->data)){

		       $skillsobj->pagination->render();
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
			if(count($skillsobj->data)){
				$i=1;
				foreach($skillsobj->data as $val){
			?>
			<tr>
						<td><?php echo  $i; ?></td>
						<td><?php echo  $val->name;?></td>
					

						<td>

	
							<a title="Edit" href="<?php echo BASEURL; ?>/edit_special_skill.php?id=<?php echo $val->id; ?>" class="edit">Edit</a>
							<a title="Delete" class="delete" href="javascript:confirmDelete('?mode=delete&id=<?php echo $val->id; ?>')">Delete</a>
						</td>
					</tr>
				<?php $i++; }  }?>
			</tbody>
		</table>
		<?php
			if(count($skillsobj->data)){

		       $skillsobj->pagination->render();
			}

	?>
	<?php include_once('footer.php'); ?>
</body>
</html>

