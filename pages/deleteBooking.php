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

<body class="h-screen flex items-center justify-center">
    <?php if ($result->num_rows > 0) : ?>
        <main class="flex flex-col justify-center items-center bg-green-400 bg-opacity-70 h-auto sm:w-3/4 lg:w-1/2 p-4 rounded-lg shadow-lg">
            <h1 class="text-white font-bold text-3xl sm:text-4xl lg:text-5xl mb-4">Select date</h1>
            <form action="" method="post" class="flex flex-col w-full sm:w-auto sm:flex-row sm:space-x-4">
                <div class="my-auto w-full sm:w-48 flex">
                    <select name="date" id="date" required class="h-16 w-full rounded-l-lg">
                        <option value="" disabled selected> Select DOJ </option>
                        <?php
                        while ($rows = $result->fetch_assoc())
                            echo "<option value='{$rows['doj']}'> {$rows['doj']} {$rows ['passenger']} </option>";
                        ?>
                    </select>
                    <button type="submit" class="h-16 w-32 bg-green-700 rounded-r-lg hover:bg-green-800 text-white">Delete</button>
                </div>
            </form>
            <button onclick="history.back()" class="h-16 w-full sm:w-32 mt-4 bg-green-700 rounded-lg hover:bg-green-800 text-white">Go Back</button>
        </main>
    <?php endif ?>
</body>

</html>