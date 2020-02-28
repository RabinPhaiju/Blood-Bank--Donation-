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
	<title>BackEnd-Edit Registration</title>
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
			cursor: pointer;
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
		a{
			text-decoration: none;
		}

	</style>
</head>
<body style="background-color: #ececec;">

<?php
$user_id = @$_GET['regid'];
if (!isset($user_id)) {
	echo "<script>window.location='list_reg.php';</script>";
}
//Load old data
require_once("DBConnect.php");
$sql = "SELECT * FROM `register` WHERE `reg_id`='$user_id' Limit 0, 10";
$result = mysqli_query($conn, $sql);
$prev_data = mysqli_fetch_assoc($result);
// echo "<pre>"; print_r($prev_data);exit;


if (isset($_POST['add_user'])) {
	$user_id = $_GET['regid'];
	// echo "$user_id";exit();

	$a = $_POST['bloodtype'];

	$c = $_POST['user_type'];
	$d = $_POST['firstname'];
	$e = $_POST['lastname'];
	$f = $_POST['email'];
	$g = $_POST['contact'];
	$h = $_POST['dob'];
	$i = $_POST['password'];
	$j = $_POST['location'];

	//$re_p = $_POST['password-re'];
	// // echo 'U: '.$u.', E: '.$e.', P: '.$p;exit;
	// if ($p != $re_p) {
	// 	echo '<script type="text/javascript">alert("Password & Confirm Password don\'t match.");</script>';
	// }

	$sql = "UPDATE `register` SET `bloodtype`='$a', `user_type`='$c', `firstname`='$d', `lastname`='$e', `email`='$f', `contact`='$g', `dob`='$h', `password`=md5('$i'), `location`='$j' WHERE `reg_id`='$user_id';";
	// echo $sql;exit;

// Create connection
require_once("DBConnect.php");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (mysqli_query($conn, $sql)) {
    // echo "Record updated successfully";
    echo "<script>window.location='list_reg.php';</script>";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

}
?>

<div style="border: 2px solid; border-color: black; height: 100%; margin:0 10%; " >
	 <?php include('header.php');?>

	</div>

	<div style="border: 2px solid; border-color: black; min-height: 570px; margin:0 10%; ">
		<div>	
		<p><a href="../index.php">Home</a> <a href="index.php">>> DashBoard</a> >> Blood Type >> Edit User</p>
		</div>
		<div style="margin-left: 16%;">
<form action="" method="POST" name="user">
	<h1 style="font-size: 20px;">Edit User #<?= $prev_data['reg_id'];?></h1>
<table id="adduser">
	<tr>
		<td>First Name:</td>
		<td><input type="text" name="firstname"  required="required" value="<?= $prev_data['firstname'];?>"></td>
	
		<td>Last Name:</td>
		<td><input type="text" name="lastname"  required="required" value="<?= $prev_data['lastname'];?>"></td>
	</tr>
	<tr>
		<td>User Type:</td>
		<td>
			<select required="required" name="user_type" title="Choose Usertype">
					<option value="regular">Regular</option>
					<option value="member">Memeber</option>
				</select>
				Previous: <?= $prev_data['user_type'];?>
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
				Previous: <?= $prev_data['location'];?>
		</td>
	</tr>
	<tr>
		<td>Phone:</td>
		<td><input type="number" name="contact" required="required" value="<?= $prev_data['contact'];?>"></td>

		<td>Email:</td>
		<td><input type="email" name="email" required="required" value="<?= $prev_data['email'];?>" ></td>
	</tr>
	<tr>
		<td>Date of Birth:</td>
		<td><input type="date" name="dob" required="required" value="<?= $prev_data['dob'];?>" ></td>
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
				Previous: <?= $prev_data['bloodtype'];?>
		</td>
	</tr>
	<tr>
		<td>Enter Password:</td>
		<td><input type="password" name="password" placeholder="Enter password" required="required"></td>
	</tr>
	
	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" name="add_user" value="UPDATE"></td>
	</tr>
</table>
</form>

</div>
</div>
<?php include('footer.php');?>
</body>
</html>