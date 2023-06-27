<?php

function userIsFollowed($userID, $followedUserID) {
    include "connection.php";
    $stmt = $connection->prepare("SELECT * FROM followers WHERE follower_id = ? and followed_id = ?");
    $stmt->execute([$userID, $followedUserID]);
    $isFollowing = $stmt->fetchAll();

    return count($isFollowing) > 0;
}

?>