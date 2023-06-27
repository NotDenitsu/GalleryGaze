$("#post-delete").submit(function (e) {
    e.preventDefault(); // Avoid executing the actual submit of the form.

    var form = $(this);
    var actionUrl = form.attr('action');

    // Manually construct the data
    var formData = new FormData(form[0]);
    formData.append("delete-post", "true"); // Add the "like" parameter

    const alertWindow = document.getElementById('alert-window');
    const closeButton = document.querySelector('.alert-window__close-button');
    const message = document.querySelector('.alert-window__text');

    const promptWindow = document.querySelector(".prompt");
    const promptContext = document.querySelector(".prompt__container-message");
    const promptAccept = document.querySelector(".prompt__container-buttonbox-button--confirm");
    const promptCancel = document.querySelector(".prompt__container-buttonbox-button--cancel");

    promptWindow.style.display = "block";
    promptContext.innerHTML = "Are you sure that you wish to delete this post?";

    
    promptCancel.addEventListener("click", () => {
        promptWindow.style.display = "none";
    });


    promptAccept.addEventListener("click", () => {
        $.ajax({
            type: "POST",
            dataType: "text",
            url: actionUrl,
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                if (data === "not_logged_in") {
                    // User is not logged in, handle the case accordingly
                    window.location.href = "login.php";
                } else if (data === "invalid_argument") {
                    // Invalid argument, handle the case accordingly
                    window.location.href = "home.php";
                } else {
                    window.location.href = "success.php?deleted=1";
                }
            },
            error: function (xhr, status, error) {
                // Handle the error case if needed
                console.error(xhr, status, error);
            }
        });
        promptWindow.style.display = "none";
    });
});
