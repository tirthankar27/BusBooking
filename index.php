<?php
    session_start();
    if(isset($_SESSION['id'])){
        include 'pages/home.php';
    }
    else{
        include 'pages/guest.php';
    }
?>