<?php
include_once("dbconfig.php");
loginCheck();
$HighLightedTab = 7;
$user=new App\Classes\UserClass();
$categories=$user->categories();

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
<a href="#" id="openpopup" >Advance  filters</a>
<a href="employees.php">Reset filters</a>
<!-- The Modal -->
<div id="popup" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Advance Filters</h2>
    </div>
	<form action="" method="get" >
    <div class="modal-body">
		<div class="row">
							<div class="col-6">
							  <div class="field ">
        <label for="title">Year</label>
        <div class="field-element">
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
						</div></div>						</div>		
							 <div class="col-6">
							     <div class="field ">
        <label for="email">Month</label>
        <div class="field-element">
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
						</div></div>							</div>	
</div>
	<div class="row">
							<div class="col-6">
							  <div class="field ">
        <label for="title">Status</label>
        <div class="field-element">
    								<select name="status" id="status" >
					<option value="">--select--</option>
					<option value="1" <?php if(isset($_GET['status']) && $_GET['status']=='1'){ echo 'selected';} ?>>Active</option>
					<option value="0" <?php if(isset($_GET['status']) && $_GET['status']=='0'){ echo 'selected';} ?>>In-Active</option>

					</select>
						</div></div>						</div>		
							 <div class="col-6">
							     <div class="field ">
        <label for="email">Email Verified</label>
        <div class="field-element">
    			<select name="email_confirmed" id="email_confirmed" >
					<option value="">--select--</option>
					<option value="1" <?php if(isset($_GET['email_confirmed']) && $_GET['email_confirmed']=='1'){ echo 'selected';} ?>>Yes</option>
					<option value="0" <?php if(isset($_GET['email_confirmed']) && $_GET['email_confirmed']=='0'){ echo 'selected';} ?>>No</option>

					</select>
						</div></div>							</div>	
</div>

<div class="row">
							<div class="col-6">
							  <div class="field ">
        <label for="title">Part-time or full-time?</label>
        <div class="field-element">
    								<select name="part_or_full" required="">
		     				
                                 <option  value="">--select--</option>
                                 <option value="Part" selected="">Part-time</option>
                                 <option value="Full">Full-time</option>
                             </select>
						</div></div>						</div>		
							 <div class="col-6">
							     <div class="field ">
        <label for="email">CURRENTLY LOOKING FOR WORK?</label>
        <div class="field-element">
    			<select name="currently_looking_for_work">
                                 <option  value="">--select--</option>
								 								        <option value="1">Yes</option>

								 								        <option value="0">No</option>

								                              </select>
						</div></div>							</div>	
</div>
	   <div class="row">
							<div class="col-6">
							  <div class="field ">
        <label for="title">Job Categories</label>
        <div class="field-element">
    								<select name="category[]" class="multiple" multiple required="">
		     				
                                 <option selected="" disabled="" hidden="" value="">select..</option>
								 				<?php foreach($categories as $category){ ?>

                                 <option value="<?=$category->id;?>" ><?=$category->name;?></option>
												<?php } ?>
							 </select>
						</div></div>						</div>		
							 <div class="col-6">
							     <div class="field ">
      <label for="email">Job status</label>
        <div class="field-element">
    			<select name="current_status">
                                 <option value="">--select--</option>
								 								        <option value="Employed">Employed</option>

								 								        <option value="Unemployed" >Unemployed</option>
								 								        <option value="Studying" >Studying</option>

								                              </select>
						</div>
	
	</div>							</div>	
</div>

   <div class="row">
							<div class="col-6">
							    <div class="field ">
        <label for="phone">Phone</label>
        <div class="field-element">
    							<input type="text" name="phone" id="phone"  pattern="^[0-9]{9,}" title="Invalid Input">
						</div></div>							</div>		
							 <div class="col-6">
							     <div class="field ">
        <label for="email">Email</label>
        <div class="field-element">
    					<input type="email" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
						</div></div>							</div>	
</div>
    </div>
     <div class="modal-footer">
     				<input type="submit" value="Search">

    </div>
	</form>
  </div>

</div>
</div>
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

