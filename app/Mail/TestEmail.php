<?php

namespace App\Mail;

use SendGrid;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TestEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // $address = 'sureshsavaliya@logisticinfotech.co.in';
        // $subject = 'This is a demo!';
        // $name = 'Jane Doe';
        // return $this->view('emails.test')
        //             ->from($address, $name)
        //             ->cc($address, $name)
        //             ->bcc($address, $name)
        //             ->replyTo($address, $name)
        //             ->subject($subject)
        //             ->with([ 'test_message' => $this->data['message'] ]);

        // return $this->view('emails.test')
        //     ->subject('Welcome to our application');

        return $this->from('contact@martialartszen.com', config('mail.from.name'))->subject('Your Email Subject')->view('emails.test');
    }
}
