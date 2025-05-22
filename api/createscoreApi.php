<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require_once './wellbeinginfo.php';
$userID = $_SESSION['userID'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $happiness = $_POST['rateH'];
    $workload = $_POST['rateW'];
    $anxiety = $_POST['rateA'];
    $date = date('Y-m-d');

    $stmt = $conn->prepare("SELECT * FROM score WHERE userID=? AND date=?");
    $stmt->bind_param('is', $userID, $date);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $stmt = $conn->prepare("UPDATE score SET happiness=?, workload=?, anxiety=? WHERE userID=? AND date=?");
        $stmt->bind_param('iiiis', $happiness, $workload, $anxiety, $userID, $date);
    } else {
        $stmt = $conn->prepare("INSERT INTO score (userID, happiness, workload, anxiety, date) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param('iiiis', $userID, $happiness, $workload, $anxiety, $date);
    }
    $stmt->execute();
    $stmt->close();
    $conn->close();
 
    header("Location: ../chart.html");
    exit();
}
?>
