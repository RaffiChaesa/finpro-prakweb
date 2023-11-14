<?php
session_start();
include('connect.php');
if (!isset($_SESSION['username'])) {
    header("location: login.php");
    exit();
}

$query = mysqli_query($connect, "SELECT * FROM wisata");
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
        <?php while ($row = mysqli_fetch_array($query)): ?>
            <div class="home-card">
                <a href="detail.php?title=<?=$row['title']?>" class="card-left">
                    <img src="./images/<?= $row['image'] ?>" alt="image" width="150px">
                    <p>
                        <?= $row['title'] ?>
                    </p>
                </a>
                <div>
                    <a href="#"><button>Edit</button></a>
                    <a href="#"><button>Delete</button></a>
                </div>
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