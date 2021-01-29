<?php include 'session.php';?>
<!DOCTYPE html>
<html>
<head>
	<title>BackEnd-List Message</title>
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
			font-size: 15px;
		}
		a{
			text-decoration: none;
		}
	</style>
</head>
<body style="background-color: #ececec;">

<?php
// Create connection

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM `contactus` WHERE 1 Limit 0, 20";
$result = mysqli_query($conn, $sql);
// $data = mysqli_num_rows($result);
// echo "<pre>"; print_r($result); exit();
?>
<div style="border: 2px solid; border-color: black; height: 100%; margin:0 10%; " >
		<?php include('header.php');?>
	</div>

	<div style="border: 2px solid; border-color: black; min-height: 570px; margin:0 10%; " >
		<div>	
		<p><a href="../index.php">Home</a> <a href="index.php">>> DashBoard</a> >>Contact Message</p>
		</div>
		<div style="margin-left: 10%; margin-top: -35px;">
<p style="font-size: 27px; margin-left: 300px; margin-bottom: -4px;">Contact List</p>
<table border="1" cellspacing="0" cellpadding="20" id="body">

	<tr>
		<th>S.N.</th>
		<th>Name</th>
		<th>Email</th>
        <th>Phone</th>
        <th>Message</th>
		<th>Post-at</th>
	</tr>

<?php

if (mysqli_num_rows($result) > 0) {
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
		<td><?= $row["email"];?></td>
        <td><?= $row["phone"];?></td>
        <td><?= $row["message"];?></td>
		<td><?= $row["post_at"];?></td>
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