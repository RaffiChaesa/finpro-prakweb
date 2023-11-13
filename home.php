<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location: login.php");
    exit();
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
            <h1>Wisata masa lalu...</h1>
            <a href="index.php?action=logout">
                <p>Log out</p>
            </a>
        </div>
        <div>
            <a class="link" href="add.php"><img src="./images/add.svg" alt="add" width="23px"> <p>Tambah wisata</p></a>
        </div>
    </section>
</body>

</html>