<?php
include "connection.php";
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm_password'];

        if ($username && $email && $password && $confirmPassword) {
            // Validate username
            if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
                $errors['username'] = "Username must contain only letters and numbers!";
            }

            // Validate email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "Invalid email address format!";
            }

            // Validate password
            if (strlen($password) >= 8) {
                if (!preg_match("/^[a-zA-Z0-9]+$/", $password)) {
                    $errors['password'] = "Password must contain only letters and numbers!";
                }
            } else {
                $errors['password'] = "Password must be at least 8 characters long!";
            }

            // Validate repeated password
            if ($password !== $confirmPassword) {
                $errors['confirm_password'] = "Passwords do not match!";
            }

            if (empty($errors)) {
                $stmt = $connection->prepare("SELECT * FROM users WHERE `username` = ? OR `email` = ?");
                $stmt->execute([$username, $email]);
                $data = $stmt->fetchAll();

                if ($data) {
                    foreach ($data as $info) {
                        $checkUsername = $info['username'];
                        $checkEmail = $info['email'];

                        if ($checkUsername === $username) {
                            $errors['username'] = "The username is already taken!";
                        }

                        if ($checkEmail === $email) {
                            $errors['email'] = "The email is already in use!";
                        }
                    }
                } else {
                    $stmt = $connection->prepare("INSERT INTO users (`username`, `email`, `password`, 'image_url') VALUES (?,?,?)");
                    $stmt->execute([$username, $email, password_hash($password, PASSWORD_BCRYPT), "default-avatar.jpg"]);
                    header("location: success.php?registration=1");
                    exit;
                }
            }
        } else {
            $errors['empty_field'] = "Please fill in all the fields!";
        }
    }
}
?>