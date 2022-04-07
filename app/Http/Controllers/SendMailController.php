<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendMailController extends Controller
{
    //
    public function send($msgBody, $user)
    {
        try {
            Mail::raw($msgBody, function ($message) use ($user) {
                $message->to($user->email, $user->nombre)->subject($user->filename);
                $message->attachData(print_r($user->data, true), $user->filename . '.txt', [
                    'mime' => 'text/plain',
                ]);
            });
        } catch (Exception $e) {
            error_log($e);
            return response()->json([
                "message" => "Algo no funciona bien!"
            ], 500);
        }
    }
}
