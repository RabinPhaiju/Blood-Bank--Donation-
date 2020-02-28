<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="icon" href="img/Fevicon.png" type="image/png">

    <link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="vendors/linericon/style.css">
    <link rel="stylesheet" href="vendors/owl-carousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="vendors/flat-icon/font/flaticon.css">

    <link rel="stylesheet" href="css/style.css">
</head>

<body>

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
                            <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
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
                            <li><a href="php/login.php">Join Us</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!--================Header Menu Area =================-->


    <!--================Hero Banner Area Start =================-->
    <section class="hero-banner">
        <div class="container text-center">
            <span class="hero-banner-icon"><i class="flaticon-drop"></i></span>
            <p>A drop of blood can save my life.</p>
            <h1>Bhaktapur Rakta-Sanchar</h1>
            <a class="button button-header" href="php/login.php">Donate</a>
        </div>
    </section>
    <!--================Hero Banner Area End =================-->


    <!--================ Innovation section Start =================-->
    <section class="section-padding--small bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center mb-5 mb-lg-0">
                    <div class="innovative-wrapper">
                        <h3 class="primary-text">ACTIVITIES <br class="d-none d-xl-block"> 2020</h3>
                        <?php
                        require_once("DBConnect.php");
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                $sql = "SELECT * FROM `content` WHERE `title`='activities'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                ?><?=$row["description"];?>


                    </div>
                </div>
                <div class="col-lg-6 pl-xl-5">

       <div id="bloodtype">
	<div style="border:1px solid #003380; border-radius: 4px; width: 60%; padding: 0 15px 5px 15px; margin-left:20px; margin:20px 0;">
		<h3 style="color: white; border-radius: 4px; margin: -1px -16px 0 -15px; text-align: center; background-color: #003380; padding: 5px 0 5px 5px;" title="Activites">Blood Type</h3>
            <form action="bloodtype.php" method="POST">
            <br>
                <label>Choose Location</label>
                
				<select required="required" name="location" title="Choose Location">
					<option value="Bhaktapur">Bhaktapur</option>
					<option value="Biratnagar">Biratnagar</option>
					<option value="Chitwan">Chitwan</option>
					<option value="Karve">Karve</option>
					<option value="Kathmandu">Kathmandu</option>
					<option value="Mugu">Mugu</option>
					<option value="Pachthar">Pachthar</option>
					<option value="Saptari">Saptari</option>
                </select>
                <br>
				<label>Choose Blood Type</label>
				<select required="required" name="bloodtype" title="Choose bloodtype">
					<option value="O -ve"> O -ve</option>
					<option value="O +ve"> O +ve</option>
					<option value="A -ve"> A -ve</option>
					<option value="A +ve"> A +ve</option>
					<option value="B -ve"> B -ve</option>
					<option value="B +ve"> B +ve</option>
					<option value="AB -ve"> AB -ve</option>
					<option value="AB +ve"> AB +ve</option>
                </select>
                <br>
                <input type="checkbox" name="fix" value="only" checked>
				<input type="submit" name="submit" value="Search">
			</form>
			</div>
		</div>

                   
                </div>
            </div>
        </div>
    </section>
    <!--================ Innovation section End =================-->


    <!--================ Join section Start =================-->
    <section class="section-margin">
        <div class="container">
           


            <div class="d-lg-flex">
                

                <div class=" mb-5 mb-lg-0">
                <h2 class="primary-text">Seminar <br class="d-none d-xl-block"></h2>
                <?php
require_once("DBConnect.php");
$sql = "SELECT * FROM `content` WHERE `title`='seminar'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

?><?=$row["description"];?>
 <div class="clockdiv-content text-center">
                        <a class="button button-link" href="#">Read More</a>
                    </div>
                </div>

                
            </div>
           
        </div>
    </section>
    <!--================ Join section End =================-->


    <!--================ Speaker section Start =================-->
    <section class="speaker-bg section-padding">
        <div class="container">
        <h3 style="color: darkblue">EDUCATIONAL ACTIVITIES</h3>
                <?php
                require_once("DBConnect.php");
$sql = "SELECT * FROM `content` WHERE `title`='educational activities'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
                    <?=$row["description"];?>

                        <h3 style="color: darkblue">MOTIVATIONAL ACTIVITIES</h3>
                        <?php
                        require_once("DBConnect.php");
$sql = "SELECT * FROM `content` WHERE `title`='motivational activities'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
                            <?=$row["description"];?>

                                <h3 style="color: darkblue">DONATION</h3>
                                <?php
                                require_once("DBConnect.php");
$sql = "SELECT * FROM `content` WHERE `title`='donation'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

?>
                                    <?=$row["description"];?>

            
        </div>
    </section>
    <!--================ Speaker section End =================-->


    <!--================ Sponsor section Start =================-->
    <section class="section-padding--small sponsor-bg">
        <div class="container">
            <div class="section-intro text-center pb-80px">
                <p class="section-intro__title">Join the  blood donation event</p>
                <h2 class="primary-text">Event Plan Sponsors</h2>
            
            </div>

            <div class="sponsor-wrapper mb-5 pb-4">
            
                <div class="row">
                    <div class="col-sm-6 col-lg-4 mb-3 mb-lg-0">
                        <div class="sponsor-single">
                            <img class="img-fluid" src="img/home/sponsor1.png" alt="">
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-4 mb-3 mb-lg-0">
                        <div class="sponsor-single">
                            <img class="img-fluid" src="img/home/sponsor2.png" alt="">
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-4 mb-3 mb-lg-0">
                        <div class="sponsor-single">
                            <img class="img-fluid" src="img/home/sponsor3.png" alt="">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!--================ Sponsor section End =================-->


    <!-- ================ start footer Area ================= -->
    <?php include('footer.html');?>
    <!-- ================ End footer Area ================= -->




    <script src="vendors/jquery/jquery-3.2.1.min.js"></script>
    <script src="vendors/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="vendors/Magnific-Popup/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/mail-script.js"></script>
    <script src="js/countdown.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/main.js"></script>



</body>

</html>