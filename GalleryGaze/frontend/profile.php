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

    <style>
        .postbox {
            box-sizing: border-box;
            position: relative;

            width: 320px;
            height: 320px;

            border-radius: 5px;
            border: 1px solid #CFCFCF;

            background-color: black;
            fill: white;

            color: white;
            text-shadow: rgb(0, 0, 0) 1px 0 10px;
            overflow: hidden;
        }

        .postbox:not(:hover)> :not(.postbox__image) {
            opacity: 0;
            transition: opacity 0.2s;
        }

        .postbox:hover> :not(.postbox__image) {
            opacity: 1;
            transition: opacity 0.2s;
        }

        .postbox__image {
            width: 100%;
            height: 100%;

            border-radius: 5px;

            transition: filter .3s, opacity .3s;
        }

        .postbox__image-img{
            width: 100%;
            object-fit: cover;
        }

        .postbox__image:hover {
            filter: blur(5px);
            opacity: 0.8;
            transition: filter .3s, opacity 0.3s;
        }

        .postbox__icon {
            position: absolute;
            width: 30px;
            height: 30px;
            top: 0%;
        }

        .postbox__icon--left {
            margin-left: 10px;
            left: 0%;
        }

        .postbox__icon--right {
            margin-right: 10px;
            right: 0%;
        }

        .postbox__icon--top-margin1 {
            margin-top: 10px;
        }

        .postbox__icon--top-margin2 {
            margin-top: 45px;
        }

        .postbox__title {
            position: absolute;
            width: 80%;
            height: 1em;

            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;

            bottom: 0%;
            left: 0%;

            margin-left: 10px;
            margin-bottom: 70px;

        }

        .postbox__user-name {
            position: absolute;
            height: 1em;
            width: 60%;

            overflow: hidden;
            text-overflow: ellipsis;
            text-decoration: none;
            color: white;

            left: 0%;
            bottom: 0%;

            margin-bottom: 25px;
            margin-left: 70px;
        }

        .postbox__user-image {
            position: absolute;
            width: 50px;
            height: 50px;
            left: 0%;
            bottom: 0%;
            margin-left: 10px;
            margin-bottom: 10px;
        }

        .postbox__date {
            position: absolute;
            bottom: 0%;
            right: 0%;
            margin-right: 10px;
            margin-bottom: 10px;
        }
    </style>

    <link rel="stylesheet" href="../static/css/normalize.css">
    <link rel="stylesheet" href="../static/css/style.css">
    <link rel="stylesheet" href="../static/assets/icons/fontawesome/css/all.min.css">
    <script src="../javascript/navigation.js"></script>
</head>

<?php
include "../backend/connection.php";
?>

<body>
    <?php include "../templates/navigation.php"; ?>
    <div class="main-container">
        <div class="profile__container">
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
                </div>
            </div>
            <div class="profile__container-content">
                <h2 class="profile__container-content-text">Posts
                    <?= @$postsCount ?>
                </h2>
                <div class="profile__container-content-posts">
                    <?php
                    //Load all pictures available

                    $query = "SELECT * FROM posts WHERE user_id=?";
                    $picturesStatement = $connection->prepare($query);
                    $picturesStatement->execute([$id]);
                    //$connection->query($query)
                    foreach ($picturesStatement->fetchAll() as $data) {
                        $postTitle = $data["title"];
                        $uploadDate = $data["upload_date"];
                        $postImageUrl = $data["image_url"];
                        $userId = $data['user_id'];
                        $picturesStatement->closeCursor();

                        $userStatement = $connection->prepare("SELECT * FROM users WHERE users.id=?");
                        $userStatement->execute([$userId]);
                        $userdata = $userStatement->fetchAll();
                        $userName = $userdata[0]["username"];
                        $userImageUrl = $userdata[0]["image_url"];
                        $userStatement->closeCursor();

                        ?>

                        <?php
                        include "../templates/postbox.php";
                        ?>

                    <?php } ?>
                </div>
            </div>
        </div>
    </div>


</body>

</html>