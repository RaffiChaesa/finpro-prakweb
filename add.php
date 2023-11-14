<?php
session_start();
include("connect.php");
if (!isset($_SESSION['username'])) {
    header("location: login.php");
    exit();
}

if (isset($_POST['title'])) {
    $username = $_SESSION['username'];
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $image = $_FILES['image']['name'];
    $imagetemp = $_FILES['image']['tmp_name'];
    $fileextension = pathinfo($image, PATHINFO_EXTENSION);
    $filedestination = './images/' . $image;

    if (!in_array($fileextension, ['pdf', 'img', 'jpg', 'png'])) {
        $file = 'file';
    } else {
        if (move_uploaded_file($imagetemp, $filedestination)) {
            $query = mysqli_query($connect, "INSERT INTO wisata VALUES ('$username', '$title', '$desc', '$image')");
            if ($query) {
                header("location:detail.php?title=$title");
            } else {
                $gagal = "gagal";
            }
        }
    }
}

if (isset($_POST["editTitle"])) {
    $title = $_GET['title'];
    $username = $_SESSION['username'];
    $newtitle = $_POST['editTitle'];
    $desc = $_POST['editDesc'];
    $image = $_FILES['editImage']['name'];
    $imagetemp = $_FILES['editImage']['tmp_name'];
    $fileextension = pathinfo($image, PATHINFO_EXTENSION);
    $filedestination = './images/' . $image;

    if (!in_array($fileextension, ['pdf', 'img', 'jpg', 'png'])) {
        $file = 'file';
    } else {
        if (move_uploaded_file($imagetemp, $filedestination)) {
            $query = mysqli_query($connect, "UPDATE wisata SET username='$username', title ='$newtitle',  `desc` ='$desc', image = '$image' WHERE title ='$title'") or die(mysqli_error($connect));
            if ($query) {
                header("location:detail.php?title=$newtitle");
            } else {
                $gagal = "gagal";
            }
        }
    }
}

if (isset($_GET["action"])) {
    $edit = true;
    $title = $_GET["title"];
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
        <?php if (!isset($edit)): ?>
            <div class="home-top">
                <h1>Menambah wisata...</h1>
                <a href="index.php?action=logout">
                    <p>Log out</p>
                </a>
            </div>
            <?php if (isset($gagal)): ?>
                <p>Gagal menambah wisata...</p>
            <?php endif ?>
            <div class="home-bottom">
                <form action="#" method="POST" enctype="multipart/form-data">
                    <label for="title">Judul wisata</label><br>
                    <input type="text" name="title" id="title" required><br>
                    <label for="desc">Deskripsi</label><br>
                    <textarea name="desc" id="desc" cols="35" rows="4"></textarea><br>
                    <label for="image">Foto wisata</label><br>
                    <div class="input-image">
                        <input type="file" name="image" id="image" required>
                    </div>
                    <?php if (isset($file)): ?>
                        <p class="file-warning">Masukkan pdf, img, jpg, atau png...</p>
                    <?php endif ?>
                    <button type="submit">Tambah...</button>
                </form>
                <div>
                    <img src="./images/tambah.jpg" alt="tambah" width="350px">
                </div>
            </div>
        <?php else: ?>
            <div class="home-top">
                <h1>Mengedit wisata...</h1>
                <a href="index.php?action=logout">
                    <p>Log out</p>
                </a>
            </div>
            <?php if (isset($gagal)): ?>
                <p>Gagal menambah wisata...</p>
            <?php endif ?>
            <div class="home-bottom">
                <form action="add.php?title=<?= $row['title'] ?>" method="POST" enctype="multipart/form-data">
                    <label for="title">Judul wisata</label><br>
                    <input type="text" name="editTitle" id="editTitle" value="<?= $row['title'] ?>" required><br>
                    <label for="desc">Deskripsi</label><br>
                    <textarea name="editDesc" id="editDesc" cols="35" rows="4"><?= $row['desc'] ?></textarea><br>
                    <label for="image">Foto wisata</label><br>
                    <div class="input-image">
                        <input type="file" name="editImage" id="editImage" required>
                    </div>
                    <?php if (isset($file)): ?>
                        <p class="file-warning">Masukkan pdf, img, jpg, atau png...</p>
                    <?php endif ?>
                    <button type="submit">Edit...</button>
                </form>
                <div>
                    <img src="./images/tambah.jpg" alt="tambah" width="350px">
                </div>
            </div>
        <?php endif ?>
    </section>
</body>

</html>