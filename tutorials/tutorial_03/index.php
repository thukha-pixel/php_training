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

    <div class="inner-container">
        <h1 class="hdr-h1">Welcome To Age Calculator</h1>

        <?php

        if (empty($_POST['date-of-birth'])) {
            $dateOfBirth = date('m/d/y');
        } else {
            $dateOfBirth = $_POST['date-of-birth'];
        }
        
        ?>
        <form action="" method="POST">
            <input type="date" name="date-of-birth" id="datepicker" value="<?php $dateOfBirth; ?>" required>
            <input type="submit" name="submit" value="Calculate">
        </form>

        <?php

        if (isset($_POST['submit'])) {
            $currentDate = date('m/d/y');
            $dateOfBirth = $_POST['date-of-birth'];

            $age = date_diff(date_create($dateOfBirth), date_create($currentDate));
            echo "<h2 class='age-h2'>You are " . $age->format("%y") . " years old!. </h2>";
        }
        
        ?>
    </div>

</body>

</html>