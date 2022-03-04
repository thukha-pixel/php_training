<?php

namespace App\Dao\Auth;

use App\Contracts\Dao\Auth\ForgotPasswordDaoInterface;
use DB;
use Carbon\Carbon; // Date and Time
use Hash;
use App\Models\User;

/**
 * System Name: Dao
 * Module name: ForgotPasswordDao
 */
class ForgotPasswordDao implements ForgotPasswordDaoInterface
{
    /**
     * Insert Forgot Email into table and token
     * 
     * @param string $email
     * @param string $token
     */
    public function insertForgotEmail(string $email, string $token)
    {
        return DB::table('password_resets')->insert([
            'email' => $email, 
            'token' => $token, 
            'created_at' => Carbon::now()
        ]);
    }

    /**
     * Check Token and Make sure that user is real or scammer
     * 
     * @param string $email
     * @param string $token
     */
    public function checkToken(string $email, string $token)
    {
        return DB::table('password_resets')
        ->where([
            'email' => $email,
            'token' => $token
        ])
        ->first();
    }

    /**
     * Update Password(Changing Password)
     * 
     * @param string $email
     * @param string $password
     * 
     */
    public function updatePassword(string $email, string $password)
    {
        return User::where('email', $email)
        ->update(['password' => Hash::make($password)]);
    }

    /**
     * Delete Token (Tokens are kept for temporary)
     * 
     * @param string $email
     */
    public function deleteToken(string $email)
    {
        return DB::table('password_resets')->where(['email' => $email])->delete();
    }
}