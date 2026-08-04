<?php
$host = "sql205.infinityfree.com"; 
$user = "if0_42575590"; 
$pass = "hfrkVqzSojyLtWW"; 
$dbname = "if0_42575590_user_status"; 

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>