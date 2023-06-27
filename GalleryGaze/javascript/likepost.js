$("#like-post").submit(function (e) {
    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var actionUrl = form.attr('action');

    // Manually construct the data
    var formData = new FormData(form[0]);
    formData.append("like", "true"); // Add the "like" parameter

    $.ajax({
        type: "POST",
        dataType: "text",
        url: actionUrl,
        data: formData,
        processData: false,
        contentType: false,
        success: function (data) {

            if (data === "not_logged_in") {
                // User is not logged in, redirect to login screen
                window.location.href = "login.php";
            } else if (data === "invalid_argument") {
                window.location.href = "home.php";
            } else {
                // User is logged in, handle the like button styling
                const likeButton = document.getElementById("like-button");
                const heartIcon = likeButton.querySelector("i");

                if (heartIcon.classList.contains("fa-regular")) {
                    heartIcon.classList.remove("fa-regular");
                    heartIcon.classList.add("fas");
                    heartIcon.classList.add("post__icon--liked");
                } else {
                    heartIcon.classList.remove("post__icon--liked");
                    heartIcon.classList.remove("fas");
                    heartIcon.classList.add("fa-regular");
                }
            }

        }
    });
});