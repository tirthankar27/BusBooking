<?php
    session_start();
    include 'users.php';
    if($_SESSION['seat']%3==0){
        $_SESSION['fare']=350;
    }
    else{
        $_SESSION['fare']=300;
    }
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $stmt=$conn->prepare("INSERT INTO bookings (passenger, source, dest, doj, seat, fare, email) VALUES (?,?,?,?,?,?,?)");
        $stmt->bind_param('sssssss',$_SESSION['passenger'],$_SESSION['source'],$_SESSION['dest'],$_SESSION['date'],$_SESSION['seat'],$_SESSION['fare'],$_SESSION['email']);
        if($stmt->execute()){
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
    <main class="flex justify-center items-center py-40 h-lvh w-lvw bg-cover" style="background-image: url(../images/bg2.jpg);">
        <div class="flex flex-col justify-center items-center bg-green-400 bg-opacity-70 h-full w-1/2 rounded-lg">
            <h1 class="text-white font-bold text-3xl">Select payment method</h1>
            <?php echo'<h1 class="text-white font-bold text-xl">Please pay '.$_SESSION['fare'].' Rs.</h1>';?>
            <form action="" method="POST" class="flex flex-col h-80 w-auto rounded-lg">
                <div class="my-auto">
                    <label>
                        <input type="radio" name="payment" id="payment" value="credit_card" required>
                        Credit Card
                    </label><br>
                    <label>
                        <input type="radio" name="payment" id="payment" value="debit_card" required>
                        Debit Card
                    </label><br>
                    <label>
                        <input type="radio" name="payment" id="payment" value="upi" required>
                        BHIM/UPI
                    </label><br>
                </div>
                <div class="my-auto">
                    <Button type="submit" class="h-16 w-32 bg-green-700 rounded-lg hover:bg-green-800">Proceed to pay</Button>
                </div>
            </form>
            <button onclick="history.back()" class="h-16 w-32 mt-2 mb-2 bg-green-700 rounded-md hover:bg-green-800">Go Back</button>
        </div>
    </main>

</body>

</html>