<?php
$servername = "localhost";
$username = "root";
$HPassword = "";
$database = "bookstore";
$conn = new mysqli($servername, $username, $HPassword, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = null;

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['query'])) {
    $searchQuery = $_GET['query'];
    // $sql = "SELECT * FROM `book` WHERE tensach LIKE '%$searchQuery%'";
    $searchQuery = $sql = "SELECT * FROM `book` WHERE tensach LIKE '%$searchQuery%' OR mota LIKE '%$searchQuery%'";
    // $sql = "SELECT * FROM `book` WHERE unaccent(tensach) LIKE unaccent('%$searchQuery%') OR unaccent(mota) LIKE unaccent('%$searchQuery%')";
    // $sql = "SELECT * FROM `book` WHERE tensach LIKE '%$searchQuery%' COLLATE utf8_general_ci OR mota LIKE '%$searchQuery%' COLLATE utf8_general_ci";


    $query = mysqli_query($conn, $sql);
}

if (!$query || mysqli_num_rows($query) === 0) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="icon" href="./logo/logofav.png" type="logo/bookstore">
    <link rel="stylesheet" href="./css/search.css">
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
<footer><?php include 'footer.php'; ?></footer>
</body>
</html>
