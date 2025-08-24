<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class RegistrationNotification extends Notification
{
    use Queueable;

    protected $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Welcome to Our Platform!')
            ->greeting('Hello, ' . $this->user->name)
            ->line('You have successfully registered with the email: ' . $this->user->email)
            ->line('We’re excited to have you on board.')
            ->salutation('Warm regards, The Team');
    }
}

