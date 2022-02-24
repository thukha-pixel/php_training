<?php
include_once("vendor/autoload.php");

use DataBase\MySQL;
use DataBase\MembersTable;

$id = $_GET['id'];
$email = $_GET['email'];
$token = $_GET['token'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial 10 | Change Password Page</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style3.css">
</head>

<body>

    <div id="card">

        <div id="card-content">
            <div id="card-title">
                <h2>Welcome to Family Member Tree</h2>
                <div class="underline-tile"></div>

                <!-- catch incorrect message -->
                <?php if (isset($_GET['unsuccess'])) : ?>
                    <div class="error-alert">
                        Unmatch Password!
                    </div>
                <?php endif ?>
            </div>

            <form class="form" action="_actions/update_password.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $id ?>">
                <input type="hidden" name="email" value="<?= $email ?>">
                <input type="hidden" name="token" value="<?= $token ?>">

                <input class="form-content" type="password" name="password" placeholder="Enter Password" autocomplete="off" required>
                <div class="form-border"></div>

                <input class="form-content" type="password" name="confirm_password" placeholder="Enter Comfirmation Password" autocomplete="off" required>
                <div class="form-border"></div>

                <input id="submit-btn" type="submit" name="submit" value="Change" />

            </form>
        </div>
    </div>

    <script src="js/library/jquery-3.6.0.min.js"></script>
    <script src="js/library/node_modules/chart.js/dist/chart.min.js"></script>
    <script src="js/common.js"></script>
</body>

</html>