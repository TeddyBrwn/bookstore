<?php 

    require('./connect.php');
    $masp = (int) $_GET['id'];
    $sql = "SELECT * FROM `book` WHERE `id` = '$masp'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);
    $img = $row['imgURL'];

    if(isset($_POST["submit"])){
        $ten = $_POST["ten"];
        $gia = $_POST["gia"];
        $mota = $_POST["mota"];
        $hinhanh = $_FILES['hinhanh']['name'];
        $target_dir = './images/';
        if($hinhanh){
            if(file_exists("./images/".$img)){
                unlink("./images/".$img);
            }
            $target_file = $target_dir.$hinhanh;
        }
        else{
            $target_file = $target_dir.$img;
            $hinhanh = $img;
        }
        if(isset($ten) && isset($gia) && isset($mota) && isset($hinhanh)){
            move_uploaded_file($_FILES["hinhanh"]["tmp_name"], $target_file);
            $newsql = "UPDATE `book` SET `tensach` = '$ten', `gia` = '$gia', 
            `imgURL` = '$hinhanh', `mota` = '$mota' WHERE `book`.`id` = '$masp'";
            mysqli_query($conn, $newsql);
            echo "<script>alert('bạn đã sửa thành công')</script>";
            header("Location:admin.php");
        }
    }
?>
<h1>Cập nhật sản phẩm</h1>
<form action="" method="post" enctype="multipart/form-data">
    <div>
        <label for="ten">Tên sản phẩm</label>
        <input type="text" id="ten" name="ten" value="<?= $row["tensach"]?>">
    </div> 
    <div>
        <label for="gia">Giá sản phẩm</label>
        <input type="number" id="gia" name="gia" value="<?= $row["gia"]?>">
    </div>
    <div>
        <img style="width: 200px;height: 200px;" src="./images/<?= $row["imgURL"]?>" alt="">
    </div>
    <div>
        <label for="file">Hình ảnh</label>
        <input type="file" id="file" name="hinhanh" value="Choose file" >
    </div>
    <div>
        <label for="mota">Mô tả</label>
        <textarea name="mota" id="mota" cols="30" rows="10"><?= $row["mota"]?></textarea>
    </div>
    <button type="submit" name="submit">
        Cập nhật sản phẩm
    </button>
</form>
<style>
    form{
        width: 600px
    }
    div{
        display: flex;
        margin-bottom: 20px;
    }
    label{
        width: 100px;
    }
    input,textarea{
        flex: 1;
    }
    button{
        margin-left: 100px;
        padding: 6px 12px;
        color: #2f1c25;
        background-color: transparent;
        border: 3px solid #d7b02f;
        border-radius: 8px;
        cursor: pointer;
    }
</style>