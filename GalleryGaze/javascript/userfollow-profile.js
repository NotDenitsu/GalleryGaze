$("#follow-user").submit(function (e) {
    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var actionUrl = form.attr('action');

    // Manually construct the data
    var formData = new FormData(form[0]);
    formData.append("follow", "true"); // Add the "like" parameter

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
                const followButton = document.getElementById("follow-button");

                if (!followButton.classList.contains("profile__button-follow--unfollow")) {
                    followButton.classList.add("profile__button-follow--unfollow");
                    followButton.innerHTML = "Unfollow"
                } else {
                    followButton.classList.remove("profile__button-follow--unfollow");
                    followButton.innerHTML = "Follow";
                }
            }

        }
    });
});