<?php
session_start(); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="../static/css/normalize.css">
    <link rel="stylesheet" href="../static/css/style.css">
    <link rel="stylesheet" href="../static/assets/icons/fontawesome/css/all.min.css">
    <script src="../javascript/navigation.js"></script>

    <style>
        .information {
            max-width: 1000px;
            margin: 20px auto;
            background-color: rgba(34, 56, 67, .8);
            color: white;
            padding: 20px;
            border-radius: 10px;
        }

        .information__title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .information__about {
            margin-bottom: 40px;
        }

        .information__team {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 20px;
        }

        .information__team-card {
            display: flex;
            flex-direction: column;
            justify-content: top;
            align-items: center;
            width: 200px;
            height: 300px;
            padding: 20px;
            background-color: #f5f5f5;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            transition: all 0.3s;
        }

        .information__team-card-roles {
            text-align: center;
        }

        .information__team-card:hover {
            transform: scale(1.02);
            transition: all 0.3s;
        }

        .information__team-card-image {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 10px;
            border: 2px solid #888;
            object-fit: cover;
        }

        .information__team-card-name {
            margin: 0;
            font-size: 18px;
            font-weight: bold;
            color: black
        }

        .information__team-card-role {
            margin: 0;
            font-size: 14px;
            color: #888;
        }
    </style>
</head>

<body>
    <?php include "../templates/navigation.php" ?>
    <div class="main-container">
        <div class="information">
            <h2 class="information__title">About Us</h2>
            <div class="information__about">
                <p>Welcome to our gallery website! We provide a platform for users to upload, like, and download images.
                    Whether you're a photographer, an artist, or simply a creative individual, our website is the
                    perfect
                    place to showcase your work.</p>
                <p>Our user-friendly interface allows you to easily upload your images, add tags and descriptions, and
                    categorize them into different galleries. You can explore the diverse range of images uploaded by
                    our
                    talented community and interact with them through likes and comments.</p>
                <p>Join our vibrant community today and unleash your creativity!</p>
            </div>

            <h2 class="information__title">Team Members</h2>
            <div class="information__team">
                <div class="information__team-card">
                    <img class="information__team-card-image" src="../static/assets/images/denis.png" alt="Denis">
                    <h3 class="information__team-card-name">Denis Bodurov</h3>
                    <div class="information__team-card-roles">
                        <p class="information__team-card-role">Fullstack Developer</p>
                        <p class="information__team-card-role">Database Architect</p>
                        <p class="information__team-card-role">Graphic Designer</p>
                        <p class="information__team-card-role">Server Manager</p>
                        <p class="information__team-card-role">DevOps</p>
                    </div>
                </div>
                <div class="information__team-card">
                    <img class="information__team-card-image" src="../static/assets//images/alexander.jpg" alt="Alexander">
                    <h3 class="information__team-card-name">Alexander Belchev</h3>
                    <div class="information__team-card-roles">
                        <p class="information__team-card-role">Fullstack Developer</p>
                        <p class="information__team-card-role">Graphic Designer</p>
                        <p class="information__team-card-role">Server Manager</p>
                        <p class="information__team-card-role">DevOps</p>
                    </div>
                </div>
                <div class="information__team-card">
                    <img class="information__team-card-image" src="../static/assets/images/mihail.jpg" alt="Mihail">
                    <h3 class="information__team-card-name">Mihail Belchev</h3>
                    <div class="information__team-card-roles">
                        <p class="information__team-card-role">Frontend Developer</p>
                    </div>
                </div>
                <div class="information__team-card">
                    <img class="information__team-card-image" src="../static/assets/images/martin.png" alt="Martin">
                    <h3 class="information__team-card-name">Martin Asenov</h3>
                    <div class="information__team-card-roles">
                        <p class="information__team-card-role">Frontend Developer</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>