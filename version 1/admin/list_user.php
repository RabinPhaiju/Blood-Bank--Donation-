<?php include 'session.php';?>
<?php
if (isset($_GET['regidchange'])) {
$user_id = @$_GET['regidchange'];
require_once("DBConnect.php");
$sql = "SELECT usertype FROM `user` WHERE `id`='$user_id';";
$result = mysqli_query($conn, $sql);
$prev_data = mysqli_fetch_assoc($result);
$type=$prev_data['usertype'];
	if($type=="staff"){
		$sql = "UPDATE `user` SET `usertype`='manager' WHERE `id`='$user_id';";
	}
	else{
		$sql = "UPDATE `user` SET `usertype`='staff' WHERE `id`='$user_id';";
	}
	mysqli_query($conn,$sql);
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>BackEnd-List User</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="../images/logo.png">
	<style>
		#body table {
			margin-top: 15px;
		  font-family: arial, sans-serif;
		  border-collapse: collapse;
		  width: 100%;
		}
		#body td, #body th {
		  border: 0px solid #dddddd;
		  text-align: left;
		  padding: 4px;
		}
		#body tr:nth-child(even) {
		  background-color: #dddddd;
		}
		#body td{
			font-size: 14px;
		}
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
		select {
			width: 96%;
			padding: 7px 5px;
			margin: 8px 0;
			border-radius: 4px;
			background-color: lightgrey;
		}
		option{
			font-family: Arial;
			background-color: #5ca0c2;
			color: white;
		}
		a{
			text-decoration: none;
		}
	</style>
</head>
<body style="background-color: #ececec;">

<?php
// Create connection
require_once("DBConnect.php");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM `user` WHERE 1 Limit 0, 20";
$result = mysqli_query($conn, $sql);
// $data = mysqli_num_rows($result);
// echo "<pre>"; print_r($result); exit();
?>
<div style="border: 2px solid; border-color: black; height: 100%; margin:0 5%; " >
	<?php include('header.php');?>
	</div>

	<div style="border: 2px solid; border-color: black; min-height: 570px; margin:0 5%; " >
		<div>	
		<p><a href="../index.php">Home</a> <a href="index.php">>> DashBoard</a> >>User >> List</p>
		</div>
	<div style="margin-left: 5%; margin-top: -35px;">
<?php
$u=$_SESSION['username'];
require_once("DBConnect.php");
$sql5 = "SELECT usertype from `user` where `username`='$p'";
$rresult=mysqli_query($conn,$sql5);
$rrow = mysqli_fetch_assoc($rresult);
$usertype=$rrow["usertype"];
if($usertype!="staff"){
	?>
<a style="margin-left: 29%; float: left;" href="add_user.php"><img src="images/adduser.png" height="50px"> </a>
<?php } else echo "<br>" ?>
<b style="font-size: 27px;">User List</b>
<form method="POST" action="list_user.php">
	<input type="text" name="name1" placeholder="Enter name">
	<input type="submit" name="submit" value="Search">
</form>
<?php
if($usertype!="staff"){
	?>
<br>
<?php } ?>
<table border="1" cellspacing="2" id="body">

	<tr>
		<th>S.N.</th>
		<th>Name</th>
		<th>Username</th>
		<th>Usertype</th>
		      <?php
if($usertype!="staff"){
	?>
		<th>     </th>
		<?php } ?>
		<th>Email</th>
		<th>remarks</th>
		<th>created</th>
		<th>post By</th>
		<th>verified</th>
		<th>verified By</th>
		<th>updated</th>
		<th>status</th>
		      <?php
if($usertype!="staff"){
	?>
		<th>Action</th>
		<?php } ?>
	</tr>

<?php
if (isset($_POST['submit'])) {
			$na=$_POST['name1'];
		if (mysqli_num_rows($result) > 0) {
    		$i=0;
    		while($row = mysqli_fetch_assoc($result)) {
    				if ($row['name']==$na) {
    				?>
				<tr>
					<td><?= ++$i;?></td>
			<td><?= $row["name"];?></td>
		<td><?= $row["username"];?></td>
		<td><?= $row["usertype"];?></td>
		  <?php
        if($usertype!="staff"){
	?>
		<td>|<a href="?regidchange=<?= $row['id'];?>">change</a></td>
		<?php } ?>
		<td><?= $row["email"];?></td>
		<td><?= $row["remarks"];?></td>
		<td><?= $row["created_at"];?></td>
		<td><?= $row["postby_id"];?></td>
		<td><?= $row["is_verified"];?></td>
		<td><?= $row["verifiedby_id"];?></td>
		<td><?= $row["updated_at"];?></td>
		<td><?= $row["status"];?></td>
		  <?php
        if($usertype!="staff"){
	?>
					<td><a href="edit_user.php?sn=<?= $row['id'];?>"><i class="fa fa-pencil" aria-hidden="true"></i></a> | <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete_user.php?sn=<?= $row['id'];?>"><i style="color: red;" class="fa fa-trash" aria-hidden="true"></i></a>|<a href="verify_user.php?regid=<?= $row['id'];?>">verify</a></td>
					<?php } ?>
				</tr>

<?php
}}}}
else if (mysqli_num_rows($result) > 0) {
    // output data of each row
    //$user_list = mysqli_fetch_assoc($result);
    // echo "<pre>"; print_r($user_list);exit;
    $i=0;
    while($row = mysqli_fetch_assoc($result)) {
        // echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["email"]. "<br>";
    	{
?>
	<tr>
		<td><?= ++$i;?></td>
		<td><?= $row["name"];?></td>
		<td><?= $row["username"];?></td>
		<td><?= $row["usertype"];?></td>
		  <?php
        if($usertype!="staff"){
	?>
		<td>|<a href="?regidchange=<?= $row['id'];?>">change</a></td>
		<?php } ?>
		<td><?= $row["email"];?></td>
		<td><?= $row["remarks"];?></td>
		<td><?= $row["created_at"];?></td>
		<td><?= $row["postby_id"];?></td>
		<td><?= $row["is_verified"];?></td>
		<td><?= $row["verifiedby_id"];?></td>
		<td><?= $row["updated_at"];?></td>
		<td><?= $row["status"];?></td>
		  <?php
        if($usertype!="staff"){
	?>
					<td><a href="edit_user.php?sn=<?= $row['id'];?>"><i class="fa fa-pencil" aria-hidden="true"></i></a> | <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete_user.php?sn=<?= $row['id'];?>"><i style="color: red;" class="fa fa-trash" aria-hidden="true"></i></a>|<a href="verify_user.php?regid=<?= $row['id'];?>">verify</a></td>
					<?php } ?>
				</tr>

<?php
				}
    }	
} else {
    ?>
    <tr>
    	<td colspan="3">No Record(s) found.</td>
    </tr>
    <?php
}
?>
<?php 

?>
</table>
	</div>
</div>
<?php include('footer.php');?>
</body>
</html>