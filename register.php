<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "bookstore";
    $conn = new mysqli($servername, $username, $password, $database);
    $err = [];
    session_start();

    if (isset($_POST['submit'])) {
        $name = $_POST['Name'];
        $email = $_POST['Email'];
        $password = $_POST['password'];
        $RPassword = $_POST['RPassword'];

        if (empty($name)) {
            $err['Name'] = "Bạn chưa nhập tên";
        }
        if (empty($password)) {
            $err['password'] = "Bạn chưa nhập mật khẩu";
        }
        if ($password != $RPassword) {
            $err['RPassword'] = "Mật khẩu lần 2 chưa đúng";
        }

        if (empty($err)) {
            $pass = md5($password);
            $sql = "INSERT INTO `user` (`id`, `user`, `password`, `email`) 
                    VALUES (NULL, '$name', '$pass', '$email')";
            $query = mysqli_query($conn, $sql);

            if ($query) {
                header('location: login.php');
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Store</title>
    <link rel="icon" href="./logo/logofav.png" type="logo/bookstore">
    <link rel="stylesheet" href="./css/register.css">

</head>
<?php include 'header.php'; ?>
<body>
    <div class="container">
        <div class="row">
            <form action="register.php" method="post" role="form">
                <h2 class="text h2-text">Đăng Kí Tài Khoản</h2>

                <div class="form-group">
                    <label class="text" for="Name">Tài Khoản</label>
                    <input type="text" class="form-control" name="Name">
                    <div class="has-error">
                        <span><?php echo (isset($err['Name'])) ? $err['Name'] : ''; ?></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="text" for="Email">Email</label>
                    <input type="email" class="form-control" name="Email">
                </div>

                <div class="form-group">
                    <label class="text" for="password">Mật Khẩu</label>
                    <input type="password" class="form-control" name="password">
                    <div class="has-error">
                        <span><?php echo (isset($err['password'])) ? $err['password'] : ''; ?></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="text" for="RPassword">Nhập lại mật khẩu</label>
                    <input type="password" class="form-control" name="RPassword">
                    <div class="has-error">
                        <span><?php echo (isset($err['RPassword'])) ? $err['RPassword'] : ''; ?></span>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary" name="submit">Đăng Ký</button>
            </form>
        </div>
    </div>

    <?php include 'footer.php'; ?>
</body>

</html>


