<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial 09 | Index Page</title>
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

            <form class="form" action="_actions/signup.php" method="POST">
                <input class="form-content" type="text" name="name" placeholder="Enter Name" autocomplete="off" required>
                <div class="form-border"></div>

                <input class="form-content" type="email" name="email" placeholder="Enter Email" autocomplete="off" required>
                <div class="form-border"></div>

                <input class="form-content" type="text" name="phone" placeholder="Enter Phone Number" autocomplete="off" required>
                <div class="form-border"></div>

                <input class="form-content" type="password" name="password" placeholder="Enter Password" autocomplete="off" required>
                <div class="form-border"></div>

                <input id="submit-btn" type="submit" name="submit" value="Register" />

                <a href="login.php" id="visit-btn" type="button" name="visit-btn" value="Visit Table">Login</a>

            </form>
        </div>
    </div>

    <script src="js/library/jquery-3.6.0.min.js"></script>
    <script src="js/library/node_modules/chart.js/dist/chart.min.js"></script>
    <script src="js/common.js"></script>
</body>

</html>