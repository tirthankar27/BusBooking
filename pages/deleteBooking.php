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

<body class="h-screen flex items-center justify-center bg-cover">
    <?php if ($result->num_rows > 0) : ?>
        <main class="flex justify-center items-center h-full w-full sm:h-screen bg-cover">
            <div class="flex flex-col justify-center items-center h-screen w-full sm:w-2/5 bg-white bg-opacity-70 p-6 sm:p-10" style="background-image: url(../images/bg8.png); background-size: cover; background-position: center;">
                <h1 class="text-green-700 text-3xl sm:text-4xl lg:text-5xl font-bold mb-4 text-center">Select Date</h1>
                <form action="" method="post" class="flex flex-col w-full space-y-4">
                    <div class="w-full flex justify-center">
                        <select name="date" id="date" required class="h-16 w-full sm:w-full lg:w-96 border-2 border-green-700 rounded-md p-2">
                            <option value="" disabled selected> Select DOJ </option>
                            <?php
                            while ($rows = $result->fetch_assoc())
                                echo "<option value='{$rows['doj']}'> {$rows['doj']} {$rows['passenger']} </option>";
                            ?>
                        </select>
                    </div>
                    <div class="w-full flex justify-center">
                        <button type="submit" class="h-16 w-full sm:w-32 mt-4 bg-green-700 rounded-lg hover:bg-green-800 text-white">
                            Delete
                        </button>
                    </div>
                </form>
                <div class="w-full sm:w-auto">
                    <button onclick="history.back()" class="h-16 w-full sm:w-32 mt-4 bg-green-700 rounded-lg hover:bg-green-800 text-white">
                        Go Back
                    </button>
                </div>
            </div>
            <div class="hidden sm:block bg-cover h-full w-full sm:w-3/5" style="background-image: url(../images/bg2.jpg);">
            </div>
        </main>
    <?php endif ?>
</body>




</html>