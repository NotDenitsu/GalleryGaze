<?php 
if($_SERVER["REQUEST_METHOD"] === "POST"){
    if(isset($_POST["resolve"])){
        include "connection.php";
        $resolveStatement = $connection->prepare("UPDATE user_reports SET resolved=1 WHERE id=?");
        $resolveStatement->execute([$_POST["userReportId"]]);
        $resolveStatement->closeCursor();
        header("location: ../frontend/admin.php");
        exit();
    }
}

?>