<?php

include_once("../vendor/autoload.php");

use DataBase\MySQL;
use DataBase\MembersTable;

$data = [
    "name" => $_POST['name'] ?? 'Unknown',
    "email" => $_POST['email'] ?? 'Unknown',
    "relative" => $_POST['relative'] ?? 'Unknown',
    "phone" => $_POST['phone'] ?? 'Unknown',
    "date_of_birth" => $_POST['date-of-birth'] ?? 'Unknown',
    "income" => $_POST['income'] ?? '0',
];

$table = new MembersTable(new MySQL());

if ($table) {
    $table->createTable();
    $table->insert($data);

    header('location: ../index.php?success=1');
} else {
    header('location: ../index.php?unsuccess=1');
}