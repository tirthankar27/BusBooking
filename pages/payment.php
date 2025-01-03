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
    <main class="flex justify-center items-center py-20 sm:py-40 h-auto sm:h-screen bg-cover" style="background-image: url(../images/bg2.jpg);">
        <div class="flex flex-col justify-center items-center bg-green-400 bg-opacity-70 h-full w-full sm:w-4/5 md:w-1/2 rounded-lg p-6">
            <h1 class="text-white font-bold text-3xl text-center mb-4">Select payment method</h1>
            <?php echo '<h1 class="text-white font-bold text-xl text-center mb-8">Please pay ' . $_SESSION['fare'] . ' Rs.</h1>'; ?>
            <form action="" method="POST" class="flex flex-col sm:flex-row items-center w-full space-y-4 sm:space-y-0 sm:space-x-4">
                <div class="w-full sm:w-1/3">
                    <label class="block text-white text-lg">
                        <input type="radio" name="payment" id="payment" value="credit_card" required>
                        Credit Card
                    </label>
                </div>
                <div class="w-full sm:w-1/3">
                    <label class="block text-white text-lg">
                        <input type="radio" name="payment" id="payment" value="debit_card" required>
                        Debit Card
                    </label>
                </div>
                <div class="w-full sm:w-1/3">
                    <label class="block text-white text-lg">
                        <input type="radio" name="payment" id="payment" value="upi" required>
                        BHIM/UPI
                    </label>
                </div>
                <div class="w-full sm:w-1/3">
                    <button type="submit" class="h-16 w-full sm:w-auto bg-green-700 rounded-lg text-white text-lg hover:bg-green-800 mt-4 sm:mt-0">
                        Proceed to pay
                    </button>
                </div>
            </form>
            <button onclick="history.back()" class="h-16 w-full sm:w-1/3 mt-4 bg-green-700 rounded-md text-white text-lg hover:bg-green-800">
                Go Back
            </button>
        </div>
    </main>
</body>

</html>