<?php 
$host = '127.0.0.1';
$database = 'wellbeing';
$user = 'root';
$pass = 'Lemonjuice00mysql';
$conn = new mysqli($host, $user, $pass, $database); 
if($conn->connect_error) 
die($conn->connect_error);
// else
// //echo "<br>Successfully connected";
?>
