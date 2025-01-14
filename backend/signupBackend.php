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
                echo "<script>alert('User with this email already exists. Please use another email or login.'); window.location.href='../frontend/signupFrontend.php';</script>";
            } else {
                $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $name, $email, $password);
                
                if ($stmt->execute()) {
                    echo "<script>alert('Signup successful! Please login.'); window.location.href='../frontend/loginFrontend.php';</script>";
                    exit();
                } else {
                    echo "<script>alert('Error: " . $stmt->error . "'); window.location.href='../frontend/signupFrontend.php';</script>";
                }
                $stmt->close();
            }
            $checkStmt->close();
        }
    }
?>