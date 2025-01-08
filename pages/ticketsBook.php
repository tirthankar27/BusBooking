<?php
session_start();
include 'users.php';
$bookedSeats = [];
if (isset($_SESSION['date'])) {
    $stmt = $conn->prepare("SELECT seat FROM bookings WHERE doj=?");
    $stmt->bind_param("s", $_SESSION['date']);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $bookedSeats[] = $row['seat'];
    }
    $stmt->close();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['passenger'] = $_POST['passenger'];
    $_SESSION['seat'] = $_POST['seat'];
    if ($_SESSION['passenger'] && $_SESSION['seat']) {
        $checkStmt = $conn->prepare("SELECT * FROM bookings WHERE seat = ? AND doj = ?");
        $checkStmt->bind_param('ss', $_SESSION['seat'], $_SESSION['date']);
        $checkStmt->execute();
        $result = $checkStmt->get_result();
        if ($result->num_rows > 0) {
            echo "<script> alert('This seat has already been taken for this date.'); window.location.href='ticketsBook.php'; </script>";
        } else {
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
    <script>
        window.onload = function () {
            modalOpener();
        };

        function modalOpener() {
            const modal = document.getElementById("myModal");
            const openModalButton = document.getElementById("openModal");
            const closeModalButton = document.getElementById("closeModal");

            openModalButton.addEventListener("click", (event) => {
                event.preventDefault();
                modal.classList.remove("hidden");
                modal.classList.add("flex");
            });

            closeModalButton.addEventListener("click", () => {
                modal.classList.remove("flex");
                modal.classList.add("hidden");
            });
        }

        function selectSeat(seatNumber) {
            const previouslySelected = document.querySelector(".bg-yellow-400");
            if (previouslySelected) {
                previouslySelected.classList.remove("bg-yellow-400", "text-black");
            }

            const selectedSeat = document.getElementById("seat-" + seatNumber);
            selectedSeat.classList.add("bg-yellow-400", "text-black");
            document.getElementById("seatInput").value = seatNumber;
        }
    </script>
</head>

<body>
    <main class="flex flex-col sm:flex-row justify-center items-center h-screen bg-cover" style="background-image: url(../images/bg9.jpg);">
        <div class="flex flex-col justify-center items-center bg-white bg-opacity-70 h-full w-full sm:w-4/5 md:w-2/5 p-6" style="background-image: url(../images/bg8.jpg);">
            <h1 class="text-green-700 font-bold text-xl sm:text-5xl text-center mb-8">Fill out details</h1>
            <form action="" method="post" class="flex flex-col items-center w-full space-y-4">
                <div class="w-full">
                    <input type="text" name="passenger" placeholder="Passenger's Name" size="30" required
                        class="h-16 w-full rounded-lg p-4 border-2 border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>
                <button id="openModal" type="button" class="h-8 w-2/3 bg-green-700 rounded-lg hover:bg-green-800 duration-300 text-white text-lg">
                    Select Seat
                </button>
                <div id="myModal" class="fixed inset-0 bg-gray-500 h-full w-full bg-opacity-50 hidden justify-center items-center">
                    <div class="bg-white p-4 rounded-lg">
                        <h2 class="text-lg font-bold mb-4">Select Your Seat</h2>
                        <input type="hidden" name="seat" id="seatInput" required>
                        <div class="grid grid-cols-7 gap-2">
                            <?php
                            $seatNumber = 1;
                            for ($row = 0; $row < 10; $row++) {
                                $leftSeats = [];
                                for ($i = 0; $i < 3; $i++) {
                                    if ($seatNumber <= 60) {
                                        array_unshift($leftSeats, $seatNumber);
                                        $seatNumber++;
                                    }
                                }
                                $rightSeats = [];
                                for ($i = 0; $i < 3; $i++) {
                                    if ($seatNumber <= 60) {
                                        $rightSeats[] = $seatNumber;
                                        $seatNumber++;
                                    }
                                }
                                foreach ($leftSeats as $seat) {
                                    $status = in_array($seat, $bookedSeats) ? 'bg-red-500 cursor-not-allowed' : 'bg-green-500 hover:bg-green-600 cursor-pointer';
                                    $clickHandler = !in_array($seat, $bookedSeats) ? "onclick='selectSeat($seat)'" : '';
                                    echo "<div id='seat-$seat' class='flex items-center justify-center text-white text-sm font-bold w-8 h-8 rounded $status' $clickHandler>$seat</div>";
                                }
                                echo "<div class='col-span-1'></div>";
                                foreach ($rightSeats as $seat) {
                                    $status = in_array($seat, $bookedSeats) ? 'bg-red-500 cursor-not-allowed' : 'bg-green-500 hover:bg-green-600 cursor-pointer';
                                    $clickHandler = !in_array($seat, $bookedSeats) ? "onclick='selectSeat($seat)'" : '';
                                    echo "<div id='seat-$seat' class='flex items-center justify-center text-white text-sm font-bold w-8 h-8 rounded $status' $clickHandler>$seat</div>";
                                }
                            }
                            ?>
                        </div>
                        <button id="closeModal" type="button" class="mt-4 px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">Close</button>
                    </div>
                </div>
                <div class="w-1/3">
                    <button type="submit" class="h-8 w-full bg-green-700 rounded-lg hover:bg-green-800 duration-300 text-white text-lg">Book</button>
                </div>
            </form>
            <div class="flex justify-center items-center h-10 w-1/3 mt-4 bg-green-700 rounded-lg text-white text-lg text-center py-3 hover:bg-green-800 duration-300">
                <a onclick="history.back()">
                    Go Back
                </a>
            </div>
        </div>
        <div class="hidden sm:block bg-cover h-full w-full sm:w-3/5" style="background-image: url(../images/bg2.jpg);">
        </div>
    </main>
</body>

</html>