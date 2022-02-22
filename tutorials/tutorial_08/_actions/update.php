<?php

include_once("../vendor/autoload.php");

use DataBase\MySQL;
use DataBase\MembersTable;

$id = $_POST['id'];
$name = $_POST['name'] ?? 'Unknown';
$email = $_POST['email'] ?? 'Unknown';
$relative = $_POST['relative'] ?? 'Unknown';
$phone = $_POST['phone'] ?? 'Unknown';
$date_of_birth = $_POST['date-of-birth'] ?? 'Unknown';

$table = new MembersTable(new MySQL());

if ($table) {
    $table->update($id, $name, $email, $relative, $phone, $date_of_birth);

    header('location: ../family_table.php');
}