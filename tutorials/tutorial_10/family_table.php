<?php

include("vendor/autoload.php");

use DataBase\MySQL;
use DataBase\MembersTable;
use DataBase\Auth;

$auth = Auth::check();

$table = new MembersTable(new MySQL());
$all = $table->getAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial 09 | Family Table Page</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style3.css">
</head>

<body>

    <div id="card-table">

        <table>
            <a href="income_graph.php" id="visit-btn" type="button" style="display:inline-block">Income Graph</a>
            <a href="index.php" id="visit-btn" type="button" style="display:inline-block">Insert Data</a>
            <a href="_actions/signout.php" id="visit-btn" type="button" style="display:inline-block" onClick="return confirm('Are you sure?')">Logout</a>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Relative</th>
                <th>Phone</th>
                <th>Birthday</th>
                <th>Income(%)</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>

            <?php foreach ($all as $member) : ?>
                <tr>
                    <td>
                        <?= $member->id ?>
                    </td>
                    <td>
                        <?= $member->name ?>
                    </td>
                    <td>
                        <?= $member->email ?>
                    </td>
                    <td>
                        <?= $member->relative ?>
                    </td>
                    <td>
                        <?= $member->phone ?>
                    </td>
                    <td>
                        <?= $member->date_of_birth ?>
                    </td>
                    <td>
                        <?= $member->income ?>
                    </td>
                    <td>
                        <a href="edit.php?id=<?= $member->id ?>" id="update-btn" type="button" name="update-btn">Update</a>
                    </td>
                    <td>
                        <a href="_actions/delete.php?id=<?= $member->id ?>" id="delete-btn" type="button" name="delete-btn" onClick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>

    <script src="js/library/jquery-3.6.0.min.js"></script>
    <script src="js/library/node_modules/chart.js/dist/chart.min.js"></script>
    <script src="js/common.js"></script>
</body>

</html>