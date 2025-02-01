<?php include '../backend/bookingsBackend.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['name']."'s"; ?> Bookings</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/x-icon" href="../assets/logo/favicon.ico">
</head>
<body class="bg-blue-50">
    <?php if($result->num_rows > 0):?>
        <main class="flex flex-col justify-center items-center h-auto w-full px-4 sm:px-8 lg:px-16">
            <h1 class="text-green-800 text-3xl sm:text-4xl lg:text-5xl font-bold mt-4">My Bookings</h1>
            <h1 class="text-green-800 text-xl sm:text-4xl lg:text-3xl font-bold mt-4">Upcoming Journeys</h1>
            <div class="flex flex-row flex-wrap justify-center items-center w-full bg-green-200 mt-3 py-3">
                <div class="w-1/2 sm:w-1/6 text-center text-green-800 font-bold text-lg sm:text-xl lg:text-2xl">Passenger</div>
                <div class="w-1/2 sm:w-1/6 text-center text-green-800 font-bold text-lg sm:text-xl lg:text-2xl">From</div>
                <div class="w-1/2 sm:w-1/6 text-center text-green-800 font-bold text-lg sm:text-xl lg:text-2xl">Date</div>
                <div class="w-1/2 sm:w-1/6 text-center text-green-800 font-bold text-lg sm:text-xl lg:text-2xl">To</div>
                <div class="w-1/2 sm:w-1/6 text-center text-green-800 font-bold text-lg sm:text-xl lg:text-2xl">Seat</div>
                <div class="w-1/2 sm:w-1/6 text-center text-green-800 font-bold text-lg sm:text-xl lg:text-2xl">Fare</div>
            </div>
            <?php 
                while($row=mysqli_fetch_assoc($result)){
                    if($time<$row['doj']){
                        echo'<div class="flex flex-row flex-wrap bg-green-300 w-full shadow-lg p-4 mt-4">
                        <div class="w-1/2 sm:w-1/6 text-center">
                        <h2 class="text-green-800 text-lg sm:text-xl font-semibold">'.$row['passenger'].'</h2>
                        </div>
                        <div class="w-1/2 sm:w-1/6 text-center">
                        <h2 class="text-green-800 text-lg sm:text-xl font-semibold">'.$row['source'].'</h2>
                        </div>
                        <div class="w-1/2 sm:w-1/6 text-center">
                        <h2 class="text-green-800 text-lg sm:text-xl font-semibold">'.$row['doj'].'</h2>
                        </div>
                        <div class="w-1/2 sm:w-1/6 text-center">
                        <h2 class="text-green-800 text-lg sm:text-xl font-semibold">'.$row['dest'].'</h2>
                        </div>
                        <div class="w-1/2 sm:w-1/6 text-center">
                        <h2 class="text-green-800 text-lg sm:text-xl font-semibold">'.$row['seat'].'</h2>
                        </div>
                        <div class="w-1/2 sm:w-1/6 text-center">
                        <h2 class="text-green-800 text-lg sm:text-xl">₹'.$row['fare'].'</h2>
                        </div>
                        </div>';
                    }
                }
                mysqli_data_seek($result,0);
            ?>
            <h1 class="text-green-800 text-xl sm:text-4xl lg:text-3xl font-bold mt-4">Completed Journeys</h1>
            <div class="flex flex-row flex-wrap justify-center items-center w-full bg-green-200 mt-3 py-3">
                <div class="w-1/2 sm:w-1/6 text-center text-green-800 font-bold text-lg sm:text-xl lg:text-2xl">Passenger</div>
                <div class="w-1/2 sm:w-1/6 text-center text-green-800 font-bold text-lg sm:text-xl lg:text-2xl">From</div>
                <div class="w-1/2 sm:w-1/6 text-center text-green-800 font-bold text-lg sm:text-xl lg:text-2xl">Date</div>
                <div class="w-1/2 sm:w-1/6 text-center text-green-800 font-bold text-lg sm:text-xl lg:text-2xl">To</div>
                <div class="w-1/2 sm:w-1/6 text-center text-green-800 font-bold text-lg sm:text-xl lg:text-2xl">Seat</div>
                <div class="w-1/2 sm:w-1/6 text-center text-green-800 font-bold text-lg sm:text-xl lg:text-2xl">Fare</div>
            </div>
            <?php 
                while($row=mysqli_fetch_assoc($result)){
                    if($time>$row['doj']){
                        echo'<div class="flex flex-row flex-wrap bg-green-300 w-full shadow-lg p-4 mt-4">
                        <div class="w-1/2 sm:w-1/6 text-center">
                        <h2 class="text-green-800 text-lg sm:text-xl font-semibold">'.$row['passenger'].'</h2>
                        </div>
                        <div class="w-1/2 sm:w-1/6 text-center">
                        <h2 class="text-green-800 text-lg sm:text-xl font-semibold">'.$row['source'].'</h2>
                        </div>
                        <div class="w-1/2 sm:w-1/6 text-center">
                        <h2 class="text-green-800 text-lg sm:text-xl font-semibold">'.$row['doj'].'</h2>
                        </div>
                        <div class="w-1/2 sm:w-1/6 text-center">
                        <h2 class="text-green-800 text-lg sm:text-xl font-semibold">'.$row['dest'].'</h2>
                        </div>
                        <div class="w-1/2 sm:w-1/6 text-center">
                        <h2 class="text-green-800 text-lg sm:text-xl font-semibold">'.$row['seat'].'</h2>
                        </div>
                        <div class="w-1/2 sm:w-1/6 text-center">
                        <h2 class="text-green-800 text-lg sm:text-xl">₹'.$row['fare'].'</h2>
                        </div>
                        </div>';
                    }
                }
            ?>
            <a href="deleteBookingFrontend.php" class="flex justify-center items-center h-12 w-40 mt-4 mb-2 bg-green-700 rounded-md text-white text-lg sm:text-xl hover:bg-green-800 duration-300">
                Delete Bookings
            </a>
            <a href="../main.php" class="flex justify-center items-center h-12 w-40 mb-2 bg-green-700 rounded-md text-white text-lg sm:text-xl hover:bg-green-800 duration-300">Go Back</a>
        </main>
    <?php else: ?>
        <main class="flex flex-col justify-center items-center h-screen px-4">
            <h1 class="text-green-700 text-3xl sm:text-4xl lg:text-5xl mt-10 font-bold text-center">No bookings made yet! 😞</h1>
            <a href="../main.php" class="flex justify-center items-center h-12 w-40 mt-4 bg-green-700 rounded-md text-white text-lg sm:text-xl hover:bg-green-800 duration-300">Go Back</a>
        </main>
    <?php endif ?>
</body>
</html>