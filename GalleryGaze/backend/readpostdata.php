<?php
    include "connection.php";
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        if (isset($_GET['id'])) {
            $postId = $_GET['id'];
        }
    }

    $query = "SELECT p.*, u.username, u.image_url AS user_image_url,
    (SELECT COUNT(*) FROM comments c WHERE c.post_id = p.id) AS comment_count,
    (SELECT COUNT(*) FROM likes l WHERE l.post_id = p.id) AS like_count,
    (SELECT COUNT(*) FROM posts up WHERE up.user_id = u.id) AS user_uploads,
    (SELECT COUNT(*) FROM followers f WHERE f.followed_id = u.id) AS user_followers
    FROM posts p
    INNER JOIN users u ON p.user_id = u.id
    WHERE p.id = ?";
    $postStatement = $connection->prepare($query);
    $postStatement->execute([$postId]);
    $postData = $postStatement->fetch(PDO::FETCH_ASSOC);
    $postStatement->closeCursor();

    $postTitle = $postData["title"];
    $postDescription = $postData["description"];
    $postImageUrl = $postData["image_url"];
    $commentCount = $postData["comment_count"];
    $userId = $postData["user_id"];
    $userName = $postData["username"];
    $userImageUrl = $postData["user_image_url"];
    $userUploads = $postData["user_uploads"];
    $userFollowers = $postData["user_followers"];




    ?>