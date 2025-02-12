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
    $passengers = $_POST['passenger'];
    $seats = explode(',', $_POST['selectedSeats']);

    if (count($passengers) !== count($seats)) {
        echo "<script> alert('Number of passengers and selected seats must match!'); window.location.href='ticketBooking.php'; </script>";
        exit;
    }

    $_SESSION['passengers'] = $passengers;
    $_SESSION['seats'] = $seats;

    $errors = [];
    foreach ($seats as $seat) {
        $checkStmt = $conn->prepare("SELECT * FROM bookings WHERE seat = ? AND doj = ?");
        $checkStmt->bind_param('ss', $seat, $_SESSION['date']);
        $checkStmt->execute();
        $result = $checkStmt->get_result();

        if ($result->num_rows > 0) {
            $errors[] = "Seat $seat is already taken.";
        }
        $checkStmt->close();
    }

    if (!empty($errors)) {
        echo "<script> alert('" . implode("\\n", $errors) . "'); window.location.href='ticketBooking.php'; </script>";
    } else {
        echo "<script>window.location.href='paymentFrontend.php';</script>";
    }
}
?>