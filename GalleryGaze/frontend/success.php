<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    <link rel="stylesheet" href="../static/css/normalize.css">
    <link rel="stylesheet" href="../static/css/style.css">
</head>

<body>
    <div class="success">
        <img class="success__image" src="../static/assets/images/checkmark.png" alt="">
        <div class="success__textbox">
            <?php if (isset($_GET['registration'])) { ?>
                <h2 class="success__textbox-title"> Successful Registration</h2>
                <p class="success__textbox-message"> Thank you for registering! We're delighted to have you as part of our
                    community.</p>
            <?php } else if (isset($_GET['deleted'])) { ?>
                    <h2 class="success__textbox-title"> Post Deleted Successfully</h2>
                    <p class="success__textbox-message">The post you recently deleted has been permanently removed from our
                        platform.</p>
                <?php } else { ?>
                    <h2 class="success__textbox-title"> INVALID ARGUMENT</h2>
                    <p class="success__textbox-message">INVALID ARGUMENT. NO FURTHER INFORMATION GIVEN.</p>
                <?php } ?>
        </div>
        <?php if (isset($_GET['registration'])) { ?>
            <a class="success__button" href="login.php">Sign In</a>
        <?php } else if (isset($_GET['deleted'])) { ?>
            <a class="success__button" href="home.php">Home</a>
        <?php } else { ?>
            <a class="success__button" href="home.php">Exit</a>
        <?php } ?>
    </div>
</body>

</html>