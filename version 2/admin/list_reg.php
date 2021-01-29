<?php include 'session.php';?>
<!DOCTYPE html>
<html>
<head>
	<title>BackEnd-List Registration</title>
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
		  padding: 8px;
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
		#img img:hover{
			transition: 0.15s; 
		transform: scale(3);
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

$sql = "SELECT * FROM `register` WHERE 1 Limit 0, 20";
$result = mysqli_query($conn, $sql);
// $data = mysqli_num_rows($result);
// echo "<pre>"; print_r($result); exit();
?>
<div style="border: 2px solid; border-color: black; height: 100%;">
		<?php include('header.php');?>
	</div>

	<div style="border: 2px solid; border-color: black; min-height: 570px;" >
		<div>	
		<p><a href="../index.php">Home</a> <a href="index.php">>> DashBoard</a> >> Register >> List Registered</p>
		</div>
		<div id="img" style="margin-left: 2px; margin-top: -35px;">
		    <?php
$u=$_SESSION['username'];
require_once("DBConnect.php");
$sql5 = "SELECT usertype from `user` where `username`='$p'";
$rresult=mysqli_query($conn,$sql5);
$rrow = mysqli_fetch_assoc($rresult);
$usertype=$rrow["usertype"];
if($usertype!="staff"){
	?>
<a style="margin-left: 29%; float: left;" href="add_reg.php"><img src="images/add.png" height="50px"> </a>
<?php } else echo "<br>" ?>

<form method="POST" action="list_reg.php">
	<input type="text" name="username" placeholder="Enter Username">
	<input type="submit" name="submit" value="Search">
</form>
<?php
if($usertype!="staff"){
	?>
<br>
<br>
<?php } ?>
<hr>
<table border="1" cellspacing="0" cellpadding="20" id="body">

	<tr>
		<th>S.N</th>
		<th>Blood Type</th>
		<th>User Name</th>
        <th>Profile</th>
        <th>Name</th>
        <th>Email</th>
        <th>Contact</th>
        <th>DOB</th>
        <th>Created at</th>
        <th>Updated at</th>
        <th>Verified</th>
        <th>Verified by</th>
        <th>Status</th>
        <th>Key</th>
        <?php
if($usertype!="staff"){
	?>
		<th>Action</th>
		<?php } ?>
	</tr>

<?php
if (isset($_POST['submit'])) {
			$na=$_POST['username'];
		if (mysqli_num_rows($result) > 0) {
    		$i=0;
    		while($row = mysqli_fetch_assoc($result)) {
    				if ($row['username']==$na) {
    				?>
				<tr>
		<td><?= ++$i;?></td>
		<td><?= $row["bloodtype"];?></td>
		<td><?= $row["username"];?></td>
    <td><?php
        $check=$row["pic"];
        if($check==NULL){
            $filepath="../files/profile.png";
        echo "<img src=".$filepath." height=30 />";
        }
        else{
         $filepath="../files/".$row["pic"];
        echo "<img src=".$filepath." height=30 />";
        }
        ?>
    </td>
        <td><?= $row["firstname"];?> <?= $row["lastname"];?></td>
        <td><?= $row["email"];?></td>
		<td><?= $row["contact"];?></td>
        <td><?= $row["dob"];?></td>
        <td><?= $row["created_at"];?></td>
		<td><?= $row["updated_at"];?></td>
        <td><?= $row["verified"];?></td>
        <td><?= $row["verifiedby_id"];?></td>
		<td><?= $row["status"];?>.<?= $row["show_bloodtype"];?></td>
        <td><?= $row["secret_key"];?></td>
        <?php
        if($usertype!="staff"){
	?>
		<td><a href="edit_reg.php?regid=<?= $row['reg_id'];?>"><i class="fa fa-pencil" aria-hidden="true"></i></a> | 
		<a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete_reg.php?regid=<?= $row['reg_id'];?>"><i style="color: red;" class="fa fa-trash" aria-hidden="true"></i></a>
		|<a href="verify_reg.php?regid=<?= $row['reg_id'];?>">verify</a></td>
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
		<td><?= $row["bloodtype"];?></td>
		<td><?= $row["username"];?></td>
    <td><?php
        $check=$row["pic"];
        if($check==NULL){
            $filepath="../files/profile.png";
        echo "<img src=".$filepath." height=30 />";
        }
        else{
         $filepath="../files/".$row["pic"];
        echo "<img src=".$filepath." height=30 />";
        }
        ?>
    </td>
        <td><?= $row["firstname"];?> <?= $row["lastname"];?></td>
        <td><?= $row["email"];?></td>
		<td><?= $row["contact"];?></td>
        <td><?= $row["dob"];?></td>
        <td><?= $row["created_at"];?></td>
		<td><?= $row["updated_at"];?></td>
        <td><?= $row["verified"];?></td>
        <td><?= $row["verifiedby_id"];?></td>
			<td><?= $row["status"];?>.<?= $row["show_bloodtype"];?></td>
        <td><?= $row["secret_key"];?></td>
         <?php
        if($usertype!="staff"){
	?>
		<td><a href="edit_reg.php?regid=<?= $row['reg_id'];?>"><i class="fa fa-pencil" aria-hidden="true"></i></a> | <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete_reg.php?regid=<?= $row['reg_id'];?>"><i style="color: red;" class="fa fa-trash" aria-hidden="true"></i></a> | <a href="verify_reg.php?regid=<?= $row['reg_id'];?>">verify</a></td>
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