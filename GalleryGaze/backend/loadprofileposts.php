<?php
//Load all pictures available
$query = "SELECT p.*, u.username, u.image_url AS user_image_url,
                                (SELECT COUNT(*) FROM comments c WHERE c.post_id = p.id) AS comment_count,
                                (SELECT COUNT(*) FROM likes l WHERE l.post_id = p.id) AS like_count
                                FROM posts p
                                INNER JOIN users u ON p.user_id = u.id WHERE p.user_id=?";
$picturesStatement = $connection->prepare($query);
$picturesStatement->execute([$thisProfileId]);

foreach ($picturesStatement->fetchAll() as $data) {
    $postId = $data['id'];
    $postTitle = $data["title"];
    $uploadDate = new Datetime($data["upload_date"]);
    $uploadDateFormatted = $uploadDate->format("M d, Y");
    $postImageUrl = $data["image_url"];
    $userId = $data['user_id'];
    $commentCount = $data['comment_count'];
    $likeCount = $data['like_count'];
    $picturesStatement->closeCursor();

    $userStatement = $connection->prepare("SELECT * FROM users WHERE users.id=?");
    $userStatement->execute([$userId]);
    $userdata = $userStatement->fetchAll();
    $userName = $userdata[0]["username"];
    $userImageUrl = $userdata[0]["image_url"];
    $userStatement->closeCursor();


    include "../templates/postbox.php";
} 

?>