$("#comment-post").submit(function (e) {
    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var actionUrl = form.attr('action');

    // Manually construct the data
    var formData = new FormData(form[0]);
    formData.append("post-comment", "true"); // Add the "like" parameter

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
               $(".post__miscellaneous-comments-container").html(data);
               const commentField = document.querySelector(".comment-field__content-field");
               commentField.value = "";
            }

        }
    });
});