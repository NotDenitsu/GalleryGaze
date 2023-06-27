$("#comment-post").submit(function (e) {
    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var actionUrl = form.attr('action');

    const alertWindow = document.getElementById('alert-window');
    const closeButton = document.querySelector('.alert-window__close-button');
    const message = document.querySelector('.alert-window__text');

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
            } else if (data === "empty_payload") {
                alertFailiure("Can't send empty comment!");
            } else {
                $(".post__miscellaneous-comments-container").html(data);
                const commentField = document.querySelector(".comment-field__content-field");
                commentField.value = "";
                alertSuccess("Comment sent successfully!");
            }

        }
    });

    function alertFailiure(customMessage) {

        alertWindow.classList.add("alert-window--error");
        message.innerHTML = customMessage;
        alertWindow.style.display = 'block';

        closeButton.addEventListener('click', () => {
            alertWindow.style.animation = 'fade-out 0.5s';
            setTimeout(() => {  
                alertWindow.style.display = 'none';
                message.innerHTML = "";
                alertWindow.style.animation = '';
                alertWindow.classList.remove("alert-window--error");
            }, 500);

        });

        // Close the success window automatically after 3 seconds
        setTimeout(() => {
            alertWindow.style.animation = 'fade-out 0.5s';
            setTimeout(() => {
                alertWindow.style.display = 'none';
                message.innerHTML = "";
                alertWindow.style.animation = '';
                alertWindow.classList.remove("alert-window--error");

            }, 500);

        }, 5000);

    }

    function alertSuccess(customMessage) {
        // Show the success window

        alertWindow.classList.add("alert-window--success");


        message.innerHTML = customMessage;
        alertWindow.style.display = 'block';

        // Close the success window on close button click
        closeButton.addEventListener('click', () => {
            alertWindow.style.animation = 'fade-out 0.5s';
            setTimeout(() => {
                alertWindow.style.display = 'none';
                message.innerHTML = "";
                alertWindow.style.animation = '';
                alertWindow.classList.remove("alert-window--success");
            }, 500);
 
        });

        // Close the success window automatically after 3 seconds
        setTimeout(() => {
            alertWindow.style.animation = 'fade-out 0.5s';
            setTimeout(() => {
                alertWindow.style.display = 'none';
                message.innerHTML = "";
                alertWindow.style.animation = '';
                alertWindow.classList.remove("alert-window--success");
            }, 500);
        }, 3000);

    }
});

function alertSuccess(customMessage) {

}