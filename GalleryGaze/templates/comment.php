<div class="comment">
    <a href="profile.php?id=<?= @$commentUserId ?>" class="comment__frame">
        <img class="comment__frame-avatar" src="../static/assets/images/<?= @$userImageUrl ?>" alt="" />
    </a>
    <div class="comment__content">
        <div class="comment__content-details">
            <div class="comment__content-details-infobox">
                <time class="comment__content-details-infobox-username">
                    <?= @$username ?>
                </time>
                <div class="comment__content-details-infobox-date">
                    <?= @$creationDate ?>
                </div>
            </div>
            <button onclick="openReport(<?=@$commentId?>)" class="comment__content-deatils-button"><i class="fas fa-flag"></i></button>
            <?php 
            $reportType="commentReport";
                $postId;
                // $commentId = @$commentId;
                $reportedId;
                include "../templates/report.php";
                ?>
        </div>
        <div class="comment__content-message">
            <?= @$content ?>
        </div>
        <form class="comment__content-buttons comment__content-form-delete" action="../backend/deletecomment.php" method="post">
            <input type="hidden" name="comment-id" value="<?= @$commentId ?>">
            <?php if (isset($_SESSION['user'])) {
                if ($_SESSION['user']['id'] == $thisUserId || $_SESSION['user']['id'] == $commentUserId || $_SESSION['user']['role_id'] == 2) { ?>
                    <button class="comment__content-deatils-button" type="submit" name="delete-comment"><i class="fas fa-trash"></i></button>
                <?php }
            } ?>
        </form>
    </div>
</div>