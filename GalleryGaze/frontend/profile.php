<?php
session_start();
include "../backend/loadprofile.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    <link rel="stylesheet" href="../static/css/normalize.css">
    <link rel="stylesheet" href="../static/css/style.css">
    <script src="https://kit.fontawesome.com/689600d0a2.js" crossorigin="anonymous"></script>
    <script src="../javascript/navigation.js"></script>
</head>

<body>
    <?php include "../templates/navigation.php"; ?>
    <div class="profile__container-main container">
        <div class="profile__container-details">
            <div class="profile__container-details-box">
                <div class="profile__container-user">
                    <div class="profile__avatar-frame">
                        <img class="profile__avatar" src="../static/assets/images/default-avatar.jpg">
                    </div>
                    <div class="profile__container-stats">
                        <h3 class="profile__username">
                            <?= @$username ?>
                        </h3>
                        <h4 class="profile__details-text">Followers:
                            <?= @$followersCount ?>
                        </h4>
                        <h4 class="profile__details-text">Following:
                            <?= @$followingCount ?>
                        </h4>
                    </div>
                </div>
                <button class="profile__button-report"><i class="fa fa-solid fa-circle-exclamation"></i></button>
            </div>
            <div class="profile__container-details-box">
                <p class="profile__container-biography">
                    <?= @$biography ?>
                </p>
            </div>
            <div class="profile__container-buttons">
                <button class="profile__button-follow">Follow</button>
                <button class="profile__button-message">Message</button>
            </div>
        </div>
        <div class="profile__container-content">
            <h2 class="profile__content-text">Posts
                <?= @$postsCount ?>
            </h2>
            <div class="profile__container-posts">

            </div>
        </div>
    </div>

</body>

</html>