<?php
include "connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if (isset($_GET['id'])) {
        $postID = $_GET['id'];

        $stmt = $connection->prepare("SELECT c.id, c.user_id, c.content, c.creation_date, u.image_url, u.username
                                        FROM comments c
                                        JOIN users u ON c.user_id = u.id
                                        WHERE c.post_id = ?
                                        ORDER BY c.creation_date DESC");
        $stmt->execute([$postID]);
        $comment = $stmt->fetchAll();

        foreach ($comment as $item) {
            $content = $item['content'];
            $date = new DateTime($item['creation_date']);
            $creationDate = $date->format("M d, Y");
            $userImageUrl = $item['image_url'];
            $username = $item['username'];
            $commentId = $item['id'];
            $commentUserId = $item['user_id'];

            include "../templates/comment.php";
        }
    }
}
?>