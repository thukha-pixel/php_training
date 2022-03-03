<?php

namespace App\Services\Auth;

use App\Contracts\Services\Auth\ForgotPasswordServiceInterface; // for implementation
use App\Contracts\Dao\Auth\ForgotPasswordDaoInterface; // for sent data to database

class ForgotPasswordService implements ForgotPasswordServiceInterface
{
    private $forgotPasswordDao;

    public function __construct(ForgotPasswordDaoInterface $forgotPasswordDao)
    {
        $this->forgotPasswordDao = $forgotPasswordDao;
    }

    public function insertForgotEmail(string $email, string $token)
    {
        return $this->forgotPasswordDao->insertForgotEmail($email, $token);
    }

    public function checkToken(string $email, string $token)
    {
        return $this->forgotPasswordDao->checkToken($email, $token);
    }

    public function updatePassword(string $email, string $password)
    {
        return $this->forgotPasswordDao->updatePassword($email, $password);
    }

    public function deleteToken(string $email)
    {
        return $this->forgotPasswordDao->deleteToken($email);
    }
}