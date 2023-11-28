<?php
include("connect.php");
if (isset($_POST['username'])) {
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = mysqli_query($connect, "SELECT * from user WHERE username='$username' AND password=BINARY '$password'");
    $num = mysqli_num_rows($query);
    if ($num == 1) {
        $_SESSION['username'] = $username;
        header('location:home.php');
    } else {
        $gagal = true;
    }
}
if (isset($_POST['newusername'])) {
    $newusername = $_POST['newusername'];
    $newpassword = $_POST['newpassword'];
    $query = mysqli_query($connect, "INSERT INTO user VALUES ('$newusername', '$newpassword')");
    if ($query) {
        header("location:login.php");
    } else {
        $gagal = true;
    }
}
if (isset($_GET["action"])) {
    $signup = true;
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <title>Selamat berwisata...</title>
</head>

<body>
    <section class="login">
        <?php if (!isset($signup)): ?>
            <div class="login-left">
                <h1>Mulai...</h1>
                <?php if (isset($gagal)): ?>
                    <p>Coba mulai lagi...</p>
                <?php endif ?>
                <form action="login.php" method="POST">
                    <label for="username">Nama pengguna</label><br>
                    <input type="text" name="username" id="username"><br>
                    <label for="password">Kata sandi</label><br>
                    <input type="password" name="password" id="password">
                    <button type="submit">Berwisata...</button>
                </form>
                <a href="login.php?action=signup"><button type="button">Buat akun...</button></a>
            </div>
        <?php else: ?>
            <div class="login-left">
                <h1>Buat akun...</h1>
                <?php if (isset($gagal)): ?>
                    <p>Coba mulai lagi...</p>
                <?php endif ?>
                <form action="login.php" method="POST">
                    <label for="newusername">Nama pengguna</label><br>
                    <input type="text" name="newusername" id="newusername"><br>
                    <label for="newpassword">Kata sandi</label><br>
                    <input type="password" name="newpassword" id="newpassword">
                    <button type="submit">Buat...</button>
                </form>
            </div>
        <?php endif ?>
        <div>
            <img src="./images/mulai.jpg" alt="mulai" width="350px">
        </div>
    </section>
</body>

</html>