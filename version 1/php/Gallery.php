<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Raktasanchar Gallery</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/styleGallery.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/progressbar.css">
	<link rel="stylesheet" type="text/css" href="../css/sidenavbar.css">
	<link rel="shortcut icon" href="../images/logo.png">
</head>
<body style="background-image: linear-gradient(#b7c3d4, #a2a2a7); background-repeat: no-repeat;">
	<?php include('../html/sidenavbar1.html');?>
  <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-up fa-2x" aria-hidden="true"></i></button>

<?php include('../html/iconbar.html');?>
<?php include('../html/progressbar.html');?>
<?php include('../html/navbar1.html');?>
	<div id="wrapper">
		
	<?php include('../html/gallerycontent1.html');?>
	

<?php include('../html/footer.html');?>
<?php include('../html/scrollandtop.html');?>
<?php include('../html/galleryscript.html');?>

</body>
</html>