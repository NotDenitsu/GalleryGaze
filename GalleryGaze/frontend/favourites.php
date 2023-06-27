<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" href="../static/assets/images/logo.png">
    <link rel="stylesheet" href="../static/css/normalize.css">
    <link rel="stylesheet" href="../static/css/style.css">
    <link rel="stylesheet" href="../static/assets/icons/fontawesome/css/all.min.css">
    <script src="../javascript/navigation.js"></script>
</head>

<body>
    <?php
    include "../templates/navigation.php";
    include "../backend/connection.php";
    ?>

    <!-- <img src="logo.svg" alt="Logo">
        <object data="logo.svg" type="image/svg+xml"></object> -->
    <div class="main-container__home main-container">
        <div class="main-container__posts">
            <?php include "../backend/loadfavourites.php" ?>
        </div>
        <div class="pagination">
            <?php include "../backend/pagination.php"; ?>
        </div>
    </div>

</body>

</html>