<?php

include("vendor/autoload.php");

use DataBase\MySQL;
use DataBase\MembersTable;

$singleId = $_GET['id'];
$table = new MembersTable(new MySQL());
$all = $table->find($singleId);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial 08 | Index Page</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style2.css">
</head>

<body>

    <div id="card">

        <div id="card-content">
            <div id="card-title">
                <h2>Welcome to Family Member Tree</h2>
                <div class="underline-tile"></div>

                <!-- catch incorrect message from qrcode_generator.php -->
                <?php if (isset($_GET['unsuccess'])) : ?>
                    <div class="error-alert">
                        Incorrect Input or 505!
                    </div>
                <?php endif ?>

                <!-- catch correct message from qrcode_generator.php  -->
                <?php if (isset($_GET['success'])) : ?>
                    <div class="success-alert">
                        Insert Data Successfully!
                    </div>
                <?php endif ?>
            </div>

            <form class="form" action="_actions/update.php" method="POST" enctype="multipart/form-data">
                <input type="text" name="id" value="<?= $all->id ?>">
                <input class="form-content" type="text" name="name" placeholder="Enter Name" autocomplete="off" value="<?= $all->name ?>" required>
                <div class="form-border"></div>

                <input class="form-content" type="email" name="email" placeholder="Enter Email" autocomplete="off" value="<?= $all->email ?>" required>
                <div class="form-border"></div>

                <input class="form-content" type="text" name="relative" placeholder="Enter Relative" autocomplete="off" value="<?= $all->relative ?>" required>
                <div class="form-border"></div>

                <input class="form-content" type="text" name="phone" placeholder="Enter Phone Number" autocomplete="off" value="<?= $all->phone ?>">
                <div class="form-border"></div>

                <label for="date-of-birth">
                    &nbsp;Enter Your Birthday
                </label><br>
                <input class="form-content" type="date" name="date-of-birth" placeholder="Enter Your Birthday" autocomplete="off" value="<?= $all->date_of_birth ?>" required>
                <div class="form-border"></div>

                <input id="submit-btn" type="submit" name="submit" value="Update Data" />

                <a href="family_table.php" id="visit-btn" type="button" name="visit-btn" value="Visit Table">Visit Table</a>

            </form>
        </div>
    </div>
</body>

</html>