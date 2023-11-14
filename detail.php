<?php
session_start();
include("connect.php");
if (!isset($_SESSION['username'])) {
    header("location: login.php");
    exit();
}

if (isset($_GET['title'])) {
    $title = $_GET['title'];
    $query = mysqli_query($connect, "SELECT * FROM wisata WHERE title = '$title'");
    $row = mysqli_fetch_array($query);
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Selamat berwisata...</title>
</head>

<body>
    <section class="home">
        <div class="home-top">
            <h1>Kau hanya merindu...</h1>
            <a href="index.php?action=logout">
                <p>Log out</p>
            </a>
        </div>
        <div class="detail-bottom">
            <div>
                <img src="./images/<?= $row['image']?>" alt="tambah" width="350px">
            </div>
            <div>
                <h1><?= $row['title']?></h1>
                <p><?= $row['desc']?></p>
                <a href="home.php"><button>Kembali ke rumah...</button></a>
            </div>
        </div>
    </section>
</body>

</html>