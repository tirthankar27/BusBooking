<?php
    session_start();
    include 'users.php';
    $mail = $_SESSION['email'];
    $stmt = $conn->prepare("SELECT * FROM bookings where email = ?");
    $stmt->bind_param('s', $mail);
    $stmt->execute();
    $result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['name']."'s"; ?> Bookings</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <?php
        if($result->num_rows > 0){
            echo $row['name'];
            echo $row['source'];
            echo $row['dest'];
            echo $row['doj'];
            echo $row['seat'];
        }
        else{
            echo "No bookings yet\n";
        }
    ?>
</body>
</html>