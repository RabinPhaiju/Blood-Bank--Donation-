<?php
if(isset($_SESSION['usergoogle'])){
    echo "<script>window.location='index.php';</script>";
	exit();
}

if(isset($_COOKIE["login"])){	
	if(empty($_SESSION)) // if the session not yet started
   			session_start();
		$_SESSION['username'] = $_COOKIE["login"];
	echo "<script>window.location='index.php';</script>";
	exit;
}

if(isset($_POST['submit'])){
	// echo "Nepal";exit;
	$uu = $_POST['username'];
	$u=strtolower($uu);
	$p = md5($_POST['password']);

	$sql = "SELECT * FROM `register` WHERE `username`='$u' AND `password`='$p';";
	//echo $sql;
	require_once('DBConnect.php');
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		// echo "Login Successful";exit;
		if(empty($_SESSION)) // if the session not yet started
   			session_start();
		$_SESSION['username'] = $u;
		$row = mysqli_fetch_assoc($result);
		//echo "<pre>"; print_r($row);exit;
		$_SESSION['u_id'] = $row['reg_id'];
		if(!empty($_POST["remember_me"])) {
				setcookie ("login",$_POST["username"],time()+(60 * 60)); /* expire in 1 hour */
			} else {
				if(isset($_COOKIE["login"])) {
					setcookie ("login","");
				}
			}

		echo "<script>window.location='index.php';</script>";		
        exit; 
	}else{
		echo "<script>alert('Username or Password Incorrect!');</script>";
		echo "<script>window.location='login.php';</script>";
		exit;
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="icon" href="img/Fevicon.png" type="image/png">

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
                    <a class="navbar-brand logo_h" href="../index.php"><img src="../img/logo.png" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav justify-content-end">
                            <li class="nav-item"><a class="nav-link" href="../index.php">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                            <li class="nav-item"><a class="nav-link" href="whocandonate.php">Who can Donate</a>
                                <li class="nav-item submenu dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Donation Camp</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a class="nav-link" href="bhaktapur.php">Bhaktapur</a>
                                            <li class="nav-item"><a class="nav-link" href="kathmandu.php">Kathmandu</a>
                                                <li class="nav-item"><a class="nav-link" href="lalitpur.php">Lalitpur</a>
                                    </ul>
                                    </li>

                                    <li class="nav-item submenu dropdown">
                                        <a href="gallery.php" class="nav-link dropdown-toggle" aria-haspopup="true" aria-expanded="false">Gallery</a>

                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
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
		
		<div id="log">
    <div id="change">
        <a style=" background-color: #1ab188;" href="login.php">Login</a><a href="reg.php">Resgister</a>
    </div>
    <div id="logtext">
        <p>Welcome Back!</p>
    </div>
    <div id="form">
        <form method="POST" action="">
            <input type="text" name="username" placeholder="Username*" required="required"><br><br>
            <input type="password" name="password" placeholder="Password*" required="required"><br><br>
            <!-- <input type="checkbox" name="remember_me" id="lf" <?php if(isset($_COOKIE[ "member_login"])) { ?> checked
            <?php } ?> />
            <label for="lf-me">Remember me</label> -->

            <input type="submit" name="submit" value="Login" id="lf"><br>
            <!-- <input type="button" onclick="window.location='<?php echo $loginURL ?>';" value="Login with Google" id="lf"> -->
        </form>
    </div>
    <!-- <div style="margin-top:15px; color:white; padding:1px,1px">
        <a href="reset_pass.php" title="Reset Password"> Reset Password</a>
    </div> -->
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
 <?php include('footer.html');?>
    <!-- ================ End footer Area ================= -->



</html>