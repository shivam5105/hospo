
<!DOCTYPE html>
<html lang="en">
<head>
	<title>HOSPO</title>
	<?php include_once("common-head.php"); ?>
</head>
<body class="home">
	<?php include_once("header.php");

$faq=new App\Classes\FaqsClass();
$faqs=$faq->index();

$home_query 	= $mysqli->query("SELECT * FROM home_page");
$home_page_row 	= $home_query->fetch_array();
?>
	<?php
	//$faq->flashFancy('msg', 'Page not found. Please try again.', 'success');

	$has_bg_image = false;
	if($home_page_row['background_image_id'] > 0)
	{
		$media_query = $mysqli->query("SELECT * FROM media WHERE id='".$home_page_row['background_image_id']."'");
		$media_num = $media_query->num_rows;
		if($media_num > 0)
		{
			$media_row 	= $media_query->fetch_array();
			$file_name	= $media_row['file_name'];
			$path 		= date("Y/m/d/",$media_row['createdon']);
			$path		= "uploads/org/".$path.$file_name;

			if(!empty($file_name) && file_exists($path))
			{
				$has_bg_image = true;
				?>
				<div class="top-back-img pos-rel">
					<div class="">
						<img src="<?php echo $path; ?>" alt="">
					</div>
				</div>
				<?php
			}
		}
	}
	?>
	<!--*************second-part******-->
	<section class="<?php if($has_bg_image){ echo "mov-top"; } ?> bottom-spc">
		<div class="container mar-gin-center heading-title">
			<h1 class="home-head"><?php echo $home_page_row['title']; ?></h1>
			<div class="row">
				<div class="hospo-cov-pad hos-bc-color">
					<div class="">
						<?php
						$tab_colors = array("yellow","blue","orange");
						$loop = 0;
						for($i = 1; $i <= 3; $i++)
						{
							$tab_query = $mysqli->query("SELECT * FROM tab_details WHERE content_type = 'Home Tab ".$i."'");
							$tab_num = $tab_query->num_rows;
							if($tab_num > 0)
							{
								$tab_row = $tab_query->fetch_array();
								?>
								<div class="col-sm-4 both-pad-none">
									<div class="hospo-<?php echo $tab_colors[$loop]; ?>">
										<div class="tile">
											<div class="sec-row-title" >
												<h2><?php echo $tab_row['heading']; ?></h2>
											</div>
											<?php
											if(!empty($tab_row['price']))
											{
												?>
												<div class="price"><?php echo $tab_row['price']; ?></div>
												<?php
											}
											?>
											<div class="sec-row-hd">
												<?php
												if(!empty($tab_row['sub_heading']))
												{
													?>
													<p class="main-heading"><?php echo $tab_row['sub_heading']; ?></p>
													<?php
												}
												if(!empty($tab_row['description']))
												{
													?>
													<p class="sec-cont"><?php echo $tab_row['description']; ?></p>
													<?php
												}
												?>
											</div>
											<?php
											$button_text = $tab_row['button_text'];
											$button_link = $tab_row['button_link'];
											$button_target = $tab_row['button_target'];

											if(!empty($button_text) && !empty($button_link))
											{
												?>
												<div class="sec-btn-pos <?php echo "btn-".$tab_colors[$loop]; ?>"><a href="<?php echo $button_link; ?>" <?php if($button_target){ echo "target='_blank'"; } ?>><?php echo $button_text; ?></a></div>
												<?php
											}
											?>
										</div>
									</div>
								</div>
								<?php
								$loop++;
							}
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--*****************third section**-->
	<div class="third-sec bottom-spc">
		<div class="container mar-gin-center">
			<div class="row third-pos">
				<div class="hospo-cus-pad">
				<?php foreach($faqs as $faq){?>
					<div class="col-sm-4 hospo-cus-pad">
						<div class="back-clr">
							<h2>""</h2>
							<div class="third-aria">
								<p class="third-cont">
									<?= $faq->message;?>
								</p>
								<p class="author">
								<?= $faq->name;?>
								<br>
								<?= $faq->designation;?>
								
								</p>
								<h4>	<?= $faq->company;?></h4>
							</div>
						</div>
					</div>
					<?php } ?>

				</div>
			</div>
		</div>
	</div>
	<!--*************fourth-part******-->
	<section class=" bottom-spc-ftr">
		<div class="container mar-gin-center heading-title">
			<div class="row">
				<div class="hospo-cov-pad hos-bc-color">
					<?php
					$tab_colors = array("yellow","blue","orange");
					$loop = 0;
					for($i = 4; $i <= 6; $i++)
					{
						$tab_query = $mysqli->query("SELECT * FROM tab_details WHERE content_type = 'Home Tab ".$i."'");
						$tab_num = $tab_query->num_rows;
						if($tab_num > 0)
						{
							$tab_row = $tab_query->fetch_array();
							?>
							<div class="col-sm-4 both-pad-none">
								<div class="hospo-<?php echo $tab_colors[$loop]; ?>">
									<div class="tile">
										<div class="sec-row-title" >
											<h2><?php echo $tab_row['heading']; ?></h2>
										</div>
										<?php
										if(!empty($tab_row['price']))
										{
											?>
											<div class="price"><?php echo $tab_row['price']; ?></div>
											<?php
										}
										?>
										<div class="sec-row-hd">
											<?php
											if(!empty($tab_row['sub_heading']))
											{
												?>
												<p class="main-heading"><?php echo $tab_row['sub_heading']; ?></p>
												<?php
											}
											if(!empty($tab_row['description']))
											{
												?>
												<p class="sec-cont"><?php echo $tab_row['description']; ?></p>
												<?php
											}
											?>
										</div>
										<?php
										$button_text = $tab_row['button_text'];
										$button_link = $tab_row['button_link'];
										$button_target = $tab_row['button_target'];

										if(!empty($button_text) && !empty($button_link))
										{
											?>
											<div class="sec-btn-pos <?php echo "btn-".$tab_colors[$loop]; ?>"><a href="<?php echo $button_link; ?>" <?php if($button_target){ echo "target='_blank'"; } ?>><?php echo $button_text; ?></a></div>
											<?php
										}
										?>
									</div>
								</div>
							</div>
							<?php
							$loop++;
						}
					}
					?>
				</div>
			</div>
		</div>
	</section>
	<?php include_once("footer.php"); ?>
</body>
</html>