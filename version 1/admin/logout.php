<?php
if(empty($_SESSION)){
	session_start();
}
unset($_SESSION['username']);
unset($_SESSION['u_id']);
setcookie ("member_login","");
session_destroy();

	 echo "<script>window.location='login.php';</script>";
exit;
?>