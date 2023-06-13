<?php
session_start();
include "../backend/validate_login.php";
include "../backend/utilities.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>

    <link rel="stylesheet" href="../static/css/normalize.css">
    <link rel="stylesheet" href="../static/css/style.css">
    <script src="https://kit.fontawesome.com/689600d0a2.js" crossorigin="anonymous"></script>
</head>
<body class="authentication__body">
    <div class="authentication__container-main container">
        <div class="authentication__container-image">
            <img class="authentication__image" src="../static/assets/images/horse.jpg">
        </div>
        <div class="authentication__container-form">
            <h1 class="authentication__title">GalleryGaze</h1>
            <?php displayErrors($errors)?>
            <form class="authentication__form" action="#" method="post">
                <div class="authentication__container-field">
                    <div class="authentication__container-icon">
                        <input type="text" class="authentication__field" name="username" placeholder="Username" value="<?=@$username?>">
                        <i class="authentication__field-icon fa fa-solid fa-user"></i>
                    </div>
                </div>
                <div class="authentication__container-field">
                    <div class="authentication__container-icon">
                        <input type="password" class="authentication__field" name="password" placeholder="Password">
                        <i class="authentication__field-icon fa fa-solid fa-lock"></i>
                    </div>
                </div>
                <button type="submit" name="login" class="authentication__button-submit">Sign In</button>
            </form>

            <label>Don't have an account? <a class="authentication__link" href="register.php">Sign Up</a></label>
        </div>
    </div>
</body>

</html>