<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class LoginNotification extends Notification
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
            ->subject('Login Alert - Your Account Accessed')
            ->greeting('Hello, ' . $this->user->name)
            ->line('You have successfully logged into your account using the email: ' . $this->user->email)
            ->line('If this was not you, please reset your password or contact support immediately.')
            ->salutation('Thank you for using our application!');
    }
}
