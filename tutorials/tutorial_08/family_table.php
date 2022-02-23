<?php

include("vendor/autoload.php");

use DataBase\MySQL;
use DataBase\MembersTable;

$table = new MembersTable(new MySQL());
$all = $table->getAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial 08 | Family Table Page</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style2.css">
</head>

<body>

    <div id="card-table">

        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Relative</th>
                <th>Phone</th>
                <th>Birthday</th>
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
                        <a href="edit.php?id=<?= $member->id ?>" id="update-btn" type="button" name="update-btn">Update</a>
                    </td>
                    <td>
                        <a href="_actions/delete.php?id=<?= $member->id ?>" id="delete-btn" type="button" name="delete-btn" onClick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</body>

</html>