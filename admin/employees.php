<?php
include_once("dbconfig.php");
loginCheck();
$HighLightedTab = 3;
$user=new App\Classes\UserClass();

if(isset($_GET['mode']) && $_GET['mode'] == 'delete' && isset($_GET['id']) && (int)$_GET['id'] > 0){
	$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT) ? filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT) : 0;
	
	if($user->deleteEmployee($id))
	{
				flash('msg', 'Employee record deleted successfully.', 'success', '?');

	}
	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo PROJECT_NAME; ?> - Manage Employees</title>
	<?php include_once('common-head.php'); ?>
</head>
<body>
	<?php include_once('header.php'); ?>
	<div class="title-row">
		<h1 class="title">Manage Employees</h1>
	</div>
	<?php
    $allemployees=$user->allEmployees();
		if(count($allemployees->data)){

		       $allemployees->pagination->render();
			}
		?>	
		<table class="dtable">
			<thead>
				<tr>
					<th width="20">S.No</th>
					<th>Employee Name</th>
					<th>Categories</th>
					<th>Email</th>
					<th>Mobile</th>
					<th>Registration Date</th>
					<th>Email Verified</th>
					<th>Status</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
			<?php 
			if(count($allemployees->data)){
				$i=1;
				foreach($allemployees->data as $employee){
			?>
			<tr>
						<td><?php echo  $i; ?></td>
						<td><?php echo  $employee->userProfile->first_name.' '. $employee->userProfile->last_name;?></td>
						<td>
						 <?php 
						 foreach($employee->EmployeeCategories as $empcat){
							 echo '&raquo; '.$empcat->category->name.'<br><br>';
						 }
						 
						 ?>
						</td>
						
						<td><?php echo  $employee->email;?></td>
						<td><?php echo  $employee->phone;?></td>
						<td><?php echo  $employee->create_date;?></td>

						<td align="center"><?php if($employee->email_confirmed){ echo '<span class="label label-success">Yes</span>'; }else{ echo '<span class="label label-danger">No</span>'; } ?></td>
						<td align="center"><?php if($employee->status){  echo '<span class="label label-success">Active</span>'; }else{  echo '<span class="label label-danger">In-Active</span>';} ?></td>
						<td>
<!--							<a title="View Details" href="<?php echo BASEURL; ?>/employee_details.php?id=<?php echo $employee->id; ?>" class="view">View Details</a>-->
	<a title="Change Password" href="<?php echo BASEURL; ?>/password_change.php?id=<?php echo $employee->id; ?>" ><i class="ion-edit"></i></a>
							<a title="Edit" href="<?php echo BASEURL; ?>/edit_employee.php?id=<?php echo $employee->id; ?>" class="edit">Edit</a>
							<a title="Delete" class="delete" href="javascript:confirmDelete('?mode=delete&id=<?php echo $employee->id; ?>')">Delete</a>
						</td>
					</tr>
				<?php $i++; }  }?>
			</tbody>
		</table>
		<?php
			if(count($allemployees->data)){

		       $allemployees->pagination->render();
			}

	?>
	<?php include_once('footer.php'); ?>
</body>
</html>