<?php include 'session.php';?>
	<?php
$u=$_SESSION['username'];
require_once("DBConnect.php");
$sql5 = "SELECT usertype from `user` where `username`='$p'";
$rresult=mysqli_query($conn,$sql5);
$rrow = mysqli_fetch_assoc($rresult);
$usertype=$rrow["usertype"];

if($usertype=="staff"){
 echo "<script>window.location='index.php';</script>";

}?>
<!DOCTYPE html>
<html>
<head>
  <title>BackEnd-Add File</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="../images/logo.png">
  <style>
    table {
      margin-top: 12px;
      font-family: arial, sans-serif;
      border-collapse: collapse;
     
    }
    td, th {
      border: 0px solid #dddddd;
      padding: 10px;
    }
    tr:nth-child(even) {
      background-color: #dddddd;
    }
    td{
      font-size: 14px;
    }
    a{
      text-decoration: none;
    }
  </style>
</head>
<body style="background-color: #ececec;">
<?php
error_reporting(0);
   if(isset($_FILES['image'])){
      // echo "<pre>";print_r($_FILES['image']);exit;
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be less than or equal to 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"../files/".$file_name);

         $sql = "INSERT INTO `file` (`title`) VALUES ('$file_name');";
         require_once("DBConnect.php");

        if (mysqli_query($conn, $sql)) {
            echo "<script>window.location='add_file.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
       
         
      }else{
         print_r($errors);
      }
   }
?>

<?php
require_once("DBConnect.php");

$sql = "SELECT * FROM `file` WHERE 1 Limit 0, 60";
$result = mysqli_query($conn, $sql);
?>
<div style="border: 2px solid; border-color: black; height: 100%; margin:0 5%; " >
   <?php include('header.php');?>
  </div>

  <div style="border: 2px solid; border-color: black; min-height: 570px; margin:0 5%; " >
    <div> 
    <p><a href="../index.php">Home</a> <a href="index.php">>> DashBoard</a> >>Manage Files</p>
    </div>
  <div style="margin-left: 1%; margin-top: -35px;">
<br>
<br>
<div class="content">
 <?php
$u=$_SESSION['username'];
require_once("DBConnect.php");
$sql5 = "SELECT usertype from `user` where `username`='$p'";
$rresult=mysqli_query($conn,$sql5);
$rrow = mysqli_fetch_assoc($rresult);
$usertype=$rrow["usertype"];
if($usertype!="staff"){
	?> 
<form action="" method="POST" enctype="multipart/form-data">
 <input type="file" name="image" required="required" />
 <input type="submit" value="UPLOAD" />
</form>
<?php }  ?>
<b>Files</b>
<table border="1" cellspacing="0" cellpadding="20" width="100%">
    <tr>
        <th>S.N.</th>
        <th>Thumbnail</th>
        <td>File Name</td>
        <td>Created At</td>
            <?php
if($usertype!="staff"){
	?>
		<th>Action</th>
		<?php } ?>
    </tr>
<?php
if (mysqli_num_rows($result) > 0) {
    $i=0;
    while($row = mysqli_fetch_assoc($result)) {
?>
    <tr>
        <td style="text-align: center;"><?= ++$i;?></td>
        <td style="text-align: center;"><img style="width: 80px; border: 1px solid #eee;" src="../files/<?= $row["title"];?>" alt="Thumb"></td>
        <td><?= $row["title"];?></td>
        <td><?= $row["created_at"];?></td>
         <?php
        if($usertype!="staff"){
	?>
        <td style="text-align: center;"><a style="color: #F00; text-decoration: none;" onclick="return confirm('Are you sure you want to delete this file?')" href="delete_file.php?id=<?= $row['id'];?>">&#10008;</a></td>
        <?php } ?>
    </tr>
<?php
    }   
} else {
    ?>
    <tr>
        <td colspan="3">No Record(s) found.</td>
    </tr>
    <?php
}
?>
<?php 

?>
</table>
            
        </div>
      </div>
    </div>
    <?php include 'footer.php';?>
    </body>
</html>