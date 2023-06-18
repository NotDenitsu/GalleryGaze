<!DOCTYPE html>
<html lang="en">

<head>

    <?php
    include "../backend/connection.php";
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        if (isset($_GET['id'])) {
            $postId = $_GET['id'];
        }
    }

    $query = "SELECT * FROM posts WHERE posts.id=?";
    $postStatement = $connection->prepare($query);
    $postStatement->execute([$postId]);
    $postData = $postStatement->fetchAll()[0];
    $postTitle = $postData["title"];
    $postDescription = $postData["description"];
    $postImageUrl = $postData["image_url"];
    $userId = $postData["user_id"];
    $postStatement->closeCursor();

    $query = "SELECT * FROM users WHERE id=?";
    $userStatement = $connection->prepare($query);
    $userStatement->execute([$userId]);
    $userData = $userStatement->fetchAll()[0];
    $userName = $userData["username"];
    $userImageUrl = $userData["image_url"];


    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../static/css/normalize.css">
    <link rel="stylesheet" href="../static/css/style.css">
    <link rel="stylesheet" href="../static/assets/icons/fontawesome/css/all.min.css">
    <script src="../javascript/navigation.js"></script>
    <script src="../javascript/paperinput.js"></script>
    <style>
        * {
            box-sizing: border-box;
        }

        /* Post Styling */

        

        /*End of Comment Styling*/
    </style>
</head>

<body>
    <?php
    include "../templates/navigation.php";
    include "../backend/connection.php";
    ?>
    <div class="main-container">
        <div class="post">
            <div class="post__imagebox">
                <img class="post__imagebox-image" src="../static/assets/images/<?= $postImageUrl ?>" alt="<?= $postTitle ?>">
            </div>
            <div class="post__interactables">
                <h1 class="post__interactables-title">
                    <?= $postTitle ?>
                </h1>
                <header class="post__interactables-header">
                    <div class="userbox">
                        <img class="userbox__avatar" src="../static/assets/images/<?= $userImageUrl ?>"
                            alt="<?= $userName ?>">
                        <div class="userbox__stats">
                            <a href="profile.php?id=<?= $userId ?>" class="userbox__stats-username"><?= $userName ?></a>
                            <span class="userbox__stats-row"><i class="fa-solid fa-user"></i> 237</span>
                            <span class="userbox__stats-row"><i class="fa-solid fa-upload"></i> 437</span>
                        </div>
                    </div>
                    <div class="post__buttonbox">
                        <div class="post__buttonbox-buttons">
                            <button class="post__buttonbox-button"><i class="fa-regular fa-heart post__icon"></i></button>
                            <button class="post__buttonbox-button"><i class="fa-solid fa-download post__icon"></i></button>
                            <button class="post__buttonbox-button"><i class="fa-solid fa-share post__icon"></i></button>
                            <button class="post__buttonbox-button"><i class="fa-solid fa-circle-exclamation post__icon"></i></button>
                        </div>
                        <button class="post__buttonbox-follow post__buttonbox-follow--unfollow">Follow</button>
                    </div>
                </header>

            </div>
            <div class="post__description-container">
                <p class="post__description">
                    <?= $postDescription ?>
                </p>
            </div>

            <div class="post__miscellaneous">
                <div class="post__miscellaneous-recommended">
                    <h3 class="post__miscellaneous-title">You may also like</h3>
                    <div class="post__miscellaneous-recommended-posts">
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
                </div>
                <div class="post__miscellaneous-comments">
                    <h3 class="post__miscellaneous-title">Comments</h3>
                    <?php if (isset($_SESSION['user'])) { ?>

                        <form class="comment-field">
                            <div class="comment-field__frame">
                                <img class="comment-field__frame-avatar" src="" alt="">
                            </div>
                            <div class="comment-field__content">
                                <div class="comment-field__content-username">Begula</div>
                                <textarea class="comment-field__content-field" name="comment"
                                    placeholder="Write a comment..." oninput="autoResize(this)"></textarea>
                                <button class="comment-field__content-button" type="submit"
                                    name="post-comment">Post</button>
                            </div>
                        </form>
                    <?php } else {
                        echo "<span><strong>Log in to comment</strong></span>";
                    } ?>

                    <div class="post__miscellaneous-comments-container">

                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>