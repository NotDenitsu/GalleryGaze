<?php
    include "connection.php";
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        if (isset($_GET['id'])) {
            $thisPostId = $_GET['id'];
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
    $postStatement->execute([$thisPostId]);
    $postData = $postStatement->fetch(PDO::FETCH_ASSOC);
    $postStatement->closeCursor();

    $thisPostTitle = $postData["title"];
    $thisPostDescription = $postData["description"];
    $thisPostTags = $postData["tags"];
    $thisPostImageUrl = $postData["image_url"];
    $thisCommentCount = $postData["comment_count"];
    $thisUserId = $postData["user_id"];
    $thisUsername = $postData["username"];
    $thisUserImageUrl = $postData["user_image_url"];
    $thisUserUploads = $postData["user_uploads"];
    $thisUserFollowers = $postData["user_followers"];




    ?>