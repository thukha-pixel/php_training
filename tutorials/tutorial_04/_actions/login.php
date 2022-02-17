<?php

session_start();

//get email and password from $_POST
$email = $_POST['email'];
$password = $_POST['password'];

/* 
 * Login successful if email and password are equal to 'thukha@gmail.com' and '12345'
 * send 'incorrect=1' to index.php if errors were occured
*/
if ($email === 'thukha@gmail.com' and $password === '12345') {
    $_SESSION['user'] = ['username' => 'Thu Kha', 'login_email' => $email, 'login_password' => $password];
    header('location: ../profile.php');
} else {
    header('location: ../index.php?incorrect=1');
}
?>