<?php
    session_start();
    include 'users.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex bg-cover">
    <main class="flex justify-center items-center bg-cover h-dvh w-dvw" style="background-image: url(../images/bus2.jpg);">
        <div class="flex flex-col justify-center items-center h-1/2 w-1/2 bg-green-300 bg-opacity-70 rounded-lg">
            <h2 class="text-green-600 text-7xl font-bold mb-4">Login</h2>
            <form method="POST" action="" class="space-y-2">
                <div>
                    <input type="email" name="email" id="email" placeholder="Email" size="50" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div>
                    <input type="password" name="password" id="password" placeholder="Password (min 8 characters)" size="50" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="flex flex-row justify-center space-x-2">
                    <div class="flex justify-center">
                        <button type="submit" class="bg-green-600 hover:bg-green-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Login</button>
                    </div>
                    <div class="flex justify-center">
                        <a href="../index.php" class="bg-green-600 hover:bg-green-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Back to Home</a>
                    </div>
                </div>
            </form>
        </div>
    </main>
</body>
</html>