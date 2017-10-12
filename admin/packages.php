<?php
include_once("dbconfig.php");
loginCheck();
$HighLightedTab =6;
$obj=new App\Classes\PackagesClass();

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
			<a href="<?php echo BASEURL; ?>/packages.php" class="button fancy title-btn primary">Manage Packages</a>
		<h1 class="title">Manage Packages</h1>
	</div>
	<div class="row fiterouter">
		<div class="col-4"></div>
			<div class="col-6">

			</div>
	</div>
	<?php
    $packages=$obj->get();
		if(count($packages->data)){

		       $packages->pagination->render();
			}
		?>	
		<table class="dtable">
			<thead>
				<tr>
					<th width="20">S.No</th>
					<th>Name</th>
					<th>Price</th>
					<th>Type</th>
					<th>Role</th>
					<th>Description</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
			<?php 
			if(count($packages->data)){
				$i=1;
				foreach($packages->data as $pack){
			?>
			<tr>
						<td><?php echo  $i; ?></td>
						<td><?php echo  $pack->name;?></td>
						<td><?php echo  $pack->price.' '.CURRENCY_CODE;?></td>
						<td><?php echo  $pack->type;?></td>
						<td><?php echo  $pack->role->title;?></td>
					<td><?php echo  $pack->description;?></td>
			

						<td>

	
							<a title="Edit" href="<?php echo BASEURL; ?>/edit_package.php?id=<?php echo $pack->id; ?>" class="edit">Edit</a>
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

