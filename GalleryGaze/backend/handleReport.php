<?php 
if($_SERVER["REQUEST_METHOD"] === "POST"){
    session_start();
    include "connection.php";

    if(isset($_POST["commentReport"])){
        $commentReportStatement = $connection->prepare("INSERT INTO comment_reports(comment_id, reporter_id, reason) VALUES (?, ?, ?)");
        $commentReportStatement->execute([$_POST['commentId'], $_SESSION['user']['id'], $_POST['reason']]);
        $commentReportStatement->closeCursor();
    }else if(isset($_POST["postReport"])){
        $postReportStatement = $connection->prepare("INSERT INTO post_reports(post_id, reporter_id, reason, description) VALUES (?, ?, ?, ?)");
        $postReportStatement->execute([$_POST["postId"], $_SESSION['user']['id'], $_POST['reason'], $_POST['description']]);
        $postReportStatement->closeCursor();

    }if(isset($_POST["userReport"])){

        $userReportStatement = $connection->prepare("INSERT INTO user_reports(reporter_id, reported_id, reason, description) VALUES (?, ?, ?, ?)");
        $userReportStatement->execute([$_POST["reportedId"], $_SESSION['user']['id'], $_POST['reason'], $_POST['description']]);
        $userReportStatement->closeCursor();
    }
    //header("location: ../frontend/settings.php");
    //exit();
}
?>