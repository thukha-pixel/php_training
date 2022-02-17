<?php

session_start();

// check session user data 
if (!isset($_SESSION['user'])) {
    header('location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial 04 | Profile Page</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div id="card">
        <div id="card-content">
            <div id="card-title">
                <h2>Login Successful</h2>
                <div class="underline-title"></div>

                <p>Your Name is <?php echo $_SESSION['user']['username']; ?></p>

                <p>Your Email is "<?php echo $_SESSION['user']['login_email']; ?>"</p> <br>
                <p>Your Password is "<?php echo $_SESSION['user']['login_password']; ?>"</p>
            </div>

            <a href="_actions/logout.php" id="submit-btn">Logout</a>
        </div>
    </div>
</body>

</html>