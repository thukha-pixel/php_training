<?php

namespace App\Contracts\Dao\Auth;

use Illuminate\Http\Request;

interface ForgotPasswordDaoInterface
{
    public function insertForgotEmail(string $email, string $token);

    public function checkToken(string $email, string $token);

    public function updatePassword(string $email, string $password);

    public function deleteToken(string $email);
}