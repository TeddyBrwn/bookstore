<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Store</title>
    <link rel="icon" href="./logo/logofav.png" type="logo/bookstore">
    <link rel="stylesheet" href="./css/header.css">
</head>
<body>
    <div class="header">
        <div class="top-bar">
            <div class="top-bar_left">
                <a href="mailto:cskh.bookstore@gmail.com">
                    <span>cskh.bookstore@gmail.com</span>
                </a>
                <span>/</span>
                <a href="tel:0909411633">
                    <span>0909411633</span>
                </a>
            </div>
            <div class="top-bar_right">
                <?php
                session_start();

                if (isset($_SESSION['user'])) {
                    echo '<a href="logout.php"><span>Đăng Xuất</span></a>';
                    echo '<span>/</span>';
                    echo '<span>' . ucwords($_SESSION['user']) . '</span>';
                } else {
                    echo '<a href="register.php"><span>Đăng Ký</span></a>';
                    echo '<span>/</span>';
                    echo '<a href="login.php"><span>Đăng Nhập</span></a>';
                }
                ?>
            </div>
        </div>
        <div class="logo-search">
            <div class="logo">
                <a href="index.php"><img src="./logo/bookstore.png" alt="bookstore"></a>
            </div>
            <div class="search">
                <form action="search.php" method="get">
                    <input type="text" name="query" placeholder="search books">
                    <button type="submit">search</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
