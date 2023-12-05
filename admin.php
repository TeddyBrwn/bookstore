<?php
    require('./connect.php');
    $sql = "SELECT * FROM `book`";
    $query = mysqli_query($conn, $sql);

?>
<h1>Quản lí danh sách sản phẩm</h1>
<button>
    <a href="themsanpham.php">Thêm sản phẩm</a>
</button>
<table id="producList">
    <tr>
        <th>Mã</th>
        <th>Tên</th>
        <th>Gía</th>
        <th>Hình ảnh</th>
        <th>Mô tả</th>
        <th>Hành động</th>
    </tr>
    <?php
        while($row = mysqli_fetch_array($query)){
    ?>
    <tr>
        <td><?= $row["id"]?></td>
        <td><?= $row["tensach"]?></td>
        <td><?= $row["gia"] ?> &nbsp; VNĐ</td>
        <td><img style="width:200px; height: 200px;" src="./images/<?=$row["imgURL"]?>" 
        alt=""></td>
        <td><?= $row["mota"]?></td>
        <td><a href="suasanpham.php?id=<?= $row["id"]?>">Sửa</a> 
        <a onclick="return xoasanpham()" href="xoasanpham.php?id=<?= $row["id"]?>">Xóa</a></td>
    </tr>
    <?php }?>
</table>
<style>
    #producList{
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width:100%;
    }
    #producList td, #producList th{
        border: 1px solid #ddd;
        padding: 8px;
    }
    #producList tr:nth-child{
        background-color: #f2f2f2;
    }
    #producList tr:hower {
        background-color:#ddd;
    }
    #producList th{
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
    }
    button{
        background-color: #2F54EB;
        padding: 8px 16px;
    } button a{
        color: white;
    }

    a{
        text-decoration:none;
    }
</style>
<script>
    function xoasanpham(){
        var conf = confirm(`Bạn có chắc chắn muốn xóa sản phẩm này không ?`);
        return conf;
    }
</script>