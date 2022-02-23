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

                <!-- catch incorrect message -->
                <?php if (isset($_GET['unsuccess'])) : ?>
                    <div class="error-alert">
                        Incorrect Input or 505!
                    </div>
                <?php endif ?>

                <!-- catch correct message -->
                <?php if (isset($_GET['success'])) : ?>
                    <div class="success-alert">
                        Insert Data Successfully!
                    </div>
                <?php endif ?>
            </div>

            <form class="form" action="_actions/create.php" method="POST" enctype="multipart/form-data">
                <input class="form-content" type="text" name="name" placeholder="Enter Name" autocomplete="off" required>
                <div class="form-border"></div>

                <input class="form-content" type="email" name="email" placeholder="Enter Email" autocomplete="off" required>
                <div class="form-border"></div>

                <input class="form-content" type="text" name="relative" placeholder="Enter Relative" autocomplete="off" required>
                <div class="form-border"></div>

                <input class="form-content" type="text" name="phone" placeholder="Enter Phone Number" autocomplete="off" required>
                <div class="form-border"></div>

                <label for="date-of-birth">
                    &nbsp;Enter Your Birthday
                </label><br>
                <input class="form-content" type="date" name="date-of-birth" placeholder="Enter Your Birthday" autocomplete="off" required>
                <div class="form-border"></div>

                <input id="submit-btn" type="submit" name="submit" value="Insert Data" />

                <a href="family_table.php" id="visit-btn" type="button" name="visit-btn" value="Visit Table">Visit Table</a>

            </form>
        </div>
    </div>
</body>

</html>