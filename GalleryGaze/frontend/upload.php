<?php
    session_start();

    if(!isset($_SESSION['user'])){
        header("location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
    <link rel="stylesheet" href="../static/css/normalize.css">
    <link rel="stylesheet" href="../static/css/style.css">
    <link rel="stylesheet" href="../static/assets/icons/fontawesome/css/all.min.css">
    <script src="../javascript/upload-dropdown.js"></script>
    <script src="../javascript/navigation.js"></script>
    <script src="../javascript/upload-alert.js"></script>
</head>

<body>
    <?php include "../templates/navigation.php" ?>
    <div class="main-container">
        <form class="upload__container-main"  action="../backend/upload_post.php" method="post" enctype="multipart/form-data">
            <div class="upload__container-content">
                <div class="upload__container-image">
                    <button id="upload-button" class="upload__button-upload" type="button"><i class="fa-solid fa-upload upload__icon"></i></button>
                </div>
                <input class="upload__file" type="file" name="imageToUpload" id="upload-file">
            </div>
            <div class="upload__container-description">
                <div class="upload__container-fields">
                    <input id="upload-title" class="upload__field" type="text" name="title" placeholder="Title">
                    <input id="upload-tags" class="upload__field" type="text" name="tags" placeholder="Tags">
                    <textarea id="upload-description" class="upload__field-description" name="description"
                        placeholder="Description"></textarea>
                </div>
                <button id="upload-button" class="upload__button-post" type="submit" name="upload">Post</button>
            </div>
        </form>
    </div>

    <!--Alert Window-->
    <div class="alert-window" id="alert-window">
        <span class="alert-window__text"></span>
        <span class="alert-window__close-button">&times;</span>
    </div>
</body>

</html>