<?php
    $servername = "localhost";
    $username = "root";
    $HPassword = "";
    $database = "bookstore";
    $conn = new mysqli($servername, $username, $HPassword, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $productId = $_GET['id'];

    $sql = "SELECT * FROM `book` WHERE id = $productId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Product not found";
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Store</title>
    <link rel="icon" href="./logo/logofav.png" type="logo/bookstore">
    <link rel="stylesheet" href="./css/detail.css">
</head>
<body>
<?php include 'header.php'; ?>
    <div class="card">
        <img src="images/<?= $row['imgURL']; ?>" alt="<?= $row['tensach']; ?>">
        <div>
            <h3><?= $row['tensach']; ?></h3>
            <span>Chủ đề sách <br> <?= $row['mota']; ?></span>
            <div>
                <div><?= number_format($row['gia'], 0, '.', ','); ?>&nbsp;₫</div>
            </div>
            <form action="process_purchase.php" method="post">
                <input type="hidden" name="product_id" value="<?= $row['id']; ?>">
                <label for="quantity">Số Lượng:</label>
                <input type="number" id="quantity" name="quantity" value="1" min="1" required>
                <button type="submit">Mua ngay</button>
            </form>
        </div>
    </div>
<?php include 'footer.php'; ?>
</body>
</html>
