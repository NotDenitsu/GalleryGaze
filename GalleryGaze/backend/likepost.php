<?php
session_start();
include "connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['user'])) {
        $userID = $_SESSION['user']['id'];

        if (isset($_POST['like'])) {
            // Validate and sanitize the post ID
            $postID = filter_var($_POST['postId'], FILTER_VALIDATE_INT);

            if ($postID === false) {
                // Invalid post ID, handle the error accordingly
                echo "invalid_argument";
                exit();
            }

            $sql = "SELECT * FROM likes WHERE user_id = ? AND post_id = ?";
            $stmt = $connection->prepare($sql);
            $stmt->execute([$userID, $postID]);
            $isLiked = $stmt->fetchAll();

            if ($isLiked) {
                $sql = "DELETE FROM likes WHERE user_id = ? AND post_id = ?";
            } else {
                $sql = "INSERT INTO likes (`user_id`, `post_id`) VALUES (?, ?)";
            }

            $stmt = $connection->prepare($sql);
            $stmt->execute([$userID, $postID]);
        }
    } else {
        echo "not_logged_in";
        exit();
    }
} else {
    echo "invalid_argument";
    exit();
}




?>