document.addEventListener('DOMContentLoaded', () => {

    // Get the URL parameters
    const urlParams = new URLSearchParams(window.location.search);
    // Get the success window element
    const alertWindow = document.getElementById('alert-window');
    // Get the close button element
    const closeButton = document.querySelector('.alert-window__close-button');
    // Get the alert window message element
    const message = document.querySelector('.alert-window__text');

    // Check if the "result" parameter is set to "success"
    if (urlParams.get("result") === "success") {


        alertWindow.classList.add("alert-window--success");
        message.innerHTML = "Image uploaded successfully!";
        alertWindow.style.display = 'block';

        // Close the success window on close button click
        closeButton.addEventListener('click', () => {
            alertWindow.style.animation = 'fade-out 0.5s';
            setTimeout(() => {
                alertWindow.classList.remove("alert-window--success");
                message.innerHTML = "";
                alertWindow.style.display = 'none';
                alertWindow.style.animation = '';
            }, 500);
        });

        // Close the success window automatically after 3 seconds
        setTimeout(() => {
            alertWindow.style.animation = 'fade-out 0.5s';
            setTimeout(() => {
                alertWindow.classList.remove("alert-window--success");
                message.innerHTML = "";
                alertWindow.style.display = 'none';
                alertWindow.style.animation = '';
            }, 500);
        }, 3000);
    } else if(urlParams.get("result") != null){

        alertWindow.classList.add("alert-window--error");

        if (urlParams.get("result") === "invalid-count") {
            message.innerHTML = "You may upload only one image at a time!";
        } else if (urlParams.get("result") === "invalid-ext") {
            message.innerHTML = "You may only upload images with JPG, JPEG and PNG extension!";
        } else {
            message.innerHTML = "Something went wrong. Please try again later!";
        }

        alertWindow.style.display = 'block';

        closeButton.addEventListener('click', () => {
            alertWindow.style.animation = 'fade-out 0.5s';
            setTimeout(() => {
                alertWindow.classList.remove("alert-window--error");
                message.innerHTML = "";
                alertWindow.style.display = 'none';
                alertWindow.style.animation = '';
            }, 500);
        });

        // Close the success window automatically after 3 seconds
        setTimeout(() => {
            alertWindow.style.animation = 'fade-out 0.5s';
            setTimeout(() => {
                alertWindow.classList.remove("alert-window--error");
                message.innerHTML = "";
                alertWindow.style.display = 'none';
                alertWindow.style.animation = '';
            }, 500);
        }, 3000);

    }

});