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
<?php
$user_sn = @$_GET['sn'];
if (!isset($user_sn)) {
	echo "<script>window.location='list_user.php';</script>";
}
 
require_once('DBConnect.php');
$sql = "DELETE FROM `user` WHERE id='$user_sn';";

if (mysqli_query($conn, $sql)) {
    // echo "Record deleted successfully";
    echo "<script>window.location='list_user.php';</script>";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}