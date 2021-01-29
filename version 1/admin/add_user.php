<?php include 'session.php';?>
	<?php
$u=$_SESSION['username'];
require_once("DBConnect.php");
$sql5 = "SELECT usertype from `user` where `username`='$p'";
$rresult=mysqli_query($conn,$sql5);
$rrow = mysqli_fetch_assoc($rresult);
$usertype=$rrow["usertype"];

if($usertype=="staff"){
 echo "<script>window.location='index.php';</script>";

}?>
<!DOCTYPE html>
<html>
<head>
	<title>BackEnd-Add User</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="../images/logo.png">
	<style type="text/css">
		#adduser input{
			width: 80%;
			background-color: lightgray;
			color: black;
			padding: 10px 20px;
			margin: 20px 0px 10px 0px;
			border: none;
		}
		#adduser input[type=submit]{
			width: 70%;
			background-color: #1c4472;
			color: white;
			padding: 10px 20px;
			margin: 20px auto 10px 15%;
			border: none;
			border-radius: 6px;
			cursor: pointer;
		}
		a{
			text-decoration: none;
		}
		select {
			width: 96%;
			padding: 7px 5px;
			margin: 8px 0;
			border-radius: 4px;
			background-color: lightgrey;
		}
		option{
			font-family: Arial;
			background-color: lightgrey;
			color: black;

		}
	

	</style>
</head>
<body style="background-color: #ececec;">

<?php

if (isset($_POST['add_user'])) {
	// echo "Nepal";exit();
	
	
	
	$a = $_POST['name'];
	$b =  $_POST['username'];
	$c = $_POST['email'];
	$d = $_POST['phone'];
	$e = $_POST['address'];
	$f = $_POST['password'];
	$g = $_POST['remarks'];
	$h = $_POST['date'];
	$i = $_POST['gender'];
	

	// echo 'U: '.$u.', E: '.$e.', P: '.$p;exit;
	$sql = "INSERT INTO `user` (`name`,`username`,`email`,`phone`,`address`,`password`,`remarks`,`dob`,`gender`) VALUES ('$a','$b','$c','$d','$e','md5($f)','$g','$h','$i')";
//echo $sql;

// Create connection
require_once("DBConnect.php");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (mysqli_query($conn, $sql)) {
    // echo "New record created successfully.";
    echo "<script>window.location='list_user.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}
?>
<div style="border: 2px solid; border-color: black; height: 100%; margin:0 10%; " >
	 <?php include('header.php');?>
	</div>

	<div style="border: 2px solid; border-color: black; min-height: 570px; margin:0 10%; " >
		<div>	
		<p><a href="../index.php">Home</a> <a href="index.php">>> DashBoard</a> >> Add User</p>
		</div>
		<div style="margin-left: 15%;">
<h1>New User</h1>
<form action="" method="POST" name="user">
<table  id="adduser">
	<tr>
		<td>Name:</td>
		<td><input type="text" name="name" placeholder="Enter Name" required="required"></td>

		<td>Username:</td>
		<td><input type="text" name="username" placeholder="Enter Username" required="required"></td>
	
		<td>Email:</td>
		<td><input type="email" name="email" placeholder="Enter Email" required="required"></td>
	</tr>
	<tr>
		<td>Phone:</td>
		<td><input type="number" name="phone" placeholder="Enter Phone" required="required"></td>
		<td>Address:</td>
		<td><input type="text" name="address" placeholder="Enter Address" required="required"></td>
	</tr>
	<tr>
		<td>Date of Birth:</td>
		<td><input type="date" name="date" required="required"></td>
	</tr>
	<tr>
		<td>
			<tr>
				<td>Male</td>
			 <td><input type="radio" name="gender" value="1" ></td>
			</tr>
			<tr>
				<td>Female</td>
				<td><input type="radio" name="gender" value="2"></td>
			</tr>
		</td>
	</tr>
	<tr>
		<td>Remarks:</td>
		<td>
			<textarea rows="3" cols="30" name="remarks"></textarea>
		</td>
	</tr>
	<tr>
		<td>Password:</td>
		<td><input type="password" name="password" placeholder="Enter Password" required="required"></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" name="add_user" value="ADD USER"></td>
	</tr>
</table>
</form>
	</div>
</div>
<?php include('footer.php');?>
</body>
</html>