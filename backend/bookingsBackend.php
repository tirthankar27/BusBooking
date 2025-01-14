<?php
    session_start();
    include 'users.php';
    $mail = $_SESSION['email'];
    $stmt = $conn->prepare("SELECT * FROM bookings where email = ?");
    $stmt->bind_param('s', $mail);
    $stmt->execute();
    $result = $stmt->get_result();
    $time=date("Y-m-d");
?>