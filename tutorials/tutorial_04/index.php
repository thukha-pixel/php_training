<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial 3 | Index Page</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div id="card">
        <div id="card-content">

            <div id="card-title">
                <h2>LOGIN</h2>
                <div class="underline-title"></div>
            </div>

            <?php if (isset($_GET['incorrect'])) : ?>
                <div class="error-alert">
                    Incorrect Email or Password
                </div>
            <?php endif ?>

            <form action="_actions/login.php" method="POST" class="form">
                <label for="user-email">
                    &nbsp;Email
                </label>
                <input id="user-email" class="form-content" type="email" name="email" autocomplete="off" required />
                <div class="form-border"></div>

                <label for="user-password">&nbsp;Password
                </label>
                <input id="user-password" class="form-content" type="password" name="password" required />
                <div class="form-border"></div>

                <input id="submit-btn" type="submit" name="submit" value="LOGIN" />
            </form>

        </div>
    </div>

</body>

</html>