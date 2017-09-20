<?php
include_once("dbconfig.php");
loginCheck();
$HighLightedTab = 3;
if(isset($_GET['mode']) && $_GET['mode'] == 'delete' && isset($_GET['id']) && (int)$_GET['id'] > 0)
{
	$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT) ? filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT) : 0;

	$sql = "DELETE FROM pages WHERE id='".$id."'";
	
	if(!$mysqli->query($sql))
	{
		flash('msg', 'Failed to delete page, please try again', 'error', '?');
	}
	else
	{
		flash('msg', 'Page deleted successfully.', 'success', '?');
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo PROJECT_NAME; ?> - Manage Pages</title>
	<?php include_once('common-head.php'); ?>
</head>
<body>
	<?php include_once('header.php'); ?>
	<div class="title-row">
		<a href="<?php echo BASEURL; ?>/add_page.php" class="button fancy title-btn primary">Add New Page</a>
		<h1 class="title">Manage Pages</h1>
	</div>
	<?php

	if(empty($page))
	{
		$page=0;
	}
	$records_per_page = 10;
	$pagination = new Zebra_Pagination();

	$sql = "SELECT * FROM pages ORDER BY title ASC";

	$sql_result = $mysqli->query($sql." LIMIT ".(($pagination->get_page() - 1) * $records_per_page) . ", ".$records_per_page);

	// fetch the total number of records in the table
	$TotalRecordsQuery = $mysqli->query($sql);
	$TotalRecords = $TotalRecordsQuery->num_rows;

	// pass the total number of records to the pagination class
	$pagination->records($TotalRecords);

	// records per page
	$pagination->records_per_page($records_per_page);
	
	$num = $sql_result->num_rows;
	if($num > 0)
	{
		$pagination->render();
		?>	
		<table class="dtable">
			<thead>
				<tr>
					<th width="20">S.No</th>
					<th>Page Name</th>
					<th>Status</th>
					<th>Options</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$rowNo = 0;
				while($row = $sql_result->fetch_array())
				{
					$rowNo++;
					$sno = serialNo($rowNo,$records_per_page,$pagination->get_page());
					?>
					<tr>
						<td><?php echo $sno; ?></td>
						<td><?php echo $row['title']; ?></td>
						<td><?php if($row['status']){ echo "Active"; }else{ echo "In-Active"; } ?></td>
						<td>
							<a title="Edit" href="<?php echo BASEURL; ?>/edit_page.php?id=<?php echo $row['id']; ?>" class="edit">Edit</a>
							<a title="Delete" class="delete" href="javascript:confirmDelete('?mode=delete&id=<?php echo $row['id']; ?>')">Delete</a>
						</td>
					</tr>
					<?php
				}
				?>
			</tbody>
		</table>
		<?php
		$pagination->render();
	}
	?>
	<?php include_once('footer.php'); ?>
</body>
</html>