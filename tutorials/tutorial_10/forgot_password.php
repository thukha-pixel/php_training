<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial 10 | Forgot Password Page</title>
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
                        Email was not registerd. Please Register!
                    </div>
                <?php endif ?>

                <!-- catch correct message -->
                <?php if (isset($_GET['success'])) : ?>
                    <div class="success-alert">
                        Email is allocated!
                    </div>
                <?php endif ?>
            </div>

            <form class="form" action="_actions/email_sender.php" method="POST" enctype="multipart/form-data">

                <input class="form-content" type="email" name="email" placeholder="Enter Email" autocomplete="off" required>
                <div class="form-border"></div>

                <input id="submit-btn" type="submit" name="submit" value="Send Mail" />
                <a href="register.php" id="visit-btn" type="button" name="visit-btn">Register Here</a>
                <a href="login.php" id="visit-btn" type="button" name="visit-btn">Login Here</a>
            </form>
        </div>
    </div>

    <script src="js/library/jquery-3.6.0.min.js"></script>
    <script src="js/library/node_modules/chart.js/dist/chart.min.js"></script>
    <script src="js/common.js"></script>
</body>

</html>