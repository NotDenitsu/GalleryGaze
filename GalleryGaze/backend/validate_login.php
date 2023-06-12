<?php
include "connection.php";
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['login'])) {
        $password = $_POST['password'];
        $username = $_POST['username'];

        if ($username && $password) {
            $stmt = $connection->prepare("SELECT * FROM users WHERE username = ?");
            $stmt->execute([$username]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user'] = $user;
                header("location: home.php");
                exit;
            } else {
                $errors['invalid_info'] = "Incorrect username or password!";
            }
        } else {
            $errors['empty_field'] = "Please fill in all the fields!";
        }
    }
}

?>