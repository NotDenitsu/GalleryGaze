<?php 
session_start();
include "connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['user'])) {
        $currentUserId = $_SESSION['user']['id'];
        if (isset($_POST['delete-comment'])) {
            $commentId = $_POST['comment-id'];

            $stmt = $connection->prepare("SELECT c.id, c.user_id, p.user_id AS post_user_id
                                        FROM comments c
                                        JOIN posts p ON c.post_id = p.id
                                        WHERE c.id = ?");
            $stmt->execute([$commentId]);
            $comment = $stmt->fetch();

            if ($comment) {
                if ($comment['user_id'] == $currentUserId || $comment['post_user_id'] == $currentUserId || $_SESSION['user']['role_id'] == 2) {
                    $stmt = $connection->prepare("DELETE FROM comments WHERE id = ?");
                    $stmt->execute([$commentId]);
                    
                } else {
                    echo "unauthorized";
                    exit();
                }
            } else {
                echo "comment_not_found";
                exit();
            }
        } else {
            echo "invalid_argument";
            exit();
        }
    } else {
        echo "not_logged_in";
        exit();
    }
}
?>