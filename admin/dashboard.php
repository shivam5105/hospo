<?php
include_once("dbconfig.php");
loginCheck();
$HighLightedTab = 1;
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo PROJECT_NAME; ?> - Dashboard</title>
	<?php include_once('common-head.php'); ?>
</head>
<body>
	<?php include_once('header.php'); ?>
	<div class="title-row">
		<h1 class="title">Dashboard</h1>
	</div>
	<?php include_once('footer.php'); ?>
</body>
</html>