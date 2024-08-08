<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessNewsletter;
use App\Mail\NewsLetter;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendEmail extends Controller
{
    public function sendNewsLetter()
    {
        $users = User::all();

        foreach ($users as $user) {
            // Mail::to($user->email)->send(new Newsletter($user));
            ProcessNewsletter::dispatch($user);
        }
    }
}
