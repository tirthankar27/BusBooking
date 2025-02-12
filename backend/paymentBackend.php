<?php
session_start();
include 'users.php';
$sql = $conn->prepare("SELECT * FROM bookings WHERE email=?");
$sql->bind_param("s", $_SESSION['email']);
$sql->execute();
$result = $sql->get_result();
if ($result->num_rows > 0) {
    $discount = 0;
} else {
    $discount = 0.15;
}
if (isset($_SESSION['seats']) && is_array($_SESSION['seats'])) {
    $seats = $_SESSION['seats'];
} elseif (isset($_SESSION['seat'])) {
    if (is_string($_SESSION['seat']) && strpos($_SESSION['seat'], ',') !== false) {
        $seats = explode(',', $_SESSION['seat']);
    } else {
        $seats = [$_SESSION['seat']];
    }
} else {
    $seats = [];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_SESSION['source'] == 'Ravangla') {
        $datetime = $_SESSION['date'] . " 6:00";
    } else {
        $datetime = $_SESSION['date'] . " 13:00";
    }
    $passengers = is_array($_SESSION['passengers']) ? $_SESSION['passengers'] : [$_SESSION['passengers']];
    if (count($passengers) !== count($seats)) {
        die("Mismatch between passengers and seats");
    }
    foreach ($passengers as $index => $pax) {
        $seat = $seats[$index];
        $seatNum = (int)$seat;
        $price = ($seatNum % 3 == 0) ? 350 : 300;
        $fare = $price - ($price * $discount);
        $stmt = $conn->prepare("INSERT INTO bookings (passenger, source, dest, doj, seat, fare, email) VALUES (?,?,?,?,?,?,?)");
        $stmt->bind_param('sssssss', $pax, $_SESSION['source'], $_SESSION['dest'], $datetime, $seat, $fare, $_SESSION['email']);
        if (!$stmt->execute()) {
            echo "<script>alert('Payment unsuccessful');</script>";
            exit();
        }
        $stmt->close();
    }
    echo "<script>alert('Payment successful');window.location.href='successFrontend.php';</script>";
    exit();
}
?>
