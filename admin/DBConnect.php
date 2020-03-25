<?php

// Create connection
$conn = mysqli_connect("localhost", "root","","id11005287_nepalraktasanchar");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}