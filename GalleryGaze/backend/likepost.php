<?php
session_start();
include "connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') { //If file is executed without POST data return to home page
    if (isset($_SESSION['user'])) { //Checking if the user is logged in. If not return to login page
        $userID = $_SESSION['user']['id'];

        if (isset($_POST["like"])) {
            $postID = $_POST['postId'];
            $sql = "SELECT * FROM likes WHERE user_id = ? and post_id = ?";
            $stmt = $connection->prepare($sql);
            $stmt->execute([$userID, $postID]);
            $isLiked = $stmt->fetchAll();

            if ($isLiked) {
                $sql = "DELETE FROM likes WHERE user_id = ? and post_id = ?"; //If it's liked, unlike it
            } else {
                $sql = "INSERT INTO likes (`user_id`,`post_id`) VALUES (?, ?)"; //If it's not liked, like it
            }

            $stmt = $connection->prepare($sql);
            $stmt->execute([$userID, $postID]);

            header("location: ../frontend/post.php?id=$postID"); // Go back to the post page
            exit();

        }
    } else {
        header("location: ../frontend/login.php");
        exit();
    }

} else {
    header("location: ../frontend/home.php");
    exit();
}




?>