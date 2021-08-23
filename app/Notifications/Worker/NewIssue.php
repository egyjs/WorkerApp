<?php

namespace App\Notifications\Worker;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Trello\TrelloChannel;
use NotificationChannels\Trello\TrelloMessage;
use NotificationChannels\Twilio\TwilioCallMessage;
use NotificationChannels\Twilio\TwilioChannel;
use NotificationChannels\Twilio\TwilioMessage;
use NotificationChannels\Twilio\TwilioSmsMessage;

class NewIssue extends Notification implements ShouldQueue
{
    use Queueable;

    protected $issue;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($issue)
    {
        $this->issue = $issue;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [
            'mail',
//            TwilioChannel::class
        ];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
//            ->from('el3zahaby@gmail.com')
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     * @return TrelloMessage
     */

    public function toTrello($notifiable): TrelloMessage
    {
        return TrelloMessage::create()
            ->name("Trello Card Name")
            ->description("This is the Trello card description")
            ->top()
            ->due('tomorrow');
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     * @return TwilioMessage
     */

    public function toTwilio($notifiable): TwilioMessage
    {
//        $url = "https://gist.githubusercontent.com/egyjs/05fe79c08ffe7f64cf6eef58935442a8/raw/39e6814ed065f42c5cc800af0d16d9ca0ecfe480/gistfile1.txt";
        return (new TwilioSmsMessage())
            ->content("Hi Mr. ".$notifiable->lastname.", you have a new request ID:#".$this->issue->id);
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
