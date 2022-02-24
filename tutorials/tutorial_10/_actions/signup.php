<?php

include_once("../vendor/autoload.php");

use DataBase\MySQl;
use DataBase\MembersTable;

$data = [
    "name" => $_POST['name'] ?? 'Unknown',
    "email" => $_POST['email'] ?? 'Unknown',
    "relative" => $_POST['relative'] ?? 'Unknown',
    "phone" => $_POST['phone'] ?? 'Unknown',
    "date_of_birth" => $_POST['date-of-birth'] ?? 'Unknown',
    "income" => $_POST['income'] ?? '0',
    "password" => $_POST['password'],
    "token" => hash('sha256', rand()),
];

$table = new MembersTable(new MySQL());

if ($table) {
    $table->createTable();
    $table->insert($data);

    header('location: ../login.php?success=1');
} else {
    header('location: ../register.php?unsuccess=1');
}
