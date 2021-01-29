<?php
// echo $_COOKIE["member_login"];exit;
if(empty($_SESSION)) // if the session not yet started
   session_start();

if(!isset($_SESSION['username'])) { 
	echo "<script>window.location='login.php';</script>";
	exit;
}
$p=$_SESSION['username']; 
// this $p is used in other pages, where $u is usded.
require_once("DBConnect.php");
	if($conn-> connect_error){
		die("Connection failed:". $conn-> connect_error);
	}
	$sql = "SELECT username from `user` where `username`='$p'";
	$result1 = $conn-> query($sql);
	if($result1-> num_rows ==0){
echo "<script>window.location='login.php';</script>";
	exit;

	}
?>