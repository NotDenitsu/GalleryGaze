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
    <link rel="stylesheet" href="../static/css/normalize.css">
    <link rel="stylesheet" href="../static/css/style.css">
    <link rel="stylesheet" href="../static/assets/icons/fontawesome/css/all.min.css">
    <script src="../javascript/navigation.js"></script>
</head>

<body>
    <?php
    include "../templates/navigation.php";
    ?>

    <!-- <img src="logo.svg" alt="Logo">
        <object data="logo.svg" type="image/svg+xml"></object> -->
    <div class="main-container__home main-container">
        <div class="main-container__posts">
            <?php
            if (isset($_GET['query']) && !empty($_GET['query'])) {
                include "../backend/search.php";
            } else {
                include "../backend/loadposts.php";
            }
            ?>
        </div>
        <div class="pagination">
            <?php include "../backend/pagination.php"; ?>
        </div>
    </div>

    <!-- Alert window -->
    <div class="alert-window" id="alert-window">
        <span class="alert-window__text"></span>
        <span class="alert-window__close-button">&times;</span>
    </div>
</body>

</html>