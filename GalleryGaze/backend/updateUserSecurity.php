<?php 
$errors = [];
if($_SERVER["REQUEST_METHOD"] === "POST"){
    if(isset($_POST["updateSecurity"])){
        include "connection.php";

        $oldPassword = $_POST["oldPassword"];
        $password = $_POST["newPassword"];
        $repeatNewPassword = $_POST["repeatNewPassword"];

        $updateSecurityStatement = $connection->prepare("UPDATE users SET password=? WHERE id=?");

        // Validate password
        if (strlen($password) >= 8) {
            if (!preg_match("/^[a-zA-Z0-9]+$/", $password)) {
                $errors['invalid_info'] = "Password must contain only letters and numbers!";
            }
        } else {
            $errors['invalid_info'] = "Password must be at least 8 characters long!";
        }

        // Validate repeated password
        if ($password !== $repeatNewPassword) {
            $errors['repeatNewPassword'] = "Passwords do not match!";
        }

        if (empty($errors)) {
            $updateSecurityStatement->execute([password_hash($password, PASSWORD_BCRYPT), $_POST["id"]]);
            $updateSecurityStatement->closeCursor();
        }

        header("location: ../frontend/settings.php");
        exit();
    }
}
?>