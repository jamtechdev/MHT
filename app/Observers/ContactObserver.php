<?php

namespace App\Observers;

use Modules\Contactus\Entities\Contact;
use Mail;

class ContactObserver
{
    /**
     * Handle the Contact "created" event.
     *
     * @param  \App\Models\Contact  $contact
     * @return void
     */
    public function created(Contact $contact)
    {
        info('created called');
        $mailDetails = [
            'subject' => 'Welcome To MAZ',
            'title' => 'Hi,',
            'body' => 'We have seen your contact details, admin will send you email for your query.'
        ];

        \Mail::to($contact->email)->queue(new \App\Mail\ContactMail($mailDetails));

        $mailDetails = [
            'subject' => 'Contact Details',
            'title' => 'Contact Mail: '. $contact->email .',',
            'body' => 'Query Regarding: ' . $contact->question_regarding.', Subject: '. $contact->name.', Description: '. $contact->message.'.'
        ];

        \Mail::to('vaibhavviradiya123.vv@gmail.com')->queue(new \App\Mail\ContactMail($mailDetails));
    }

    /**
     * Handle the Contact "updated" event.
     *
     * @param  \App\Models\Contact  $contact
     * @return void
     */
    public function updated(Contact $contact)
    {
        //
    }

    /**
     * Handle the Contact "deleted" event.
     *
     * @param  \App\Models\Contact  $contact
     * @return void
     */
    public function deleted(Contact $contact)
    {
        //
    }

    /**
     * Handle the Contact "restored" event.
     *
     * @param  \App\Models\Contact  $contact
     * @return void
     */
    public function restored(Contact $contact)
    {
        //
    }

    /**
     * Handle the Contact "force deleted" event.
     *
     * @param  \App\Models\Contact  $contact
     * @return void
     */
    public function forceDeleted(Contact $contact)
    {
        //
    }
}
