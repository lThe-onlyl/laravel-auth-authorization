<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Mail\Welcome;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class UserRegisteredListener
{
    public function handle(UserRegistered $event): void
    {
        Log::info('UserRegisteredListener called', [
            'email' => $event->user->email,
        ]);

        Mail::to($event->user->email)
            ->send(new Welcome($event->user));
    }
}