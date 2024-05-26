<?php
require('./config/constants.php');

// get the session data
$username_email = $_SESSION['signin-data']['username_email'] ?? null;
$password = $_SESSION['signin-data']['password'] ?? null;

unset($_SESSION['signin-data']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Multipage Blog Website</title>

    <!-- custom stylesheet -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- icons cdn -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- montserrat font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>

<section class="form__section">
    <div class="container form__section-container">
        <h2>Sign In</h2>
        <?php if(isset($_SESSION['signup-success'])) : ?>

        <div class="alert__message success">
            <p>
                <?=$_SESSION['signup-success'];
                unset($_SESSION['signup-success']);
                ?>
            </p>
        </div>
        <?php elseif(isset($_SESSION['signin'])) : ?>
        <div class="alert__message error">
            <p>
                <?=$_SESSION['signin'];
                unset($_SESSION['signin']);
                ?>
            </p>
        </div>
        <?php endif ?>        
        <form action="<?= ROOT_URL ?>signin-logic.php" method="POST">
            <input type="text" name="username_email" placeholder="Username or Email" value="<?= $username_email ?>">
            <input type="password" name="password" placeholder="Password" value="<?= $password ?>">
            <button type="submit" name="submit" class="btn">Sign In</button>
            <small>Don't have an account? <a href="<?= ROOT_URL ?>signup.php">Sign Up</a></small>

        </form>
    </div>
</section>

</body>
</html>
