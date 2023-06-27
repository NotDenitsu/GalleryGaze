<div class="postbox">
    <a class="postbox__image" href="post.php?id=<?=$postId?>"><img class="postbox__image-img" src="../../uploads/<?=@$postImageUrl?>" alt="<?=@$postTitle?>"></a>
            
    <!-- Heart icon -->
     <i class="fa-regular fa-heart postbox__icon postbox__icon--left postbox__icon--top-margin1"></i>
        <span class="postbox__stats postbox__stats--margin1"><?= @$likeCount ?></span>
            
    <!-- Comment icon -->
        <i class="fa-regular fa-comment postbox__icon postbox__icon--left postbox__icon--top-margin2"></i> 
        <span class="postbox__stats postbox__stats--margin2"><?=@$commentCount ?></span>
    
            
    <!-- Download icon -->
    <a href=".../uploads/<?=@$postImageUrl?>" download="<?=@$postTitle?>">
        <i class="fa-solid fa-download postbox__icon postbox__icon--right postbox__icon--top-margin1"></i>
    </a>
    <!-- <img  src="../static/icons/download-solid.svg"> -->
            
    <h2 class="postbox__title"><?=@$postTitle?></h2>
    <a href="profile.php?id=<?=@$userId?>"><img class="postbox__user-image" src="../static/assets/images/<?=@$userImageUrl?>" href="www.google.com" alt="<?=@$userName?>"></a>
    <a class="postbox__user-name" href="profile.php?id=<?=@$userId?>"><?=@$userName?></a>
    <time datetime="<?=@$uploadDateFormatted?>" class="postbox__date"><?=@$uploadDateFormatted?></time>
</div>