<?php
require('./config/constants.php');


// get back from data if there was a registration error
$firstname = $_SESSION['signup-data']['firstname'] ?? null;
$lastname = $_SESSION['signup-data']['lastname'] ?? null;
$username = $_SESSION['signup-data']['username'] ?? null;
$email = $_SESSION['signup-data']['email'] ?? null;
$createpassword = $_SESSION['signup-data']['createpassword'] ?? null;
$confirmpassword = $_SESSION['signup-data']['confirmpassword'] ?? null;


unset($_SESSION['signup-data']);

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
        <h2>Sign Up</h2>
        <?php if(isset($_SESSION['signup'])): ?> 
            <div class="alert__message error">
                <p><?= $_SESSION['signup'];
                unset($_SESSION['signup']);
                ?></p>
            </div>
        <?php endif ?>

        <form action="<?=ROOT_URL?>signup-logic.php" enctype="multipart/form-data" method="POST">
            <input type="text" name="firstname" placeholder="First Name" value="<?= $firstname?>">
            <input type="text" name="lastname" placeholder="Last Name" value="<?= $lastname?>">
            <input type="text" name="username" placeholder="User Name" value="<?= $username?>">
            <input type="email" name="email" placeholder="Email" value="<?= $email?>">
            <input type="password" name="createpassword" placeholder="Create Password" value="<?= $createpassword?>">
            <input type="password" name="confirmpassword" placeholder="Confirm Password" value="<?= $confirmpassword?>">
            <div class="form__control">
                <label for="avatar">User Avatar</label>
                <input type="file" name="avatar" id="avatar">
            </div>
            <button type="submit" name="submit" class="btn">Sign Up</button>
            <small>Already have an account? <a href="<?=ROOT_URL?>signin.php">Sign In</a></small>

        </form>
    </div>
</section>

</body>
</html>

<!-- https://youtu.be/I010T-UvmRM?si=ilGGruBxT6vrBqIa&t=6198 -->