<?php 
ob_start();
session_start();
$conn = new mysqli("localhost:3308","root","","lucid");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 ?>