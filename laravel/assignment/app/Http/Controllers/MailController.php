<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;
use App\Mail\CreateSuccessMail;
use App\Mail\DeleteSuccessMail;


class MailController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function createSuccessMail()
    {
        $mailData = [
            'title' => 'Mail from Laravel Assignment 6',
            'body' => 'Create Data Successfully!',
        ];

        Mail::to('thukhaa443@gmail.com')->send(new CreateSuccessMail($mailData));

        dd("Email is sent successfully");
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function deleteSuccessMail()
    {
        $mailData = [
            'title' => 'Mail from Laravel Assignment 6',
            'body' => 'Delete Data Successfully!',
        ];

        Mail::to('thukhaa443@gmail.com')->send(new DeleteSuccessMail($mailData));

        dd("Email is sent successfully");
    }
}
