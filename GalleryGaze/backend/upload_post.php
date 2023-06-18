<?php
session_start();
include "connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['upload'])) {
        if (count($_FILES) === 1) {
            $uploadedFile = @$_FILES['imageToUpload'];
            $filename = @$uploadedFile['name'];
            $tmpFilePath = @$uploadedFile['tmp_name'];
            $fileExtension = pathinfo($filename, PATHINFO_EXTENSION);
            $allowedExtensions = ['jpg', 'jpeg', 'png'];

            echo $filename;
            echo $fileExtension;

            // Check if the file extension is allowed
            if (!in_array(strtolower($fileExtension), $allowedExtensions)) {
                header("location: ../frontend/upload.php?result=invalid-ext");
                exit;
            }

            echo "here";
            // Generate a unique identifier for the file
            $uniqueId = md5(uniqid());

            // Create a new filename using the unique identifier
            $newFilename = 'image_' . $uniqueId . '.' . $fileExtension;

            // Specify the destination directory where you want to save the image
            $destinationDirectory = '../static/assets/images/';

            // Check if the generated filename already exists and generate a new unique identifier
            while (file_exists($destinationDirectory . $newFilename)) {
                echo "here";
                $uniqueId = md5(uniqid());
                $newFilename = 'image_' . $uniqueId . '.' . $fileExtension;
            }

            // Move the uploaded file to the destination directory with the new filename
            if (move_uploaded_file($tmpFilePath, $destinationDirectory . $newFilename)) {

                // Retrieve the other form fields
                $title = $_POST['title'];
                $tags = $_POST['tags'];
                $description = $_POST['description'];

                // Insert the image details into the database
                $sql = "INSERT INTO posts (title, tags, description, user_id, image_url) VALUES (:title, :tags, :description, :user_id, :image_url)";
                $stmt = $connection->prepare($sql);
                $stmt->bindParam(':title', $title);
                $stmt->bindParam(':tags', $tags);
                $stmt->bindParam(':description', $description);
                $stmt->bindParam(":user_id", $_SESSION['user']['id']);
                $stmt->bindParam(':image_url', $newFilename);
                $stmt->execute();

                header("location: ../frontend/upload.php?result=success");
                exit();
            } else {
                header("location: ../frontend/upload.php?result=error");
                exit();
            }
        } else {
            header("location: ../frontend/upload.php?result=invalid-count");
            exit();
        }
    } else {
        header("location: ../frontend/upload.php?result=error");
        exit();
    }
} else {
    header("location ../frontend/upload.php?result=error");
    exit();
}


?>