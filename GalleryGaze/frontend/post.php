
<?php
session_start();
?>
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

        .post {
            align-self: flex-start;

            width: 90%;

            margin: 50px auto;
            padding: 10px;

            border-radius: 10px;
            background-color: #223843;
            color: white;
        }

        .post__imagebox {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 600px;
            border-radius: 10px;
            background-color: #A29C9B;
            overflow: hidden;
        }

        .post__imagebox-image {
            width: 100%;
            height: 100%;
            object-fit: scale-down;
        }

        .post__interactables {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            border-bottom: 3px solid rgba(162, 156, 155, .1);
        }

        .post__interactables-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 0;
            padding: 10px;
        }

        .post__interactables-title {
            margin: 0;
            padding: 10px;
        }

        .userbox {
            display: flex;
            justify-content: left;
            align-items: flex-start;
            padding: 5px;
            max-width: 250px;
            max-height: 100px;
        }

        .userbox__avatar {
            width: 75px;
            height: 75px;
            object-fit: cover;
        }

        .userbox__stats {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            margin-left: 5px;
            max-height: 75px;
            max-width: 200px;
        }

        .userbox__stats-username {
            margin: 0;
            margin-bottom: 5px;
            font-size: 1.5em;
            text-decoration: none;
            color: white;
        }

        .post__buttonbox {
            display: flex;
            flex-direction: column;
            gap: 5px;
            width: 180px;
        }

        .post__buttonbox-buttons {
            width: 100%;
            display: flex;
            justify-content: space-between;
        }

        .post__buttonbox-button {
            width: 40px;
            height: 40px;
            border: 0;
            background: none;
            color: white;
            text-align: center;
            font-size: 1.5em;
        }

        .post__buttonbox-button:hover {
            cursor: pointer;
            color: #DB324D;
            transform: scale(1.1);
            transition: all 0.3s;
        }

        .post__buttonbox-follow {
            padding: 10px;
            width: 100%;
            border: 0;
            border-radius: 10px;
            background-color: #D77A61;
            color: white;
            transition: all 0.3s;
        }

        .post__buttonbox-follow:hover {
            cursor: pointer;
            background-color: #bf674f;
            transition: all 0.3s;
        }

        .post__description {
            min-height: 50px;
            padding: 10px;
            border-bottom: 3px solid rgba(162, 156, 155, .1);
        }

        .post__miscellaneous {
            display: flex;
            justify-content: space-between;
            width: 100%;
        }

        .post__miscellaneous-recommended {
            width: 50%;
            height: 800px;
            max-height: 800px;
            padding: 20px;
        }

        .post__miscellaneous-comments {
            width: 50%;
            height: 800px;
            max-height: 800px;
            overflow-y: scroll;
            padding: 20px;
            border-left: 3px solid rgba(162, 156, 155, .1);
        }

        .post__miscellaneous-comments-container {
            padding-left: 20px;
        }

        .post__miscellaneous-title {
            margin: 0;
            margin-bottom: 30px;
            font-size: 1.5em;
        }

        /*End of Post Styling*/

        /*Comment Field Styling*/

        .comment-field {
            display: flex;
            align-items: center;
            max-width: 500px;
            padding-bottom: 20px;
            margin-bottom: 20px;
            border-bottom: 3px solid  rgba(162, 156, 155, .1);
        }

        .comment-field__frame {
            align-self: flex-start;
            min-width: 50px;
            min-height: 50px;
            max-width: 50px;
            max-height: 50px;
            background-color: #ccc;
            border-radius: 10px;
            margin-right: 10px;
            overflow: hidden;
        }


        .comment-field__frame-avatar {
            width: 100%;
            object-fit: cover;
        }


        .comment-field__content {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .comment-field__content-username {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .comment-field__content-field {
            height: 40px;
            max-height: 150px;
            padding: 10px;
            margin-bottom: 10px;
            resize: none;
            border: none;
            background-color: #f9f9f9;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 4px;
        }

        .comment-field__content-button {
            align-self: flex-end;
            padding: 10px 20px;
            border: none;
            border-radius: 10px;
        }

        /*End of Comment Field Styling*/

        /*Comment Styling*/

        .comment {
            display: flex;
            gap: 5px;
            margin-bottom: 50px;
        }

        .comment__frame {
            min-width: 50px;
            max-width: 50px;
            min-height: 50px;
            max-height: 50px;
            border: 1px solid gray;
            border-radius: 5px;
            overflow: hidden;
        }

        .comment__frame-avatar {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .comment__content {
            margin-left: 10px;
        }

        .comment__content-details-infobox-username {
            font-weight: bold;
        }

        .comment__content-details-infobox-date {
            font-size: 0.8em;
            color: #888;
        }

        .comment__content-message {
            margin-top: 5px;
            background-color: #f2f2f2;
            color: black;
            padding: 10px;
            border-radius: 5px;
            position: relative;
        }


        .comment__content-details {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
        }

        .comment__content-deatils-button {
            width: 25px;
            height: 25px;
            border: none;
            background: none;
            color: white;
        }

        .comment__content-deatils-button:hover {
            color: #f00;
        }

        /*End of Comment Styling*/

        @media only screen and (max-width: 768px),
        (max-height: 570px) {
            .post__miscellaneous {
                display: flex;
                flex-direction: column;
            }

            .post__miscellaneous-recommended {
                order: 1;
                width: 100%;
            }

            .post__miscellaneous-comments {
                width: 100%;
                border: none;
                border-bottom: 3px solid rgba(162, 156, 155, .1);
            }
        }
    </style>
</head>

<body>
    <?php
    include "../templates/navigation.php";
    ?>
    <div class="main-container">
        <div class="post">
            <div class="post__imagebox">
                <img class="post__imagebox-image" src="../static//assets/images/<?= $postImageUrl ?>" alt="<?= $postTitle ?>">
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
                            <button class="post__buttonbox-button"><i class="fa-regular fa-heart"></i></button>
                            <button class="post__buttonbox-button"><i class="fa-solid fa-download"></i></button>
                            <button class="post__buttonbox-button"><i class="fa-solid fa-share"></i></button>
                            <button class="post__buttonbox-button"><i
                                    class="fa-solid fa-circle-exclamation"></i></button>
                        </div>
                        <button class="post__buttonbox-follow">Follow</button>
                    </div>
                </header>

            </div>
            <div class="post__description">
                <p>
                    <?= $postDescription ?>
                </p>
            </div>

            <div class="post__miscellaneous">
                <div class="post__miscellaneous-recommended">
                    <h3 class="post__miscellaneous-title">You may also like</h3>
                    <div class="post__miscellaneous-recommended-posts">

                    </div>
                </div>
                <div class="post__miscellaneous-comments">
                    <h3 class="post__miscellaneous-title">Comments</h3>
                    <?php if (isset($_SESSION['user'])) { ?>
                    

                        <form class="comment-field" method="post" action="../backend/post_comment.php">
                            
                            <div class="comment-field__frame">
                                <img class="comment-field__frame-avatar" src="" alt="">
                            </div>
                            <div class="comment-field__content">
                                <div class="comment-field__content-username"><?=$_SESSION['user']['username']?></div>
                                <input type="hidden" id="custId" name="post-id" value="<?=@$postId?>">
                                <textarea class="comment-field__content-field" name="comment"
                                    placeholder="Write a comment..." oninput="autoResize(this)"></textarea>
                                <button class="comment-field__content-button" type="submit"
                                    name="post-comment">Post</button>
                            </div>
                        </form>
                    <?php } else {
                        echo "<div class='comment-field'><span><strong>LOG IN TO COMMENT</strong></span></div>";
                    } ?>

                    <div class="post__miscellaneous-comments-container">
                        <?php include "../backend/loadcomments.php"?>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>