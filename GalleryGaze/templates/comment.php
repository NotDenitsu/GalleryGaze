<div class="comment">
    <a href="profile.php?id=<?=@$commentUserId?>" class="comment__frame">
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
            <button class="comment__content-deatils-button"><i class="fas fa-flag"></i></button>
        </div>
        <div class="comment__content-message">
            <?= @$content ?>
        </div>
        <button class="comment__content-deatils-button"><i class="fa-regular fa-heart"></i></button>
    </div>
</div>