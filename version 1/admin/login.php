<?php
if(isset($_COOKIE["member_login"])){	
	if(empty($_SESSION)) // if the session not yet started
   			session_start();
		$_SESSION['username'] = $_COOKIE["member_login"];
	echo "<script>window.location='index.php';</script>";
	exit;
}

if(isset($_POST['submit'])){
	// echo "Nepal";exit;
	$u = $_POST['username'];
	$p = md5($_POST['password']);

	$sql = "SELECT * FROM `user` WHERE `username`='$u' AND `password`='$p' AND `status`=1 AND `is_verified`=1;";
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
		$_SESSION['u_id'] = $row['id'];
		if(!empty($_POST["remember_me"])) {
				setcookie ("member_login",$_POST["username"],time()+(60 * 60)); /* expire in 1 hour */
			} else {
				if(isset($_COOKIE["member_login"])) {
					setcookie ("member_login","");
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
<html>
<head>
	<title>Raktasanchar - Login</title>
	<link rel="shortcut icon" href="../images/logo.png">
	<style type="text/css">
		input{
			padding: 5px;
		}
		input[type=submit]{
			background-color: grey;
			border: solid grey;
			padding: 3px 10px;
		}
	</style>
</head>
<body style="background-color: lightgrey;">
	<div class="body_wrapper" style="margin: 5% 20% 0 20%;">
		<div class="header">
			<h1 style="color: #F00; text-align: center;">RAKTASANCHAR - LOGIN</h1>            
		</div>
		<hr>
		<p><a href="../index.php" style="text-decoration: none; padding-left: 10px;">Home</a> &raquo; Login</p>
		<div class="content" style="text-align: center;">
			<form action="" method="POST">
				<input type="text" name="username"  id="lf" placeholder="username" required="required" autofocus="true"><br>
				<input type="password" name="password"  placeholder="password" id="lf" required="required"><br>
				<input type="checkbox" name="remember_me" id="lf" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?> />
				<label for="lf-me">Remember me</label><br>
				<input type="submit" name="submit" value="Login" id="lf">
			</form>
		</div>
	</div>
<style type="text/css">
	#lf{
		margin-top: 10px;
	}
</style>
</body>
</html>