<?php
include_once("dbconfig.php");
loginCheck();
$HighLightedTab =9;
$user=new App\Classes\UserClass();

if(isset($_GET['mode']) && $_GET['mode'] == 'delete' && isset($_GET['id']) && (int)$_GET['id'] > 0){
	$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT) ? filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT) : 0;
	
	if($user->deleteManager($id))
	{
				flash('msg', 'Manager record deleted successfully.', 'success', '?');

	}
	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo PROJECT_NAME; ?> - Manage Managers</title>
	<?php include_once('common-head.php'); ?>
</head>
<body>
	<?php include_once('header.php'); ?>
	<div class="title-row">
		<h1 class="title">Manage Managers</h1>
	</div>
	<div class="row fiterouter">
		<div class="col-4"></div>
		<div class="col-6">
			<form action="" method="get" class="no-border filter">
				
					<select name="status" id="status" >
					<option value="">Status</option>
					<option value="1" <?php if(isset($_GET['status']) && $_GET['status']=='1'){ echo 'selected';} ?>>Active</option>
					<option value="0" <?php if(isset($_GET['status']) && $_GET['status']=='0'){ echo 'selected';} ?>>In-Active</option>

					</select>
					<select name="email_confirmed" id="email_confirmed" >
					<option value="">Email Verified</option>
					<option value="1" <?php if(isset($_GET['email_confirmed']) && $_GET['email_confirmed']=='1'){ echo 'selected';} ?>>Yes</option>
					<option value="0" <?php if(isset($_GET['email_confirmed']) && $_GET['email_confirmed']=='0'){ echo 'selected';} ?>>No</option>

					</select>
						<select class="form-control"  name="year" id="year">
														<option value="">Select Year</option>

						<?php 
						$this_year = date("Y"); // Run this only once
						for ($year = $this_year; $year >= $this_year - 10; $year--) {

							 if(isset($_GET['year']) && $_GET['year']==$year){
                               $select='selected';
							 }else{
                          $select='';

							 }
                          echo  '<option '.$select.'  value="' . $year . '">' . $year . '</option>';
						}
						?>

					  </select>
					  <select name="month" id="month"   class="form-control">
							<option value="">Select month</option>
							<?php
							for ($m=1; $m<=12; $m++) {
							$month = date('F', mktime(0,0,0,$m, 1, date('Y')));
							 
							 if(isset($_GET['month']) && $_GET['month']==$m){
                               $select='selected';
							 }else{
                          $select='';

							 }
							echo "<option $select value='$m'>$month</option>";
							}?>
                   </select> 
				<input type="submit" value="Search">
			
	</form>

</div>
	</div>
	<?php
    $allmanagers=$user->allManagers();
		if(count($allmanagers->data)){

		       $allmanagers->pagination->render();
			}
		?>	
		<table class="dtable">
			<thead>
				<tr>
					<th width="20">S.No</th>
					<th>Manager Name</th>
					<th>Email</th>
					<th>Mobile</th>
					<th>Registration Date</th>
					<th>Email Verified</th>
					<th>Status</th>
					<th>Membership Status</th>
					
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
			<?php 
			if(count($allmanagers->data)){
				$i=1;
				foreach($allmanagers->data as $user){
			?>
			<tr>
						<td><?php echo  $i; ?></td>
						<td><?php echo  @$user->userProfile->first_name.' '. $user->userProfile->last_name;?></td>
						
						
						<td><?php echo  $user->email;?></td>
						<td><?php echo  $user->phone;?></td>
						<td><?php echo  $user->create_date;?></td>

						<td align="center"><?php if($user->email_confirmed){ echo '<span class="label label-success">Yes</span>'; }else{ echo '<span class="label label-danger">No</span>'; } ?></td>
						<td align="center"><?php if($user->status){  echo '<span class="label label-success">Active</span>'; }else{  echo '<span class="label label-danger">In-Active</span>';} ?></td>
						<td><?php if(!empty($user->membership_status)){ echo  $user->membership_status;}else{echo 'NA';}?></td>

						<td>
<!--							<a title="View Details" href="<?php echo BASEURL; ?>/employee_details.php?id=<?php echo $user->id; ?>" class="view">View Details</a>-->
	<a title="Change Password" href="<?php echo BASEURL; ?>/password_change.php?id=<?php echo $user->id; ?>" ><i class="ion-edit"></i></a>
							<a title="Edit" href="<?php echo BASEURL; ?>/edit_manager.php?id=<?php echo $user->id; ?>" class="edit">Edit</a>
							<a title="Delete" class="delete" href="javascript:confirmDelete('?mode=delete&id=<?php echo $user->id; ?>')">Delete</a>
						</td>
					</tr>
				<?php $i++; }  }?>
			</tbody>
		</table>
		<?php
			if(count($allmanagers->data)){

		       $allmanagers->pagination->render();
			}

	?>
	<?php include_once('footer.php'); ?>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){

// Get the modal
var modal = document.getElementById('popup');

// Get the button that opens the modal
var btn = document.getElementById("openpopup");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
});	
</script>

