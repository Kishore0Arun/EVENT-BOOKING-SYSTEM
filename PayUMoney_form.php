<?php
session_start();
// if(isset($_POST['submit']))
//	{
//		$area=$_POST['areaName'];
//		$com=$_POST['completeAdd'];
//		$deli=$_POST['deliveryInst'];
//		$pay="online";
//		$link=@mysql_connect("localhost","root","");
//		mysql_select_db("streetbudsdb",$link);
//		mysql_query("insert into addresstab(areaName,completeAdd,deliveryInst,payMode) values('".$area."', '".$com."', '".$deli."','".$pay."')");
//		mysql_close();
//	}


	$total=0;
	$total = $_POST['totalprice'];
	$merchant_key  = "gtKFFx";
	$salt          = "eCwWELxi";
	$payu_base_url = "https://test.payu.in"; // For Test environment
	$action        = '';
	$currentDir	   = 'http://localhost/creative/payment/payumoney/';
	$posted = array();
	if(!empty($_POST)) {
	  foreach($_POST as $key => $value) {    
	    $posted[$key] = $value; 
	  }
	}
	

	$formError = 0;
	if(empty($posted['txnid'])) {
	  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
	} else {
	  $txnid = $posted['txnid'];
	}

	$hash         = '';
	$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";

	if(empty($posted['hash']) && sizeof($posted) > 0) {
	  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
	  ){
	    $formError = 1;

	  } else {
	   	$hashVarsSeq = explode('|', $hashSequence);
	    $hash_string = '';	
		foreach($hashVarsSeq as $hash_var) {
	      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
	      $hash_string .= '|';
	    }
	    $hash_string .= $salt;
	    $hash = strtolower(hash('sha512', $hash_string));
	    $action = $payu_base_url . '/_payment';
	  }
	} elseif(!empty($posted['hash'])) {
	  $hash = $posted['hash'];
	  $action = $payu_base_url . '/_payment';
	}
?>
<html>
  <head>
  <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>
</head>
  </head>
  <body onload="submitPayuForm()">
  <style>
        body{
            font-family:cursive;
        }
input[type=password],[type=text],[type=email] {
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
input[type=submit] {
    width: 25%;
    background-color: #999;
    color: white;
    padding: 14px 20px;
    font-family:cursive;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}


.button:hover {
    background-color: #4d4d4d;
}</style>
  <title>N K Events</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Events Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="css/style.css" type="text/css" rel="stylesheet" media="all">  
<link href="css/font-awesome.css" rel="stylesheet">		<!-- font-awesome icons -->
<!-- //Custom Theme files --> 
<!-- js -->
<script src="js/jquery-2.2.3.min.js"></script>  
<!-- //js -->
<!-- web-fonts -->  
<link href="//fonts.googleapis.com/css?family=Josefin+Sans:300,400,600,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<!-- //web-fonts -->
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">  
<style>
      h3{
            font-family: cursive;
        }
        .button {
                    width: 15%;
                    background-color: #999;
                    color: white;
                    padding: 14px 20px;
                    font-family:cursive;
                    margin: 8px 0;
                    border: none;
                    border-radius: 4px;
                    cursor: pointer;
                }
        input[type=text]{
            width: 50%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-family:cursive;
        }
   
          button {
            width: 15%;
            background-color: #999;
            font-family:cursive;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }   
        </style>
		
  <div style="padding:50px">
  <center>
    <h2 class="right-text">PayU Form</h2>   
    <?php if($formError) { ?>
      <span style="color:red">Please fill all mandatory fields.</span>
    <?php } ?>
    <form action="<?php echo $action; ?>" method="post" name="payuForm">
      <input type="hidden" name="key" value="<?php echo $merchant_key ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
	  <br/><br/>
      <table>
        <tr>
          <td><b>Mandatory Parameters</b>
        <tr>
          <td>Amount <span class="mand">*</span>: </td>
          <td><input name="amount" type="text" class="form" size="50"value="<?php echo (empty($posted['amount'])) ? '' : $posted['amount']; ?>"/></td>
		</tr>
		<tr>
          <td>First Name <span class="mand">*</span>: </td>
          <td><input type="text" name="firstname" id="firstname" class="form" value="<?php echo (empty($posted['firstname'])) ? '' : $posted['firstname']; ?>" /></td>
        </tr>
        <tr>
          <td>Email <span class="mand">*</span>: </td>
          <td><input type="email" name="email" id="email" class="form" value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>" /></td>
		  </tr>
		<tr>
          <td>Phone <span class="mand">*</span>: </td>
          <td><input type="text" name="phone" class="form" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>" /></td>
        </tr>
        <tr>
          <td>Product Info <span class="mand">*</span>: </td>
          <td colspan="3"><input type="text" name="productinfo" class="form" value="<?php echo (empty($posted['productinfo'])) ? '' : $posted['productinfo'] ?>" /></td>
        </tr>
        <tr>
          <td colspan="3"><input type="hidden" name="surl" value="<?php echo (empty($posted['surl'])) ? $currentDir.'success.php' : $posted['surl'] ?>" size="64" /></td>
        </tr>
        <tr>
          <td colspan="3"><input type="hidden" name="furl" value="<?php echo (empty($posted['furl'])) ? $currentDir.'failure.php' : $posted['furl'] ?>" size="64" /></td>
        </tr>

        <tr>
          <td colspan="3"><input type="hidden" name="service_provider" value="" size="64" /></td>
        </tr>

        
        <tr>
          <?php if(!$hash) { ?>
            <td colspan="4"><input type="submit" value="Submit" class="text-center form-btn form-btn" /></td>
          <?php } ?>
        </tr>
      </table>
    </form>
	</center>
	</div>
	</td>
	<td>
	<div >
	
	<div>

	</div>
	</div>
	</td>
	</tr></table>
  </body>
</html>
