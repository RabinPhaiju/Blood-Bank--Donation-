<?php
require_once("DBConnect.php");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM `content` WHERE `title`='footer'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

?>
		<div style="height: 50px;background: grey; text-align: center;padding-top: 20px;"><?=$row["description"];?></div>
