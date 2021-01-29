<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Who Can Donate</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/progressbar.css">
	<link rel="stylesheet" type="text/css" href="../css/sidenavbar.css">
	<link rel="shortcut icon" href="../images/logo.png">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<style>
		#content{
			float: right;
			height: 100%;
			text-align: justify;
			font-size:12px;
		}
		#body{
		    margin-left:-5px;
		    margin-right:15px;
		}
		#navbar{
		    margin-top:8px;
		}
 .container{
     max-width: 400px;
 }
 .icon{
     position: relative;
     top: -50px;
     border-radius: 50%;
    width: 100px;
    margin-bottom: -50px;
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
		<?php include('../html/whocandonatecontent.html');?>
	<div id="side">
		
		<?php include('../html/weather.html');?>
        <?php include('../html/viewwhocandonate.html');?>
	</div>
</div>	
<?php include('../html/footer.html');?>
<?php include('../html/scrollandtop.html');?>
<script src="scripts/forecast.js"></script>
    <script src="scripts/app.js"></script>
</body>
</html>