<?php
session_start();
require_once './wellbeinginfo.php'; 
$userID = $_SESSION['userID'];

if ($stmt = $conn->prepare("SELECT date,happiness,workload,anxiety FROM score WHERE userID=?")) {
    $stmt->bind_param('i', $userID);
    $stmt->execute();
    $result = $stmt->get_result();
    $all_rows = $result->fetch_all(MYSQLI_ASSOC);
}
$json_string = json_encode($all_rows, JSON_UNESCAPED_UNICODE);
echo $json_string;

?>