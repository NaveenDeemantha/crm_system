<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Auth\Events\Login;
use App\Notifications\UserLoggedInNotification;
use App\Models\User;

class SendLoginNotification
{
    public function __construct()
    {
        //
    }

    public function handle(Login $event): void
    {
        /** @var User $user */
        $user = $event->user;
        
        //sending the email alert when any user logs in
        $user->notify(new UserLoggedInNotification());
    }
}