<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\Facades\Lang;

class CompleteSurveyReminderQueued extends VerifyEmail implements ShouldQueue
{
    use Queueable;

    private $reminder;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($reminder)
    {
        $this->reminder = $reminder;
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
        $verificationUrl = $this->verificationUrl($notifiable);

        if($this->reminder == 1)
        {
            return (new MailMessage)
            ->subject('Complete Prefrence Survey')
            ->view('emails.complete-survey-email-reminder-1', ['name' => $notifiable->firstname, 'verifyUrl' => $verificationUrl]);
        }
        
        if($this->reminder == 2)
        {
            return (new MailMessage)
            ->subject('Complete Prefrence Survey')
            ->view('emails.complete-survey-email-reminder-2', ['name' => $notifiable->firstname, 'verifyUrl' => $verificationUrl]);
        }

        if($this->reminder == 3)
        {
            return (new MailMessage)
            ->subject('Complete Prefrence Survey')
            ->view('emails.complete-survey-email-reminder-3', ['name' => $notifiable->firstname, 'verifyUrl' => $verificationUrl]);
        }
        
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