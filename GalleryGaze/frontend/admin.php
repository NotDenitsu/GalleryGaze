<?php
session_start();
include "../backend/connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>
    <link rel="stylesheet" href="../static/css/normalize.css">
    <link rel="stylesheet" href="../static/css/admin.css">
</head>

<body class="admin-container">
    <div class="admin-container__post-reports">
        <div class="admin-container__post-reports-box">

            <?php 
                $commentReportStatement = $connection->prepare("SELECT * FROM comment_reports");
                $commentReportStatement->execute();
                $commentReportsData = $commentReportStatement->fetchAll();
                foreach($commentReportsData as $data){
                    $reportedCommentId = $data["comment_id"];
                    $reporterUserId = $data["reporter_id"];
                    $reason = $data["reason"];
                    $isResolved = $data["resolved"];
                    $commentReportStatement->closeCursor();
                    
                    if($isResolved == 0){

                        $commentStatement = $connection->prepare("SELECT * FROM comments WHERE id=?");
                        $commentStatement->execute([$reportedCommentId]);
                        $commentData = $commentStatement->fetchAll()[0];
                        $commentContent = $commentData["content"];
                        $commentPosterId = $commentData["user_id"];
                        $postId = $commentData["post_id"];
                        $commentStatement->closeCursor();
                        
                        $commenterStatement = $connection->prepare("SELECT * FROM users WHERE id=?");
                        $commenterStatement->execute([$commentPosterId]);
                        $commenterData = $commenterStatement->fetchAll()[0];
                        $commenterUsername = $commenterData["username"];
                        $commenterImageUrl = $commenterData["image_url"];
                        $commenterStatement->closeCursor();

                        $reporterStatement = $connection->prepare("SELECT * FROM users WHERE id=?");
                        $reporterStatement->execute([$reporterUserId]);
                        $reporterData = $reporterStatement->fetchAll()[0];
                        $reporterId = $reporterData["id"];
                        $reporterImageUrl = $reporterData["image_url"];
                        $reporterUsername = $reporterData["username"];
                        $reporterStatement->closeCursor();
            ?>

            <div class="report">
                <div class="report_box">
                <a href="../frontend/post.php?id=<?=$postId?>"><img src="../static/assets/images/<?=$commenterImageUrl?>" class="report_image" alt="<?=$commenterUsername?>"></a>
                    <div class="report_info">
                        <h1 class="report_info-username"><?=$commenterUsername?> : <?=$reason?></h1>
                        <p class="report_info-reason">Comment: <?=$commentContent?></p>
                    </div>
                </div>
                <form class="report_box report_box--bottom"  action="../backend/resolveComment.php" method="post">
                    <input type="hidden" name="commentId" value="<?=$reportedCommentId?>">
                    <input type="hidden" name="reporterId" value="<?=$reporterUserId?>">
                    <button class="report_box-button"  type="submit" name="resolve">Mark as Resolved!</button>
                    <h1 class="report_info-username report_info-username--reporter">Reported by <?=$reporterUsername?></h1>
                    <a href="../frontend/profile.php?id=<?=$reporterUserId?>"><img src="../static/assets/images/<?=$reporterImageUrl?>" class="report_image report_image--reporter" alt="<?=$reporterUsername?>"></a>
                </form>
            </div>

            <?php 
                    }
                }
            ?>

        </div>

        <div class="admin-container__post-reports-box">
            <?php 
                    $postReportStatement = $connection->prepare("SELECT * FROM post_reports");
                    $postReportStatement->execute();
                    $postReportsData = $postReportStatement->fetchAll();
                    foreach($postReportsData as $data){
                        $postReportId = $data["id"];
                        $postId = $data["post_id"];
                        $reporterUserId = $data["reporter_id"];
                        $reason = $data["reason"];
                        $description = $data["description"];
                        $isResolved = $data["resolved"];
                        $postReportStatement->closeCursor();
                        
                        if($isResolved == 0){
                            $postStatement = $connection->prepare("SELECT * FROM posts WHERE id=?");
                            $postStatement->execute([$postId]);
                            $postData = $postStatement->fetchAll()[0];
                            $postImageUrl = $postData["image_url"];
                            $postTitle = $postData["title"];
                            $postStatement->closeCursor();

                            $reporterStatement = $connection->prepare("SELECT * FROM users WHERE id=?");
                            $reporterStatement->execute([$reporterUserId]);
                            $reporterData = $reporterStatement->fetchAll()[0];
                            $reporterImageUrl = $reporterData["image_url"];
                            $reporterUsername = $reporterData["username"];
                            $reporterStatement->closeCursor();
                ?>
            <div class="report">
                    <div class="report_box">
                        <a href="../frontend/post.php?id=<?=$postId?>"><img src="../static/assets/images/<?=$postImageUrl?>" class="report_image" alt="<?=$postTitle?>"></a>
                        <div class="report_info">
                            <h1 class="report_info-username"><?=$postTitle?> : <?=$reason?></h1>
                            <p class="report_info-reason"><?=$description?></p>
                        </div>
                    </div>
                    <form class="report_box report_box--bottom" action="../backend/resolvePost.php" method="post">
                        <input type="hidden" name="postReportId" value="<?=$postReportId?>">
                        <button class="report_box-button" type="submit" name="resolve">Mark as Resolved!</button>
                        <h1 class="report_info-username report_info-username--reporter">Reported by <?=$reporterUsername?></h1>
                        <a href="../frontend/profile.php?id=<?=$reporterUserId?>"><img src="../static/assets/images/<?=$reporterImageUrl?>" class="report_image report_image--reporter" alt="<?=$reporterUsername?>"></a>
                        </form>
            </div>

            <?php
                    }
                }
            ?>

        </div>
    </div>
    <div class="admin-container__user-reports">
        <?php 
            $userReportStatement = $connection->prepare("SELECT * FROM user_reports");
            $userReportStatement->execute();
            $userReportsData = $userReportStatement->fetchAll();
            foreach($userReportsData as $data){
                $reportedUserId = $data["reported_id"];
                $reporterUserId = $data["reporter_id"];
                $reason = $data["reason"];
                $description = $data["description"];
                $isResolved = $data["resolved"];
                $userReportStatement->closeCursor();

                if($isResolved == 0){

                    $reportedStatement = $connection->prepare("SELECT * FROM users WHERE id=?");
                    $reportedStatement->execute([$reportedUserId]);
                    $reportedData = $reportedStatement->fetchAll()[0];
                    $reportedUsername = $reportedData["username"];
                    $reportedImageUrl = $reportedData["image_url"];
                    $reportedStatement->closeCursor();
                    
                    $reporterStatement = $connection->prepare("SELECT * FROM users WHERE id=?");
                    $reporterStatement->execute([$reporterUserId]);
                    $reporterData = $reporterStatement->fetchAll()[0];
                    $reporterUsername = $reporterData["username"];
                    $reporterImageUrl = $reporterData["image_url"];
                    $reporterStatement->closeCursor();

                

        ?>

        <div class="report">
            <div class="report_box">
                <a href="../frontend/profile.php?id=<?=$reportedUserId?>"><img src="../static/assets/images/<?=$reportedImageUrl?>" class="report_image" alt="<?=$reportedUsername?>"></a>
                <div class="report_info">
                    <h1 class="report_info-username"><?=$reportedUsername?> : <?=$reason?></h1>
                    <p class="report_info-reason"><?=$description?></p>
                </div>
            </div>
            <form class="report_box report_box--bottom" action="../backend/resolveUser.php" method="post">
                <input type="hidden" name="reportedId" value="<?=$reportedUserId?>">
                <button class="report_box-button" type="submit" name="resolve">Mark as Resolved!</button>
                <h1 class="report_info-username report_info-username--reporter">Reported by <?=$reporterUsername?></h1>
                <a href="../frontend/profile.php?id=<?=$reporterUserId?>"><img src="../static/assets/images/<?=$reporterImageUrl?>" class="report_image report_image--reporter" alt="<?=$reporterUsername?>"></a>
            </form>
        </div>

        <?php
                }
            }
            
        ?>
    </div>
    
</body>

</html>