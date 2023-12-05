<?php
$servername = "localhost";
$username = "root";
$HPassword = "";
$database = "bookstore";
$conn = new mysqli($servername, $username, $HPassword,$database);
    $id =(int) $_GET['id'];
    $sql = "DELETE FROM book where id = $id ";
    mysqli_query($conn,$sql);
    header("location:admin.php");

?>