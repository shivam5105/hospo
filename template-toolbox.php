
<!DOCTYPE html>
<html lang="en">
<head>
	<title>HOSPO</title>
	<?php include_once("common-head.php"); ?>


</head>

<body class="jobseeker">
<?php include_once("header.php");
	$obj=new App\Classes\TemplateToolboxCategoryClass();
   $temp_tool_cats=$obj->lists();



?>
	<div class="toolbox">
		<div class="container">
			<div class="tool-text"> template tool box </div>
		</div>
	</div>
	<div class="hospo-cover">
		<div class="container">
			<section class="">
				<div class="header-title"><h1>Template Toolbox</h1></div>
				<div class="header-text">
					<p>
						The contracts, the job descriptions, 
						the signage – you want to be professional and have everything in 
					    place but you have to manage a thousand other things as well. Ta-da! 
					    Its all here in your Toolbox of Templates.  
					</p>
			    </div>
			</section>
		<?php foreach(  $temp_tool_cats as $data){ ?>
			<div class="job-contant-wrap">
				<div class="row">
					<div class="job-contant-cov">
					<div class="job-cont-title"><h4><?php echo $data->name; ?><span class="crt-closed clk"><i class="fa fa-caret-down" aria-hidden="true"></i></span><span class="crt-open clk"><i class="fa fa-caret-up" aria-hidden="true"></i></span></h4>
					</div>
					
					<?php foreach($data->templatetoolboxes as $toolbox){ ?>
					<div class="col-sm-4 no-pd">
						<div class="job-contant-cov">
							<div class="job-cont-cov">
								<div class="">
									<div class="">
										<div class="job-download-wrap">
											<div class="job-down-cov">
												<div class="job-down-icon">
													<i class="fa fa-file-text-o" aria-hidden="true"></i>
												</div>
												<div class="job-standerd">
													<h5><?php echo $toolbox->title; ?></h5>
													<h6><?php echo $toolbox->description; ?></h6>
												</div>
												<div class="job-download-bttn-wrap">
													<div class="job-btn"><button><a href="<?php echo BASEURL.'/uploads/templatetoolboxes/'.$toolbox->file_url; ?>" download>download </a></button></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
		<?php } ?>
					</div>
			</div>
		</div>

		<?php } ?>
		</div>
	</div>





<?php include_once("footer.php"); ?>



</body>
</html>


