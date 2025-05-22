<?php
session_start();
require_once 'wellbeinginfo.php';
 
$conn = new mysqli($host, $user, $pass, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 
$userID = $_SESSION['userID'];
 
$checkQuery = "
        SELECT happiness, workload, anxiety
        FROM score
        WHERE userID = ?
        ORDER BY date DESC
        LIMIT 3";
 
$stmt = $conn->prepare($checkQuery);
$stmt->bind_param("i", $userID);
$stmt->execute();
$stmt->bind_result($h, $w, $a);
 
$sum_happiness = 0;
$sum_workload = 0;
$sum_anxiety = 0;
$fetch_count = 0;
 
while($stmt->fetch()){
    $sum_happiness += $h;
    $sum_workload += $w;
    $sum_anxiety += $a;
    $fetch_count++;
}
 
if ($fetch_count == 3) {
    $avg_h = $sum_happiness / 3;
    $avg_w = $sum_workload / 3;
    $avg_a = $sum_anxiety / 3;
    if ($avg_h < 1.5 || $avg_w < 1.5 || $avg_a < 1.5){
        echo "<div class='alert alert-warning mt-3' role='alert'>
        <strong>Attention:</strong> We recommend that you seek professional help based on your recent wellbeing scores. Please click <a class='alert-link' href='gethelp.php'>get help</a> for more detailed information.
    </div>";
    }
    
} else {
    
}
 
$stmt->close();
$conn->close();
?>
 