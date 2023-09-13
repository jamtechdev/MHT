<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\VerifyEmailQueued;
use App\Notifications\SendAcceptPlanEmailQueued;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'firstname',
        'lastname',
        'email',
        'password',
        'google_id',
        'facebook_id',
        'is_block',
        'phone',
        'age_group',
        'gender',
        'profile_picture',
        'who_will_be_training',
        'disciplines_in_martial_arts',
        'stretching_flexibility_spiritual_meditative_arts',
        'health_and_wellness_guidance',
        'all_fitness_including',
        'fitness',
        'preferred_language',
        'instructor_gender',
        'preferred_training_style',
        'customer_id',
        'instructor_experience',
        'is_subscribe',
        'subscription_id',
        'payment_status',
        'upgrade_plan',
        'plan_id',
        'upgrade_plan_reminder',
        'upgrade_plan_reminder_date',
        'plan_amount',
        'plan_amount_currency',
        'plan_subscription_id',
        'plan_upgraded_date',
        'payment_failed_reminder',
        'payment_failed_date',
        'plan_interval',
        'status',
        'request_type',
        'is_first_time_user',
        'accept_bronze_plan',
        'first_time_on_third_step',
        'first_time_on_fourth_step',
        'first_time_on_fifth_step',
        'free_site_user',
        'referal_code',
        'refered_by',
        'anyone_accepts_referral'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendEmailVerificationNotification()
    {
       // $this->notify(new VerifyEmailQueued);
    } 

    // $verification_url = URL::temporarySignedRoute(
    //     'verification.verify',
    //     Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
    //     [
    //         'id' => $user->getKey(),
    //         'hash' => sha1($user->getEmailForVerification()),
    //     ]
    // );
}