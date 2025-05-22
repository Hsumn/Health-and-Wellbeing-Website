<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$name= htmlspecialchars($_POST['name']);
$DB=htmlspecialchars($_POST['DB']);
$gender=htmlspecialchars($_POST['gender']);
$email=htmlspecialchars($_POST['email']);
$hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

require_once './wellbeinginfo.php';

  if($stmt = $conn->prepare("INSERT INTO userinfo(name,`date of birth`,gender,email,password) VALUES (?,?,?,?,?)")) {
      $stmt->bind_param("sssss",$name,$DB,$gender,$email,$hashedPassword);
      $stmt->execute();
      $stmt->close();
  } else {
      echo "Something went wrong!";
  }

?>