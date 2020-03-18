<?php
// echo $_COOKIE["member_login"];exit;
if(empty($_SESSION)) // if the session not yet started
   session_start();
if(isset($_SESSION['usergoogle']) || isset($_SESSION['username']) ){
    if(isset($_SESSION['usergoogle'])){
        $p=$_SESSION['usergoogle'];
        $fn= $_SESSION['givenName'];
        $ln=$_SESSION['familyName'];
        $n="null";
        require_once('DBConnect.php');
        $sql = "SELECT email from `register` where `email`='$p'";
        $result2 = $conn-> query($sql);
        if($result2-> num_rows ==0){
            require_once('DBConnect.php');
            $sql1 ="INSERT INTO `register`(`username`,`firstname`,`lastname`,`email`,`password`,`verified`,`status`) VALUES ('$n','$fn','$ln','$p','$n','1','1')";
            if(mysqli_query($conn1, $sql1)){
            }
        }
        
    } 
else{
$p=$_SESSION['username'];
require_once('DBConnect.php');
if($conn-> connect_error){
 		die("Connection failed:". $conn-> connect_error);
 	}
 	$sql = "SELECT username from `register` where `username`='$p'";
 	$result2 = $conn-> query($sql);
 	if($result2-> num_rows ==0){
echo "<script>window.location='login.php';</script>";
	exit();

	}
}}
else{
       echo "<script>window.location='login.php';</script>";
	exit();

}
?>