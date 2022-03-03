<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Models\User;
use Mail;
use Hash;
use Illuminate\Support\Str;

use App\Contracts\Services\Auth\ForgotPasswordServiceInterface;

class ForgotPasswordController extends Controller
{

    private $forgotPasswordService;

    public function __construct(ForgotPasswordServiceInterface $forgotPasswordService)
    {
        $this->forgotPasswordService = $forgotPasswordService;
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function showForgetPasswordForm()
    {
        return view('auth.forgetPassword');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        $this->forgotPasswordService->insertForgotEmail($request->email, $token);

        Mail::send('email.forgetPassword', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with('message', 'We have e-mailed your password reset link!');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function showResetPasswordForm($token)
    {
        return view('auth.forgetPasswordLink', ['token' => $token]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $checkToken = $this->forgotPasswordService->checkToken($request->email, $request->token);

        if (!$checkToken) {
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $this->forgotPasswordService->updatePassword($request->email, $request->password);
        $this->forgotPasswordService->deleteToken($request->email);

        return redirect('/login')->with('message', 'Your password has been changed!');
    }
}
