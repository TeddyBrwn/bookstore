<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Store</title>
    <link rel="icon" href="./logo/logofav.png" type="logo/bookstore">
    <!-- <link rel="stylesheet" type="text/css" href="./css/process_purchase.css"> -->
    <link rel="stylesheet" type="text/css" href="./css/process_purchase.css">

</head>
<body>
<?php include 'header.php'; ?>
<div class="process_purchase">
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $servername = "localhost";
        $username = "root";
        $HPassword = "";
        $database = "bookstore";
        $conn = new mysqli($servername, $username, $HPassword, $database);
    
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $productId = $_POST['product_id'];
        $quantity = $_POST['quantity'];
        $sql = "SELECT * FROM `book` WHERE id = $productId";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $totalPrice = $quantity * $row['gia'];

            echo'<div class="left">
            <div class="success-message">Sản Phẩm</div>
            <div class="image">
            <img src="./images/' . $row['imgURL'] . '" alt="' . $row['tensach'] . '" style="width: 450px; height: 500px;">
            </div>
            <div>Sách ' . $row['tensach'] . '</div>
            <div>Số Lượng: ' . $quantity . '</div>
            <div>Tổng: ' . number_format($totalPrice, 0, '.', ',') . ' VND</div>
            </div>';

            // echo '<div class="success-message">Mua hàng thành công</div>';
            // echo '<img src="./images/' . $row['imgURL'] . '" alt="' . $row['tensach'] . '" style="width: 450px; height: 500px;">';

            // echo '<div>Sách ' . $row['tensach'] . '</div>';
            // echo '<div>Số Lượng: ' . $quantity . '</div>';
            // echo '<div>Tổng: ' . number_format($totalPrice, 0, '.', ',') . ' VND</div>';

            // Display checkout form
            echo'<div class="right">
            <form action="checkout_process.php" method="post">
            <label for="name">Họ và tên:</label>
            <input type="text" id="name" name="name" required>
            <label for="address">Địa chỉ:</label>
            <input type="text" id="address" name="address" required>
            <label for="phone">Số điện thoại:</label>
            <input type="tel" id="phone" name="phone" required>
            <label for="payment_method">Phương thức thanh toán:</label>
            <select id="payment_method" name="payment_method" required>
            <option value="online">Thanh toán trực tuyến</option>
            <option value="offline">Thanh toán khi nhận hàng</option>
            </select>
            <input type="hidden" name="product_id" value="' . $productId . '">
            <input type="hidden" name="quantity" value="' . $quantity . '">
            <input type="submit" value="Xác nhận thanh toán">
            </form>
            </div>';
            // echo '<form action="checkout_process.php" method="post">';
            // echo '<label for="name">Họ và tên:</label>';
            // echo '<input type="text" id="name" name="name" required>';
            
            // echo '<label for="address">Địa chỉ:</label>';
            // echo '<input type="text" id="address" name="address" required>';
            
            // echo '<label for="phone">Số điện thoại:</label>';
            // echo '<input type="tel" id="phone" name="phone" required>';
            
            // echo '<label for="payment_method">Phương thức thanh toán:</label>';
            // echo '<select id="payment_method" name="payment_method" required>';
            // echo '<option value="online">Thanh toán online</option>';
            // echo '<option value="offline">Thanh toán offline</option>';
            // echo '</select>';
            
            // echo '<input type="hidden" name="product_id" value="' . $productId . '">';
            // echo '<input type="hidden" name="quantity" value="' . $quantity . '">';
            // echo '<input type="submit" value="Xác nhận thanh toán">';
            // echo '</form>';
        
        } else {
            echo '<div class="error-message">Product not found</div>';
        }
    
        $conn->close();
        // echo '<br><br><a class="back-button" href="index.php">Tiếp tục xem sản phẩm khác</a>';
    } else {
        header("Location: index.php");
        exit();
    }
    ?>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
