<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $res = $conn->query("SELECT status FROM users WHERE id = $id");
    if ($row = $res->fetch_assoc()) {
        $new_status = ($row['status'] == 1) ? 0 : 1;
        $conn->query("UPDATE users SET status = $new_status WHERE id = $id");
    }
}

header("Location: index.php");
exit();
?>