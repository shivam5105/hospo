<footer>
	<div class="">
		<div class="container mar-gin-center">
			<div class="row">
				<div class="hospo-cus-pad">
					<?php
					for($i = 1; $i <= 4; $i++)
					{
						$footer_menu_query1 = $mysqli->query("SELECT * FROM menus WHERE menu_location='footer-col".$i."'");
						$footer_menu_num1	= $footer_menu_query1->num_rows;

						if($footer_menu_num1 > 0)
						{
							$loop = 0;
							while($row = $footer_menu_query1->fetch_array())
							{
								if($loop == 0)
								{
									?>
									<div class="col-sm-3 hospo-cus-pad">
										<div class="footer-menu-title"><?php echo $row['menu_heading']; ?></div>
										<ul class="footer-li">
									<?php
								}?>
								<li><a href="<?php echo $row['menu_url']; ?>"><?php echo $row['menu_name']; ?></a></li>
								<?php
								$loop++;
								if($loop == $footer_menu_num1)
								{
									?>
										</ul>
									</div>
									<?php
								}
							}
						}
					}
					?>
					<div class="copyright">
						<p>&copy;<?php echo date("Y"); ?> The Learning Place Ltd</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
<?php 
global $error;
if($error){
	echo $error;
}	

?>