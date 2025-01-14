<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['source'] = $_POST['source'];
    $_SESSION['dest'] = $_POST['dest'];
    $_SESSION['date'] = $_POST['date'];
    header('Location:frontend/busBookFrontend.php');
}
?>