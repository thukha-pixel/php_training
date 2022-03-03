<?php

namespace App\Dao\Auth;

use App\Contracts\Dao\Auth\ForgotPasswordDaoInterface;
use DB;
use Carbon\Carbon; // Date and Time
use Hash;
use App\Models\User;

class ForgotPasswordDao implements ForgotPasswordDaoInterface
{
    public function insertForgotEmail(string $email, string $token)
    {
        return DB::table('password_resets')->insert([
            'email' => $email, 
            'token' => $token, 
            'created_at' => Carbon::now()
        ]);
    }

    public function checkToken(string $email, string $token)
    {
        return DB::table('password_resets')
        ->where([
            'email' => $email,
            'token' => $token
        ])
        ->first();
    }

    public function updatePassword(string $email, string $password)
    {
        return User::where('email', $email)
        ->update(['password' => Hash::make($password)]);
    }

    public function deleteToken(string $email)
    {
        return DB::table('password_resets')->where(['email' => $email])->delete();
    }
}