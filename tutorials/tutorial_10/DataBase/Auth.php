<?php

namespace DataBase;

/*
 *Auth Class
 *Check user is authorized or not
*/

class Auth
{
    static function check()
    {
        session_start();
        if (isset($_SESSION['name'])) {
            return $_SESSION['name'];
        } else {
            header('location: login.php');
        }
    }
}
