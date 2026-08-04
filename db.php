<?php
$host = "your-Hostname"; 
$user = "your-Username"; 
$pass = "your_Password"; 
$dbname = "your-Database Name"; 

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
