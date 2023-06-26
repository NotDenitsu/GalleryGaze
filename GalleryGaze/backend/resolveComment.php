<?php 
if($_SERVER["REQUEST_METHOD"] === "POST"){
    if(isset($_POST["resolve"])){
        include "connection.php";
        $resolveStatement = $connection->prepare("UPDATE comment_reports SET resolved=1 WHERE comment_id=? AND reporter_id=?");
        $resolveStatement->execute([$_POST["commentId"], $_POST["reporterId"]]);
        $resolveStatement->closeCursor();
        header("location: ../frontend/admin.php");
        exit();
    }
}

?>