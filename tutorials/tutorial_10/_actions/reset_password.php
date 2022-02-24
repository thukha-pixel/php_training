<?php
include_once("../vendor/autoload.php");

use DataBase\MySQL;
use DataBase\MembersTable;

$id = $_GET['id'];
$email = $_GET['email'];
$token = $_GET['token'];

if (isset($id) and isset($email) and isset($token)) {
    $table = new MembersTable(new MySQL());

    if ($table) {
        $checker = $table->findByIdAndEmailAndToken($id, $email, $token);

        if ($checker === false) {
            echo "False";
        } else {
            header("location: ../change_password.php?id=$checker->id&email=$checker->email&token=$checker->token");
        }
    }
}
