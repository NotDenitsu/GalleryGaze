<?php
include "connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if (isset($_GET['id'])) {
        $postID = $_GET['id'];

        $stmt = $connection->prepare("SELECT c.content, c.creation_date, u.image_url, u.username
                                        FROM comments c
                                        JOIN users u ON c.user_id = u.id
                                        WHERE c.post_id = ?");
        $stmt->execute([$postID]);
        $comment = $stmt->fetchAll();

        foreach ($comment as $item) {
            $content = $item['content'];
            $creationDate = $item['creation_date'];
            $userImageUrl = $item['image_url'];
            $username = $item['username'];

            include "../templates/comment.php";
        }
    }
}
?>