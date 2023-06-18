<?php

function postIsLiked($userID, $postID) {
    include "connection.php";
    $stmt = $connection->prepare("SELECT * FROM likes WHERE user_id = ? and post_id = ?");
    $stmt->execute([$userID, $postID]);
    $isLiked = $stmt->fetchAll();

    if($isLiked){
        echo "fas";
    } else {
        echo "fa-regular";
    }
}
?>