<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bhaktapur Donation Camp</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/progressbar.css">
	<link rel="stylesheet" type="text/css" href="../css/sidenavbar.css">
	<link rel="shortcut icon" href="../images/logo.png">
	<style>
		#content{
			height: 100%;
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
<?php include('../html/progressbar.html');?>
<?php include('../html/navbar1.html');?>	
<?php include('../html/iconbar.html');?>

	<div id="wrapper">
<div id="body" style="padding-top: 6px; padding-left: 2px; margin-top: 115px;">
	<div id="content" style="float:left; text-align: center; margin-bottom: 10px;">
		<!-- <?php include('../html/google_map_bhaktapur.html');?> -->
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2260.489361204636!2d85.42157501307453!3d27.672324421600475!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1aa4a1a6b0d9%3A0x1a0f1c68f517736d!2sNepal+Red+Cross+Society+Bhaktapur+District+Chapter!5e0!3m2!1sen!2snp!4v1566207944257!5m2!1sen!2snp" width="600" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div>

	<div id="side">
		<?php include('../html/bhaktapur.html');?>
		<?php include('../html/viewbhaktapur.html');?>
	</div>
</div>

<?php include('../html/scrollandtop.html');?>

<!--The div element for the map -->

<?php include('../html/footer.html');?>
</div>
</body>
</html>