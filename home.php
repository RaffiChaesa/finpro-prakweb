<?php
session_start();
include('connect.php');
if (!isset($_SESSION['username'])) {
    header("location: login.php");
    exit();
}
if (isset($_GET["action"])) {
    $action = $_GET["action"];
    $title = $_GET['title'];
    $query = mysqli_query($connect, "DELETE FROM wisata WHERE title = '$title'");
    if ($query) {
        header('location:home.php');
    }
}
$username = $_SESSION["username"];
$query = mysqli_query($connect, "SELECT * FROM wisata WHERE username = '$username'");
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <title>Selamat berwisata...</title>
</head>

<body>
    <section class="home">
        <div class="home-top">
            <h1>Wisata masa lalu...</h1>
            <div class="home-top-wrapper">
                <a class="linktop" href="add.php"><img src="./images/add.svg" alt="add" width="23px">
                <a class="logoutbutton" href="index.php?action=logout">
                    <p>Log out</p>
                </a>
            </div>
        </div>
        <?php while ($row = mysqli_fetch_array($query)): ?>
            <div class="home-card">
                <a href="detail.php?title=<?= $row['title'] ?>" class="card-left">
                    <div class="imgwrapper">
                        <img src="./images/<?= $row['image'] ?>" id="contentimage" alt="image">
                    </div>
                    <div class="titlewrapper">
                        <p>
                            <?= $row['title'] ?>
                        </p>
                    </div>
                    <div class="buttonwrapper">
                        <a href="add.php?action=edit&title=<?= $row['title'] ?>"><button>Edit</button></a>
                        <a href="detail.php?action=delete&title=<?= $row['title'] ?>"><button>Delete</button></a>
                    </div>
                </a>
            </div>
        <?php endwhile ?>
        <div>
            <a class="link" href="add.php"><img src="./images/add.svg" alt="add" width="23px">
                <p>Tambah wisata</p>
            </a>
        </div>
    </section>
</body>

</html>