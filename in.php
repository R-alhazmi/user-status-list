<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['name']) && !empty($_POST['age'])) {
    $name = $_POST['name'];
    $age = intval($_POST['age']);

    $stmt = $conn->prepare("INSERT INTO users (name, age, status) VALUES (?, ?, 0)");
    $stmt->bind_param("si", $name, $age);
    $stmt->execute();
}

header("Location: index.php");
exit();
?>