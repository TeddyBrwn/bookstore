
<?php
    $servername = "localhost";
    $username = "root";
    $HPassword = "";
    $database = "bookstore";
    $conn = new mysqli($servername, $username, $HPassword,$database);
    $sql = " SELECT * FROM `book` ";
    $query = mysqli_query($conn,$sql); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Store</title>
    <link rel="icon" href="./logo/logofav.png" type="logo/bookstore">
    <link rel="stylesheet" href="./css/index.css">
</head>
<body>
<?php include 'header.php'; ?>
<div class="wrapper-menu">
    <?php

        while ($row = mysqli_fetch_assoc($query)) {
            $productId = $row['id'];
        ?>
                    <div class="item">
                        <a href="detail.php?id=<?= $productId ?>">
                            <div><img src="images/<?= $row['imgURL']; ?>" alt="<?= $row['tensach']; ?>"></div>
                            <div class="item-price_name">
                                <div class="item-name"><?= $row['tensach']; ?></div>
                                <div>
                                <div class="price-item"><?= number_format($row['gia'], 0, '.', '.') ?>&nbsp;VND</div>
                                </div>
                            </div>
                        </a>
                    </div>
        <?php
        }
        ?>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
