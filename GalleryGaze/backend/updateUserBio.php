<?php 
session_start();
if($_SERVER["REQUEST_METHOD"] === "POST"){
    if(isset($_POST["updateBio"])){
        include "connection.php";
        $updateBioStatement = $connection->prepare("UPDATE users SET biography=? WHERE id=?");
        $updateBioStatement->execute([$_POST["bio"], $_POST["id"]]);
        $updateBioStatement->closeCursor();
        $_SESSION['user']['biography'] = $_POST["bio"];
        header("location: ../frontend/settings.php");
        exit();
    }
}
?>