<div class="comment">
    <div class="comment__frame">
        <img class="comment__frame-avatar" src="../static/assets/<?=@$userImageUrl?>" alt="" />
    </div>
    <div class="comment__content">
        <div class="comment__content-details">
            <div class="comment__content-details-infobox">
                <div class="comment__content-details-infobox-username"><?=@$username?></div>
                <div class="comment__content-details-infobox-date"><?=@$date?></div>
            </div>
            <button class="comment__content-deatils-button"><i class="fas fa-flag"></i></button>
        </div>
        <div class="comment__content-message"><?=@$content?></div>
        <button class="comment__content-deatils-button"><i class="fa-regular fa-heart"></i></button>
    </div>
</div>