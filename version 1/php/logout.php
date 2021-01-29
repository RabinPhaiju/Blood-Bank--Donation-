<?php
if(empty($_SESSION)){
	session_start();
}
require_once"config.php";
unset($_SESSION['usergoogle']);
$gClient->revokeToken();
unset($_SESSION['username']);
unset($_SESSION['reg_id']);
setcookie ("login","");
session_destroy();
echo "<script>window.location='../index.php';</script>";
exit;
?>