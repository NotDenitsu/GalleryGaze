<?php 
session_start();
include "connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['user'])) {
        $currentUserId = $_SESSION['user']['id'];
        if (isset($_POST['delete-post'])) {
            $postId = $_POST['post-id'];

            $stmt = $connection->prepare("SELECT * FROM posts WHERE id = ?");
            $stmt->execute([$postId]);
            $post = $stmt->fetch();
            $filePath = "../static/assets/images/" . $post['image_url'];

            if ($post) {
                if ($post['user_id'] == $currentUserId || $_SESSION['user']['role_id'] == 2) {

                    $stmt = $connection->prepare("DELETE FROM comments WHERE post_id = ?");
                    $stmt->execute([$postId]);

                    $stmt = $connection->prepare("DELETE FROM likes WHERE post_id = ?");
                    $stmt->execute([$postId]);

                    $stmt = $connection->prepare("DELETE FROM posts WHERE id = ?");
                    $stmt->execute([$postId]);

                    if (file_exists($filePath)) {
                        unlink($filePath);
                    }

                    header("location: ../frontend/home.php");
                    exit();
                    
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