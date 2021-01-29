<?php
session_start();
?>
<?php
if(isset($_POST['submit'])){
$username=$_POST['username'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$message=$_POST['message'];
$type1=$_POST['type'];
$retype1=$_POST['retype'];
$lenp=strlen($phone);

if (!preg_match('/^[a-zA-Z]+[a-zA-Z0-9._]+$/', $username)) {
    $name_error = "Sorry...name is not valid"; 
}
else if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $email)) {
	 $email_error = "Enter valid Email address.";
}
else if($lenp<10){
     $phone_error = "Phone number must be 10 digits"; 
 }
 else if($type1!=$retype1){
     $type_error="Not match";
 }
else{
	require_once("DBConnect.php");
	if(!$conn){
	    echo "connection fail";
	}
    $sql = "INSERT INTO `contactus` (`name`,`email`,`phone`,`message`) VALUES('$username','$email','$phone','$message')";
	if(isset($_POST['submit'])) {
	    
		if(mysqli_query($conn,$sql)){
			
			$to = "raktasanchar@gmail.com";
			$subject = " Message from ".$username." --phone ".$phone;
			$messages = "Message: ".$message;
			$headers = "From:".$email;
			if(mail($to,$subject,$messages,$headers)){
			    $to=$email;
			    $subject = "Your messsage is received";
			    $messages = "Your message is: ".$message;
			    $headers = "From: raktasanchar@gmail.com";
			    mail($to,$subject,$messages,$headers);
			 echo "<script>alert('Message sent') </script>";
			 echo "<script>window.location='../index.php'</script>";
			}
			
			
		}
		else{
			echo "Error1";
		}
	}
	else{
		echo "Error2";
	}
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Contact Raktasanchar</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/progressbar.css">
	<link rel="stylesheet" type="text/css" href="../css/sidenavbar.css">
	<link rel="shortcut icon" href="../images/logo.png">
	<style>
		#content{
			height: 100%;
			text-align: justify;
			margin-left:-6px;
		}
		#side{
		    margin-left:-20px;
		}
	</style>
</head>
<body style="background-image: linear-gradient(#b7c3d4, #a2a2a7); background-repeat: no-repeat;">
	<?php include('../html/sidenavbar1.html');?>
	<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-up fa-2x" aria-hidden="true"></i></button>
<?php include('../html/progressbar.html');?>
<?php include('../html/navbar1.html');?>	
<?php include('../html/iconbar.html');?>

	<div id="wrapper">
<div id="body" style="padding-top: 6px; padding-left: 2px; margin-top: 115px;">
	<div id="content" style="float:left; text-align: center; margin-bottom: 10px;">
		<?php include('../html/contact_form.html');?>
	</div>
	<div id="side">
		<?php include('../html/bloodtype1.html');?>
		<?php include('../html/viewcontactus.html');?>
	</div>
</div>
<?php include('../html/scrollandtop.html');?>
<!--The div element for the map -->
<?php include('../html/google_map.html');?>
<?php include('../html/footer.html');?>
</div>
</body>
</html>