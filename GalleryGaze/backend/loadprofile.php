<?php
    include "connection.php";

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        if(isset($_GET['id'])){
            $thisProfileId = $_GET['id'];

            $stmt = $connection->prepare("SELECT * FROM users WHERE id = ?");
            $stmt->execute([$thisProfileId]);
            $user = $stmt->fetch();

            if($user){
                $username = $user['username'];
                $biography = $user['biography'];
                $avatar = $user['id'];
                $image_url = $user['image_url'];
            }

            $stmt = $connection->prepare("SELECT * FROM followers WHERE followed_id = ?");
            $stmt->execute([$thisProfileId]);
            $followersCount=$stmt->rowCount();

            $stmt = $connection->prepare("SELECT * FROM followers WHERE follower_id = ?");
            $stmt->execute([$thisProfileId]);
            $followingCount=$stmt->rowCount();

            $stmt = $connection->prepare("SELECT * FROM posts WHERE user_id = ?");
            $stmt->execute([$thisProfileId]);
            $postsCount=$stmt->rowCount();


        }
    }
?>