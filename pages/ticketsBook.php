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
    <main class="flex justify-center items-center py-40 h-lvh w-lvw bg-cover" style="background-image: url(../images/bg2.jpg);">
        <div class="flex flex-col justify-center items-center bg-green-400 bg-opacity-70 h-full w-1/2 rounded-lg">
            <h1 class="text-white font-bold text-5xl">Fill out details</h1>
            <form action="" method="post" class="flex flex-row h-80 w-auto rounded-lg">
                <div class="my-auto">
                    <input type="text" name="passenger" placeholder="Passenger's Name" size="30" required class="h-16 w-48 rounded-l-lg">
                </div>
                <div class="my-auto">
                    <select name="seat" id="seat" required class="h-16 w-48">
                        <option value="" disabled selected> Select a seat </option>
                        <?php
                        for ($i = 1; $i <= 60; $i = $i + 1)
                            echo "<option value='$i'> $i </option>";
                        ?>
                    </select>
                </div>
                <div class="my-auto">
                    <button type="submit" class="h-16 w-32 bg-green-700 rounded-r-lg hover:bg-green-800">Book</Button>
                </div>
            </form>
            <a onclick="history.back()" class="h-16 w-32 mb-2 bg-green-700 rounded-md hover:bg-green-800">Go Back</>
        </div>
    </main>
</body>

</html>