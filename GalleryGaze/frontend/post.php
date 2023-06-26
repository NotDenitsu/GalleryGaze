<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../backend/readpostdata.php" ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../static/css/normalize.css">
    <link rel="stylesheet" href="../static/css/style.css">
    <link rel="stylesheet" href="../static/assets/icons/fontawesome/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="../javascript/navigation.js"></script>
    <script src="../javascript/paperinput.js"></script>
    <script src="../javascript/share.js"></script>
    <style>
        * {
            box-sizing: border-box;
        }

        /* Post Styling */



        /*End of Comment Styling*/
    </style>
</head>

<body>
    <?php
    include "../templates/navigation.php";
    include "../backend/connection.php";
    ?>
    <div class="main-container">
        <div class="post">
            <div class="post__imagebox">
                <img class="post__imagebox-image" src="../static/assets/images/<?= @$thisPostImageUrl ?>"
                    alt="<?= @$thisPostTitle ?>">
            </div>
            <div class="post__interactables">
                <h1 class="post__interactables-title">
                    <?= $thisPostTitle ?>
                </h1>
                <header class="post__interactables-header">
                    <div class="userbox">
                        <a href="profile.php?id=<?= @$thisUserId ?>">
                            <img class="userbox__avatar" src="../static/assets/images/<?= @$thisUserImageUrl ?>"
                                alt="<?= @$thisUsername ?>"></a>
                        <div class="userbox__stats">
                            <a href="profile.php?id=<?= $userId ?>" class="userbox__stats-username"><?= @$thisUsername ?></a>
                            <span class="userbox__stats-row"><i class="fa-solid fa-user"></i>
                                <?= @$thisUserFollowers ?>
                            </span>
                            <span class="userbox__stats-row"><i class="fa-solid fa-upload"></i>
                                <?= @$thisUserUploads ?>
                            </span>
                        </div>
                    </div>
                    <div class="post__buttonbox">
                        <div class="post__buttonbox-buttons">
                            <form id="like-post" action="../backend/likepost.php" method="post">
                                <input type="hidden" name="postId" value="<?= @$thisPostId ?>">
                                <button id="like-button" class="post__buttonbox-button" name="like" type="submit"
                                    value="liked"><i class="<?php
                                    if (isset($_SESSION['user'])) {
                                        include "../backend/check_liked.php";
                                        postIsLiked($_SESSION['user']['id'], $thisPostId);
                                    } else {
                                        echo "fa-regular";
                                    }
                                    ?> fa-heart post__icon"></i></button>
                            </form>
                            <script src="../javascript/likepost.js"></script>
                            <button class="post__buttonbox-button"><i
                                    class="fa-solid fa-download post__icon"></i></button>
                            <button id="share-button" class="post__buttonbox-button"><i
                                    class="fa-solid fa-share post__icon"></i></button>
                            <button class="post__buttonbox-button"><i
                                    class="fa-solid fa-circle-exclamation post__icon"></i></button>
                            <?php if (isset($_SESSION['user'])) {
                                if ($_SESSION['user']['id'] == $thisUserId || $_SESSION['user']['role_id'] == 2) { ?>
                                    <form id="post-delete" action="../backend/deletepost.php" method="post">
                                        <input type="hidden" name="post-id" value=<?= @$thisPostId ?>>
                                        <button class="post__buttonbox-button" type="submit" name="delete-post"><i
                                                class="fa-solid fa-trash post__icon"></i></button>
                                    </form>
                                <?php }
                            } ?>
                        </div>

                        <?php if (isset($_SESSION['user']) && intval($_SESSION['user']['id']) !== intval($thisUserId)) { ?>
                            <div class="profile__container-buttons">
                                <form id="follow-user" action="../backend/userfollow.php" method="post">
                                    <input type="hidden" name="followedUserID" value="<?= @$thisUserId ?>">
                                    <?php
                                    include "../backend/check_follow.php";
                                    if (userIsFollowed($_SESSION['user']['id'], $thisUserId)) { ?>
                                        <button id="follow-button"
                                            class="profile__button-follow profile__button-follow--unfollow" type="submit"
                                            name="follow" value="followed">Unfollow</button>
                                    <?php } else { ?>
                                        <button id="follow-button" class="profile__button-follow" type="submit" name="follow"
                                            value="followed">Follow</button>
                                    <?php } ?>
                                </form>
                            </div>
                            <script src="../javascript/userfollow-post.js"></script>
                        <?php } ?>
                    </div>
                </header>

            </div>
            <div class="post__description-container">
                <p class="post__description">
                    <?= $thisPostDescription ?>
                </p>
            </div>

            <div class="post__miscellaneous">
                <div class="post__miscellaneous-recommended">

                    <h3 class="post__miscellaneous-title">You may also like</h3>
                    <div class="post__miscellaneous-recommended-posts">
                        <?php include "../backend/loadrecommended.php"; ?>
                    </div>
                    <div class="pagination">
                        <?php include "../backend/pagination.php"; ?>
                    </div>
                </div>
                <div class="post__miscellaneous-comments">
                    <div class="post__miscellaneous-header">
                        <h3 class="post__miscellaneous-title">Comments</h3>
                        <i class="fa-regular fa-comment post__miscellaneous-title"></i>
                        <span class="post__miscellaneous-title">
                            <?= @$thisCommentCount ?>
                        </span>
                    </div>

                    <?php if (isset($_SESSION['user'])) { ?>


                        <form id="comment-post" class="comment-field" method="post" action="../backend/post_comment.php">

                            <div class="comment-field__frame">
                                <img class="comment-field__frame-avatar" src="" alt="">
                            </div>
                            <div class="comment-field__content">
                                <div class="comment-field__content-username">
                                    <?= $_SESSION['user']['username'] ?>
                                </div>
                                <input type="hidden" name="post-id" value="<?= @$thisPostId ?>">
                                <textarea class="comment-field__content-field" name="comment"
                                    placeholder="Write a comment..." oninput="autoResize(this)"></textarea>
                                <button id="comment-post-button" class="comment-field__content-button" type="submit"
                                    name="post-comment">Post</button>
                            </div>
                        </form>

                    <?php } else {
                        echo "<div class='comment-field'><span><strong>LOG IN TO COMMENT</strong></span></div>";
                    } ?>

                    <div class="post__miscellaneous-comments-container">
                        <?php include "../backend/loadcomments.php" ?>
                        <script src="../javascript/deletecomment.js"></script>
                    </div>
                    <script src="../javascript/commentpost.js"></script>
                </div>
            </div>
        </div>
    </div>

    <!-- Alert window -->
    <div class="alert-window" id="alert-window">
        <span class="alert-window__text"></span>
        <span class="alert-window__close-button">&times;</span>
    </div>
</body>

</html>