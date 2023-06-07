document.addEventListener('DOMContentLoaded', () => {
    const uploadContainer = document.querySelector('.upload__container-image');
    const fileInput = document.getElementById('upload-file');
    const uploadBtn = document.getElementById('upload-button');

    uploadContainer.addEventListener('dragover', (e) => {
      e.preventDefault();
      uploadContainer.classList.add('upload__highlight');
    });

    uploadContainer.addEventListener('dragleave', () => {
      uploadContainer.classList.remove('upload__highlight');
    });

    uploadContainer.addEventListener('drop', (e) => {
      e.preventDefault();
      uploadContainer.classList.remove('upload__highlight');
      const files = e.dataTransfer.files;
      if (files.length == 1) {
        handleFiles(files);
      } else {
        alert("Bad move!");
      }
    });

    uploadBtn.addEventListener('click', () => {
      fileInput.click();
    });

    fileInput.addEventListener('change', (e) => {
      const files = e.target.files;
      if (files.length > 0) {
        handleFiles(files);
      }
    });

    function handleFiles(files) {
      // Remove any existing images in the container
      const previousImage = uploadContainer.querySelector("img");
      if(previousImage){
        previousImage.parentNode.removeChild(previousImage);
      }


      // Get the first file from the files array
      const file = files[0];

      // Create a FileReader object to read the file
      const reader = new FileReader();

      // Set up the FileReader onload event
      reader.onload = function (event) {
        // Create an image element
        const image = document.createElement('img');
        image.src = event.target.result;

        // Append the image to the image container
        uploadContainer.appendChild(image);
      };

      // Read the file as a Data URL
      reader.readAsDataURL(file);
    }
  });