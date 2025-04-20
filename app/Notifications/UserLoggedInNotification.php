<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;


class UserLoggedInNotification extends Notification
{
    use Queueable;

   
    public function __construct()
    {
        //
    }

   
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Login Alert -CRM System')
            ->greeting('Hello!' .$notifiable->name.',')
            ->line('You have Successfully Logged in to the CRM System.')
            ->line('Time: '.now()->toDateTimeString())
            ->line('If this wasn’t you, please reset your password immediately.');
    }

   
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
