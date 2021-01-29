<?php
require_once "googleapi/vendor/autoload.php";
$gClient = new Google_Client();
$gClient->setClientId("110152955446-ocgqf2ild6fb1fijdufpjuamfr8vuo5j.apps.googleusercontent.com");
$gClient->setClientsecret("6ejZegsUNOzJa1tfkkvKpgy1");
$gClient->setApplicationName("Nepal Raktasanchar");
$gClient->setRedirectUri("http://nepalraktasanchar.000webhostapp.com/php/g-callback.php");
$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");

?>