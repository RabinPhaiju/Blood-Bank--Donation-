
<!DOCTYPE html>
<html>
<head>
	<title>Raktasanchar Registration</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/progressbar.css">
	<link rel="stylesheet" type="text/css" href="../css/sidenavbar.css">
	<link rel="shortcut icon" href="../images/logo.png">
	<style>
		#content{
			background-color: #baaea7;
			height: 100%;
			text-align: justify;
		}
		#rightside{
			height: 100%;
			background-color: lightblue;
			border-radius: 6px;
			padding: 4px 10px 4px 12px;
			margin-top: 5px;
			text-align: justify;
		}
		

	</style>
</head style="background-image: linear-gradient(#607aa0, #33708f); background-repeat: no-repeat;">
<body>
<?php include('../html/sidenavbar1.html');?>
<?php include('../html/iconbar.html');?>
<?php include('../html/progressbar.html');?>
<?php include('../html/navbar1.html');?>	
	<div id="wrapper">
<div style="margin-top: 20%; margin-left: 23%; font-family: sans-serif; font-size: 40px;">
    
<?php
if(isset($_POST['submit'])) {
    
$aa=$_POST['username'];
$a=strtolower($aa);
$dd=$_POST['email'];
$d=strtolower($dd);
$e=$_POST['pass'];
$k=$_POST['key'];

require_once("DBConnect.php");

$sql1 = "SELECT * FROM `register` WHERE `username`='$a' AND `email`='$d' AND `secret_key`='$k';";
    $result11 = mysqli_query($conn, $sql1);
    
	if (mysqli_num_rows($result11) >0) {
	    $row = mysqli_fetch_assoc($result11);
	    $id=$row["reg_id"];
    $sql = "UPDATE `register` SET `password`=md5('$e') WHERE `reg_id`='$id';";	
    
if(mysqli_query($conn, $sql)){
			echo "Password changed successfully";
		}
		
		mysqli_close($conn);
	}
	else{
			echo "<script>alert('Information provided is incorrect!');</script>";
			echo "<script>window.location='reset_pass.php';</script>";
		}
	}

?>
</div>
</body>
</html>