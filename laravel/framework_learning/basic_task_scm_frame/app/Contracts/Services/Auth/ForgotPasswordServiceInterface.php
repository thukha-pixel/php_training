<?php

namespace App\Contracts\Services\Auth;

use Illuminate\Http\Request;

interface ForgotPasswordServiceInterface
{
    public function insertForgotEmail(string $email, string $token);

    public function checkToken(string $email, string $token);

    public function updatePassword(string $email, string $password);

    public function deleteToken(string $email);
}