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
        echo "<script>alert('Booking deleted successfully.');window.location.href='bookings.php'</script>";
    } else {
        echo "<script>alert('Booking is not found.');window.location.href='deleteBooking.php'</script>";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select date</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php if ($result->num_rows > 0) : ?>
        <main class="flex flex-col justify-center items-center h-lvh w-lvw">
            <div class="flex flex-col justify-center items-center bg-green-400 bg-opacity-70 h-1/2 w-1/2">
                <h1 class="text-white font-bold text-5xl">Select date</h1>
                <form action="" method="post" class="flex flex-row h-80 w-auto">
                    <div class="my-auto">
                        <select name="date" id="date" required class="h-16 w-48 rounded-s-lg">
                            <option value="" disabled selected> Select doj </option>
                            <?php
                            while ($rows = $result->fetch_assoc())
                                echo "<option value='{$rows['doj']}'> {$rows['doj']} </option>";
                            ?>
                        </select>
                    </div>
                    <div class="my-auto">
                        <button type="submit" class="h-16 w-32 bg-green-700 rounded-r-lg hover:bg-green-800">Delete</Button>
                    </div>
                </form>
                <button onclick="history.back()" class="h-16 w-32 mb-2 bg-green-700 rounded-md hover:bg-green-800">Go Back</button>
            </div>
        </main>
    <?php endif ?>
</body>

</html>