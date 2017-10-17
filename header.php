
<header class="">
	<div class="container log-in">
		<div class="row">
			<div class="head-cover">
				<div class="head-logo">
					<h2>hospo</h2>
				</div>
				<div class="head-right-prt">
					<ul class="list-inline text-right">
						<li>

					<?php 
					if($user->isAuthMenu()){

					?>
						 <button class="top-btn" type="submit" onclick="logout()">log out</button>

					<?php }else{ ?>
								<button class="top-btn" type="submit" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">log in</button>
							<ul class="dropdown-menu" style="padding: 15px;min-width: 250px;">
							<li>
							   <div class="row">
								  <div class="col-md-12">
									 <form class="form loginform" role="form" method="post" " accept-charset="UTF-8" id="login-nav">
										<div class="form-group">
										   <label class="sr-only" for="emailInput">Email address</label>
										   <input type="email" class="form-control" id="emailInput" placeholder="Email address" required="">
										</div>
										<div class="form-group">
										   <label class="sr-only" for="passwordInput">Password</label>
										   <input type="password" class="form-control" id="passwordInput" placeholder="Password" required="">
										</div>
										<div class="checkbox">
										   <label>
										  <!-- <input type="checkbox"> Remember me-->
										   </label>
										</div>
										<div class="form-group">
										   <button type="button" class="btn btn-success btn-block loginbtn">Sign in</button>
										</div>
									 </form>
								  </div>
							   </div>
							</li>
							<li class="divider"></li>
							
						 </ul>	

					<?php } ?>

					
							
							
						</li>
						
						<li>
							<div class="dropdown">
								<div class="select-op">
									<span>en</span>
									<div class="drop-op">
										<form>
											<input type="radio" name="gender" value="english" checked> english<br>
											<input type="radio" name="gender" value="chinese" checked> chinese<br>
											<input type="radio" name="gender" value="hindi" checked> hindi<br>
											<input type="radio" name="gender" value="korean" checked> korean<br>
											<input type="radio" name="gender" value="thai" checked> thai<br>
										</form>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>



	<!--logout-->
	<div class="container log-out">
		<div class="row">
			<ul class="main-menu">
				<li><a href="#">recruit</a></li>
				<li><a href="#">learn</a></li>
				<li><a href="#">shop</a></li>
			</ul>
			<div class="head-cover">
				<div class="head-logo">
					<h2>hospo</h2>
				</div>
				<div class="head-right-prt">
					<ul class="list-inline text-right">

						<?php 
					if($user->isAuthMenu()){

					?>
						<li> <button class="top-btn" type="submit" onclick="logout()">log out</button></li>

					<?php }else{ ?>
											<li> <button class="top-btn" type="submit" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">log in</button>
													<ul class="dropdown-menu" style="padding: 15px;min-width: 250px;">
							<li>
							   <div class="row">
								  <div class="col-md-12">
									 <form class="form loginform3" role="form" method="post" " accept-charset="UTF-8" id="login-nav">
										<div class="form-group">
										   <label class="sr-only" for="emailInput">Email address</label>
										   <input type="email" class="form-control" id="emailInput" placeholder="Email address" required="">
										</div>
										<div class="form-group">
										   <label class="sr-only" for="passwordInput">Password</label>
										   <input type="password" class="form-control" id="passwordInput" placeholder="Password" required="">
										</div>
										<div class="checkbox">
										   <label>
										  <!-- <input type="checkbox"> Remember me-->
										   </label>
										</div>
										<div class="form-group">
										   <button type="button" class="btn btn-success btn-block loginbtn">Sign in</button>
										</div>
									 </form>
								  </div>
							   </div>
							</li>
							<li class="divider"></li>
							
						 </ul>	
							</li>

					<?php } ?>
						<li>
							<div class="dropdown">
								<div class="select-op">
									<span>en</span>
									<div class="drop-op">
										<form>
											<input type="radio" name="gender" value="english" checked> english<br>
											<input type="radio" name="gender" value="chinese" checked> chinese<br>
											<input type="radio" name="gender" value="hindi" checked> hindi<br>
											<input type="radio" name="gender" value="korean" checked> korean<br>
											<input type="radio" name="gender" value="thai" checked> thai<br>
										</form>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>


	<!--logout-->
	<div class="container job-log-out">
		<div class="row">
			<ul class="main-menu">
			<?php 
					if($user->isAuthMenu()){
$profile=$user->getloginProfile();
					?>
				<li class="job-active-mnu"><a href="#">Welcome <?php echo $profile->first_name.' '.$profile->last_name; ?></a></li>
				
					<?php } ?>
			</ul>
			<div class="head-cover">
				<div class="head-logo">
					<h2>hospo</h2>
				</div>
				<div class="head-right-prt">
					<ul class="list-inline text-right">
	<?php 
					if($user->isAuthMenu()){

					?>
						<li> <button class="top-btn" type="submit" onclick="logout()">log out</button></li>

					<?php }else{ ?>
											<li><button class="top-btn" type="submit" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">log in</button>
													<ul class="dropdown-menu" style="padding: 15px;min-width: 250px;">
							<li>
							   <div class="row">
								  <div class="col-md-12">
									 <form class="form loginform2" role="form" method="post" " accept-charset="UTF-8" id="login-nav">
										<div class="form-group">
										   <label class="sr-only" for="emailInput">Email address</label>
										   <input type="email" class="form-control" id="emailInput" placeholder="Email address" required="">
										</div>
										<div class="form-group">
										   <label class="sr-only" for="passwordInput">Password</label>
										   <input type="password" class="form-control" id="passwordInput" placeholder="Password" required="">
										</div>
										<div class="checkbox">
										   <label>
										  <!-- <input type="checkbox"> Remember me-->
										   </label>
										</div>
										<div class="form-group">
										   <button type="button" class="btn btn-success btn-block loginbtn">Sign in</button>
										</div>
									 </form>
								  </div>
							   </div>
							</li>
							<li class="divider"></li>
							
						 </ul>	

							</li>

					<?php } ?>						<li>
							<div class="dropdown">
								<div class="select-op">
									<span>en</span>
									<div class="drop-op">
										<form>
											<input type="radio" name="gender" value="english" checked> english<br>
											<input type="radio" name="gender" value="chinese" checked> chinese<br>
											<input type="radio" name="gender" value="hindi" checked> hindi<br>
											<input type="radio" name="gender" value="korean" checked> korean<br>
											<input type="radio" name="gender" value="thai" checked> thai<br>
										</form>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!---->
</header>