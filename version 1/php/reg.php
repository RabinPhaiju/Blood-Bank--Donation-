<?php
error_reporting(E_ALL ^ E_NOTICE);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Raktasanchar Registration</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	 <link rel="stylesheet" type="text/css" href="../css/reg.css">
	 <link rel="stylesheet" type="text/css" href="../css/progressbar.css">
	 <link rel="stylesheet" type="text/css" href="../css/sidenavbar.css">
	 <link rel="shortcut icon" href="../images/logo.png">

	<style>
		#content{
			background-color: #a1a1a1;
			height: 100%;
			text-align: justify;
		}
	</style>
</head>
<body style="background-image: linear-gradient(#607aa0, #33708f);">
	<?php include('../html/sidenavbar1.html');?>
	<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-up fa-2x" aria-hidden="true"></i></button>
<?php include('../html/progressbar.html');?>
<?php include('../html/navbar1.html');?>
<?php include('../html/iconbar.html');?>

	<div id="wrapper">
<?php include('../html/animation.html');?>

<div id="body" style="padding-top: 6px; padding-left: 2px; margin-top: 115px;">
    <?php
    if(isset($_POST['submitreg'])) {
    
$aa=$_POST['username'];
$a=strtolower($aa);
$b=$_POST['firstname'];
$c=$_POST['lastname'];
$dd=$_POST['email'];
$at=strpos($dd,"@");
$dot=strrpos($dd,".");
$leng=strlen($dd);
$d=strtolower($dd);
$e=$_POST['pass'];
$lenp=strlen($e);
$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $k = '';
        $k[0] = $characters[rand(0, strlen($characters))];
        $k[1] = $characters[rand(0, strlen($characters))];
        $k[2] = $characters[rand(0, strlen($characters))];
        $k[3] = $characters[rand(0, strlen($characters))];
        $k[4] = $characters[rand(0, strlen($characters))];
        $k[5] = $characters[rand(0, strlen($characters))];
        
$type1=$_POST['type'];
$retype1=$_POST['retype'];
require_once("DBConnect.php");

    $sql_u = "SELECT * FROM register WHERE username='$a'";
  	$sql_e = "SELECT * FROM register WHERE email='$d'";
  	$res_u = mysqli_query($conn, $sql_u);
  	$res_e = mysqli_query($conn, $sql_e);
  	
if (mysqli_num_rows($res_u) > 0) {
  	  $name_error = "Sorry... username already taken"; 	
  	}
 else if (!preg_match('/^[a-zA-Z]+[a-zA-Z0-9._]+$/', $a)) {
    $name1_error = "Sorry... username is not valid"; 
}
 else if(mysqli_num_rows($res_e) > 0){
  	  $email_error = "Sorry... email already taken"; 	
  	}
 else if( $at<4 || $at>$dot || ($dot-$at)<3 || $leng==$dot || ($leng-$dot)<3){
    $email1_error = "Enter valid Email address."; 
 }
 else if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $d)) {
	 $email1_error = "Enter valid Email address.";
}
else if($type1!=$retype1){
     $type_error="Not match";
 }
 else if($lenp<6){
     $pass_error = "Weak Password"; 
 }
else{
        $sql = "INSERT INTO `register` (`username`,`firstname`,`lastname`,`email`,`password`,`secret_key`) VALUES ('$a', '$b','$c','$d',md5('$e'),'$k')";

	
	if(mysqli_query($conn, $sql)){
			$to = $d;
			$subject = "Registration Successfull";
			$message = "Thank you  $b  $c for registering Raktasanchar. Use this key  $k  to verify your email.";
			$headers = "From: raktasanchar@gmail.com";
			if(mail($to,$subject,$message,$headers)){
			 
			 
			}
			else{
			    echo "Error2";
			}
		}
		else{
			echo "Error1";
		}
		mysqli_close($conn);
	}}  ?>
	<?php if(!isset($to)){ ?>
	<div id="reg">
  <div id="change">
    <a href="login.php">Login</a><a style=" background-color: #1ab188;" href="reg.php">Resgister</a>
  </div>
  <div id="logtext">
      <p style="margin:10px 0 -5px 0;">Sign Up for Free</p>
  </div>
  <div id="form">
    <form method="POST" action="">
      <input type="text" name="username" placeholder="Username*" value="<?php if(isset($aa)){echo $aa;} ?>" required="required">
      <?php if (isset($name_error)): ?>
      <br>
	  	<span style="color:red; margin-bottom:-4px;"><?php echo $name_error; ?></span>
	  <?php endif ?>
	  <?php if (isset($name1_error)): ?>
      <br>
	  	<span style="color:red; margin-bottom:-4px;"><?php echo $name1_error; ?></span>
	  <?php endif ?>
    <br><br>
    <input type="text" name="firstname" placeholder="First name*" value="<?php if(isset($b)){echo $b;} ?>" required="required">
    <input type="text" name="lastname" placeholder="Last name*" value="<?php if(isset($c)){echo $c;} ?>" required="required">
    <br>
    <br>
    
    <input type="email" name="email" placeholder="Email Address*" value="<?php if(isset($dd)){echo $dd;} ?>" required="required">
    <?php if (isset($email_error)): ?>
      <br>
	  	<span style="color:red; margin-bottom:-4px;"><?php echo $email_error; ?></span>
	  <?php endif ?>
	  <?php if (isset($email1_error)): ?>
      <br>
	  	<span style="color:red; margin-bottom:-4px;"><?php echo $email1_error; ?></span>
	  <?php endif ?>
    <br><br>
    <?php
    $characterss = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $ran = '';
        $ran[0] = $characterss[rand(1, strlen($characterss))];
        $ran[1] = $characterss[rand(1, strlen($characterss))];
        $ran[2] = $characterss[rand(1, strlen($characterss))];
        $ran[3] = $characterss[rand(1, strlen($characterss))];
        $ran[4] = $characterss[rand(1, strlen($characterss))];
        $ran[5] = $characterss[rand(1, strlen($characterss))];
    ?>
    <input type="text" name="type" value="<?php echo $ran ?>" readonly>
    <input type="text" name ="retype" required>
     <?php if (isset($type_error)): ?>
      <br>
	  	<span style="color:orange; margin-bottom:-4px;"><?php echo $type_error; ?></span>
	  <?php endif ?>
    <br><br>
    <input type="password" name="pass" placeholder="Set a Password*" required="required">
    <?php if (isset($pass_error)): ?>
      <br>
	  	<span style="color:orange; margin-bottom:-4px;"><?php echo $pass_error; ?></span>
	  <?php endif ?>
    <br><br>
    <input type="submit" value="Resgister" name="submitreg">
  </form>
  </div>
</div>
<?php } else {?>
<div id="reg">
    <h3 style="margin:10px 0 -5px 0; color:white;"><br> Registered successfully .</h3>
    <h3 style="margin:10px 0 -5px 0; color:white;"><br> Check your Email for Verification.</h3>
    </div>
    <?php } ?>
</div>

</body>
</html>