<?php

namespace App\Contracts\Services\Auth;

use Illuminate\Http\Request;

interface AuthServiceInterface
{
    public function create(array $data);
}