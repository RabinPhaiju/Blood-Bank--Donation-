<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="icon" href="img/Fevicon.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="../css/reg.css">
    <link rel="stylesheet" href="../vendors/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../vendors/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../vendors/linericon/style.css">
    <link rel="stylesheet" href="../vendors/owl-carousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="../vendors/owl-carousel/owl.carousel.min.css">
	<link rel="stylesheet" href="../css/magnific-popup.css">
	<link rel="stylesheet" type="text/css" href="../css/login.css">
    <link rel="stylesheet" href="../vendors/flat-icon/font/flaticon.css">

    <link rel="stylesheet" href="../css/style.css">
</head>
<?php include('animation.html');?>
<body style="background-color:lightgrey;">

    <!--================ Header Menu Area start =================-->
    <header class="header_area">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container box_1620">
                    <a class="navbar-brand logo_h" href="index.html"><img src="img/logo.png" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav justify-content-end">
                            <li class="nav-item"><a class="nav-link" href="../index.php">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="../about.php">About</a></li>
                            <li class="nav-item"><a class="nav-link" href="../whocandonate.php">Who can Donate</a>
                                <li class="nav-item submenu dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Donation Camp</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a class="nav-link" href="../bhaktapur.php">Bhaktapur</a>
                                            <li class="nav-item"><a class="nav-link" href="../kathmandu.php">Kathmandu</a>
                                                <li class="nav-item"><a class="nav-link" href="../lalitpur.php">Lalitpur</a>
                                    </ul>
                                    </li>

                                    <li class="nav-item submenu dropdown">
                                        <a href="../gallery.php" class="nav-link dropdown-toggle" aria-haspopup="true" aria-expanded="false">Gallery</a>

                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="../contact.php">Contact</a></li>
                        </ul>

                        <ul class="nav-right text-center text-lg-right py-4 py-lg-0">
                            <li><a href="#">Join Us</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!--================Header Menu Area =================-->

	
    

    <!--================ Innovation section Start =================-->
    <section class="section-padding--small">
	
        <div class="container">
  

	<div id="wrapper">


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
        // $k = '';
        // $k[0] = $characters[rand(0, strlen($characters))];
        // $k[1] = $characters[rand(0, strlen($characters))];
        // $k[2] = $characters[rand(0, strlen($characters))];
        // $k[3] = $characters[rand(0, strlen($characters))];
        // $k[4] = $characters[rand(0, strlen($characters))];
        // $k[5] = $characters[rand(0, strlen($characters))];
        

require_once("../DBConnect.php");

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

 else if($lenp<6){
     $pass_error = "Weak Password"; 
 }
else{
        $sql = "INSERT INTO `register` (`username`,`firstname`,`lastname`,`email`,`password`) VALUES ('$a', '$b','$c','$d',md5('$e'))";

	
	if(mysqli_query($conn, $sql)){
			$to = $d;
			$subject = "Registration Successfull";
			//$message = "Thank you  $b  $c for registering Raktasanchar. Use this key  $k  to verify your email.";
			$headers = "From: raktasanchar@gmail.com";
			
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
    <br>
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

        </div>
    </section>
    <!--================ Innovation section End =================-->



 

   


    <script src="../vendors/jquery/jquery-3.2.1.min.js"></script>
    <script src="../vendors/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="../vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="../vendors/Magnific-Popup/jquery.magnific-popup.min.js"></script>
    <script src="../js/jquery.ajaxchimp.min.js"></script>
    <script src="../js/mail-script.js"></script>
    <script src="../js/countdown.js"></script>
    <script src="../js/jquery.magnific-popup.min.js"></script>
    <script src="../js/main.js"></script>



</body>
 <!-- ================ start footer Area ================= -->
 <?php include('../footer.html');?>
    <!-- ================ End footer Area ================= -->



</html>