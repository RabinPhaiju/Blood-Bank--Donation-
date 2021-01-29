<?php include 'session.php';?>
<!DOCTYPE html>
<html>
<head>
	<title>BackEnd-List Content</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="../images/logo.png">
	<style>
		table {
			margin-top: 12px;
		  font-family: arial, sans-serif;
		  border-collapse: collapse;
		 
		}
		td, th {
		  border: 0px solid #dddddd;
		  padding: 2px;
		}
		tr:nth-child(even) {
		  background-color: #dddddf;
		}
		td{
			font-size: 12px;
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

$sql = "SELECT * FROM `content` WHERE 1 Limit 0, 20";
$result = mysqli_query($conn, $sql);
?>
<div style="border: 2px solid; border-color: black; height: 100%; margin:0 5%; " >
		<?php include('header.php');?>
	</div>

	<div style="border: 2px solid; border-color: black; min-height: 570px; margin:0 5%; " >
		<div>	
		<p><a href="../index.php">Home</a> <a href="index.php">>> DashBoard</a> >> Manage Content</p>
		</div>
	<div style="margin-left: 1%; margin-top: -35px;">
 <?php
$u=$_SESSION['username'];
require_once("DBConnect.php");
$sql5 = "SELECT usertype from `user` where `username`='$p'";
$rresult=mysqli_query($conn,$sql5);
$rrow = mysqli_fetch_assoc($rresult);
$usertype=$rrow["usertype"];
if($usertype!="staff"){
	?>
<a style="margin-left: 29%; float: left;" href="add_content.php"><img src="images/addcontent.png" height="50px"> </a>
<?php } else echo "<br>" ?>
<b style="font-size: 27px;">Add Content</b>
<br>
<form method="POST" action="list_content.php">
	<input type="text" name="name1" placeholder="Enter title...">
	<input type="submit" name="submit" value="Search">
</form>
<br>
<table border="1" cellspacing="0" cellpadding="20" width="98%">

	<tr>
		<th>S.N.</th>
		<th>Title</th>
		<th style="width: 60%;">Description</th>
		<th>Created At</th>
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
    				if ($row['title']==$na) {
    				?>
				<tr>
					<td><?= ++$i;?></td>
			<td><?= $row["title"];?></td>
		<td style="text-align: justify;"><?= $row["description"];?></td>
		<td><?= $row["created_at"];?></td>
		 <?php
        if($usertype!="staff"){
	?>
					<td><a href="edit_content.php?sn=<?= $row['id'];?>"><i class="fa fa-pencil" aria-hidden="true"></i></a> | <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete_content.php?sn=<?= $row['id'];?>"><i style="color: red;" class="fa fa-trash" aria-hidden="true"></i></a></td>
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
			<td><?= $row["title"];?></td>
		<td><?= $row["description"];?></td>
		<td><?= $row["created_at"];?></td>
			 <?php
        if($usertype!="staff"){
	?>
					<td><a href="edit_content.php?sn=<?= $row['id'];?>"><i class="fa fa-pencil" aria-hidden="true"></i></a> | <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete_content.php?sn=<?= $row['id'];?>"><i style="color: red;" class="fa fa-trash" aria-hidden="true"></i></a></td>
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