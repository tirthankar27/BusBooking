<?php
    session_start();
    include 'users.php';
    $mail = $_SESSION['email'];
    $stmt = $conn->prepare("SELECT * FROM bookings where email = ?");
    $stmt->bind_param('s', $mail);
    $stmt->execute();
    $result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['name']."'s"; ?> Bookings</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <?php if($result->num_rows > 0):?>
        <main class="flex flex-col justify-center items-center h-lvh w-lvw">
            <h1 class="text-green-800 text-5xl font-bold">My Bookings</h1>
            <div class="flex flex-row justify-centerx items-center w-full bg-green-200 h-1/6">
                <div class="w-1/6 text-center text-green-800 font-bold text-2xl">Passenger</div>
                <div class="w-1/6 text-center text-green-800 font-bold text-2xl">From</div>
                <div class="w-1/6 text-center text-green-800 font-bold text-2xl">Date</div>
                <div class="w-1/6 text-center text-green-800 font-bold text-2xl">To</div>
                <div class="w-1/6 text-center text-green-800 font-bold text-2xl">Seat</div>
                <div class="w-1/6 text-center text-green-800 font-bold text-2xl">Fare</div>
            </div>
            <?php 
                while($row=mysqli_fetch_assoc($result)){
                    echo'<div class="flex flex-row bg-green-300 h-auto w-full shadow-lg p-4">
                            <div class="flex flex-row w-full mt-4 space-x-9">
                                <div class="w-1/6 text-center">
                                    <h2 class="text-green-800 text-xl font-semibold">'.$row['passenger'].'</h2>
                                </div>
                                <div class="flex flex-col justify-center items-center w-1/6 text-center">
                                    <h2 class="text-green-800 text-2xl font-semibold">'.$row['source'].'</h2>
                                </div>
                                <div class="w-1/6 text-center">
                                    <h2 class="text-green-800 text-xl font-semibold">'.$row['doj'].'</h2>
                                </div>
                                <div class="flex flex-col justify-center items-center w-1/6 text-center">
                                    <h2 class="text-green-800 text-2xl font-semibold">'.$row['dest'].'</h2>
                                </div>
                                <div class="w-1/6 text-center">
                                    <h2 class="text-green-800 text-xl font-semibold">'.$row['seat'].'</h2>
                                </div>
                                <div class="w-1/6 text-center">
                                    <h2 class="text-green-800 text-2xl">₹'.$row['fare'].'</h2>
                                </div>
                            </div>
                        </div>';
                }
            ?>
            <a href="deleteBooking.php" class="flex justify-center items-center h-16 w-32 mb-2 bg-green-700 rounded-md hover:bg-green-800">
                Delete Bookings
            </a>
            <a href="../main.php" class="flex justify-center items-center h-16 w-32 mb-2 bg-green-700 rounded-md hover:bg-green-800">Go Back</a>
        </main>
    <?php else: ?>
        <main class="flex flex-col justify-center items-center">
            <h1 class="text-green-700 text-5xl mt-56 font-bold">No bookings made yet! 😞</h1>
            <a href="../main.php" class="flex justify-center items-center h-16 w-32 mb-2 bg-green-700 rounded-md hover:bg-green-800">Go Back</a>
        </main>
    <?php endif ?>
</body>
</html>