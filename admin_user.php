<?php
	if(!isset($_SESSION)) 
	{ 
		session_start(); 
	}

	
	
	//$uid=$_SESSION["uid"];
	
	require('connect.php');
	
	
	
	$q = $con->prepare("SELECT * FROM `user` where uid!=''");		
	$q->execute();
	$res = $q->get_result();
	
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
					<section id="shop-cart">
	<div class="container">
		<div class="shop-cart">			
			<div class="table table-condensed table-striped table-responsive">
				
						<?php				
							if (mysqli_num_rows($res) != 0) 
							{
								?>
								<div class="col-md-12 m-t-20">
									<h3>Customer Details</h3>
								</div>
								<table class="table">
									<thead>
										<tr>
											<th></th>															
											<th>Uid</th>
											<th>First Name</th>
											<th>Last Name</th>
											<th>E Mail</th>
											<th>Phone</th>
										</tr>
									</thead>
									<tbody>
								<?php	
								while($row = $res->fetch_assoc())
								{
									$uid = $row['uid'];									
									$firstname= $row['firstname'];
									$lastname = $row['lastname'];
									$email=$row['email'];
									$phone = $row['phone'];																	
								
															
									?>	
									<tr>
										<th></th>	
										<td class="cart-product-description">
											<?php echo "$uid";?>
										</td>
										<td class="cart-product-description">
											<?php echo "$firstname";?>
										</td>
										<td class="cart-product-thumbnail">
											<?php echo "$lastname";?>
										</td>
										<td class="cart-product-thumbnail">
											<?php echo "$email";?>
										</td>
										<td class="cart-product-description">
											<?php echo "$phone";?>
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
														<h4>Leave Details!!</h4>
														<p>Their are no complaint / feedback details!!</p>
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
<!-- END: WRAPPER -->

<!-- GO TOP BUTTON -->
<a class="gototop gototop-button" href="#"><i class="fa fa-chevron-up"></i></a>

	<!-- Theme Base, Components and Settings -->
	<script src="js/theme-functions.js"></script>

<!-- Custom js file -->
<script src="js/custom.js"></script>


</body>
</html>
