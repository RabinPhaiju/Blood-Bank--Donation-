<?php
if(empty($_SESSION)){
	session_start();
}



unset($_SESSION['username']);
unset($_SESSION['reg_id']);
setcookie ("login","");
session_destroy();
echo "<script>window.location='../index.php';</script>";
exit;
?>