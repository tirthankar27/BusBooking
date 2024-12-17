<?php
    session_start();
    include 'users.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $checkStmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $checkStmt->bind_param("s", $email);
        $checkStmt->execute();
        $result = $checkStmt->get_result();

        if ($result->num_rows > 0) {
            echo "<script>alert('User with this email already exists. Please use another email or login.'); window.location.href='signup.php';</script>";
        } else {
            $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $name, $email, $password);

            if ($stmt->execute()) {
                echo "<script>alert('Signup successful! Please login.'); window.location.href='login.php';</script>";
                exit();
            } else {
                echo "<script>alert('Error: " . $stmt->error . "'); window.location.href='signup.php';</script>";
            }
            $stmt->close();
        }
        $checkStmt->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <main class="flex justify-center items-center bg-cover h-dvh w-dvw" style="background-image: url(../images/bus2.jpg);">
        <div class="flex flex-col justify-center items-center h-1/2 w-1/2 bg-green-300 bg-opacity-70 rounded-lg">
            <h2 class="text-green-600 text-7xl font-bold mb-4">SignUp</h2>
            <form method="POST" action="" class="space-y-2">
                <div>
                    <input type="text" name="name" id="name" placeholder="Name" size="50" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div>
                    <input type="email" name="email" id="email" placeholder="Email" size="50" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div>
                    <input type="password" name="password" id="password" placeholder="Password (min 8 characters)" size="50" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="flex flex-row justify-center space-x-2">
                    <div class="flex justify-center">
                        <button type="submit" class="bg-green-600 hover:bg-green-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Sign Up</button>
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