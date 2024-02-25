<?php
$servername = "localhost";
$username = "marko";
$password = "markox7305";
$dbname = "userinformation";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

