<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../static/css/normalize.css">
    <link rel="stylesheet" href="../static/css/style.css">

    <script src="https://kit.fontawesome.com/689600d0a2.js" crossorigin="anonymous"></script>
</head>
<body>
      <?php include "connection.php"?>
      
      <div class="container">
        <?php include "navigation.php"?>
        <!-- <img src="logo.svg" alt="Logo">
        <object data="logo.svg" type="image/svg+xml"></object> -->

          <?php 
            //Load all pictures available
            $query = "SELECT * FROM posts";
            foreach($conn->query($query) as $data){
              echo "</h1>".$data['title']."</h1><br>";
            }
          ?>
        

      </div>

      <script src="../javascript/searchbar.js"></script>

</body>
</html>