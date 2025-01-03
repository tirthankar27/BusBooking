<?php session_start()?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo $_SESSION['source'] . " to " . $_SESSION['dest']; ?> </title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php include 'header.php'; ?>
    <main class="flex justify-center items-center px-4 sm:px-6 md:px-8">
        <?php if ($_SESSION['source'] == 'Ravangla' && $_SESSION['dest'] == 'Silliguri'): ?>
            <div class="flex flex-col sm:flex-row justify-center items-center mt-12 sm:mt-48 bg-green-300 w-full sm:w-11/12 rounded-lg shadow-lg p-4">
                <div class="h-full w-full sm:w-1/4 overflow-hidden rounded-lg mb-4 sm:mb-0">
                    <img src="../images/bus1.jpg" alt="bus" class="w-full h-full object-cover">
                </div>
                <div class="flex flex-col sm:flex-row justify-between items-center w-full space-y-4 sm:space-y-0 sm:space-x-8 mt-4">
                    <div class="w-full sm:w-1/6 text-center">
                        <h2 class="text-green-800 text-xl font-semibold">Sikkim Tours n Travels</h2>
                    </div>
                    <div class="flex flex-col justify-center items-center w-full sm:w-1/6 text-center">
                        <h2 class="text-green-800 text-2xl">Ravangla</h2>
                        <p class="text-green-800 text-lg">6:30 AM</p>
                    </div>
                    <div class="w-full sm:w-1/6 text-center">
                        <h2 class="text-green-800 text-xl">06h 00m</h2>
                    </div>
                    <div class="flex flex-col justify-center items-center w-full sm:w-1/6 text-center">
                        <h2 class="text-green-800 text-2xl">Silliguri</h2>
                        <p class="text-green-800 text-lg">12:30 PM</p>
                    </div>
                    <div class="w-full sm:w-1/6 text-center">
                        <h2 class="text-green-800 text-2xl">₹300*</h2>
                    </div>
                    <div class="w-full sm:w-1/6 text-center">
                        <button onclick="window.location.href = 'ticketsBook.php'" class="bg-green-600 text-white w-full py-2 rounded-md hover:bg-green-700">
                            Book
                        </button>
                        <button onclick="history.back()" class="bg-green-600 text-white mt-4 py-2 px-4 rounded-md hover:bg-green-800">
                            Go Back
                        </button>
                    </div>
                </div>
            </div>
        <?php elseif ($_SESSION['source'] == 'Silliguri' && $_SESSION['dest'] == 'Ravangla'): ?>
            <div class="flex flex-col sm:flex-row justify-center items-center mt-12 sm:mt-48 bg-green-300 w-full sm:w-11/12 rounded-lg shadow-lg p-4">
                <div class="h-full w-full sm:w-1/4 overflow-hidden rounded-lg mb-4 sm:mb-0">
                    <img src="../images/bus2.jpg" alt="bus" class="w-full h-full object-cover">
                </div>
                <div class="flex flex-col sm:flex-row justify-between items-center w-full space-y-4 sm:space-y-0 sm:space-x-8 mt-4">
                    <div class="w-full sm:w-1/6 text-center">
                        <h2 class="text-green-800 text-xl font-semibold">Sikkim Tours n Travels</h2>
                    </div>
                    <div class="flex flex-col justify-center items-center w-full sm:w-1/6 text-center">
                        <h2 class="text-green-800 text-2xl">Silliguri</h2>
                        <p class="text-green-800 text-lg">1:00 PM</p>
                    </div>
                    <div class="w-full sm:w-1/6 text-center">
                        <h2 class="text-green-800 text-xl">07h 00m</h2>
                    </div>
                    <div class="flex flex-col justify-center items-center w-full sm:w-1/6 text-center">
                        <h2 class="text-green-800 text-2xl">Ravangla</h2>
                        <p class="text-green-800 text-lg">8:00 PM</p>
                    </div>
                    <div class="w-full sm:w-1/6 text-center">
                        <h2 class="text-green-800 text-2xl">₹300*</h2>
                    </div>
                    <div class="w-full sm:w-1/6 text-center">
                        <button onclick="window.location.href = 'ticketsBook.php'" class="bg-green-600 text-white w-full py-2 rounded-md hover:bg-green-700">
                            Book
                        </button>
                        <button onclick="history.back()" class="bg-green-600 text-white mt-4 py-2 px-4 rounded-md hover:bg-green-800">
                            Go Back
                        </button>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="flex flex-col justify-center items-center mt-12 sm:mt-48">
                <h1 class="text-green-700 text-3xl sm:text-5xl font-bold">Sorry, we don't serve to these locations yet! 😞</h1>
                <button onclick="history.back()" class="bg-green-600 text-white w-1/3 sm:w-1/6 mt-4 py-2 px-4 rounded-md hover:bg-green-800">
                    Go Back
                </button>
            </div>
        <?php endif; ?>
    </main>
</body>

</html>