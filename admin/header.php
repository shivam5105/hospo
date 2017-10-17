<div>
<header class="cf" id="header">
	<div class="logo">
		<a href="<?php echo str_ireplace("/admin","/",BASEURL); ?>" target="Hospo"><img src="<?php echo BASEURL;?>/assets/images/logo-white.png" /></a>
	</div>
	<?php
		$LoggedInUserFullName = ucwords(trim(@$_SESSION['full_name']));
		if(trim($_SESSION['full_name']) == "" || trim(@$_SESSION['full_name']) == null)
		{
			$LoggedInUserFullName = trim($_SESSION['type']);
		}
	?>
	<?php if($_SESSION['type']== 'Superadmin'){ ?>
	<nav id="nav">
		<ul class="menu">
			<li><span>Welcome <?=$LoggedInUserFullName?></span></li>
			<li <?php if(@$HighLightedTab == 1){ echo 'class="Selected"';}?>><a href="<?php echo BASEURL; ?>/dashboard.php">Dashboard</a></li>

			<li <?php if(@$HighLightedTab == 3){ echo 'class="Selected"';}?>><a href="<?php echo BASEURL; ?>/manage_pages.php">Pages</a></li>

			<li <?php if(@$HighLightedTab == 4){ echo 'class="Selected"';}?>><a href="<?php echo BASEURL; ?>/manage_home_page.php">Home Page</a></li>

			<li <?php if(@$HighLightedTab == 5){ echo 'class="Selected"';}?>><a href="<?php echo BASEURL; ?>/manage_menu.php">Manage Menus</a></li>
			<li <?php if(@$HighLightedTab == 6){ echo 'class="Selected"';}?>><a href="<?php echo BASEURL; ?>/job_categories.php">Manage Job Categories</a></li>
			<li <?php if(@$HighLightedTab == 8){ echo 'class="Selected"';}?>><a href="<?php echo BASEURL; ?>/license_transport.php">Manage License & Tansport</a></li>
			<li <?php if(@$HighLightedTab == 11){ echo 'class="Selected"';}?>><a href="<?php echo BASEURL; ?>/special_skills.php">Manage Special Skills</a></li>
			<li <?php if(@$HighLightedTab == 12){ echo 'class="Selected"';}?>><a href="<?php echo BASEURL; ?>/experiences.php">Manage Experiences</a></li>
			<li <?php if(@$HighLightedTab == 13){ echo 'class="Selected"';}?>><a href="<?php echo BASEURL; ?>/job_locations.php">Manage Job Locations</a></li>

			<li <?php if(@$HighLightedTab == 10){ echo 'class="Selected"';}?>><a href="<?php echo BASEURL; ?>/packages.php">Manage Packages</a></li>

			<li <?php if(@$HighLightedTab == 7){ echo 'class="Selected"';}?>><a href="<?php echo BASEURL; ?>/employees.php">Manage Employees</a></li>
			<li <?php if(@$HighLightedTab == 9){ echo 'class="Selected"';}?>><a href="<?php echo BASEURL; ?>/managers.php">Manage Managers</a></li>


			<li <?php if(@$HighLightedTab == 2){ echo 'class="Selected"';}?>><a href="<?php echo BASEURL; ?>/change_password.php">Change Password</a></li>

			<li><a href="<?php echo BASEURL; ?>/logout.php">Logout</a></li>
		</ul>
	</nav>
	<?php } ?>
</header>
</div>
<?php flash('msg' ); ?>
<?php showErrorMessages(); ?>
<section class="wrapper">
	<fieldset class="no-border">