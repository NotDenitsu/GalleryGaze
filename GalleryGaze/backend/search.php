<?php
include "connection.php";

// Assuming the current page is stored in the page variable
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = 20;
$limit = 20;
$searchQuery = isset($_GET['query']) ? $_GET['query'] : '';
$sortBy = isset($_GET['sort_by']) ? $_GET['sort_by'] : '';

// Count total matching records
$query = "SELECT COUNT(id) FROM posts WHERE tags LIKE :searchQuery OR description LIKE :searchQuery OR title LIKE :searchQuery";
$countStatement = $connection->prepare($query);
$countStatement->bindValue(':searchQuery', '%' . $searchQuery . '%', PDO::PARAM_STR);
$countStatement->execute();
$result = $countStatement->fetch()[0];
$totalPages = ceil($result / $limit);

// Calculate the offset based on the current page
$calculated_offset = ($currentPage - 1) * $offset;

// Load matching pictures with the offset and limit
$query = "SELECT p.*, u.username, u.image_url AS user_image_url,
          (SELECT COUNT(*) FROM comments c WHERE c.post_id = p.id) AS comment_count,
          (SELECT COUNT(*) FROM likes l WHERE l.post_id = p.id) AS like_count
          FROM posts p
          INNER JOIN users u ON p.user_id = u.id
          WHERE tags LIKE :searchQuery OR description LIKE :searchQuery OR title LIKE :searchQuery";

if ($sortBy === 'likes-most') {
    $query .= " ORDER BY like_count DESC";
} elseif ($sortBy === 'likes-least') {
    $query .= " ORDER BY like_count ASC";
}

$query .= " LIMIT :limit OFFSET :offset";

$picturesStatement = $connection->prepare($query);
$picturesStatement->bindValue(':searchQuery', '%' . $searchQuery . '%', PDO::PARAM_STR);
$picturesStatement->bindValue(':limit', $limit, PDO::PARAM_INT);
$picturesStatement->bindValue(':offset', $calculated_offset, PDO::PARAM_INT);
$picturesStatement->execute();

// Fetch and process the results
foreach ($picturesStatement->fetchAll() as $data) {
    $postTitle = $data["title"];
    $uploadDate = new Datetime($data["upload_date"]);
    $uploadDateFormatted = $uploadDate->format("M d, Y");
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
