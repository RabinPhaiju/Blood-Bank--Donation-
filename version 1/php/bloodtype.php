<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bloodtype</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/progressbar.css">
	<link rel="stylesheet" type="text/css" href="../css/sidenavbar.css">
	<link rel="shortcut icon" href="../images/logo.png">
	<style>
		#content{
			background-image: linear-gradient(#607aa0, #88a0bf);
			height: 100%;
			text-align: justify;
		}
		#rightside{
			height: 100%;
			background-color: lightblue;
			border-radius: 6px;
			padding: 4px 10px 4px 12px;
			margin-top: 5px;
			text-align: justify;
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
	<script type="text/javascript">
	function validate(){
		if(document.register.password.value!=document.register.password-repeat.value)
			alert('password dont match.');
		document.register.password.focus();
		return false;
	}
</script>
</head>

<body style="background-image: linear-gradient(#b7c3d4, #a2a2a7); background-repeat: no-repeat;">
	<?php include('../html/sidenavbar1.html');?>
	<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-up fa-2x" aria-hidden="true"></i></button>
<?php include('../html/progressbar.html');?>
<?php include('../html/navbar1.html');?>
<?php include('../html/iconbar.html');?>

	<div id="wrapper">
<div id="body" style="padding-top: 6px; padding-left: 2px; margin-top: 110px;">
	<div id="content" style="float:left;">
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
            $filepath="../files/profile.png";
        echo "<img src=".$filepath." height=200 />";
        }
        else{
         $filepath="../files/".$row["pic"];
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
            $filepath="../files/profile.png";
        echo "<img src=".$filepath." height=200 />";
        }
        else{
         $filepath="../files/".$row["pic"];
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
            $filepath="../files/profile.png";
        echo "<img src=".$filepath." height=200 />";
        }
        else{
         $filepath="../files/".$row["pic"];
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
            $filepath="../files/profile.png";
        echo "<img src=".$filepath." height=200 />";
        }
        else{
         $filepath="../files/".$row["pic"];
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
            $filepath="../files/profile.png";
        echo "<img src=".$filepath." height=200 />";
        }
        else{
         $filepath="../files/".$row["pic"];
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
            $filepath="../files/profile.png";
        echo "<img src=".$filepath." height=200 />";
        }
        else{
         $filepath="../files/".$row["pic"];
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
            $filepath="../files/profile.png";
        echo "<img src=".$filepath." height=200 />";
        }
        else{
         $filepath="../files/".$row["pic"];
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
            $filepath="../files/profile.png";
        echo "<img src=".$filepath." height=200 />";
        }
        else{
         $filepath="../files/".$row["pic"];
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
            $filepath="../files/profile.png";
        echo "<img src=".$filepath." height=200 />";
        }
        else{
         $filepath="../files/".$row["pic"];
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
	$conn-> close();
	?>
</table>
	</div>

	<div id="side">
		
		<?php include('../html/bloodtype11.html');?>
		<?php include('../html/bloodtype2.html');?>
		
	</div>
</div>	

<?php include('../html/footer.html');?>
<?php include('../html/scrollandtop.html');?>

</body>
</html>