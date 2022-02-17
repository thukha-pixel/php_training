<?php

//destory user data form session
session_start();
unset( $_SESSION['user'] );

header('location: ../index.php');

?>