<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../static/css/normalize.css">
    <link rel="stylesheet" href="../static/css/style.css">
    <link rel="stylesheet" href="../static/assets/icons/fontawesome/css/all.min.css">
    <script src="../javascript/navigation.js"></script>
</head>
<body>

      <?php include "../templates/navigation.php"?>

      <div class="container">

        <!-- <img src="logo.svg" alt="Logo">
        <object data="logo.svg" type="image/svg+xml"></object> -->

          <?php 
            //Load all pictures available
            include "connection.php";
            $query = "SELECT * FROM posts";
            foreach($conn->query($query) as $data){
              echo "</h1>".$data['title']."</h1><br>";
            }
          ?>

      </div>
</body>
</html>