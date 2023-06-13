<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
    <link rel="stylesheet" href="../static/css/normalize.css">
    <link rel="stylesheet" href="../static/css/style.css">
    <script src="https://kit.fontawesome.com/689600d0a2.js" crossorigin="anonymous"></script>
    <script src="../javascript/upload.js"></script>
    <script src="../javascript/navigation.js"></script>
</head>

<body>
    <?php include "../templates/navigation.php" ?>
    <div class="upload__container-main container">
            <div class="upload__container-content">
                <div class="upload__container-image">
                    <button id="upload-button" class="upload__button-upload"><i class="fa-solid fa-upload"></i></button>
                </div>
                <input class="upload__file" type="file" name="uploaded-image" id="upload-file">
            </div>
            <div class="upload__container-description">
                <div class="upload__container-fields">
                    <input id="upload-title" class="upload__field" type="text" name="title" placeholder="Title">
                    <input id="upload-tags" class="upload__field" type="text" name="tags" placeholder="Tags">
                    <textarea id="upload-description" class="upload__field-description" name="description"
                        placeholder="Description"></textarea>
                </div>
                <button id="upload-button" class="upload__button-post">Post</button>
            </div>
    </div>
</body>
</html>