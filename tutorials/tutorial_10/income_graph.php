<?php

include("vendor/autoload.php");

use DataBase\Auth;

$auth = Auth::check();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial 09 | Income Graph</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style3.css">
</head>

<body>
    <canvas id="myChart"></canvas>

    <a href="index.php" id="visit-btn" type="button" style="display:inline-block">Insert Data</a>
    <a href="family_table.php" id="visit-btn" type="button" style="display:inline-block">Visit Table</a>
    <script src="js/library/jquery-3.6.0.min.js"></script>
    <script src="js/library/node_modules/chart.js/dist/chart.min.js"></script>
    <script src="js/common.js"></script>
</body>

</html>