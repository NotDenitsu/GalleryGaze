<?php 
if($_SERVER["REQUEST_METHOD"] === "POST"){
    if(isset($_POST["resolve"])){
        include "connection.php";
        $resolveStatement = $connection->prepare("UPDATE post_reports SET resolved=1 WHERE reporter_id=? AND post_id=?");
        $resolveStatement->execute([$_POST["reporterId"], $_POST["reportedId"]]);
        $resolveStatement->closeCursor();
        echo "exiting";
        header("location: ../frontend/admin.php");
        exit();
    }
}
?>