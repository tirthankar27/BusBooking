<?php include '../backend/ticketsBookBackend.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Your Ticket</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="../assets/seatNumber.js"></script>
    <link rel="icon" type="image/x-icon" href="../assets/logo/favicon.ico">
</head>

<body>
    <main class="flex flex-col sm:flex-row justify-center items-center h-screen bg-cover">
        <div class="flex flex-col justify-center items-center h-screen w-full sm:w-2/5 bg-white bg-opacity-70 p-6 sm:p-10" style="background-image: url(../assets/images/bg8.png); background-size: cover; background-position: center;">
            <h1 class="text-green-700 font-bold text-xl sm:text-5xl text-center mb-8">Fill out details</h1>
            <form action="" method="post" class="flex flex-col items-center w-full space-y-4">
                <div class="w-full">
                    <label for="numPassengers" class="block text-gray-700 font-bold">Number of Passengers</label>
                    <input type="number" id="numPassengers" name="numPassengers" min="1" max="10" value="1" required
                        class="h-10 w-full rounded-lg p-2 border-2 border-green-700 focus:outline-none focus:ring-2 focus:ring-green-500"
                        onchange="generatePassengerInputs()">
                </div>

                <div id="passengerInputs" class="w-full space-y-2">
                    <input type="text" name="passenger[]" placeholder="Passenger Name" required
                        class="h-10 w-full rounded-lg p-2 border-2 border-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>

                <button id="openModal" type="button"
                    class="h-8 w-full bg-green-700 rounded-lg hover:bg-green-800 duration-300 text-white text-lg">
                    Select Seats
                </button>

                <input type="hidden" name="selectedSeats" id="seatInput" required>

                <div id="myModal" class="fixed inset-0 h-full w-full backdrop-blur-sm hidden justify-center items-center">
                    <div class="flex flex-col bg-white p-4 rounded-lg justify-center items-center">
                        <h2 class="text-lg font-bold mb-4">Select Your Seats</h2>
                        <div class="grid grid-cols-7 gap-2">
                        <?php
                            
                            $seatNumber = 1;
                            for ($row = 0; $row < 10; $row++) {
                                echo "<tr>";
                                $leftSeats = [$seatNumber + 2, $seatNumber + 1, $seatNumber];
                                $rightSeats = [$seatNumber + 3, $seatNumber + 4, $seatNumber + 5];
                                $seatNumber += 6;
                                
                                foreach ($leftSeats as $seat) {
                                    if ($seat <= 60) {
                                        $status = in_array($seat, $bookedSeats) ? 'bg-red-500 cursor-not-allowed' : 'bg-green-500 hover:bg-green-600 cursor-pointer';
                                        $clickHandler = !in_array($seat, $bookedSeats) ? "onclick='toggleSeat($seat)'" : "";
                                        echo "<td class='p-1'><div id='seat-$seat' class='flex items-center justify-center text-white text-sm font-bold w-6 h-6 rounded $status' $clickHandler>$seat</div></td>";
                                    }
                                }
                                
                                echo "<div class='col-span-1'></div>";
                                
                                foreach ($rightSeats as $seat) {
                                    if ($seat <= 60) {
                                        $status = in_array($seat, $bookedSeats) ? 'bg-red-500 cursor-not-allowed' : 'bg-green-500 hover:bg-green-600 cursor-pointer';
                                        $clickHandler = !in_array($seat, $bookedSeats) ? "onclick='toggleSeat($seat)'" : "";
                                        echo "<td class='p-1'><div id='seat-$seat' class='flex items-center justify-center text-white text-sm font-bold w-6 h-6 rounded $status' $clickHandler>$seat</div></td>";
                                    }
                                }
                                
                            }
                            ?>

                        </div>
                        <button id="closeModal" type="button"
                            class="mt-4 px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">Close</button>
                    </div>
                </div>

                <div class="w-1/3">
                    <button type="submit"
                        class="h-10 w-full bg-green-700 rounded-lg hover:bg-green-800 duration-300 text-white text-lg">
                        Book Tickets
                    </button>
                </div>
            </form>
            <div class="flex justify-center items-center h-10 w-1/3 mt-4 bg-green-700 rounded-lg text-white text-lg text-center py-3 hover:bg-green-800 duration-300">
                <a onclick="history.back()">
                    Go Back
                </a>
            </div>
        </div>
        <div class="hidden sm:block sm:w-3/5 h-full bg-cover" style="background-image: url(../assets/images/bg2.jpg);">
        </div>
    </main>
</body>

</html>

<script src="../assets/multiPassenger.js"></script>