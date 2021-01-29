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
$id = @$_GET['id'];
if (!isset($id)) {
	echo "<script>window.location='add_file.php';</script>";
}
// Create connection
require_once("DBConnect.php");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT title as filename FROM `file` WHERE `id` = '$id';";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
	$row = mysqli_fetch_assoc($result);
	// echo $row['filename']; echo "<pre>"; print_r($row);exit;
	$sql = "DELETE FROM `file` WHERE id='$id';";

	if (mysqli_query($conn, $sql)) {
	    // echo "Record deleted successfully";
	    $myFile = "../files/".$row['filename'];
		unlink($myFile) or die("Couldn't delete file");
        echo "<script>window.location='add_file.php';</script>";
	} else {
	    echo "Error deleting record: " . mysqli_error($conn);
	}
}
?>