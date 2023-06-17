<?php
    session_start();
    include "connection.php";

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_POST['post-comment'])){
            $comment = $_POST['comment'];
            $postId = $_POST['post-id'];


            $sql = "INSERT INTO comments (post_id, user_id, content) VALUES (:post_id, :user_id, :content)";
            $stmt = $connection->prepare($sql);
            $stmt->bindParam(':post_id', $postId);
            $stmt->bindParam(':user_id', $_SESSION['user']['id']);
            $stmt->bindParam(':content', $comment);
            $stmt->execute();

            header("location: ../frontend/post.php?id=$postId");
            exit();

        } else {
            header("location: ../frontend/home.php");
            exit();
        }
    }
?>