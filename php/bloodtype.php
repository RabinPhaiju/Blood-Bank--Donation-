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
    <style>
		#content{
			background-image: linear-gradient(#607aa0, #88a0bf);
			height: 100%;
			text-align: justify;
		}
		#rightside{
            height: 100%;
            width:100%;
			background-color: lightblue;
			border-radius: 6px;
			padding: 4px 10px 4px 12px;
			margin-top: 5px;
			text-align: justify;
        }
        #side{
            margin-top:5%;
            width:40%;
            margin-bottom:5%;
		}
	
		#body #content table {
			margin-top: 18px;
		  font-family: arial, sans-serif;
		  border-collapse: collapse;
		  width: 100%;
		}
		#body #content td, #body #content th {
		  border: 0px solid #dddddd;
		  text-align: left;
		  padding: 8px;
		}
		#body #content tr:nth-child(even) {
		  background-color: #dddddd;
		}
		@media only screen and (max-width: 1300px) {
				#body #content td,#body #content th{
					font-size: 8px;
				}
				#content img{
		    height:30px;
		}
		#side{
            margin-left:-20px;
            width:40%;
		}
		}
		#content img{
		    height:50px;
		}
		#content img:hover{
		    transition: 0.2s; 
			transform: scale(1.8);
			border-radius:5%;
			cursor:pointer;
		}
</style>
</head>

<body style="color:black;">

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
                            <li><a href="#">Join Us</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!--================Header Menu Area =================-->


    

    <!--================ Innovation section Start =================-->
    <section class="section-padding--small bg-gray">
        <div class="container">
        <div id="wrapper">
<div id="body" style="padding-top: 6px; padding-left: 2px; margin-top: 10px;">
	<div id="content" style="">
		<table>
	<tr>
	    <td></td>
		<td><b>Name</b></td>
		<td><b>Address</b></td>
		<td><b>Phone</b></td>
		<td><b>Bloodtype</b></td>
	</tr>
	<?php
	
	if(!$_POST['location']==NULL){
	    $name=$_POST['location'];
	    $bloodtype=$_POST['bloodtype'];
	    $fix=$_POST['fix'];
	}
	else{
	    $name="Bhaktapur";
	    $bloodtype="B +ve";
	}
	
	require_once("DBConnect.php");
	if($conn-> connect_error){
		die("Connection failed:". $conn-> connect_error);
	}
	    $sql = "SELECT pic,firstname,lastname,location,contact,bloodtype from register where `location`='$name' AND (`show_bloodtype`='1' AND `status`='1')";
	$result = $conn-> query($sql);

	if($result-> num_rows >0){
		while($row = $result-> fetch_assoc()){
		    if($fix=="only"){
			if($row["bloodtype"]==$bloodtype){
			echo "<tr><td>";
        if($row["pic"]==NULL){
            $filepath="files/profile.png";
        echo "<img src=".$filepath." height=200 />";
        }
        else{
         $filepath="files/".$row["pic"];
        echo "<img src=".$filepath." height=200 />";
        }
    	echo "</td>
	        <td>". $row["firstname"]." ".$row["lastname"] ."</td>
			<td>". $row["location"] ."</td><td>". $row["contact"] ."</td>
			<td>". $row["bloodtype"] ."</td>
			</tr>";
				}
		    }
		    else{
		    if($bloodtype=="B +ve"){
			if($row["bloodtype"]=="B +ve" || $row["bloodtype"]=="B -ve" || $row["bloodtype"]=="O +ve" || $row["bloodtype"]=="O -ve"){
			echo "<tr><td>";
        if($row["pic"]==NULL){
            $filepath="files/profile.png";
        echo "<img src=".$filepath." height=200 />";
        }
        else{
         $filepath="files/".$row["pic"];
        echo "<img src=".$filepath." height=200 />";
        }
    	echo "</td>
	        <td>". $row["firstname"]." ".$row["lastname"] ."</td>
			<td>". $row["location"] ."</td><td>". $row["contact"] ."</td>
			<td>". $row["bloodtype"] ."</td>
			</tr>";
				}}
				else if($bloodtype=="B -ve"){
			if($row["bloodtype"]=="B -ve" || $row["bloodtype"]=="O -ve"){
			echo "<tr><td>";
        if($row["pic"]==NULL){
            $filepath="files/profile.png";
        echo "<img src=".$filepath." height=200 />";
        }
        else{
         $filepath="files/".$row["pic"];
        echo "<img src=".$filepath." height=200 />";
        }
    	echo "</td>
	        <td>". $row["firstname"]." ".$row["lastname"] ."</td>
			<td>". $row["location"] ."</td><td>". $row["contact"] ."</td>
			<td>". $row["bloodtype"] ."</td>
			</tr>";
				}}
				else if($bloodtype=="A +ve"){
			if($row["bloodtype"]=="A +ve" || $row["bloodtype"]=="A -ve" || $row["bloodtype"]=="O +ve" || $row["bloodtype"]=="O -ve"){
			echo "<tr><td>";
        if($row["pic"]==NULL){
            $filepath="files/profile.png";
        echo "<img src=".$filepath." height=200 />";
        }
        else{
         $filepath="files/".$row["pic"];
        echo "<img src=".$filepath." height=200 />";
        }
    	echo "</td>
	        <td>". $row["firstname"]." ".$row["lastname"] ."</td>
			<td>". $row["location"] ."</td><td>". $row["contact"] ."</td>
			<td>". $row["bloodtype"] ."</td>
			</tr>";
				}}
				else if($bloodtype=="A -ve"){
			if($row["bloodtype"]=="A -ve"|| $row["bloodtype"]=="O -ve"){
			echo "<tr><td>";
        if($row["pic"]==NULL){
            $filepath="files/profile.png";
        echo "<img src=".$filepath." height=200 />";
        }
        else{
         $filepath="files/".$row["pic"];
        echo "<img src=".$filepath." height=200 />";
        }
    	echo "</td>
	        <td>". $row["firstname"]." ".$row["lastname"] ."</td>
			<td>". $row["location"] ."</td><td>". $row["contact"] ."</td>
			<td>". $row["bloodtype"] ."</td>
			</tr>";
				}}
				else if($bloodtype=="O +ve"){
			if($row["bloodtype"]=="O +ve" || $row["bloodtype"]=="O -ve"){
			echo "<tr><td>";
        if($row["pic"]==NULL){
            $filepath="files/profile.png";
        echo "<img src=".$filepath." height=200 />";
        }
        else{
         $filepath="files/".$row["pic"];
        echo "<img src=".$filepath." height=200 />";
        }
    	echo "</td>
	        <td>". $row["firstname"]." ".$row["lastname"] ."</td>
			<td>". $row["location"] ."</td><td>". $row["contact"] ."</td>
			<td>". $row["bloodtype"] ."</td>
			</tr>";
				}}
		else if($bloodtype=="O -ve"){
			if($row["bloodtype"]=="O -ve"){
			echo "<tr><td>";
        if($row["pic"]==NULL){
            $filepath="files/profile.png";
        echo "<img src=".$filepath." height=200 />";
        }
        else{
         $filepath="files/".$row["pic"];
        echo "<img src=".$filepath." height=200 />";
        }
    	echo "</td>
	        <td>". $row["firstname"]." ".$row["lastname"] ."</td>
			<td>". $row["location"] ."</td><td>". $row["contact"] ."</td>
			<td>". $row["bloodtype"] ."</td>
			</tr>";
				}}
	else if($bloodtype=="AB +ve"){
			if($row["bloodtype"]=="B +ve" || $row["bloodtype"]=="B -ve" || $row["bloodtype"]=="O +ve" || $row["bloodtype"]=="O -ve" || $row["bloodtype"]=="A -ve" ||$row["bloodtype"]=="A +ve"|| $row["bloodtype"]=="AB -ve" || $row["bloodtype"]=="AB +ve"){
			echo "<tr><td>";
        if($row["pic"]==NULL){
            $filepath="files/profile.png";
        echo "<img src=".$filepath." height=200 />";
        }
        else{
         $filepath="files/".$row["pic"];
        echo "<img src=".$filepath." height=200 />";
        }
    	echo "</td>
	        <td>". $row["firstname"]." ".$row["lastname"] ."</td>
			<td>". $row["location"] ."</td><td>". $row["contact"] ."</td>
			<td>". $row["bloodtype"] ."</td>
			</tr>";
				}}
	else if($bloodtype=="AB -ve"){
			if($row["bloodtype"]=="B -ve" || $row["bloodtype"]=="O -ve" || $row["bloodtype"]=="A -ve" || $row["bloodtype"]=="AB -ve"){
			echo "<tr><td>";
        if($row["pic"]==NULL){
            $filepath="files/profile.png";
        echo "<img src=".$filepath." height=200 />";
        }
        else{
         $filepath="files/".$row["pic"];
        echo "<img src=".$filepath." height=200 />";
        }
    	echo "</td>
	        <td>". $row["firstname"]." ".$row["lastname"] ."</td>
			<td>". $row["location"] ."</td><td>". $row["contact"] ."</td>
			<td>". $row["bloodtype"] ."</td>
			</tr>";
				}}
		}}
		echo "</table>";
	}
	else{
		echo "0 result";
	}
	//$conn-> close();
	?>
</table>
	</div>

	<div id="side">
		
		<?php include('bloodtype11.html');?>
		<!-- <?php include('bloodtype2.html');?> -->
		
	</div>
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
                            <img class="img-fluid" src="../img/home/sponsor1.png" alt="">
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-4 mb-3 mb-lg-0">
                        <div class="sponsor-single">
                            <img class="img-fluid" src="../img/home/sponsor2.png" alt="">
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-4 mb-3 mb-lg-0">
                        <div class="sponsor-single">
                            <img class="img-fluid" src="../img/home/sponsor3.png" alt="">
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

</html>