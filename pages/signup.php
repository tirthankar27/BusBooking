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
    <main class="flex flex-row justify-center items-center bg-cover h-dvh w-dvw">
        <div class="h-full w-3/5 bg-cover" style="background-image: url(../images/bg3.jpeg);">
            
        </div>
        <div class="flex flex-col justify-center items-center bg-cover h-full w-2/5 bg-white bg-opacity-70" style="background-image: url(../images/bg8.jpg);">
            <h2 class="text-green-600 text-7xl font-bold mb-4">Sign Up</h2>
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
                        <button type="submit" class="bg-green-600 hover:bg-green-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Sign up</button>
                    </div>
                    <div class="flex justify-center">
                        <a href="../main.php" class="bg-green-600 hover:bg-green-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Back to Home</a>
                    </div>
                </div>
                <div>
                    <a href="login.php" class="flex justify-center items-center text-blue-400 hover:text-blue-600">Already have an account? SignIn</a>
                </div>
            </form>
        </div>
    </main>
</body>
</html>