<?php
include "connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if (isset($_GET['id'])) {
        $postID = $_GET['id'];
      
        $stmt = $connection->prepare("SELECT c.id, c.content, c.creation_date, u.image_url, u.username, u.id as user_id
                                        FROM comments c
                                        JOIN users u ON c.user_id = u.id
                                        WHERE c.post_id = ?
                                        ORDER BY c.creation_date DESC");
        $stmt->execute([$postID]);
        $commentData = $stmt->fetchAll();

        foreach ($commentData as $data) {
            $commentId = $data['id'];
            $content = $data['content'];
            $date = new DateTime($data['creation_date']);
            $creationDate = $date->format("M d, Y");
            $userImageUrl = $data['image_url'];
            $username = $data['username'];
            $commentId = $data['id'];
            $commentUserId = $data['user_id'];

            include "../templates/comment.php";
        }
    }
}
?>