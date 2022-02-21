<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial 06 | Index Page</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div id="card">

        <div id="card-content">
            <div id="card-title">
                <h2>Only Image File Upload</h2>
                <div class="underline-title"></div>
            </div>

            <!-- catch incorrect message from upload.php  -->
            <?php if (isset($_GET['incorrect'])) : ?>
                <div class="error-alert">
                    Incorrect File, Only for photo
                </div>
            <?php endif ?>

            <!-- catch correct message from upload.php  -->
            <?php if (isset($_GET['correct'])) : ?>
                <div class="success-alert">
                    Image File Uploaded
                </div>
            <?php endif ?>

            <!-- send login data to upload.php  -->
            <form action="upload.php" method="POST" class="form" enctype="multipart/form-data">
                <label for="photo">
                    &nbsp;Image File
                </label>
                <input class="form-content" type="file" name="photo" required />
                <div class="form-border"></div>

                <label for="img-folder-name">
                    &nbsp;Image Folder Name
                </label>
                <input class="form-content" type="text" name="img-folder-name" required />
                <div class="form-border"></div>

                <input id="submit-btn" type="submit" name="submit" value="UPLOAD" />
            </form>
        </div>

    </div>
</body>

</html>