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

<body>
    <?php include "../templates/navigation.php" ?>
    <div class="settings__container-main container">
        <div class="settings__container-nav">
            <div class="settings__container-profile">
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
        <div class="settings__container-options">
            <div class="settings__account-options">
                <h1 class="settings__title"> Account </h1>
                <section class="settings__options-section">
                    <h3 class="settings__section-title">Personal Information</h3>
                    <form class="settings__container-fields" action="../backend/update_settings.php" method="post">
                        <div class="settings__container-label">
                            <label for="username-edit">Username</label>
                            <input id="username-edit" class="settings__field" name="username" value="<?= @$username ?>">
                        </div>
                        <div class="settings__container-label">
                            <label for="email-edit">E-mail</label>
                            <input id="email-edit" class="settings__field" name="username" value="<?= @$email ?>">
                        </div>
                        <div class="settings__container-label">
                            <label for="biography-edit">Biography</label>
                            <textarea id="biography-edit" class="settings__field-bio" name="biography"><?= @$biography ?></textarea>
                        </div>
                        <button class="settings__button-save">Save</button>
                    </form>

                </section>
            </div>
            <div class="settings__security-options">
                <h1 class="settings__title">Security</h1>
                <section class="settings__options-section">
                    <h3 class="settings__section-title"></h3>
                    <h3 class="settings__section-title">Change Password</h3>
                    <div class="settings__container-fields">
                        <div class="settings__container-label">
                            <label for="current-password-edit">Current Password</label>
                            <input id="current-password-edit" class="settings__field" type="password"
                                name="current-password">
                        </div>
                        <div class="settings__container-label">
                            <label for="new-password-edit">New Password</label>
                            <input id="new-password-edit" class="settings__field" type="password" name="new-password">
                        </div>

                        <div class="settings__container-label">
                            <label for="repeat-new-password-edit">Repeat New Password</label>
                            <input id="repeat-new-password-edit" class="settings__field" type="password"
                                name="repeat-new-password">
                        </div>
                        <button class="settings__button-save">Save</button>
                    </div>
            </div>
            </section>
        </div>
    </div>
</body>

</html>