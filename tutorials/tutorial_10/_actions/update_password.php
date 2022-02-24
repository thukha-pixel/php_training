<?php
include_once("../vendor/autoload.php");

use DataBase\MySQL;
use DataBase\MembersTable;

$id = $_POST['id'];
$email = $_POST['email'];
$token = $_POST['token'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

if ($password === $confirm_password) {
    if (isset($id) and isset($email) and isset($token)) {
        $table = new MembersTable(new MySQL());

        if ($table) {
            $table->changePassword($id, $email, $token, $password);

            header('location: ../login.php');
        }
    }
} else {
    header("location: ../change_password.php?id=$id&email=$email&token=$token&unsuccess=1");
}
