<?php
include 'header.php';
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
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $paymentMethod = $_POST['payment_method'];

    $sql = "SELECT * FROM `book` WHERE id = $productId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $totalPrice = $quantity * $row['gia'];
        $img = $row['imgURL'];

        // Process the checkout data (you can save it to a database, send an email, etc.)
        // For demonstration purposes, we'll just display the data
        ?>
        <div class="wrapper" style="<?php echo $paymentMethod === 'offline' ? 'flex-direction: row-reverse;' : ''; ?>">
            <div class="wrapper-info-customer">
                <div class="info-customer">
                    <div class="success-message">Thông tin thanh toán</div>
                    <div>Họ và tên: <?php echo $name; ?></div>
                    <div>Địa chỉ: <?php echo $address; ?></div>
                    <div>Số điện thoại: <?php echo $phone; ?></div>
                    <!-- <div>Số điện thoại: <?php echo str_replace('+84', '0', $phone); ?></div> -->
                    <div style="text-transform: uppercase;">Phương thức thanh toán: <?php echo $paymentMethod; ?></div>
                    <!-- <div>Phương thức thanh toán: <?php echo $paymentMethod; ?></div> -->
                    <div>Sách: <?php echo $row['tensach']; ?></div>
                    <div>Số Lượng: <?php echo $quantity; ?></div>
                    <div>Tổng: <?php echo number_format($totalPrice, 0, '.', ','); ?> VND</div>
                </div>
            </div>

            <div class="wrapper-qr-code">
                <?php
                if ($paymentMethod === 'offline') {
                    $qrImgUrl = generateQrCode($totalPrice, $row['tensach']); 
                    echo '<img class="img-offline" src="images/banner-delivery-fb.png" alt="Thanks">';
                    echo'<span>Cảm mơn quý khách</span>';
                    
                }
                ?>
                <?php
                if ($paymentMethod === 'online') {
                    $qrImgUrl = generateQrCode($totalPrice, $row['tensach']); 
                    echo'<span>Quét QR CODE thanh toán trực tuyến</span>';
                    echo '<img src="' . $qrImgUrl . '" alt="QR Code">';
                    echo'<span>Cảm mơn quý khách</span>';
                }
                ?>
            </div>
        </div>
        <?php
    } else {
        echo '<div class="error-message">Product not found</div>';
    }

    $conn->close();
    echo '<br><br><a class="back-button" href="index.php">Tiếp tục xem sản phẩm khác</a>';
} else {
    header("Location: index.php");
    exit();
}

// Function to generate QR code image URL
function generateQrCode($totalPrice, $productName) {
    $productInfo = "Mua sách". " " . $productName;
    $qrImgUrl = "https://img.vietqr.io/image/vib-909411633-qr_only.jpg?amount=" . $totalPrice . "&addInfo=" . urlencode($productInfo) . "&accountName=Huynh%20Bao%20Huy";
    return $qrImgUrl;
}
include 'footer.php';
?>
<link rel="stylesheet" type="text/css" href="./css/checkout_process.css">

