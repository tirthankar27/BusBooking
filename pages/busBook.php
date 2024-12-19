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
    <main class="flex justify-center items-center">
        <?php if ($_SESSION['source'] == 'Ravangla' && $_SESSION['dest'] == 'Silliguri'): ?>
            <div class="flex flex-row justify-center items-center mt-48 bg-green-300 h-auto w-11/12 rounded-lg shadow-lg p-4">
                <div class="h-full w-1/4 overflow-hidden rounded-lg">
                    <img src="../images/bus1.jpg" alt="bus" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div class="flex flex-row justify-between items-center w-full space-x-8 mt-4">
                    <div class="w-1/6 text-center">
                        <h2 class="text-green-800 text-xl font-semibold">Sikkim Tours n Travels</h2>
                    </div>
                    <div class="flex flex-col justify-center items-center w-1/6 text-center">
                        <h2 class="text-green-800 text-2xl">Ravangla</h2>
                        <p class="text-green-800 text-lg">6:30 AM</p>
                    </div>
                    <div class="w-1/6 text-center">
                        <h2 class="text-green-800 text-xl">06h 00m</h2>
                    </div>
                    <div class="flex flex-col justify-center items-center w-1/6 text-center">
                        <h2 class="text-green-800 text-2xl">Silliguri</h2>
                        <p class="text-green-800 text-lg">12:30 PM</p>
                    </div>
                    <div class="w-1/6 text-center">
                        <h2 class="text-green-800 text-2xl">₹300</h2>
                    </div>
                    <div class="w-1/6 text-center">
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
            <div class="flex flex-row justify-center items-center mt-48 bg-green-300 h-auto w-11/12 rounded-lg shadow-lg p-4">
                <div class="h-full w-1/4 overflow-hidden rounded-lg">
                    <img src="../images/bus2.jpg" alt="bus" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div class="flex flex-row justify-between items-center w-full space-x-8 mt-4">
                    <div class="w-1/6 text-center">
                        <h2 class="text-green-800 text-xl font-semibold">Sikkim Tours n Travels</h2>
                    </div>
                    <div class="flex flex-col justify-center items-center w-1/6 text-center">
                        <h2 class="text-green-800 text-2xl">Silliguri</h2>
                        <p class="text-green-800 text-lg">1:00 PM</p>
                    </div>
                    <div class="w-1/6 text-center">
                        <h2 class="text-green-800 text-xl">07h 00m</h2>
                    </div>
                    <div class="flex flex-col justify-center items-center w-1/6 text-center">
                        <h2 class="text-green-800 text-2xl">Ravangla</h2>
                        <p class="text-green-800 text-lg">8:00 PM</p>
                    </div>
                    <div class="w-1/6 text-center">
                        <h2 class="text-green-800 text-2xl">₹300</h2>
                    </div>
                    <div class="w-1/6 text-center">
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
            <h1 class="text-green-700 text-5xl mt-56 font-bold">Sorry We don't serve to these locations yet! 😞</h1>
        <?php endif; ?>
    </main>
</body>

</html>