<?php
include "connection.php";

// Assuming the current page is stored in the page variable
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = 10;
$limit = 10;

// Calculate the offset based on the current page
$calculated_offset = ($currentPage - 1) * $offset;

// Load recommended pictures with the offset and limit, excluding the current post
$query = "SELECT COUNT(p.id)
          FROM posts p
          INNER JOIN users u ON p.user_id = u.id
          WHERE (p.title LIKE CONCAT('%', :postTitle, '%')
            OR p.description LIKE CONCAT('%', :postDescription, '%')
            OR p.tags LIKE CONCAT('%', :postTags, '%'))
          AND p.id != :currentPostId";
$countStatement = $connection->prepare($query);
$countStatement->bindValue(':postTitle', $thisPostTitle);
$countStatement->bindValue(':postDescription', $thisPostDescription);
$countStatement->bindValue(':postTags', $thisPostTags);
$countStatement->bindValue(':currentPostId', $thisPostId);
$countStatement->execute();
$result = $countStatement->fetchColumn();
$totalPages = ceil($result / $limit);

// Load recommended pictures with the offset and limit, excluding the current post
$query = "SELECT p.*, u.username, u.image_url AS user_image_url,
          (SELECT COUNT(*) FROM comments c WHERE c.post_id = p.id) AS comment_count,
          (SELECT COUNT(*) FROM likes l WHERE l.post_id = p.id) AS like_count
          FROM posts p
          INNER JOIN users u ON p.user_id = u.id
          WHERE (p.title LIKE CONCAT('%', :postTitle, '%')
            OR p.description LIKE CONCAT('%', :postDescription, '%')
            OR p.tags LIKE CONCAT('%', :postTags, '%'))
          AND p.id != :currentPostId
          ORDER BY RAND()
          LIMIT :limit OFFSET :offset";
$picturesStatement = $connection->prepare($query);
$picturesStatement->bindValue(':postTitle', $thisPostTitle);
$picturesStatement->bindValue(':postDescription', $thisPostDescription);
$picturesStatement->bindValue(':postTags', $thisPostTags);
$picturesStatement->bindValue(':currentPostId', $thisPostId);
$picturesStatement->bindValue(':limit', $limit, PDO::PARAM_INT);
$picturesStatement->bindValue(':offset', $calculated_offset, PDO::PARAM_INT);
$picturesStatement->execute();

// Fetch and process the results
foreach ($picturesStatement->fetchAll() as $data) {
    $postTitle = $data["title"];
    $uploadDate = $data["upload_date"];
    $postImageUrl = $data["image_url"];
    $userId = $data['user_id'];
    $postId = $data['id'];
    $commentCount = $data['comment_count'];
    $likeCount = $data['like_count'];

    $userName = $data["username"];
    $userImageUrl = $data["user_image_url"];

    include "../templates/postbox.php";
}
$picturesStatement->closeCursor();
?>
