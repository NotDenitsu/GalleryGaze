<?php
session_start();
include "connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['user'])) {
        $currentUserId = $_SESSION['user']['id'];
        if (isset($_POST['post-comment'])) {
            if ($_POST['comment'] !== "") {
                $comment = $_POST['comment'];
                $postId = $_POST['post-id'];

                $sql = "INSERT INTO comments (post_id, user_id, content) VALUES (:post_id, :user_id, :content)";
                $stmt = $connection->prepare($sql);
                $stmt->bindParam(':post_id', $postId);
                $stmt->bindParam(':user_id', $currentUserId);
                $stmt->bindParam(':content', $comment);
                $stmt->execute();

                if ($stmt) {
                    $stmt = $connection->prepare("SELECT c.id, c.content, c.user_id, c.creation_date, u.image_url, u.username, p.user_id AS post_user_id
                    FROM comments c
                    JOIN users u ON c.user_id = u.id
                    JOIN posts p ON c.post_id = p.id
                    WHERE c.post_id = ?
                    ORDER BY c.creation_date DESC");
                    $stmt->execute([$postId]);
                    $comments = $stmt->fetchAll();

                    foreach ($comments as $item) {
                        $commentUserId = $item['user_id'];
                        $content = $item['content'];
                        $date = new DateTime($item['creation_date']);
                        $creationDate = $date->format("M d, Y");
                        $userImageUrl = $item['image_url'];
                        $username = $item['username'];
                        $commentId = $item['id'];
                        $postUserId = $item['post_user_id'];

                        echo '
                        <div class="comment">
                            <a href="profile.php?id=' . @$commentUserId . '" class="comment__frame">
                                <img class="comment__frame-avatar" src="../static/assets/images/' . @$userImageUrl . '" alt="" />
                            </a>
                            <div class="comment__content">
                                <div class="comment__content-details">
                                    <div class="comment__content-details-infobox">
                                        <time class="comment__content-details-infobox-username">
                                            ' . @$username . '
                                        </time>
                                        <div class="comment__content-details-infobox-date">
                                            ' . @$creationDate . '
                                        </div>
                                    </div>
                                    <button class="comment__content-deatils-button"><i class="fas fa-flag"></i></button>
                                </div>
                                <div class="comment__content-message">
                                    ' . @$content . '
                                </div>
                                <form class="comment__content-buttons comment__content-form-delete" action="../backend/deletecomment.php" method="post">
                                    <input type="hidden" name="comment-id" value="' . @$commentId . '">
                                    ';
                        if (isset($_SESSION['user'])) {
                            if ($_SESSION['user']['id'] == $postUserId || $_SESSION['user']['id'] == $commentUserId || $_SESSION['user']['role_id'] == 2) {
                                echo '
                                    <button class="comment__content-deatils-button" type="submit" name="delete-comment"><i class="fas fa-trash"></i></button>
                                ';
                            }
                        }
                        echo '
                                </form>
                            </div>
                        </div>
                        ';
                    }
                    echo '<script src="../javascript/deletecomment.js"></script>';
                }
            } else {
                echo "empty_payload";
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