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
    <main class="flex justify-center items-center bg-cover h-screen w-full">
        <div class="hidden sm:block sm:w-3/5 h-full bg-cover" style="background-image: url(../images/bg3.jpeg);">
        </div>
        <div class="flex flex-col justify-center items-center h-screen w-full sm:w-2/5 bg-white bg-opacity-70 p-6 sm:p-10" style="background-image: url(../images/bg8.jpg); background-size: cover; background-position: center;">
            <h2 class="text-green-600 text-4xl sm:text-7xl font-bold mb-4 text-center">Sign In</h2>
            <form method="POST" action="" class="space-y-4 w-full max-w-md mx-auto">
                <div>
                    <input type="email" name="email" id="email" placeholder="Email" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div>
                    <input type="password" name="password" id="password" placeholder="Password (min 8 characters)" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="flex flex-col sm:flex-row justify-center space-y-2 sm:space-y-0 sm:space-x-4 w-full">
                    <button type="submit" class="bg-green-600 hover:bg-green-800 text-white font-bold py-2 px-6 rounded focus:outline-none focus:shadow-outline w-full sm:w-auto">Sign in</button>
                    <a href="../main.php" class="bg-green-600 hover:bg-green-800 text-white font-bold py-2 px-6 rounded focus:outline-none focus:shadow-outline w-full sm:w-auto text-center">Back to Home</a>
                </div>
                <div class="text-center mt-4">
                    <a href="signup.php" class="text-blue-400 hover:text-blue-600">Don't have an account? SignUp</a>
                </div>
            </form>
        </div>
    </main>
</body>


</html>