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
	<title>BackEnd-Add Registration</title>
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
	$a = $_POST['bloodtype'];
	$b = $_POST['username'];
	$c = $_POST['user_type'];
	$d = $_POST['firstname'];
	$e = $_POST['lastname'];
	$f = $_POST['email'];
	$g = $_POST['contact'];
	$h = $_POST['dob'];
	$i = $_POST['password'];
	$j = $_POST['location'];
	// echo 'U: '.$u.', E: '.$e.', P: '.$p;exit;
	$sql="";
	$sql = "INSERT INTO `register` (`bloodtype`,`username`,`user_type`,`firstname`,`lastname`,`email`,`contact`,`dob`,`password`,`location`) VALUES ('$a', '$b','$c','$d','$e','$f','$g','$h',md5('$i'),'$j')";
//echo $sql;

// Create connection
require_once("DBConnect.php");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (mysqli_query($conn, $sql)) {
    // echo "New record created successfully.";
    echo "<script>window.location='list_reg.php';</script>";
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
		<p><a href="../index.php">Home</a> <a href="index.php">>> DashBoard</a> >> Registration >> Add User</p>
		</div>
		<div style="margin-left: 12%;">
<h1>New Registration</h1>
<form action="" method="POST" name="user">
<table  id="adduser">
	<tr>
		<td>First Name:</td>
		<td><input type="text" name="firstname" placeholder="Enter Firstname" required="required"></td>
	
		<td>Last Name:</td>
		<td><input type="text" name="lastname" placeholder="Enter Lastname" required="required"></td>

		<td>Username:</td>
		<td><input type="text" name="username" placeholder="Enter Username" required="required"></td>
	</tr>
	<tr>
		<td>User Type:</td>
		<td>
			<select required="required" name="user_type" title="Choose Usertype">
					<option value="Staff">Staff</option>
					<option value="Manager">Manager</option>
					<option value="Admin">Admin</option>
				</select>
		</td>

		<td>Address:</td>
		<td>
			<select required="required" name="location" title="Choose Location">
					<option value="Bhaktapur">Bhaktapur</option>
					<option value="Biratnagar">Biratnagar</option>
					<option value="Chitwan">Chitwan</option>
					<option value="Karve">Karve</option>
					<option value="Kathmandu">Kathmandu</option>
					<option value="Mugu">Mugu</option>
					<option value="Pachthar">Pachthar</option>
					<option value="Saptari">Saptari</option>
				</select>
		</td>
	</tr>
	<tr>
		<td>Phone:</td>
		<td><input type="number" name="contact" placeholder="Enter phone" required="required"></td>
	
		<td>Email:</td>
		<td><input type="email" name="email" placeholder="Enter email" required="required"></td>
	</tr>
	<tr>
		<td>Date of Birth:</td>
		<td><input type="date" name="dob" placeholder="Enter phone" required="required"></td>
	
		<td>Bloodtype:</td>
		<td>
			<select required="required" name="bloodtype" title="Choose bloodtype">
					<option value="O -ve"> O -ve</option>
					<option value="O +ve"> O +ve</option>
					<option value="A -ve"> A -ve</option>
					<option value="A +ve"> A +ve</option>
					<option value="B -ve"> B -ve</option>
					<option value="B +ve"> B +ve</option>
					<option value="AB -ve"> AB -ve</option>
					<option value="AB +ve"> AB +ve</option>
				</select>
		</td>
	</tr>
	<tr>
		<td>Enter Password:</td>
		<td><input type="password" name="password" placeholder="Enter password" required="required"></td>
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