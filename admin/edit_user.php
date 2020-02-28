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
	<title>BackEnd-Edit User</title>
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
$user_sn = @$_GET['sn'];
if (!isset($user_sn)) {
	echo "<script>window.location='list_user.php';</script>";
}
//Load old data
require_once("DBConnect.php");
$sql = "SELECT * FROM `user` WHERE `id`='$user_sn' Limit 0, 10";
$result = mysqli_query($conn, $sql);
$prev_data = mysqli_fetch_assoc($result);
// echo "<pre>"; print_r($prev_data);exit;


if (isset($_POST['add_user'])) {
	$user_sn = $_GET['sn'];
	// echo "$user_id";exit();
	$a = $_POST['name'];
	$c = $_POST['email'];
	$d = $_POST['phone'];
	$e = $_POST['address'];
	$f = $_POST['password'];
	$g = $_POST['remarks'];
	$h = $_POST['date'];
	//$re_p = $_POST['password-re'];
	// // echo 'U: '.$u.', E: '.$e.', P: '.$p;exit;
	// if ($p != $re_p) {
	// 	echo '<script type="text/javascript">alert("Password & Confirm Password don\'t match.");</script>';
	// }

	$sql = "UPDATE `user` SET `name`='$a', `email`='$c', `phone`='$d', `address`='$e',`password`=md5('$f'),`remarks`='$g',`dob`='$h' WHERE `id`='$user_sn';";
	// echo $sql;exit;

// Create connection
require_once("DBConnect.php");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (mysqli_query($conn, $sql)) {
    // echo "Record updated successfully";
    echo "<script>window.location='list_user.php';</script>";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

}
?>

<div style="border: 2px solid; border-color: black; height: 100%; margin:0 10%; " >
	<?php include('header.php');?>
	</div>

	<div style="border: 2px solid; border-color: black; min-height: 570px; margin:0 10%; " >
		<div>	
		<p><a href="../index.php">Home</a> <a href="index.php">>> DashBoard</a> >> Edit User</p>
		</div>
		<div style="margin-left: 32%;">
<form action="" method="POST" name="user">
	<p style="font-size: 27px;">Edit User #<?= $prev_data['id'];?></p>
<table id="adduser">
	<tr>
		<td>Name:</td>
		<td><input type="text" name="name" placeholder="Enter Name" required="required" value="<?= $prev_data['name'];?>"></td>
	
		<td>Email:</td>
		<td><input type="email" name="email" placeholder="Enter Email" required="required" value="<?= $prev_data['email'];?>"></td>
	</tr>
	<tr>
		<td>Phone:</td>
		<td><input type="number" name="phone" placeholder="Enter Phone" required="required" value="<?= $prev_data['phone'];?>"></td>
		<td>Address:</td>
		<td><input type="text" name="address" placeholder="Enter Address" required="required" value="<?= $prev_data['address'];?>"></td>
	</tr>
	<tr>
		<td>Date of Birth:</td>
		<td><input type="date" name="date" required="required"></td>
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
		<td><input type="submit" name="add_user" value="UPDATE"></td>
	</tr>
</table>
</form>

</div>
</div>
<?php include('footer.php');?>
</body>
</html>