<?php

namespace App\Dao\Auth;

use Illuminate\Http\Request;

use App\Contracts\Dao\Auth\AuthDaoInterface; //pre-defined methods(rules)
use App\Models\User; // database model
use Hash; // password or hash values

/**
 * System Name: Dao
 * Module Name: AuthDao
 */
class AuthDao implements AuthDaoInterface
{
    /**
     * Create new data row in User Table
     * 
     * @param array $data
     */
    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }
}