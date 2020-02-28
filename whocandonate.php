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
                            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                            <li class="nav-item active"><a class="nav-link" href="whocandonate.php">Who can Donate</a>
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
        <h3 style="color: white; border-radius: 4px; margin: -1px -16px 0 -15px; text-align: center; background-color: #003380; padding: 5px 0 5px 5px;">Who Can Donate</h3>
        <?php
				require_once("DBConnect.php");
$sql = "SELECT * FROM `content` WHERE `title`='who can donate'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
            <?=$row["description"];?>
            </div>
        </div>
    </section>
    <!--================ Innovation section End =================-->



 

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