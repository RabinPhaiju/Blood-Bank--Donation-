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
$user_id = @$_GET['regid'];
if (!isset($user_id)) {
	echo "<script>window.location='list_reg.php';</script>";
}
 
require_once('DBConnect.php');
$sql = "DELETE FROM `register` WHERE reg_id='$user_id';";

if (mysqli_query($conn, $sql)) {
    // echo "Record deleted successfully";
    echo "<script>window.location='list_reg.php';</script>";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}