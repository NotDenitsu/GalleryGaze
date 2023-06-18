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