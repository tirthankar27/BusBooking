<?php
    session_start();
    include 'users.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_SESSION['passenger'] = $_POST['passenger'];
        $_SESSION['seat'] = $_POST['seat'];
        if($_SESSION['passenger'] && $_SESSION['seat']){
            $checkStmt=$conn->prepare("SELECT * FROM bookings WHERE seat = ? AND doj = ?");
            $checkStmt->bind_param('ss',$_SESSION['seat'],$_SESSION['date']);
            $checkStmt->execute();
            $result = $checkStmt->get_result();
            if($result->num_rows > 0){
                echo "<script> alert('This seat has already been taken for this date.'); window.location.href='ticketsBook.php'; </script>";
            }
            else{
                echo "<script>window.location.href='payment.php';</script>";
            }
            $checkStmt->close();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Your Ticket</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <main class="flex justify-center items-center py-40 h-auto sm:h-screen bg-cover" style="background-image: url(../images/bg2.jpg);">
        <div class="flex flex-col justify-center items-center bg-green-400 bg-opacity-70 h-full w-full sm:w-4/5 md:w-1/2 rounded-lg p-6">
            <h1 class="text-white font-bold text-3xl sm:text-5xl text-center mb-8">Fill out details</h1>
            <form action="" method="post" class="flex flex-col sm:flex-row items-center w-full space-y-4 sm:space-y-0 sm:space-x-4">
                <div class="w-full sm:w-1/3">
                    <input type="text" name="passenger" placeholder="Passenger's Name" size="30" required class="h-16 w-full rounded-lg p-4">
                </div>
                <div class="w-full sm:w-1/3">
                    <select name="seat" id="seat" required class="h-16 w-full rounded-lg p-4">
                        <option value="" disabled selected> Select a seat </option>
                        <?php
                        for ($i = 1; $i <= 60; $i++)
                            echo "<option value='$i'> $i </option>";
                        ?>
                    </select>
                </div>
                <div class="w-full sm:w-1/3">
                    <button type="submit" class="h-16 w-full bg-green-700 rounded-lg hover:bg-green-800 text-white text-lg">Book</button>
                </div>
            </form>
            <a onclick="history.back()" class="h-16 w-full sm:w-1/3 mt-4 bg-green-700 rounded-lg text-white text-lg text-center block py-3 hover:bg-green-800">Go Back</a>
        </div>
    </main>
</body>

</html>