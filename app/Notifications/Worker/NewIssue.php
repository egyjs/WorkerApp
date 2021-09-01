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
//            'mail',
            TwilioChannel::class
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

        $content = "Hi Mr. ".$notifiable->lastname.", you have a new request with ID:#".$this->issue->id;
        $url  = route('twiml.say',['say'=>base64_encode($content)]);
        return (new TwilioCallMessage())
            ->url($url);

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
