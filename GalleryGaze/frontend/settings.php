<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("location: login.php");
    exit;
} else {
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
                        <form class="settings-section__form" action="../backend/update_settings.php" method="post">
                            <div class="settings-section__form-container">
                                <label class="settings-section__form-container-label" for="username-edit">Username</label>
                                <input id="username-edit" class="settings-section__form-container-input" name="username" value="<?= @$username ?>">
                            </div>
                            <div class="settings-section__form-container">
                                <label class="settings-section__form-container-label" for="email-edit">E-mail</label>
                                <input id="email-edit" class="settings-section__form-container-input" name="username" value="<?= @$email ?>">
                            </div>
                            <div class="settings-section__form-container">
                                <label class="settings-section__form-container-label" for="biography-edit">Biography</label>
                                <textarea id="biography-edit" class="settings-section__form-container-textarea" name="biography"><?= @$biography ?></textarea>
                            </div>
                            <button class="settings-section__form-button">Save</button>
                        </form>

                    </section>
                </div>
                <div class="settings-container__options-security">
                    <h1 class="settings-title">Security</h1>
                    <section class="settings-section settings-section--options">
                        <h3 class="settings-section__title">Change Password</h3>
                        <form class="settings-section__form" action="../backend/update_settings.php" method="post">
                            <div class="settings-section__form-container">
                                <label class="settings-section__form-container-label" for="current-password-edit">Current Password</label>
                                <input id="current-password-edit" class="settings-section__form-container-input" type="password" name="current-password">
                            </div>
                            <div class="settings-section__form-container">
                                <label class="settings-section__form-container-label" for="new-password-edit">New Password</label>
                                <input id="new-password-edit" class="settings-section__form-container-input" type="password" name="new-password">
                            </div>

                            <div class="settings-section__form-container">
                                <label class="settings-section__form-container-label" for="repeat-new-password-edit">Repeat New Password</label>
                                <input id="repeat-new-password-edit" class="settings-section__form-container-input" type="password" name="repeat-new-password">
                            </div>
                            <button class="settings-section__form-button">Save</button>
                        </form>
                </div>
                </section>
            </div>
        </div>

</body>

</html>