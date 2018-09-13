<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ContactPageNotification extends Notification
{
    use Queueable;

    // Create varibles
    public $message;
    public $email;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($message, $email)
    {
        // Assign Variable Values
        $this->message = $message;
        $this->email = $email;
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
                    ->subject('Someone Wants To Contact Us!')
                    ->greeting('Someone on our site wants to get ahold of us! Here is their message!')
                    ->line('"' . $this->message . '"')
                    ->line('You can reply to their message by clicking the link below!')
                    ->action('Reply via eMail', 'mailto:' . $this->email);
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
