<?php
session_start();
?>
<?php
if(isset($_POST['submit'])){
$username=$_POST['username'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$message=$_POST['message'];
//$type1=$_POST['type'];
//$retype1=$_POST['retype'];
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
//  else if($type1!=$retype1){
//      $type_error="Not match";
//  }
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
			
            echo "<script>window.location='index.php'</script>";
			
			
		}
		
	}
	else{
		echo "Error2";
	}
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="icon" href="img/Fevicon.png" type="image/png">

    <link rel="stylesheet" href="../vendors/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../vendors/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../vendors/linericon/style.css">
    <link rel="stylesheet" href="../vendors/owl-carousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="../vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">
    <link rel="stylesheet" href="../vendors/flat-icon/font/flaticon.css">


    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

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
                                                <li class="nav-item"><a class="nav-link" href="lalitpur">Lalitpur</a>
                                    </ul>
                                    </li>

                                    <li class="nav-item submenu dropdown">
                                        <a href="gallery.php" class="nav-link dropdown-toggle" aria-haspopup="true" aria-expanded="false">Gallery</a>

                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                        </ul>

                        <ul class="nav-right text-center text-lg-right py-4 py-lg-0">
                            <li><a href="login.php">Join Us</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!--================Header Menu Area =================-->


    <!-- ================ contact section start ================= -->
    <section class="section-margin--large">
        <div class="container">
            <div class="d-none d-sm-block mb-5 pb-4">
                <div id="map" style="height: 480px;"></div>
                <script>
                    function initMap() {
                        var uluru = {
                            lat: -25.363,
                            lng: 131.044
                        };
                        var grayStyles = [{
                            featureType: "all",
                            stylers: [{
                                saturation: -90
                            }, {
                                lightness: 50
                            }]
                        }, {
                            elementType: 'labels.text.fill',
                            stylers: [{
                                color: '#A3A3A3'
                            }]
                        }];
                        var map = new google.maps.Map(document.getElementById('map'), {
                            center: {
                                lat: -31.197,
                                lng: 150.744
                            },
                            zoom: 9,
                            styles: grayStyles,
                            scrollwheel: false
                        });
                    }
                </script>
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I&callback=initMap"></script>

            </div>


            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title">Get in Touch</h2>
                </div>
                <div class="col-lg-8">
                    <form class="form-contact contact_form" action="" method="POST">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="message" value="<?php if(isset($message)){echo $message;} ?>" type="text"  id="message" cols="30" rows="9" placeholder="Enter Message"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="username" id="name" value="<?php if(!isset($name_error) && isset($username)){echo $username;} ?>" placeholder="<?php if(isset($name_error)){echo $name_error." ";}if(isset($username)){echo $username;} else {echo "Full Name";}  ?>" >
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="email" value="<?php if(!isset($email_error) && isset($email)){echo $email;} ?>" placeholder="<?php if(isset($email_error)){echo $email_error." ";}if(isset($email)){echo $email;} else {echo "Email Address";}  ?>" id="email" type="email" placeholder="Enter email address">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" name="phone" value="<?php if(!isset($phone_error) && isset($phone)){echo $phone;} ?>" placeholder="<?php if(isset($phone_error)){echo $phone_error." ";}if(isset($phone)){echo $phone;} else {echo "Phone Number";}  ?>" id="subject" type="number" placeholder="Enter Subject">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <!-- <button type="submit" name="submit" class="button button-contactForm">Send Message</button> -->
                            <input type="submit" name="submit" value="submit">
                        </div>
                    </form>


                </div>

                <div class="col-lg-4">
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-home"></i></span>
                        <div class="media-body">
                            <h3>Kamalbinayek, Bhaktapur</h3>
                            <p></p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                        <div class="media-body">
                            <h3><a href="tel:454545654">01 6348586</a></h3>
                            <p>Mon to Fri 9am to 6pm</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-email"></i></span>
                        <div class="media-body">
                            <h3><a href="mailto:support@colorlib.com">support@raktasanchar.com</a></h3>
                            <p>Send us your query anytime!</p>
                        </div>
                    </div>
                </div>














                <div class="col-md-4 col-lg-3 mb-4 mb-md-0">

                </div>
                <div class="col-md-8 col-lg-9">

                </div>
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->

    <!-- ================ start footer Area ================= -->
    <?php include('footer.html');?>
    <!-- ================ End footer Area ================= -->



    <script src="../vendors/jquery/jquery-3.2.1.min.js"></script>
    <script src="../vendors/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="../vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="../vendors/Magnific-Popup/jquery.magnific-popup.min.js"></script>
    <script src="../js/jquery.form.js"></script>
    <script src="../js/jquery.validate.min.js"></script>
    <script src="../js/contact.js"></script>
    <script src="../js/jquery.ajaxchimp.min.js"></script>
    <script src="../js/mail-script.js"></script>
    <script src="../js/countdown.js"></script>
    <script src="../js/jquery.magnific-popup.min.js"></script>
    <script src="../js/main.js"></script>
    



</body>

</html>