document.addEventListener('DOMContentLoaded', () => {

    // Get the share button element
    const shareButton = document.getElementById('share-button');
    // Get the success window element
    const alertWindow = document.getElementById('alert-window');
    // Get the close button element
    const closeButton = document.querySelector('.alert-window__close-button');
    // Get the alert window message element
    const message = document.querySelector('.alert-window__text');


    // Add click event listener to the button
    shareButton.addEventListener('click', () => {
        // Copy the URL to the clipboard
        navigator.clipboard.writeText(window.location.href)
            .then(() => {
                // Show the success window
                alertWindow.classList.add("alert-window--success");
                message.innerHTML = "URL copied to clipboard!";
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
            })
            // Handling errors
            .catch((error) => {
                // Changing the styling of the window when displaying an error
                alertWindow.classList.add("alert-window--error");
                message.innerHTML = "Failed to copy URL";
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

                console.error('Failed to copy URL: ', error);
            });
    });

});