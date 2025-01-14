<?php
session_start();
include 'users.php';
$checkstmt = $conn->prepare("SELECT * FROM bookings WHERE email=?");
$checkstmt->bind_param("s", $_SESSION['email']);
$checkstmt->execute();
$result = $checkstmt->get_result();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $conn->prepare("DELETE FROM bookings WHERE email=? and doj=?");
    $stmt->bind_param("ss", $_SESSION['email'], $_POST['date']);
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        echo "<script>alert('Booking deleted successfully.');window.location.href='bookingsFrontend.php'</script>";
    } else {
        echo "<script>alert('Booking is not found.');window.location.href='deleteBookingFrontend.php'</script>";
    }
    $stmt->close();
}
?>