<?php include 'session.php';?>
<?php
if (isset($_POST['resent'])) {
 $b=$_SESSION['username'];
 $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $k = '';
        $k[0] = $characters[rand(0, strlen($characters))];
        $k[1] = $characters[rand(0, strlen($characters))];
        $k[2] = $characters[rand(0, strlen($characters))];
        $k[3] = $characters[rand(0, strlen($characters))];
        $k[4] = $characters[rand(0, strlen($characters))];
        $k[5] = $characters[rand(0, strlen($characters))];
$sql9 = "UPDATE `register` SET `secret_key`='$k' WHERE `username`='$b';";
require_once("DBConnect.php");
mysqli_query($conn, $sql9);
            $sql7 = "SELECT * FROM `register` WHERE `username`='$b';";   
            $result7 = mysqli_query($conn, $sql7);
            $prev_data7 = mysqli_fetch_assoc($result7);
            $email7=$prev_data7['email'];
        	$to = $email7;
			$subject = "Key Sent Successfull";
			$message = "your new Key is $k";
			$headers = "From: raktasanchar@gmail.com";
			mail($to,$subject,$message,$headers);
}

if (isset($_POST['check'])) {
  	$key = $_POST['checkemail'];
 require_once("DBConnect.php");
 $b=$_SESSION['username'];
$sql7 = "SELECT * FROM `register` WHERE `username`='$b';";   
$result7 = mysqli_query($conn, $sql7);
$prev_data7 = mysqli_fetch_assoc($result7);
$key7=$prev_data7['secret_key'];
$email7=$prev_data7['email'];
if($key==$key7){
    $sql8 = "UPDATE `register` SET `verified`=1,`verifiedby_id`=1 WHERE `username`='$b';";
    require_once("DBConnect.php");
    if (mysqli_query($conn, $sql8)) {
        	$to = $email7;
			$subject = "Verification Successfull";
			$message = "Thank you for verifying your email. You will get notification from Raktasanchar.";
			$headers = "From: raktasanchar@gmail.com";
			if(mail($to,$subject,$message,$headers))
        {
    
        }
} else {
    $error_email="check your email and enter key again.";
}}}

	if (isset($_POST['show'])) {
        	if(isset($_SESSION['usergoogle'])){
        $b=$_SESSION['usergoogle'];
        $sql = "SELECT * FROM `register` WHERE `email`='$b';";
			}
			else{
		$b=$_SESSION['username'];
        $sql = "SELECT * FROM `register` WHERE `username`='$b';";
			}
require_once("../DBConnect.php");

$result = mysqli_query($conn, $sql);
$prev_data = mysqli_fetch_assoc($result);
$show=$prev_data['show_bloodtype'];
	if($show==1){
	    if(isset($_SESSION['usergoogle'])){
		$sql = "UPDATE `register` SET `show_bloodtype`=0 WHERE `email`='$b';";
	}else{
	    $sql = "UPDATE `register` SET `show_bloodtype`=0 WHERE `username`='$b';";
	}}
	else{
	     if(isset($_SESSION['usergoogle'])){
		$sql = "UPDATE `register` SET `show_bloodtype`=1 WHERE `email`='$b';";
	}else{
	    $sql = "UPDATE `register` SET `show_bloodtype`=1 WHERE `username`='$b';";
	}}

// Create connection
require_once("DBConnect.php");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if (mysqli_query($conn, $sql)) {
    //echo "Record updated successfully";
    echo "<script>window.location='index.php';</script>";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
mysqli_close($conn);
}

if (isset($_POST['add_user'])) {

	$a = $_POST['bloodtype'];
	$d = $_POST['firstname'];
	$e = $_POST['lastname'];
	$f = $_POST['email'];
	$g = $_POST['contact'];
	$h = $_POST['dob'];
	$j = $_POST['location'];


	if(isset($_SESSION['usergoogle'])){
        $b=$_SESSION['usergoogle'];
        $sql = "UPDATE `register` SET `bloodtype`='$a', `firstname`='$d', `lastname`='$e', `email`='$f', `contact`='$g', `dob`='$h', `location`='$j' WHERE `email`='$b';";
			}
			else{

    $b=$_SESSION['username'];
	$sql = "UPDATE `register` SET `bloodtype`='$a', `firstname`='$d', `lastname`='$e', `email`='$f', `contact`='$g', `dob`='$h', `location`='$j' WHERE `username`='$b';";
	// echo $sql;exit;
}
// Create connection
require_once("DBConnect.php");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (mysqli_query($conn, $sql)) {
    //echo "Record updated successfully";
    echo "<script>alert('Update Changes Successfully!');</script>";
    echo "<script>window.location='index.php';</script>";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
mysqli_close($conn);
}

if (isset($_POST['submitpass'])) {

	$a = $_POST['oldpass'];
	$d = $_POST['newpass'];
	
$b=$_SESSION['username'];
// Create connection
require_once("DBConnect.php");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
    $sql="select password from `register` where `username`='$b'";
    $result11 = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result11);
	if($row["password"]==md5($a)){
	    
	$sql = "UPDATE `register` SET `password`=md5('$d') where `username`='$b';";
	// echo $sql;exit;

if (mysqli_query($conn, $sql)) {
    //echo "Record updated successfully";
   echo "<script>alert('Password Changed!');</script>";
    echo "<script>window.location='index.php';</script>";
} else {
    echo "Error updating record1: " . mysqli_error($conn);
}
mysqli_close($conn);
}
else {
     echo "<script>alert('Password dont match!');</script>";
}
}

   if(isset($_POST['pic'])){
       
      $errors= array();
      $file_name =$_FILES['img']['name'];
      $file_size =$_FILES['img']['size'];
      $file_tmp =$_FILES['img']['tmp_name'];
      $file_type=$_FILES['img']['type'];
      $b=strrpos($file_name,".")+1;
      $file_ext=substr($file_name,$b);
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
         echo "<script>alert('extension not allowed, please choose a JPEG or PNG file.');</script>";
         
      }
      if($file_size > 2097152){
         $errors[]='File size must be less than or equal to 2 MB';
         echo "<script>alert('File size must be less than or equal to 2 MB');</script>";
      }
      if(isset($_SESSION['usergoogle'])){
        $b=$_SESSION['usergoogle'];}
        else{
      $b=$_SESSION['username'];}
      $bname=$b.".jpg";
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"files/".$bname);
    if(isset($_SESSION['usergoogle'])){
         $sql= "UPDATE `register` SET `pic`='$bname' WHERE `email`='$b'";}
             else{
                 $sql= "UPDATE `register` SET `pic`='$bname' WHERE `username`='$b'";{
             }
         }
         require_once("DBConnect.php");

        if (mysqli_query($conn, $sql)) {
            echo "<script>window.location='index.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
         
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
    <style>
		#content{
        /*	background-color: #a1a1a1;*/
 
        margin-left:5%;
        margin-right:8%;
			min-height: 100%;
			text-align: justify;

		}
		#rightside{
			height: 100%;
			padding: 4px 8px 4px 13px;
        
			font-size: 15px;
			text-align: justify;
		}
		#show input[type=submit]{
			background-color: red;
			margin: 20px 0 20px 30px;
			padding: 4px 14px;
			border-color: red;
			color: white;
		}
		#show input[type=submit]:hover{
			background-color: #bf0040;
			cursor: pointer;
		}
		
		#password input[type=submit]{
			width: 90%;
			background-color: red;
			color: white;
			padding: 8px 8px;
			margin: 2px auto 2px 2px;
			border: none;
			border-radius: 6px;
			cursor: pointer;
		}
		#password input[type=password]{
			width: 90%;
			background-color: lightgray;
			color: black;
			padding: 8px 8px;
			margin: 2px 0px 2px 2px;
			border: none;
			border-radius: 6px;
		}
		#files input[type=file]{
		   width:220px; 
		}
		#files input[type=submit]{
		    background-color: skyblue;
			margin: 10px 0 20px 10px;
			padding: 4px 10px;
			border-color: skyblue;
			color: black;
			width:100px;
		}
		#files input[tpye=submit]:hover{
		    background-color:blue;
		    margin: 10px 0 20px 10px;
			padding: 4px 10px;
			border-color: blue;
			color: white;
			width:100px;
		}
		img {
            border-radius: 20%;
            }
            #profile input[type=email],#profile input[type=text],#profile input[type=number],#profile input[type=date]{
                width:75%;
            }
            td{
                text-align:right;
            }
             #profile select{
                width:91%;
            }
            #profile input{
                margin: 2px 0px 2px 20px;
            }
            #resent input[type=submit]{
			background-color: red;
			padding: 6px 4px;
			border-color: red;
			color: white;
			width:100px;
		}
		#checkmail input[type=text]{
		    width:150px;
		}
	</style>
</head>

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
                            <li><a href="logout.php">Logout</a></li>
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
        <?php
			require_once("DBConnect.php");
			
			if(isset($_SESSION['usergoogle'])){
        $b=$_SESSION['usergoogle'];
        $sql = "SELECT * FROM `register` WHERE `email`='$b';";
			}
			else{
			    $b=$_SESSION['username'];
			$sql = "SELECT * FROM `register` WHERE `username`='$b';";
			}
			
			$result = mysqli_query($conn, $sql);
			$prev_data = mysqli_fetch_assoc($result);
			$verified=$prev_data['verified'];
			?>
	<div id="content" style="float:left;">
	<div style="border:1px solid #003380; border-radius: 4px; padding: 0 5px 5px 5px; min-height: 300px;">
		<h3 style="color: white; border-radius: 4px; margin: -1px -6px 0 -5px; background-color: #003380; padding: 5px 0 5px 5px;">Update your Details</h3>
		<?php
		if($verified==0){
			    ?>
			    <div style="float:left;" id="checkmail">
			    <form method="POST" action=""><br>
			    <br>
			    <br>
			        <b style="margin-left:20px;">Check your email for key.</b><br>
			        <input type="text" name="checkemail" placeholder="Enter key from Email" required><br>
			        <?php if(isset($error_email)){
			            echo $error_email;
			        }?>
			        <input type="submit" name="check" value="Verify">
			    </form>
			    </div>
			     <div id="resent" style="margin-top:70px; margin-left:30px;">
			        <form method="POST" action="">
			            <input type="submit" name="resent" value="Sent key again">
			        </form>
			    </div>
			    <?php }	else {?>
		
		<div id="files">
		<form action="index.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="img" required="required">
            <input type="submit" name="pic" value="UPLOAD">
        </form>
        </div>
		<div style="margin-left: 2%;" id="profile">
<form action="" method="POST" name="user">
<table id="adduser">
    <tr><?php
        if($prev_data['pic']==NULL){
            $filepath="files/profile.png";
        echo "<img src=".$filepath." height=200 />";
        }
        else{
         $filepath="files/".$prev_data['pic'];
        echo "<img src=".$filepath." height=200 />";
        }
        ?>
    </tr>
	<tr>
		<td>First Name:</td>
		<td><input type="text" name="firstname" class="form-control"  required="required" value="<?= $prev_data['firstname'];?>"></td>
	</tr>
	<tr>
		<td>Last Name:</td>
		<td><input type="text" name="lastname" class="form-control" required="required" value="<?= $prev_data['lastname'];?>"></td>
	</tr>
	<tr>
		<td>Address:</td>
		<td>
			<select required="required" name="location" class="form-control" title="Choose Location">
				<option value="<?=$prev_data['location'];?>"><?=$prev_data['location'];?></option>
					<option value="Bhaktapur">Bhaktapur</option>
					<option value="Biratnagar">Biratnagar</option>
					<option value="Chitwan">Chitwan</option>
					<option value="Karve">Karve</option>
					<option value="Kathmandu">Kathmandu</option>
					<option value="Mugu">Mugu</option>
					<option value="Pachthar">Pachthar</option>
					<option value="Saptari">Saptari</option>
				</select>
		</td>
	</tr>
	<tr>
		<td>Phone:</td>
		<td><input type="number" name="contact" class="form-control" required="required" value="<?= $prev_data['contact'];?>"></td>
    </tr>
    <tr>
		<td>Email:</td>
		<td><input type="email" name="email" class="form-control" required="required" value="<?= $prev_data['email'];?>" ></td>
	</tr>
	<tr>
		<td>DoB:</td>
		<td><input type="date" name="dob" class="form-control" required="required" value="<?= $prev_data['dob'];?>" ></td>
	</tr>
	<tr>
		<td>Bloodtype:</td>
		<td>
			<select required="required" class="form-control" name="bloodtype" title="Choose bloodtype">
					<option value="<?= $prev_data['bloodtype'];?>"><?= $prev_data['bloodtype'];?></option>
					<option value="O -ve"> O -ve</option>
					<option value="O +ve"> O +ve</option>
					<option value="A -ve"> A -ve</option>
					<option value="A +ve"> A +ve</option>
					<option value="B -ve"> B -ve</option>
					<option value="B +ve"> B +ve</option>
					<option value="AB -ve"> AB -ve</option>
					<option value="AB +ve"> AB +ve</option>
				</select>
		</td>
	</tr>
	
	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" class="form-control" name="add_user" value="UPDATE"></td>
	</tr>
</table>
</form>

</div>

<?php } ?>
	</div>
</div>
		<div id="side">
				<div id="bloodtype"  style="float:left;">
				    <?php
				    if($verified!=0){  ?>
					<div id="show" style="border:1px solid #003380; border-radius: 4px; width: 100%; padding: 0 15px 5px 15px;">
						<h3 style="color: white; border-radius: 4px; margin: -1px -16px 0 -15px; text-align: center; background-color: #003380; padding: 5px 0 5px 5px;" title="Activites">Show Bloodtype</h3>
							<?php
							$show=$prev_data['show_bloodtype'];
							if($show==1){
								?>
							<form action="" method="POST">
							<input type="submit" name="show" value="Dont Show">
						</form>
							<?php
						}
							else{
								?>
								<form action="" method="POST">
								<input type="submit" name="show" value="Show">
							</form>
							<?php }
							?>
					</div>
					<?php if(!isset($_SESSION['usergoogle'])){?>
					<div id="password" style="border:1px solid #003380; margin-top:20px; border-radius: 4px; width: 100%; padding: 0 15px 5px 15px;">
						<h3 style="color: white; border-radius: 4px; margin: -1px -16px 0 -15px; text-align: center; background-color: #003380; padding: 5px 0 5px 5px;" title="Activites">Change Password</h3>
						<form action="" method="POST">
						    <br>
						    <input type="password" placeholder="Old Password" name="oldpass" required="required">
						    <br>
						    <br>
						     <input type="password" placeholder="New Password" name="newpass" required="required">
						     <br><br>
						     <input type="submit" name="submitpass" value="Change">
						</form>
					</div>
					<?php }?>
					<?php } ?>
				</div>
		</div>
	
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

</html>