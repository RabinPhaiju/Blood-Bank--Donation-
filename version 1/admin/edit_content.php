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
	<title>BackEnd-Edit Content</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="../images/logo.png">
	
	<style type="text/css">
		input{
			width: 80%;
			background-color: lightgray;
			color: black;
			padding: 10px 20px;
			margin: 20px 0px 10px 0px;
			border: none;
			cursor: pointer;
		}
		input[type=submit]{
			width: 40%;
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
	</style>
</head>
<body style="background-color: #ececec;">

<?php
$user_sn = @$_GET['sn'];
if (!isset($user_sn)) {
	echo "<script>window.location='list_content.php';</script>";
}
//Load old data
require_once("DBConnect.php");
$sql = "SELECT * FROM `content` WHERE `id`='$user_sn' Limit 0, 10";
$result = mysqli_query($conn, $sql);
$prev_data = mysqli_fetch_assoc($result);

if (isset($_POST['add_user'])) {
	$user_sn = $_GET['sn'];
	// echo "$user_id";exit();
	$a = $_POST['title'];
	$c = $_POST['description'];

	$sql = "UPDATE `content` SET `title`='$a', `description`='$c' WHERE `id`='$user_sn';";
	// echo $sql;exit;
	
// Create connection
require_once("DBConnect.php");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (mysqli_query($conn, $sql)) {
    // echo "Record updated successfully";
    echo "<script>window.location='list_content.php';</script>";
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
		<p><a href="../index.php">Home</a> <a href="index.php">>> DashBoard</a> >> Content >> Edit Content</p>
		</div>
		<div style="margin-left: 32%;">
<form action="" method="POST" name="user">
	<p style="font-size: 27px;">Edit content #<?= $prev_data['id'];?></p>
<table id="adduser">
	<tr>
		<td>Title:</td>
		<td><input type="text" name="title" value="<?= $prev_data['title'];?>" required="required"></td>
	</tr>
	<tr>
		<td>Description:</td>
		<td>
			<textarea name="description" id="editor" rows="15"  cols="70" required="required">
				<?= $prev_data['description'];?>
			</textarea>
		</td>
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