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
	<title>BackEnd-Add Content</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="../images/logo.png">
	<style type="text/css">
		input[type=submit]{
			width: 30%;
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
if (isset($_POST['add_content'])) {
	$t = $_POST['title'];
	$d = $_POST['description'];

	$sql = "INSERT INTO `content` (`title`, `description`) VALUES 
	('$t', '$d')";
	
	require_once("DBConnect.php");

if (mysqli_query($conn, $sql)) {
    // echo "New record created successfully.";
    echo "<script>window.location='list_content.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}
?>

<div style="border: 2px solid; border-color: black; height: 100%; margin:0 10%; " >
		<?php include('header.php');?>
	</div>

	<div style="border: 2px solid; border-color: black; min-height: 470px; margin:0 10%; " >
		<div>	
		<p><a href="../index.php">Home</a> <a href="index.php">>> DashBoard</a> >> Add Content</p>
		</div>
		<div style="margin-left: 25%;">
<h1>New Content</h1>
<form action="" method="POST" name="content">
<table>
	<tr>
		<td>Title:</td>
		<td><input type="text" name="title" placeholder="Enter Title" required="required"></td>
	</tr>
	<tr>
		<td>Description:</td>
		<td>
			<textarea name="description" id="editor" rows="15"  cols="70" required="required"></textarea>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" name="add_content" value="ADD CONTENT"></td>
	</tr>
</table>
</form>
	</div>
</div>
<?php include('footer.php');?>
</body>
</html>