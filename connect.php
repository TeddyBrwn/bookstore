<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bookstore";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
    echo"Connected Fail";
    }
?>

