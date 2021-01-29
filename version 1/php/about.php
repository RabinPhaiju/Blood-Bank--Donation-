<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>About Us</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/progressbar.css">
	<link rel="stylesheet" type="text/css" href="../css/sidenavbar.css">
	<link rel="shortcut icon" href="../images/logo.png">
	<style>
		#content{
			float: right;
			height: 100%;
			font-size:15px;
			margin-left:-6px;
			text-align: justify;
		}
		#side{
		    margin-left:-20px;
		}
	</style>
</head>
<body style="background-image: linear-gradient(#b7c3d4, #a2a2a7); background-repeat: no-repeat;">
	<?php include('../html/sidenavbar1.html');?>
	<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-up fa-2x" aria-hidden="true"></i></button>
	
<?php include('../html/iconbar.html');?>
<?php include('../html/progressbar.html');?>
<?php include('../html/navbar1.html');?>
	<div id="wrapper">
		

<div id="body" style="padding-top: 6px; padding-left: 2px; margin-top: 115px;">
		<?php include('../html/about.html');?>
	<div id="side">
		
		<?php include('../html/bloodtype1.html');?>

	</div>
</div>	
<?php include('../html/footer.html');?>
<?php include('../html/scrollandtop.html');?>

</body>
</html>