<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ExceptionMail extends Mailable
{
    use Queueable, SerializesModels;
    public $mailData = null;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mailData = null)
    {
        $this->mailData = $mailData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->view('exception_email.exception_email');
        $this->subject($this->mailData['mail_title']);
    }
}
