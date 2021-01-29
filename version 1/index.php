<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<!-- Hotjar Tracking Code for http://raktasanchar.000webhostapp.com/index.php -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:1454597,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>
	<title>Raktasanchar-Blood Bank Nepal</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="raktasanchar bloodbank nepal">
	<meta name="keywords" content="blood bank nepal,nepal blood bank,raktasanchar,raktasanchar bloodbank nepal,bloodbank nepal,nepal bloodbank,rabin phaiju raktasanchar">
	<meta name="author" content="Raktasanchar">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	 <script src="https://code.jquery.com/jquery-3.3.1.js" ></script>
	 <link rel="stylesheet" type="text/css" href="css/login_register.css">
	 <link rel="stylesheet" type="text/css" href="css/progressbar.css">
	 <link rel="stylesheet" type="text/css" href="css/sidenavbar.css">
	 <link rel="stylesheet" type="text/css" href="css/gallery.css">
	 <link rel="shortcut icon" href="images/logo.png">
	<style>
		#content{
		/*	background-color: #a1a1a1;*/
			height: 100%;
			text-align: justify;

		}
		#rightside{
			height: 100%;
			padding: 4px 20px 4px 14px;
			margin-top: 2px;
			margin-left:-12px;
			font-size: 14px;
			text-align: justify;
		}
		</style>
</head>
<body style="background-image: linear-gradient(#b7c3d4, #a2a2a7); background-repeat: no-repeat;" onload="plusSlides(1)">
	<?php include('html/sidenavbar.html');?>

	<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-up fa-2x" aria-hidden="true"></i></button>

<?php include('html/iconbar.html');?>
<?php include('html/navbar.html');?>
<?php include('html/progressbar.html');?>
	<div id="wrapper">
		
	

<div id="body" style="padding-top: 6px; padding-left: 2px; margin-top: 115px;">
	

	<?php include('html/indexcontent.html');?>

	<div id="side">

		<?php include('html/bloodtype.html');?>

		<div id="rightside">
			<?php include('html/seminar.html');?>
			<?php include('html/viewindex.html');?>
			
		</div>
	</div>
</div>	

<?php include('html/footer.html');?>
<?php include('html/scrollandtop.html');?>

</body>
</html>