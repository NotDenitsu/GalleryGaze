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
    <style>
        .postbox {
            box-sizing: border-box;
            position: relative;

            width: 320px;
            height: 320px;

            border-radius: 5px;
            border: 1px solid #CFCFCF;

            background-color: black;
            fill: white;

            overflow: hidden;

            color: white;
            text-shadow: rgb(0, 0, 0) 1px 0 10px;
        }

        .postbox:not(:hover)> :not(.postbox__image) {
            opacity: 0;
            transition: opacity 0.2s;
        }

        .postbox:hover> :not(.postbox__image) {
            opacity: 1;
            transition: opacity 0.2s;
        }

        .postbox__image {
            border-radius: 5px;

            transition: filter .3s, opacity .3s;
        }

        .postbox__image-img {
            width: 100%;
        }

        .postbox__image:hover {
            filter: blur(5px);
            opacity: 0.8;
            transition: filter .3s, opacity 0.3s;
        }

        .postbox__icon {
            position: absolute;
            width: 30px;
            height: 30px;
            top: 0%;
        }

        .postbox__icon--left {
            margin-left: 10px;
            left: 0%;
        }

        .postbox__icon--right {
            margin-right: 10px;
            right: 0%;
        }

        .postbox__icon--top-margin1 {
            margin-top: 10px;
        }

        .postbox__icon--top-margin2 {
            margin-top: 45px;
        }

        .postbox__title {
            position: absolute;
            width: 80%;
            height: 1em;

            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;

            bottom: 0%;
            left: 0%;

            margin-left: 10px;
            margin-bottom: 70px;

        }

        .postbox__user-name {
            position: absolute;
            height: 1em;
            width: 60%;

            overflow: hidden;
            text-overflow: ellipsis;
            text-decoration: none;
            color: white;

            left: 0%;
            bottom: 0%;

            margin-bottom: 25px;
            margin-left: 70px;
        }

        .postbox__user-image {
            position: absolute;
            width: 50px;
            height: 50px;
            left: 0%;
            bottom: 0%;
            margin-left: 10px;
            margin-bottom: 10px;
        }

        .postbox__date {
            position: absolute;
            bottom: 0%;
            right: 0%;
            margin-right: 10px;
            margin-bottom: 10px;
        }

        /*Pages*/

        .pagination {
            text-align: center;
            margin-bottom: 50px;
        }

        .pagination__link {
            display: inline-block;
            margin-right: 5px;
            padding: 10px 15px;
            background-color: #223843;
            text-decoration: none;
            color: white;
            border-radius: 5px;
        }

        .pagination__link:hover {
            background-color: #1e3038;
        }

        .pagination__link--active {
            background-color: #D77A61;
        }
    </style>
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
            <?php

            // Assuming the current page is stored in the page variable
            $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
            $offset = 20;
            $limit = 20;
            $query = "SELECT COUNT(id) FROM posts";
            $picturesStatement = $connection->prepare($query);
            $picturesStatement->execute();
            $result = $picturesStatement->fetch()[0];
            $totalPages = ceil($result / $limit);

            // Calculate the offset based on the current page
            $calculated_offset = ($currentPage - 1) * $offset;

            // Load pictures with the offset and limit
            $query = "SELECT * FROM posts LIMIT :limit OFFSET :offset";
            $picturesStatement = $connection->prepare($query);
            $picturesStatement->bindValue(':limit', $limit, PDO::PARAM_INT);
            $picturesStatement->bindValue(':offset', $calculated_offset, PDO::PARAM_INT);
            $picturesStatement->execute();

            // Fetch and process the results
            foreach ($picturesStatement->fetchAll() as $data) {
                $postTitle = $data["title"];
                $uploadDate = $data["upload_date"];
                $postImageUrl = $data["image_url"];
                $userId = $data['user_id'];
                $postId = $data['id'];
                $picturesStatement->closeCursor();

                $userStatement = $connection->prepare("SELECT * FROM users WHERE users.id=?");
                $userStatement->execute([$userId]);
                $userdata = $userStatement->fetchAll()[0];
                $userName = $userdata["username"];
                $userImageUrl = $userdata["image_url"];
                $userStatement->closeCursor();

                ?>

                <?php
                include "../templates/postbox.php";
                ?>

            <?php } ?>
        </div>
        <div class="pagination">
            <?php include "../backend/pagination.php"; ?>
        </div>
    </div>

</body>

</html>