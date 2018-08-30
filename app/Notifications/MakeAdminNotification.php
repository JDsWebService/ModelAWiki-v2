<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class MakeAdminNotification extends Notification implements ShouldQueue
{
    use Queueable;

    // Create the token varible
    public $token;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        // Assign the token to the objects token
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Congratulations! You are now an Administrator!')
                    ->line('Congratulations! You are now an Administrator of ModelAWiki! Please click below to create your password and log into the Admin portion of the site.')
                    ->line('You have 10 minutes to create your password. If you do not create your password in time, please notifiy an administrator to resend this link.')
                    ->action('Create Password', route('admin.first-login', $this->token))
                    ->line('If you did not request this privilage, no further action is required.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
