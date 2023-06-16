<?php
session_start();
include "../backend/validate_register.php";
include "../backend/utilities.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

    <link rel="stylesheet" href="../static/css/normalize.css">
    <link rel="stylesheet" href="../static/css/style.css">
    <script src="https://kit.fontawesome.com/689600d0a2.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="authentication__container-main container">
        <div class="authentication__container-image">
            <img class="authentication__image" src="../static/assets/images/horse.jpg">
        </div>
        <div class="authentication__container-form">
            <h1 class="authentication__title">GalleryGaze</h1>
            <?php displayErrors($errors)?>
            <form class="authentication__form" action="register.php" method="post">
                <div class="authentication__container-field">
                    <div class='authentication__container-icon'>
                        <input type="text" class="authentication__field <?php checkErrorField('username')?>" name="username" placeholder="Username" value="<?=@$username?>">
                        <i class="authentication__field-icon <?php checkErrorIcon('username')?> fa fa-solid fa-user"></i>
                    </div>
                    <?php printErrorMessage('username')?>
                </div>

                <div class="authentication__container-field">
                    <div class='authentication__container-icon'>
                        <input type="text" class="authentication__field <?php checkErrorField('email')?>" name="email" placeholder="Email" value="<?=@$email?>">
                        <i class="authentication__field-icon <?php checkErrorIcon('email')?> fa fa-solid fa-envelope"></i>
                    </div>
                    <?php printErrorMessage('email')?>
                </div>
                <div class="authentication__container-field">
                    <div class='authentication__container-icon'>
                        <input type="password" class="authentication__field <?php checkErrorField('password')?>" name="password" placeholder="Password">
                        <i class="authentication__field-icon <?php checkErrorIcon('password')?> fa fa-solid fa-lock"></i>
                    </div>
                    <?php printErrorMessage('password')?>
                </div>
                <div class="authentication__container-field">
                    <div class='authentication__container-icon'>
                        <input type="password" class="authentication__field <?php checkErrorField('confirm_password')?>" name="confirm_password" placeholder="Confirm Password">
                        <i class="authentication__field-icon <?php checkErrorIcon('confirm_password')?> fa fa-solid fa-lock"></i>
                    </div>
                    <?php printErrorMessage('confirm_password')?>
                </div>

                
                <button type="submit" name="register" class="authentication__button-submit">Sign Up</button>
            </form>

            <label> Already have an account? <a class="authentication__link" href="login.php">Sign In</a></label>
        </div>
    </div>

</body>
</html>

