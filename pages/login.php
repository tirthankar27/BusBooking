<?php
session_start();
include 'users.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    if ($email && $pass) {
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($pass, $user['password'])) {
                $_SESSION['id'] = $user['id'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['email'] = $user['email'];
                header("Location: ../main.php");
                exit();
            } else {
                $error = "Invalid password";
            }
        } else {
            $error = "No user found with this email";
        }
    } else {
        $error = "Provide both email and password";
    }
    echo "<script> alert('$error') </script>";
}
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
    <main class="flex justify-center items-center bg-cover h-dvh w-dvw">
        <div class="h-full w-3/5 bg-cover" style="background-image: url(../images/bg3.jpeg);">

        </div>
        <div class="flex flex-col justify-center items-center bg-cover h-full w-2/5 bg-white bg-opacity-70" style="background-image: url(../images/bg8.jpg);">
            <h2 class="text-green-600 text-7xl font-bold mb-4">Sign In</h2>
            <form method="POST" action="" class="space-y-2">
                <div>
                    <input type="email" name="email" id="email" placeholder="Email" size="50" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div>
                    <input type="password" name="password" id="password" placeholder="Password (min 8 characters)" size="50" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="flex flex-row justify-center space-x-2">
                    <div class="flex justify-center">
                        <button type="submit" class="bg-green-600 hover:bg-green-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Sign in</button>
                    </div>
                    <div class="flex justify-center">
                        <a href="../main.php" class="bg-green-600 hover:bg-green-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Back to Home</a>
                    </div>
                </div>
                <div>
                    <a href="signup.php" class="flex justify-center items-center text-blue-400 hover:text-blue-600">Don't have an account? SignUp</a>
                </div>
            </form>
        </div>
    </main>
</body>

</html>