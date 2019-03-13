<?php
	if(!isset($_SESSION)) 
	{ 
		session_start(); 
	}

	if(!isset($_SESSION["aid"])) 
	{
		header("Location:login.php");
	}
	
	require('connect.php');	
	
	$q = $con->prepare("SELECT * FROM `birthday` where uid!=''");		
	$q->execute();
	$res = $q->get_result();
	
	$q1 = $con->prepare("SELECT * FROM `wedding` where uid!=''");		
	$q1->execute();
	$res1 = $q1->get_result();
	
	$q2 = $con->prepare("SELECT * FROM `photo` where uid!=''");		
	$q2->execute();
	$res2 = $q2->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	
	
	<link rel="shortcut icon" href="">
	<title>N K Events</title>

	<!-- Bootstrap Core CSS -->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="vendor/fontawesome/css/font-awesome.min.css" type="text/css" rel="stylesheet">
	<link href="vendor/animateit/animate.min.css" rel="stylesheet">

	<!-- Vendor css -->
	<link href="vendor/owlcarousel/owl.carousel.css" rel="stylesheet">
	<link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

	<!-- Template base -->
	<link href="css/theme-base.css" rel="stylesheet">

	<!-- Template elements -->
	<link href="css/theme-elements.css" rel="stylesheet">	
    
    
	<!-- Responsive classes -->
	<link href="css/responsive.css" rel="stylesheet">

	<!--[if lt IE 9]>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->		

	<!-- Template color -->
	<link href="css/color-variations/blue.css" rel="stylesheet" type="text/css" media="screen" title="blue">

	<!-- LOAD GOOGLE FONTS -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,800,700,600%7CRaleway:100,300,600,700,800" rel="stylesheet" type="text/css" />

	<!-- CSS CUSTOM STYLE -->
    <link rel="stylesheet" type="text/css" href="css/custom.css" media="screen" />

    <!--VENDOR SCRIPT-->
    <script src="vendor/jquery/jquery-1.11.2.min.js"></script>
    <script src="vendor/plugins-compressed.js"></script>

</head>

<body class="wide">
	

	<!-- WRAPPER -->
	<div class="wrapper">

		<!-- HEADER -->
		<header id="header" class="header-transparent">
			<div id="header-wrap">
				<div class="container">

					<!--MOBILE MENU -->
					<div class="nav-main-menu-responsive">
						<button class="lines-button x" type="button" data-toggle="collapse" data-target=".main-menu-collapse">
							<span class="lines"></span>
						</button>
					</div>
					<!--END: MOBILE MENU -->

					<!-- search / navigation / message -->
					
					
						<?php
							include("header.php");
						?>
					
					

					<!-- END: search / navigation / message -->
					
					<section>
			<div class="container">	
					<!--Horizontal tabs triangle line simple-->
				<div id="tabs-01d1" class="tabs linetriangle triangle-simple">
					<h3>Event Details</h3>
					<p></p>
					<ul class="tabs-navigation">
						<li class="active"><a href="#About01d">Birthday</a> </li>
						<li><a href="#Services01d">Wedding</a> </li>						
						<li><a href="#Assets01d">Photography</a> </li>
					</ul>
			<div class="tabs-content">					
			<div class="tab-pane active" id="About01d">			
			<form action="#" method="POST">
			<div class="container container-fullscreen">
			<div class="text-middle">
				<section id="shop-cart">
					<div class="container">
						<div class="shop-cart">			
							<div class="table table-condensed table-striped table-responsive">
								<?php				
									if (mysqli_num_rows($res) != 0) 
									{
								?>
										<div class="col-md-12 m-t-20">
										
										</div>
										<table class="table">
											<thead>
												<tr>
													<th></th>															
													<th>Uid</th>
													<th>Location</th>
													<th>Date</th>
													<th>Time</th>
													<th>Details</th>		
													<th>Price</th>		
												</tr>
											</thead>
											<tbody>
												<?php	
													while($row = $res->fetch_assoc())
													{
														$uid = $row['uid'];									
														$location= $row['location'];
														$date = $row['date'];
														$time=$row['time'];
														$decorationtype = $row['decorationtype'];									
														$caketype= $row['caketype'];
														$phototype = $row['phototype'];
														$totalprice=$row['totalprice'];
												?>	
												<tr>
													<th></th>	
													<td class="cart-product-description">
														<?php echo "$uid";?>
													</td>
													<td class="cart-product-description">
														<?php echo "$location";?>
													</td>
													<td class="cart-product-thumbnail">
														<?php echo "$date";?>
													</td>
													<td class="cart-product-thumbnail">
														<?php echo "$time";?>
													</td>
													<td class="cart-product-description">
														<p>Decoration type: <?php echo "$decorationtype";?></p>
														<p>Cake type: <?php echo "$caketype";?></p>
														<p>Photography type: <?php echo "$phototype";?></p>														
													</td>																							
													<td class="cart-product-description">
														<?php echo "$totalprice";?>
													</td>
												</tr>
												<?php
												}
											}else
											{
												?>
											<div class="container container-fullscreen">
											<div class="text-middle">
											<div class="row">
												<div class="col-md-6 col-md-offset-3 p-30 background-white">
													<div class="col-md-12">
													<div role="alert" class="alert alert-warning">														
														<p>Their is no birthday`events!!</p>
													</div>
											</div>
												</div>
											</div>
										</div>
									</div>
								<?php
							}				
						?>
						
					</tbody>

				</table>

			</div>	

		</div>
	</div>
</section>	
			</div>		
			</div>
			</form>	
			</div>
						
						
						
			<div class="tab-pane" id="Services01d">
				<form action="edit_user.php" method="POST">
					<div class="container container-fullscreen">
			<div class="text-middle">
				<section id="shop-cart">
					<div class="container">
						<div class="shop-cart">			
							<div class="table table-condensed table-striped table-responsive">
								<?php				
									if (mysqli_num_rows($res) != 0) 
									{
								?>
										<div class="col-md-12 m-t-20">
										
										</div>
										<table class="table">
											<thead>
												<tr>
													<th></th>															
													<th>Uid</th>
													<th>Location</th>
													<th>Date</th>
													<th>Time</th>
													<th>Details</th>		
													<th>Price</th>		
												</tr>
											</thead>
											<tbody>
												<?php	
													while($row1 = $res1->fetch_assoc())
													{
														$uid = $row1['uid'];									
														$location= $row1['location'];
														$date = $row1['date'];
														$time=$row1['time'];
														$decorationtype = $row1['decorationtype'];									
														$caketype= $row1['makeuptype'];
														$phototype = $row1['phototype'];
														$totalprice=$row1['totalprice'];
												?>	
												<tr>
													<th></th>	
													<td class="cart-product-description">
														<?php echo "$uid";?>
													</td>
													<td class="cart-product-description">
														<?php echo "$location";?>
													</td>
													<td class="cart-product-thumbnail">
														<?php echo "$date";?>
													</td>
													<td class="cart-product-thumbnail">
														<?php echo "$time";?>
													</td>
													<td class="cart-product-description">
														<p>Decoration type: <?php echo "$decorationtype";?></p>
														<p>Make-up type: <?php echo "$caketype";?></p>
														<p>Photography type: <?php echo "$phototype";?></p>														
													</td>																							
													<td class="cart-product-description">
														<?php echo "$totalprice";?>
													</td>
												</tr>
												<?php
												}
											}else
											{
												?>
											<div class="container container-fullscreen">
											<div class="text-middle">
											<div class="row">
												<div class="col-md-6 col-md-offset-3 p-30 background-white">
													<div class="col-md-12">
													<div role="alert" class="alert alert-warning">														
														<p>Their is no wedding`events!!</p>
													</div>
											</div>
												</div>
											</div>
										</div>
									</div>
								<?php
							}				
						?>
						
					</tbody>

				</table>

			</div>	

		</div>
	</div>
</section>	
			</div>		
			</div>
				</form>	
			</div>
			
			<div class="tab-pane" id="Assets01d">
				<form action="edit_password.php" method="POST">
					<div class="container container-fullscreen">
			<div class="text-middle">
				<section id="shop-cart">
					<div class="container">
						<div class="shop-cart">			
							<div class="table table-condensed table-striped table-responsive">
								<?php				
									if (mysqli_num_rows($res2) != 0) 
									{
								?>
										<div class="col-md-12 m-t-20">
										
										</div>
										<table class="table">
											<thead>
												<tr>
													<th></th>															
													<th>Uid</th>
													<th>Location</th>
													<th>Date</th>
													<th>Time</th>
													<th>Details</th>		
													<th>Price</th>		
												</tr>
											</thead>
											<tbody>
												<?php	
													while($row2 = $res2->fetch_assoc())
													{
														$uid = $row2['uid'];									
														$location= $row2['location'];
														$date = $row2['date'];
														$time=$row2['time'];														
														$phototype = $row2['phototype'];
														$totalprice=$row2['photoprice'];
												?>	
												<tr>
													<th></th>	
													<td class="cart-product-description">
														<?php echo "$uid";?>
													</td>
													<td class="cart-product-description">
														<?php echo "$location";?>
													</td>
													<td class="cart-product-thumbnail">
														<?php echo "$date";?>
													</td>
													<td class="cart-product-thumbnail">
														<?php echo "$time";?>
													</td>
													<td class="cart-product-description">														
														<?php echo "$phototype";?>
													</td>																							
													<td class="cart-product-description">
														<?php echo "$totalprice";?>
													</td>
												</tr>
												<?php
												}
											}else
											{
												?>
											<div class="container container-fullscreen">
											<div class="text-middle">
											<div class="row">
												<div class="col-md-6 col-md-offset-3 p-30 background-white">
													<div class="col-md-12">
													<div role="alert" class="alert alert-warning">														
														<p>Their is no photography`events!!</p>
													</div>
											</div>
												</div>
											</div>
										</div>
									</div>
								<?php
							}				
						?>
						
					</tbody>

				</table>

			</div>	

		</div>
	</div>
</section>	
			</div>		
			</div>
				</form>
			</div>
		</div>
	</div>
				<!--END: Horizontal tabs triangle line simple-->
					
					
					</div>
					</section>
	
<!-- FOOTER -->
<?php
include("footer.php");
?>
<!-- END: FOOTER -->

</div>
<!-- END: WRAPPER -->

<!-- GO TOP BUTTON -->
<a class="gototop gototop-button" href="#"><i class="fa fa-chevron-up"></i></a>

	<!-- Theme Base, Components and Settings -->
	<script src="js/theme-functions.js"></script>

<!-- Custom js file -->
<script src="js/custom.js"></script>


</body>
</html>
