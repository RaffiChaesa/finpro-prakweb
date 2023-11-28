<?php
session_start();
if (isset($_GET['action'])) {
    session_unset();
    session_destroy();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Selamat berwisata...</title>
</head>

<body>
    <section class="landing">
        <div>
            <h1>Secukupnya...</h1>
            <p>
                Selamat berwisata di tempat di mana setiap sudut menyimpan serpihan kenangan masa lalu. Di
                sini, kita tidak hanya merayakan kebahagiaan, tetapi juga mengenang melalui setiap jejak duka yang
                pernah kita lewati. Berkelanalah melalui lorong waktu, temukan dan simpanlah kembali momen-momen indah
                dan tantangan yang telah membentuk kita.
            </p>

            <a href="login.php"><button>Mulai...</button></a>
        </div>
        <div class="picture">
            <img src="./images/secukupnya.jpg" alt="secukupnya" width="350px">
        </div>
    </section>
</body>

</html>