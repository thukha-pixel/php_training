<?php
session_start();

include_once("../vendor/autoload.php");

use DataBase\MySQL;
use DataBase\MembersTable;

$email = $_POST['email'];
$password = $_POST['password'];

$table = new MembersTable(new MySQL());

if ($table) {
    $data = $table->findByEmailAndPassword($email, $password);
    if ($data  === false) {
        header('location: ../login.php?unsuccess=1');
    } else {
        $_SESSION['name'] = ['name' => $data->name];
        header('location: ../family_table.php');
    }
}
