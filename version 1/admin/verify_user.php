<?php include 'session.php';?>
	<?php
$u=$_SESSION['username'];

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
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body style="background-color: #ececec;">

<?php
$user_id = @$_GET['regid'];
if (!isset($user_id)) {
	echo "<script>window.location='list_user.php';</script>";
}
$user_id = @$_GET['regid'];

$b=$_SESSION['username'];
$sql = "SELECT id FROM user WHERE `username`='$b';";
$result = $conn-> query($sql);
$row = $result-> fetch_assoc();

$a=$row['id'];


	$sql1 = "UPDATE `user` SET `verifiedby_id`='$a',`status`='1',`is_verified`='1' WHERE `id`='$user_id';";

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (mysqli_query($conn, $sql1)) {
    // echo "Record updated successfully";
    echo "<script>window.location='list_user.php';</script>";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}


?>

</body>
</html>