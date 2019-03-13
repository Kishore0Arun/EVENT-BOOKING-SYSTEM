<?php
	if(!isset($_SESSION)) 
	{ 
		session_start(); 
	}

	if(!isset($_SESSION["uid"])) 
	{
		header("Location:login.php");
	}
	
	require('connect.php');
	
	$uid=$_SESSION["uid"];	
	
	$q = $con->prepare("SELECT * FROM `user` where uid='".$uid."'");	
	$q->execute();
	$res = $q->get_result();
	
	if (mysqli_num_rows($res) != 0) 
	{				
		$row = mysqli_fetch_array($res);
		$firstname = $row['firstname'];
		$email = $row['email'];
		$phone = $row['phone'];	
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	
	
	<link rel="shortcut icon" href="">
	<title>Register</title>

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

						<?php
							include("header.php");
						?>
					
					

					<!-- END: search / navigation / message -->
					
					
					
	<!-- SECTION -->
	<form action="user_complaint_process.php" method="POST">

	<input type="hidden" value="<?php echo "$uid";?>" name="uid"/>
	<input type="hidden" value="<?php echo "$firstname";?>" name="firstname"/>
	<input type="hidden" value="<?php echo "$email";?>" name="email"/>
	<input type="hidden" value="<?php echo "$phone";?>" name="phone"/>
	
	<div class="container container-fullscreen">
		<div class="text-middle">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 p-30 background-white">
						<div class="col-md-12 m-t-20">
							<h3>Complaint / Feedback</h3>
						</div>										
						
						<div class="col-md-6 form-group">
							<input type="text" value="<?php echo "$uid";?>" class="form-control input-lg" disabled>
						</div>	
						
						<div class="col-md-6 form-group">
							<input type="text" value="<?php echo "$firstname";?>" class="form-control input-lg" disabled>
						</div>
						
						<div class="col-md-6 form-group">
							<input type="text" value="<?php echo "$email";?>" class="form-control input-lg" disabled>
						</div>
						
						<div class="col-md-6 form-group">
							<input type="text" value="<?php echo "$phone";?>" class="form-control input-lg" disabled>
						</div>												
						
						<div class="col-md-12 form-group">
							<textarea name="reason" row="10" placeholder="Complain / Feedback" class="form-control input-lg">Complain / Feedback </textarea>
							
						</div>
												
						<div class="col-md-12 form-group">
							<input class="btn btn-primary" type="Submit" value="Send"> 
							<a href="index.php"><button type="button" class="btn btn-danger m-l-10">Cancel</button></a>
	
						</div>
						
					</div>
			</div>
		</div>
		
		
		
	</div>
	
</form>
<!-- END: SECTION -->

					
					
					
					
					
					
					
					
					
					
					
	
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
