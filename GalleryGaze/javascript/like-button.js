document.addEventListener('DOMContentLoaded', () => {
    const likeButton = document.getElementById('like-button');
    const likeIcon = likeButton.querySelector("i");

    if(likeIcon.classList.contains('fas')){
        likeIcon.style.color = "#DB324D";
    }
});