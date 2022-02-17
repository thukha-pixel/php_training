<?php

session_start();

$email = $_POST['email'];
$password = $_POST['password'];

if ($email === 'thukha@gmail.com' and $password === '12345') {
    $_SESSION['user'] = ['username' => 'Thu Kha'];
    header('location: ../profile.php');
} else {
    header('location: ../index.php?incorrect=1');
}
?>