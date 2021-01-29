<?php include 'session.php';?>
<!DOCTYPE html>
<html>
<head>
	<title>Raktasanchar Backend</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="shortcut icon" href="../images/logo.png">
	<style type="text/css">
		a{
			text-decoration: none;
		}
		img:hover{
			transition: 0.2s; 
			transform: scale(1.15);
		}
	</style>
</head>
<body style="background-color: #ececec;">

<div style="border: 2px solid; border-color: black; height: 100%; margin:0 10%; " >
		<?php include('header.php');?>
	</div>
	<?php
$u=$_SESSION['username'];
require_once("DBConnect.php");
$sql5 = "SELECT usertype from `user` where `username`='$p'";
$rresult=mysqli_query($conn,$sql5);
$rrow = mysqli_fetch_assoc($rresult);
$usertype=$rrow["usertype"];

if($usertype=="staff"){
	?>
	<div style="border: 2px solid; border-color: black; min-height: 420px; margin:0 10%; " >
		<div>	
		<p><a href="../index.php">Home</a> <a href="index.php">>> DashBoard</a></p>
		</div>
		<div id="message" style="float: left; width: 11%; margin-left: 40px;">
			<fieldset style="border-radius: 5px; width: 100%;">
				<legend>Contact Message</legend>
			<a title="View Message" style=" float: left;" href="list_message.php"><img src="images/contact.png" height="100px"></a>
				</fieldset>
		</div>
		<div id="Register" style="float: left; width: 11%;margin-left: 40px;">
			<fieldset style="border-radius: 5px; width: 100%;">
				<legend>Register</legend>
			<a title="List User" style="float: left; margin-left:10px;" href="list_reg.php"><img src="images/list.png" height="100px"></a>
				</fieldset>
		</div>
		<div id="User" style="float: left; width: 11%;margin-left: 40px;">
			<fieldset style="border-radius: 5px; width: 100%;">
				<legend>User</legend>
			<a title="List User" style="float: left;margin-left:10px;" href="list_user.php"><img src="images/listuser.png" height="100px"></a>
				</fieldset>
		</div>
		<div id="Content" style="float: left; width: 11%;margin-left: 40px;">
			<fieldset style="border-radius: 5px; width: 100%;">
				<legend>Content</legend>
			<a title="List" style="float: left;margin-left:10px;" href="list_content.php"><img src="images/listcontent.png" height="100px"></a>
				</fieldset>
		</div>
		<div id="File" style="float: left; width: 11%;margin-left: 40px;">
			<fieldset style="border-radius: 5px; width: 100%;">
				<legend>Files</legend>
			<a title="Add" style="float: left;" href="add_file.php"><img src="images/folder.png" height="100px"></a>
				</fieldset>
		</div>	
</div>
<?php
}
if($usertype=="manager" || $usertype=="admin"){
	?>
<div style="border: 2px solid; border-color: black; min-height: 420px; margin:0 10%; " >
		<div>	
		<p><a href="../index.php">Home</a> <a href="index.php">>> DashBoard</a></p>
		</div>
		<div id="message" style="float: left; width: 11%; margin-left: 40px;">
			<fieldset style="border-radius: 5px; width: 100%;">
				<legend>Contact Message</legend>
			<a title="View Message" style=" float: left;" href="list_message.php"><img src="images/contact.png" height="100px"></a>
				</fieldset>
		</div>
		<div id="Register" style="float: left; width: 22%;margin-left: 40px;">
			<fieldset style="border-radius: 5px; width: 100%;">
				<legend>Register</legend>
			<a title="Add User" style="float: left;" href="add_reg.php"><img src="images/add.png" height="100px"></a>
			<a title="List User" style="float: left; margin-left:10px;" href="list_reg.php"><img src="images/list.png" height="100px"></a>
				</fieldset>
		</div>
		<div id="User" style="float: left; width: 22%;margin-left: 40px;">
			<fieldset style="border-radius: 5px; width: 100%;">
				<legend>User</legend>
			<a title="Add User" style="float: left;" href="add_user.php"><img src="images/adduser.png" height="100px"></a>
			<a title="List User" style="float: left;margin-left:10px;" href="list_user.php"><img src="images/listuser.png" height="100px"></a>
				</fieldset>
		</div>
		<div id="Content" style="float: left; width: 22%;margin-left: 40px;">
			<fieldset style="border-radius: 5px; width: 100%;">
				<legend>Content</legend>
			<a title="Add" style="float: left;" href="add_content.php"><img src="images/addcontent.png" height="100px"></a>
			<a title="List" style="float: left;margin-left:10px;" href="list_content.php"><img src="images/listcontent.png" height="100px"></a>
				</fieldset>
		</div>
		<div id="File" style="float: left; width: 11%;margin-left: 40px;">
			<fieldset style="border-radius: 5px; width: 100%;">
				<legend>Files</legend>
			<a title="Add" style="float: left;" href="add_file.php"><img src="images/folder.png" height="100px"></a>
				</fieldset>
		</div>	
</div>
<?php } ?>
<?php include('footer.php');?>
</body>
</html>