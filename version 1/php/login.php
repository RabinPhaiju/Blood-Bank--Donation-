<?php
require_once "config.php";
if(isset($_SESSION['usergoogle'])){
    echo "<script>window.location='index.php';</script>";
	exit();
}

$loginURL = $gClient->createAuthUrl();
if(isset($_COOKIE["login"])){	
	if(empty($_SESSION)) // if the session not yet started
   			session_start();
		$_SESSION['username'] = $_COOKIE["login"];
	echo "<script>window.location='index.php';</script>";
	exit;
}

if(isset($_POST['submit'])){
	// echo "Nepal";exit;
	$uu = $_POST['username'];
	$u=strtolower($uu);
	$p = md5($_POST['password']);

	$sql = "SELECT * FROM `register` WHERE `username`='$u' AND `password`='$p';";
	//echo $sql;
	require_once('DBConnect.php');
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		// echo "Login Successful";exit;
		if(empty($_SESSION)) // if the session not yet started
   			session_start();
		$_SESSION['username'] = $u;
		$row = mysqli_fetch_assoc($result);
		//echo "<pre>"; print_r($row);exit;
		$_SESSION['u_id'] = $row['reg_id'];
		if(!empty($_POST["remember_me"])) {
				setcookie ("login",$_POST["username"],time()+(60 * 60)); /* expire in 1 hour */
			} else {
				if(isset($_COOKIE["login"])) {
					setcookie ("login","");
				}
			}

		echo "<script>window.location='index.php';</script>";		
        exit; 
	}else{
		echo "<script>alert('Username or Password Incorrect!');</script>";
		echo "<script>window.location='login.php';</script>";
		exit;
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Raktasanchar Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	 <link rel="stylesheet" type="text/css" href="../css/login.css">
	 <link rel="stylesheet" type="text/css" href="../css/progressbar.css">
	 <link rel="stylesheet" type="text/css" href="../css/sidenavbar.css">
	 <link rel="shortcut icon" href="../images/logo.png">

	<style>
		#content{
			background-color: #a1a1a1;
			height: 100%;
			text-align: justify;
		}
		
	</style>
</head>
<body style="background-image: linear-gradient(#607aa0, #33708f); background-repeat: no-repeat;">
	<?php include('../html/sidenavbar1.html');?>
	<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-up fa-2x" aria-hidden="true"></i></button>

<?php include('../html/iconbar.html');?>
<?php include('../html/progressbar.html');?>
<?php include('../html/navbar1.html');?>
	<div id="wrapper">

<?php include('../html/animation.html');?>

<div id="body" style="padding-top: 6px; padding-left: 2px; margin-top: 115px;">
	
	<?php include('../html/login.html');?>

	
</div>

</body>
</html>