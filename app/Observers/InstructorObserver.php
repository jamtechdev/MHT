<?php

namespace App\Observers;

use App\Models\Instructor;
use Mail;

class InstructorObserver
{
    /**
    * Handle the Instructor "created" event.
    *
    * @param  \App\Models\Instructor  $instructor
    * @return void
    */
    public function created(Instructor $instructor)
    {
        $mailDetails = [
            'subject' => 'Welcome To MartialArtsZen.com',
            'title' => 'Hi '.$instructor->name.',',
            'body' => 'You are registered successfully in MAZ, Wait admin will approve your account then you will receive notification.'
        ];

        \Mail::to($instructor->email)->send(new \App\Mail\InstructorMail($mailDetails));
    }

    /**
    * Handle the Instructor "updated" event.
    *
    * @param  \App\Models\Instructor  $instructor
    * @return void
    */
    public function updated(Instructor $instructor)
    {
        if (array_key_exists("is_approved", $instructor->getDirty())) {
            
            if($instructor->is_approved == 1) {
                $mailDetails = [
                    'subject' => 'Instuctor Approval By Admin',
                    'title' => 'Hi '.$instructor->name.',',
                    'body' => 'Admin has been approved your MartialArtsZen account so, you can login in MAZ.'
                ];
                \Mail::to($instructor->email)->send(new \App\Mail\InstructorMail($mailDetails));
            }
            if($instructor->is_approved == 0) {
                $mailDetails = [
                    'subject' => 'Instuctor Approval By Admin',
                    'title' => 'Hi '.$instructor->name.',',
                    'body' => 'Admin has been unapproved your MartialArtsZen account so, you can not login in MAZ.'
                ];
                \Mail::to($instructor->email)->send(new \App\Mail\InstructorMail($mailDetails));
            }
        }
    }

    /**
    * Handle the Instructor "deleted" event.
    *
    * @param  \App\Models\Instructor  $instructor
    * @return void
    */
    public function deleted(Instructor $instructor)
    {
        //
    }

    /**
    * Handle the Instructor "restored" event.
    *
    * @param  \App\Models\Instructor  $instructor
    * @return void
    */
    public function restored(Instructor $instructor)
    {
        //
    }

    /**
    * Handle the Instructor "force deleted" event.
    *
    * @param  \App\Models\Instructor  $instructor
    * @return void
    */
    public function forceDeleted(Instructor $instructor)
    {
        //
    }
}
