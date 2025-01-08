<?php
    session_start();
    include 'users.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'] ?? null;
        $email = $_POST['email'] ?? null;
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        if($email && $password){
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
    <main class="flex justify-center items-center bg-cover h-screen w-full">
        <div class="hidden sm:block sm:w-3/5 h-full bg-cover" style="background-image: url(../images/bg3.jpeg);">
        </div>
        <div class="flex flex-col justify-center items-center h-screen w-full sm:w-2/5 bg-white bg-opacity-70 p-6 sm:p-10" style="background-image: url(../images/bg8.jpg); background-size: cover; background-position: center;">
            <h2 class="text-green-600 text-4xl sm:text-7xl font-bold mb-4 text-center">Sign Up</h2>
            <form method="POST" action="" class="space-y-4 w-full max-w-md mx-auto">
                <div>
                    <input type="text" name="name" id="name" placeholder="Name" size="50" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div>
                    <input type="email" name="email" id="email" placeholder="Email" size="50" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div>
                    <input type="password" name="password" id="password" placeholder="Password (min 8 characters)" size="50" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="flex flex-col sm:flex-row justify-center space-y-2 sm:space-y-0 sm:space-x-4 w-full">
                    <button type="submit" class="bg-green-600 hover:bg-green-800 duration-300 text-white font-bold py-2 px-6 rounded focus:outline-none focus:shadow-outline w-full sm:w-auto">Sign up</button>
                    <a href="../main.php" class="bg-green-600 hover:bg-green-800 duration-300 text-white font-bold py-2 px-6 rounded focus:outline-none focus:shadow-outline w-full sm:w-auto text-center">Back to Home</a>
                </div>
                <div class="text-center mt-4">
                    <a href="login.php" class="text-blue-400 hover:text-blue-600">Already have an account? SignIn</a>
                </div>
            </form>
        </div>
    </main>
</body>

</html>