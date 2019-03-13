<?php
	if(!isset($_SESSION)) 
	{ 
		session_start(); 
	}

	if(!isset($_SESSION["uid"])) 
	{
		header("Location:login.php");
	}
	
	$uid=$_SESSION["uid"];
	
	require('connect.php');
	
	$q = $con->prepare("SELECT * FROM `user` where uid=?");						
	$q->bind_param('s',$uid);
	$q->execute();
	$res = $q->get_result();
	
	if (mysqli_num_rows($res) != 0) 
	{
		if($row = $res->fetch_assoc())
		{			
			$phone_no = $row['phone'];
			$email = $row['email'];
		}
	}
	
	$location = $_POST['location'];
	$date = $_POST['date'];
	$time = $_POST['time'];
	$decoration = $_POST['decoration'];
	$makeup = $_POST['makeup'];
	$photo = $_POST['photo'];
	
	if($decoration==1)
	{	
		$dtype="Stage Decoration";
		$dprice="50000";
	}else if($decoration==2)
	{	
		$dtype="Overall Decoration";
		$dprice="200000";
	}
	
	if($makeup==1)
	{	
		$mtype="Grooming for male";
		$mprice="10000";
	}else if($makeup==2)
	{	
		$mtype="Grooming for bride";
		$mprice="10000";
	}else if($makeup==3)
	{	
		$mtype="Grooming for both";
		$mprice="15000";
	}
	
	if($photo==1)
	{	
		$ptype="Photography";
		$pprice="5000";
	}else if($photo==2)
	{	
		$ptype="Photography with video making";
		$pprice="8000";
	}
	
	$total=$dprice+$mprice+$pprice;
	
	$stmt = $con->prepare("INSERT INTO wedding (uid, location, date, time, decorationtype, decorationprice, makeuptype, makeupprice, phototype, photoprice, totalprice) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssssss", $uid, $location, $date, $time, $dtype, $dprice, $mtype, $mprice, $ptype, $pprice, $total);
	$stmt->execute();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<link rel="shortcut icon" href="">
	<title>N K Events</title>
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="vendor/fontawesome/css/font-awesome.min.css" type="text/css" rel="stylesheet">
	<link href="vendor/animateit/animate.min.css" rel="stylesheet">
	<link href="vendor/owlcarousel/owl.carousel.css" rel="stylesheet">
	<link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">
	<link href="css/theme-base.css" rel="stylesheet">
	<link href="css/theme-elements.css" rel="stylesheet">	
    <link href="css/responsive.css" rel="stylesheet">
	<link href="css/color-variations/blue.css" rel="stylesheet" type="text/css" media="screen" title="blue">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,800,700,600%7CRaleway:100,300,600,700,800" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="css/custom.css" media="screen" />
	<script src="vendor/jquery/jquery-1.11.2.min.js"></script>
    <script src="vendor/plugins-compressed.js"></script>
</head>

<body class="wide">
	<div class="wrapper">
		<header id="header" class="header-transparent">
			<div id="header-wrap">
				<div class="container">
					<?php
						include("header.php");
					?>
					<form name="aa" action="PayUMoney_form.php" method="POST">
						<div class="container container-fullscreen">
							<div class="text-middle">
								<div class="row">
									<div class="col-md-6 col-md-offset-3 p-30 background-white">
										<div class="col-md-12 m-t-20">
											<h3>Entered Details</h3>
										</div>
										<div class="col-md-4 form-group">
											<center><h5>Name:</h5></center>
										</div>
						
										<div class="col-md-8 form-group">
											<input type="text"  value="<?php echo $_SESSION["firstname"];   ?>" class="form-control input-lg" disabled>
										</div>
										
										<div class="col-md-4 form-group">
											<center><h5>Phone no.:</h5></center>
										</div>
										
										<div class="col-md-8 form-group">
											<input type="text"  value="<?php echo $phone_no;   ?>" class="form-control input-lg" disabled>
										</div>
										
										<div class="col-md-4 form-group">
											<center><h5>Email id:</h5></center>
										</div>
										
										<div class="col-md-8 form-group">
											<input type="text"  value="<?php echo $email;   ?>" class="form-control input-lg" disabled>
										</div>
												
										<div class="col-md-4 form-group">
											<center><h5>Location:</h5></center>
										</div>
										
										<div class="col-md-8 form-group">
											<input type="text"  value="<?php echo $location;   ?>" class="form-control input-lg" disabled>
										</div>	

										<div class="col-md-4 form-group">
											<center><h5>Date:</h5></center>
										</div>
										
										<div class="col-md-8 form-group">
											<input type="text"  value="<?php echo $date;   ?>" class="form-control input-lg" disabled>
										</div>
										
										<div class="col-md-4 form-group">
											<center><h5>Time:</h5></center>
										</div>
										
										<div class="col-md-8 form-group">
											<input type="text"  value="<?php echo $time;   ?>" class="form-control input-lg" disabled>
										</div>
										
										<div class="col-md-4 form-group">
											<center><h5>Decoration Price:</h5></center>
										</div>
										
										<div class="col-md-8 form-group">
											<input type="text"  value="<?php echo $dprice;   ?>" class="form-control input-lg" disabled>
										</div>
										
										<div class="col-md-4 form-group">
											<center><h5>Makeup Price:</h5></center>
										</div>
										
										<div class="col-md-8 form-group">
											<input type="text"  value="<?php echo $mprice;   ?>" class="form-control input-lg" disabled>
										</div>
										
										<div class="col-md-4 form-group">
											<center><h5>Photography Price:</h5></center>
										</div>
										
										<div class="col-md-8 form-group">
											<input type="text"  value="<?php echo $pprice;   ?>" class="form-control input-lg" disabled>
										</div>
										
										<div class="col-md-4 form-group">
											<center><h5>Total Cost:</h5></center>
										</div>
										
										<div class="col-md-8 form-group">
											<input type="text" name="totalprice" value="<?php echo $total;   ?>" class="form-control input-lg" disabled>
										</div>
										<input type="hidden" name="totalprice" value="<?php echo $total;   ?>" class="form-control input-lg">
										<div class="col-md-12 form-group">
											<h5>Booking Confirmed!!</h5>
											<p>*Please pay the advance amount here!! Our team will contact you soon...</p>
										</div>
										
										<div class="col-md-5 form-group">
											
										</div>
										
										<div class="col-md-7 form-group">
											<input type="submit" value="Pay" class="btn btn-primary">
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
					<?php
						include("footer.php");
					?>
				</div>
				<a class="gototop gototop-button" href="#"><i class="fa fa-chevron-up"></i></a>
				<script src="js/theme-functions.js"></script>
				<script src="js/custom.js"></script>
</body>
</html>
