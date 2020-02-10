<?php

namespace App\Notifications;

use DouglasResende\FCM\Messages\FirebaseMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class FirebaseNotification extends Notification
{
    use Queueable;

    private $title;
    private $body;

    protected $data;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data,$title,$body)
    {
     $this->  title=$title;
     $this->body=$body;
     $this->data=$data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['fcm'];
    }

    public function toFcm($notifiable)
    {

        return (new FirebaseMessage())->setContent($this->title, $this->data);

    }
}
