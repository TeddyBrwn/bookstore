<?php ob_start(); ?>
<?php   
    $servername = "localhost";
    $username = "root";
    $Password = "";
    $database = "bookstore";
    $conn = new mysqli($servername, $username, $Password,$database);

    if (isset($_GET['DangNhap'])) {
        $user = $_GET['Name'];                         
        $password = $_GET['password'];

        $sql = "SELECT * FROM `user` WHERE user = '$user'" ;
        $query = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($query);
        $checkName = mysqli_num_rows($query);
        $Passwordmd5 = md5($password);

        if ($checkName > 0 ) {                                     
            if ($Passwordmd5 !=  $data['password']) {
                echo "<p style='color:red; text-align:center;'>  mật khẩu không tồn tại </p>";
            } else {
                session_start();
                $_SESSION['user'] = $user;
                header('location: index.php');
            }
        } else if ($user == "admin123" && $password == "123") {
            session_start();
            $_SESSION['user'] = $user;
            header('location: admin.php');
        } else {
            echo "<p style='color:red; text-align:center;'>  tên không tồn tại </p>";
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
    <link rel="stylesheet" href="./css/login.css">
</head>

<body>
    <?php include 'header.php'; ?>
       <div class="container">
            <div class="row">                  
                <form action="login.php" method="get">
                    <div class="login-margin">
                        <div class="css-php">
                            <?php
                                if (isset($_GET['DangNhap'])) {
                                    $user = $_GET['Name'];                         
                                    $password = $_GET['password'];
                                    
                                
                                    $sql = "SELECT * FROM `user` WHERE user = '$user'" ;
                                    $query = mysqli_query($conn,$sql);
                                    $data = mysqli_fetch_assoc($query);
                                    $checkName = mysqli_num_rows($query);
                                    $Passwordmd5 = md5($password);
                                
                                    if ($checkName > 0 ) {                                     
                                        if ($Passwordmd5 !=  $data['password']) {
                                            echo "<p style= 'color:red; text-align:center;'>  mật khẩu không tồn tại </p>";
                                        } else {
                                            
                                            header('location: index.php');
                                        }
                                    } 
                                    else if ($user == "admin123" && $password == "123") {
                                        header('location: admin.php');
                                    }
                                    else {
                                        echo "<p style= 'color:red; text-align:center;'>  tên không tồn tại </p>";
                                    }
                                }

                            ?>
                        </div>
                        <div class="TK sub-login">
                            <td  class="login-sub"><span>Tài Khoản</span></td>
                            <td class="login-sub input-sub"><input type="text" name="Name" required="required"  ></td>
                        </div>

                        <div class="MK sub-login" >
                            <td class="login-sub"><span>Mật Khẩu</span></td>
                            <td class="login-sub input-sub"><input type="password" name="password" required="required"  ></td>
                        </div>

                        
                        <div class="submit sub-login">
                            <input type="submit" class="submit-login" value="Đăng Nhập" name="DangNhap">                              
                        </div>

                    </div>    
                </form>    
            </div>
       </div>
              
</div>
<?php include 'footer.php'; ?>
    
</body>
</html>