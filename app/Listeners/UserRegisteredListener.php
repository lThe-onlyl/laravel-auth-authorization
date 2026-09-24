<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Mail\Welcome;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\Laravel\Facades\Telegram;

class UserRegisteredListener
{
    public function handle(UserRegistered $event): void
    {
        Mail::to($event->user->email)
            ->send(new Welcome($event->user));

        Telegram::sendMessage([
            'chat_id' => env('TELEGRAM_CHANNEL_ID', ''),
            'parse_mode' => 'html',
            'text' => "Зарегистрирован новый пользователь: {$event->user->name} ({$event->user->email})",
        ]);
    }
}