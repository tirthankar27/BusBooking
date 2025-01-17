<?php
    session_start();
    include 'users.php';
    $sql=$conn->prepare("SELECT * FROM bookings WHERE email=?");
    $sql->bind_param("s",$_SESSION['email']);
    $sql->execute();
    $result=$sql->get_result();
    if($result->num_rows>0){
        if($_SESSION['seat'] % 3 == 0) {
            $_SESSION['fare'] = 350;
        } else {
            $_SESSION['fare'] = 300;
        }
    }else{
        if($_SESSION['seat'] % 3 == 0) {
            $_SESSION['fare'] = 297.5;
        } else {
            $_SESSION['fare'] = 255;
        }
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if($_SESSION['source']=='Ravangla'){
            $datetime=$_SESSION['date']." 6:00";
            $stmt = $conn->prepare("INSERT INTO bookings (passenger, source, dest, doj, seat, fare, email) VALUES (?,?,?,?,?,?,?)");
            $stmt->bind_param('sssssss', $_SESSION['passenger'], $_SESSION['source'], $_SESSION['dest'], $datetime, $_SESSION['seat'], $_SESSION['fare'], $_SESSION['email']);
            if($stmt->execute()) {
                echo "<script>alert('Payment successfull');window.location.href='successFrontend.php';</script>";
                exit();
            }
            $stmt->close();
        }
        else{
            $datetime=$_SESSION['date']." 13:00";
            $stmt = $conn->prepare("INSERT INTO bookings (passenger, source, dest, doj, seat, fare, email) VALUES (?,?,?,?,?,?,?)");
            $stmt->bind_param('sssssss', $_SESSION['passenger'], $_SESSION['source'], $_SESSION['dest'], $datetime, $_SESSION['seat'], $_SESSION['fare'], $_SESSION['email']);
            if($stmt->execute()) {
                echo "<script>alert('Payment successfull');window.location.href='successFrontend.php';</script>";
                exit();
            }
            $stmt->close();
        }
    }
?>