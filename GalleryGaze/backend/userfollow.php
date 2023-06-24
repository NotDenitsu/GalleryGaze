<?php
session_start();
include "connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['user'])) {
        $userID = $_SESSION['user']['id'];

        if (isset($_POST['follow'])) {
            // Validate and sanitize the post ID
            $followedUserID = filter_var($_POST['followedUserID'], FILTER_VALIDATE_INT);

            if ($followedUserID === false) {
                // Invalid post ID, handle the error accordingly
                echo "invalid_argument";
                exit();
            }

            $sql = "SELECT * FROM followers WHERE follower_id = ? AND followed_id = ?";
            $stmt = $connection->prepare($sql);
            $stmt->execute([$userID, $followedUserID]);
            $isFollowed = $stmt->fetchAll();

            if ($isFollowed) {
                echo "del";
                $sql = "DELETE FROM followers WHERE follower_id = ? AND followed_id = ?";
            } else {
                echo "ins";
                $sql = "INSERT INTO followers (`follower_id`, `followed_id`) VALUES (?, ?)";
            }

            $stmt = $connection->prepare($sql);
            $stmt->execute([$userID, $followedUserID]);
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