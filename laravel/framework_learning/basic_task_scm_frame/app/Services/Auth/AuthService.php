<?php

namespace App\Services\Auth;

use App\Contracts\Dao\Auth\AuthDaoInterface;
use App\Contracts\Services\Auth\AuthServiceInterface;

use Illuminate\Http\Request;

class AuthService implements AuthServiceInterface
{
    private $authDao;

    public function __construct(AuthDaoInterface $authDao)
    {
        $this->authDao = $authDao;
    }

    public function create(array $data)
    {
        return $this->authDao->create($data);
    }
}