<?php
session_start();

include "../backend/utilities.php";
include "../backend/updateUserSecurity.php";

if (!isset($_SESSION['user'])) {
    header("location: login.php");
    exit;
} else {
    $id = $_SESSION['user']['id'];
    $username = $_SESSION['user']['username'];
    $email = $_SESSION['user']['email'];
    $biography = $_SESSION['user']['biography'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link rel="icon" href="../static/assets/images/logo.png">
    <link rel="stylesheet" href="../static/css/normalize.css">
    <link rel="stylesheet" href="../static/css/style.css">
    <link rel="stylesheet" href="../static/assets/icons/fontawesome/css/all.min.css">
    <script src="../javascript/settings.js"></script>
    <script src="../javascript/navigation.js"></script>

</head>

<body class="main-container main-container-settings">
    <?php include "../templates/navigation.php" ?>
    <div class="settings-container">
            <div class="settings-container__nav">
                <div class="settings-container__nav-profile">
                    <div class="settings__avatar-frame">
                        <img src="../static/assets/images/default-avatar.jpg" class="settings__avatar" alt="">
                        <button class="settings__button-add-photo"><i class="fa-sharp fa-regular fa-image"></i></button>
                    </div>
                    <h2 class="settings__username">
                        <?= @$username ?>
                    </h2>
                </div>
                <div class="settings__container-pills">
                    <div id="settings-account" class="settings__pill"><i class="fa fa-solid fa-user"> </i>Account</div>
                    <div id="settings-security" class="settings__pill"><i class="fa fa-solid fa-lock"> </i>Security</div>
                </div>
            </div>
            <div class="settings-container__options">
                <div class="settings-container__options-account">
                    <h1 class="settings-title"> Account </h1>
                    <section class="settings-section">
                        <h3 class="settings-section__title">Personal Information</h3>
                        <form class="settings-section__form" action="../backend/updateUserBio.php" method="post">
                            <div class="settings-section__form-container">
                                <label class="settings-section__form-container-label" for="biography-edit">Biography</label>
                                <input type="hidden" name="id" value="<?=@$id?>">
                                <textarea id="biography-edit" class="settings-section__form-container-textarea" name="bio" value="<?= @$biography ?>"><?= @$biography ?></textarea>
                            </div>
                            <button class="settings-section__form-button" type="submit" name="updateBio">Save</button>
                        </form>

                    </section>
                </div>
                <div class="settings-container__options-security">
                    <h1 class="settings-title">Security</h1>
                    <?php displayErrors($errors)?>
                    <section class="settings-section settings-section--options">
                        <h3 class="settings-section__title">Change Password</h3>
                        <form class="settings-section__form" action="../backend/updateUserSecurity.php" method="post">
                            <input type="hidden" name="id" value="<?=@$id?>">
                            <div class="settings-section__form-container">
                                <label class="settings-section__form-container-label" for="current-password-edit">Current Password</label>
                                <input id="current-password-edit" class="settings-section__form-container-input" type="password" name="oldPassword">
                            </div>
                            <div class="settings-section__form-container">
                                <label class="settings-section__form-container-label" for="new-password-edit">New Password</label>
                                <input id="new-password-edit" class="settings-section__form-container-input" type="password" name="newPassword">
                            </div>

                            <div class="settings-section__form-container">
                                <label class="settings-section__form-container-label" for="repeat-new-password-edit">Repeat New Password</label>
                                <input id="repeat-new-password-edit" class="settings-section__form-container-input" type="password" name="repeatNewPassword">
                            </div>
                            <button class="settings-section__form-button" type="submit" name="updateSecurity">Save</button>
                        </form>
                </div>
                </section>
            </div>
        </div>

    <!-- Alert window -->
    <div class="alert-window" id="alert-window">
        <span class="alert-window__text"></span>
        <span class="alert-window__close-button">&times;</span>
    </div>

</body>



</html>