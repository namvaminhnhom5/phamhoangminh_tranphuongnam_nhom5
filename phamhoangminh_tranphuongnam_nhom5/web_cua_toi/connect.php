<?php
    $host = "localhost";
    $username "phpmyadmin";
    $pass = "123";
    $db = "login";
    $conn = new mysqli($host, $username, $pass, $db); if($conn->connect_errno) {
    echo "that bai";
    }else {
    echo "thanh cong";
    }
?>
