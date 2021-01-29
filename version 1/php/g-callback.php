<?php
if(empty($_SESSION)) // if the session not yet started
   session_start();
require_once "config.php";
if(isset($_SESSION['access_token']))
$gClient->setAccessToken($_SESSION['access_token']);
else if(isset($_GET['code'])){
    $token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
    $_SESSION['access_token']=$token;
}
else{
    echo "<script>window.location='login.php';</script>";
}


$oAuth = new Google_Service_Oauth2($gClient);
$userData = $oAuth->userinfo_v2_me->get();

$_SESSION['usergoogle'] = $userData['email'];
$_SESSION['givenName'] = $userData['givenName'];
$_SESSION['familyName'] = $userData['familyName'];

echo "<script>window.location='index.php';</script>";
exit();

?>