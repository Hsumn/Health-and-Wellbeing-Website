<?php
session_start();
$email=htmlspecialchars($_POST['mail']);
$password=htmlspecialchars($_POST['pwd']);
require_once './wellbeinginfo.php';
$stmt = $conn->prepare("SELECT id, name, email, password from userinfo where email=?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt -> bind_result($userID,$name,$email,$hashedPassword);
$stmt->store_result();
$rows = $stmt->num_rows;
if($rows > 0){
    $stmt->fetch();
    if (password_verify($password, $hashedPassword)) {
    $_SESSION["userID"] = $userID;
    $_SESSION["name"] = $name;
    $_SESSION["email"] = $email;
    $response = ["status" => 1];

} else {
    $response = ["status" => 0];
}
}else{

    $response = ["status" => 0];
}
echo json_encode($response);
$stmt -> close();
$conn -> close();
?>

