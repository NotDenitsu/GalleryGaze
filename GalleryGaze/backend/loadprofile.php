<?php
    include "connection.php";

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        if(isset($_GET['id'])){
            $id = $_GET['id'];

            $stmt = $connection->prepare("SELECT * FROM users WHERE id = ?");
            $stmt->execute([$id]);
            $user = $stmt->fetch();

            if($user){
                $username = $user['username'];
                $biography = $user['biography'];
                $avatar = $user['id'];
            }

            $stmt = $connection->prepare("SELECT * FROM followers WHERE followed_id = ?");
            $stmt->execute([$id]);
            $followersCount=$stmt->rowCount();

            $stmt = $connection->prepare("SELECT * FROM followers WHERE follower_id = ?");
            $stmt->execute([$id]);
            $followingCount=$stmt->rowCount();

            $stmt = $connection->prepare("SELECT * FROM posts WHERE user_id = ?");
            $stmt->execute([$id]);
            $postsCount=$stmt->rowCount();


        }
    }
?>