<?php
    session_start();
    include 'users.php';
    if($_SESSION['seat'] % 3 == 0) {
        $_SESSION['fare'] = 350;
    } else {
        $_SESSION['fare'] = 300;
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $stmt = $conn->prepare("INSERT INTO bookings (passenger, source, dest, doj, seat, fare, email) VALUES (?,?,?,?,?,?,?)");
        $stmt->bind_param('sssssss', $_SESSION['passenger'], $_SESSION['source'], $_SESSION['dest'], $_SESSION['date'], $_SESSION['seat'], $_SESSION['fare'], $_SESSION['email']);
        if($stmt->execute()) {
            echo "<script>alert('Payment successfull');window.location.href='../main.php';</script>";
            exit();
        }
        $stmt->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <main class="flex flex-row justify-center items-center h-auto sm:h-screen bg-cover">
        <div class="flex flex-col justify-center items-center h-screen w-full sm:w-2/5 bg-white bg-opacity-70 p-6 sm:p-10" style="background-image: url(../images/bg8.png); background-size: cover; background-position: center;">
            <h1 class="text-green-700 font-bold text-3xl text-center mb-4">Select payment method</h1>
            <?php echo '<h1 class="text-green-700 font-bold text-xl text-center mb-8">Please pay ' . $_SESSION['fare'] . ' Rs.</h1>'; ?>
            <form action="" method="POST" class="flex flex-col w-full space-y-6 items-center">
                <div class="w-full flex justify-center">
                    <label class="flex items-center space-x-3 text-green-700 text-lg">
                        <input type="radio" name="payment" value="credit_card" required>
                        <span>Credit Card</span>
                    </label>
                </div>
                <div class="w-full flex justify-center">
                    <label class="flex items-center space-x-3 text-green-700 text-lg">
                        <input type="radio" name="payment" value="debit_card" required>
                        <span>Debit Card</span>
                    </label>
                </div>
                <div class="w-full flex justify-center">
                    <label class="flex items-center space-x-3 text-green-700 text-lg">
                        <input type="radio" name="payment" value="upi" required>
                        <span>BHIM/UPI</span>
                    </label>
                </div>
                <div class="w-full flex justify-center">
                    <button type="submit" class="h-12 w-1/2 sm:w-1/3 bg-green-700 rounded-lg text-white text-lg hover:bg-green-800 duration-300">
                        Proceed to Pay
                    </button>
                </div>
            </form>
            <a onclick="history.back()" class="h-12 w-full sm:w-1/3 mt-4 bg-green-700 rounded-lg text-white text-lg text-center block py-3 hover:bg-green-800 duration-300">
                Go Back
            </a>
        </div>
        <div class="hidden sm:block sm:w-3/5 h-full bg-cover" style="background-image: url(../images/bg2.jpg);"></div>
    </main>
</body>

</html>