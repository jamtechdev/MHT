<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InstructorMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mailDetails;

    /**
    * Create a new message instance.
    *
    * @return void
    */
    public function __construct($mailDetails)
    {
        $this->mailDetails = $mailDetails;
    }

    /**
    * Build the message.
    *
    * @return $this
    */
    public function build()
    {
        if($this->mailDetails['body'] != '') {
            return $this->subject($this->mailDetails['subject'])->view('emails.instructor');
        } else {
            return $this->subject($this->mailDetails['subject'])->view('emails.welcome-stundent-email');
        }
    }
}