<?php
session_start();
include 'users.php';
$bookedSeats = [];
if (isset($_SESSION['date'])) {
    if($_SESSION['source']=='Ravangla'){
        $datetime=$_SESSION['date']." 6:00";
        $stmt = $conn->prepare("SELECT seat FROM bookings WHERE doj=?");
        $stmt->bind_param("s", $datetime);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $bookedSeats[] = $row['seat'];
        }
        $stmt->close();
    }
    else{
        $datetime=$_SESSION['date']." 13:00";
        $stmt = $conn->prepare("SELECT seat FROM bookings WHERE doj=?");
        $stmt->bind_param("s", $datetime);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $bookedSeats[] = $row['seat'];
        }
        $stmt->close();
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['passenger'] = $_POST['passenger'];
    $_SESSION['seat'] = $_POST['seat'];
    if ($_SESSION['passenger'] && $_SESSION['seat']) {
        $checkStmt = $conn->prepare("SELECT * FROM bookings WHERE seat = ? AND doj = ?");
        $checkStmt->bind_param('ss', $_SESSION['seat'], $_SESSION['date']);
        $checkStmt->execute();
        $result = $checkStmt->get_result();
        if ($result->num_rows > 0) {
            echo "<script> alert('This seat has already been taken for this date.'); window.location.href='ticketsBookFrontend.php'; </script>";
        } else {
            echo "<script>window.location.href='paymentFrontend.php';</script>";
        }
        $checkStmt->close();
    }
}
?>