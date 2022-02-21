<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial 07 | Index Page</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style1.css">
</head>

<body>
    <div id="card">

        <div id="card-content">
            <div id="card-title">
                <h2>Welcome to QRCode Generator</h2>
                <div class="underline-title"></div>

                <!-- catch incorrect message from qrcode_generator.php  -->
                <?php if (isset($_GET['incorrect'])) : ?>
                    <div class="error-alert">
                        Incorrect Input or 505!
                    </div>
                <?php endif ?>

                <!-- catch correct message from qrcode_generator.php  -->
                <?php if (isset($_GET['correct'])) : ?>
                    <div class="success-alert">
                        QRCode Generate Successfully!
                    </div>
                <?php endif ?>
            </div>

            <form action="qrcode_generator.php" method="POST" class="form" enctype="multipart/form-data">
                <label for="qr-txt">
                    &nbsp;Enter Your Text
                </label>
                <input class="form-content" type="text" name="qr-txt" autocomplete="off" required />
                <div class="form-border"></div>

                <input id="submit-btn" type="submit" name="submit" value="GENERATE" />
            </form>

            <div class="qrcode-img">
                <?php
                if (isset($_GET['path'])) {
                    echo "<img src=" . $_GET['path'] . " alt='qrcode_image'>";
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>