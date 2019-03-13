


					

					
					
					
					<!--NAVIGATION-->
					<div class="navbar-collapse collapse main-menu-collapse navigation-wrap">
						<div class="container">
							<nav id="mainMenu" class="main-menu mega-menu">
								<ul class="main-menu nav nav-pills">
									
									<?php
										if(!isset($_SESSION)) 
										{ 
											session_start(); 
										} 
									?>
									
									<?php									
									if(!isset($_SESSION['uid']) && !isset($_SESSION['aid'])) {																			
									?>									
									<li ><a href="index.php"><i class="fa fa-home"></i></a>
									</li>									
									<li > <a href="gallery.php">Gallery</a>																						
									<li  class="dropdown"> <a href="login.php"> Account </a>
									<ul class="dropdown-menu">
											<li > <a href="login.php">Login</a>
											<li > <a href="register.php">Register</a>
									</ul>																				
									<?php									
										}
									?>
									
									<?php									
									if(isset($_SESSION['uid'])) {										
									?>
									<li ><a href="index.php"><i class="fa fa-home"></i></a>
									</li>
									<li > <a href="gallery.php">Gallery</a>
									<li class="dropdown"> <a href="#"> Events </a>									
									<ul class="dropdown-menu">
										<li > <a href="birthday.php"> Birthday </a>
										<li > <a href="wedding.php"> Wedding </a>
										<li > <a href="photography.php"> Photography </a>											
									</ul>									
									<li > <a href="user_complaint.php">Complain</a>
									<li class="dropdown"> <a href="#">Hello, <?php echo $_SESSION["firstname"]; ?> </a>									
									<ul class="dropdown-menu">
										<li > <a href="profile.php"> Profile </a>
										<li > <a href="logout.php"> Logout </a>									
									</ul>									
									<?php
									}
									?>	

									<?php									
									if(isset($_SESSION['aid'])) {										
									?>
									<li ><a href="index.php"><i class="fa fa-home"></i></a>
									</li>
									<li > <a href="gallery.php">Gallery</a>
									<li > <a href="admin_booked.php">Booked events</a>
									<li class="dropdown"> <a href="#"> Customers </a>									
									<ul class="dropdown-menu">
										<li > <a href="admin_user.php"> Customer Details </a>
										<li > <a href="admin_complaint.php"> Feedback Details </a>										
									</ul>																		
									<li class="dropdown"> <a href="#">Hello, <?php echo "Admin"; ?> </a>									
									<ul class="dropdown-menu">									
										<li><a href="logout.php"> Logout </a></li>									
									</ul>									
									<?php
									}
									?>		
							</nav>
						</div>
					</div>
					<!--END: NAVIGATION-->
					
					
					
				</div>
			</div>
		</header>
		
		<section id="page-title" class="page-title-video text-light" data-vide-bg="video/hourses" data-vide-options="position: 0% 50%">
			<div class="container">
				<div class="page-title col-md-8">
					<h1></h1>
					<span></span>
				</div>			
			</div>
		</section>
		
<!-- <section id="page-title" class="page-title-parallax page-title-center text-dark" style="background-image:url(images/proj/home.jpg);>
	<div class="container">
		<div class="page-title col-md-8">
			<h1> N K Events </h1>
            <span>Making Your Dreams To Reality</span>
        </div>
       
    </div>
</section>

-->
		
