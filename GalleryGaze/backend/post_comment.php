<?php
session_start();
include "connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['user'])) {
        $currentUserId = $_SESSION['user']['id'];
        if (isset($_POST['post-comment'])) {
            if($_POST['comment'] !== ""){
                $comment = $_POST['comment'];
                $postId = $_POST['post-id'];
    
    
                $sql = "INSERT INTO comments (post_id, user_id, content) VALUES (:post_id, :user_id, :content)";
                $stmt = $connection->prepare($sql);
                $stmt->bindParam(':post_id', $postId);
                $stmt->bindParam(':user_id', $currentUserId);
                $stmt->bindParam(':content', $comment);
                $stmt->execute();
    
    
                if ($stmt) {
                    $stmt = $connection->prepare("SELECT c.content, c.creation_date, u.image_url, u.username
                    FROM comments c
                    JOIN users u ON c.user_id = u.id
                    WHERE c.post_id = ?
                    ORDER BY c.creation_date DESC");
                    $stmt->execute([$postId]);
                    $comment = $stmt->fetchAll();
    
                    foreach ($comment as $item) {
                        $content = $item['content'];
                        $date = new DateTime($item['creation_date']);
                        $creationDate = $date->format("M d, Y");
                        $userImageUrl = $item['image_url'];
                        $username = $item['username'];
    
    
                        echo '
                        <div class="comment">
                        <div class="comment__frame">
                        <img class="comment__frame-avatar" src="../static/assets/images/' . @$userImageUrl . '" alt="" />
                        </div>
                        <div class="comment__content">
                        <div class="comment__content-details">
                        <div class="comment__content-details-infobox">
                        <time class="comment__content-details-infobox-username">' . @$username . '</time>
                        <div class="comment__content-details-infobox-date">' . @$creationDate . '</div>
                        </div>
                        <button class="comment__content-deatils-button"><i class="fas fa-flag"></i></button>
                        </div>
                        <div class="comment__content-message">' . @$content . '</div>
                        <button class="comment__content-deatils-button"><i class="fa-regular fa-heart"></i></button>
                        </div>
                        </div>
                        ';
                    }
    
                }
            } else {
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