<?php

use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use App\Models\StudentSubscription;
use App\Models\PaymentDetails;
use App\Models\SendgridTemplate;

function authStripe($user)
{
    // Register User In Stripe
    $stripe = new \Stripe\Stripe();
    // secret key provided by stripe
    $stripe->setApiKey(config("services.stripe.secret"));
    $customer = \Stripe\Customer::create(array(
        'name' => $user->name,
        'email' => $user->email,
    ));

    if($customer->id) {
        // Store Stripe Customer Id In Database
        User::where('id', '=', $user->id)->update(array('customer_id' => $customer->id));
    }
    return;
}

// Stripe Create Customer, Plan And Subscritpion
// function stripeSubscription($user, $request, $couponId) {
 
//     // Set Stripe API Key
//     \Stripe\Stripe::setApiKey(config("services.stripe.secret"));

//     // Check Customer Exist Than Delete It
//     if($user->customer_id) {
//         // Retrive Customer From Stripe
//         $stripe = new \Stripe\StripeClient(config("services.stripe.secret"));
//         $customer = $stripe->customers->retrieve($user->customer_id, []);
//         // $stripe->customers->delete($user->customer_id, []);
//         if(isset($customer->id) && $customer->id) {
//             // Update Existing Customer Source
//             $customer = $stripe->customers->update($customer->id, ['source'  => $request->stripeToken]);
//         } else {
//             // Create New Customer In Stripe
//             $customer = \Stripe\Customer::create(array(
//                 'name' => $user->name,
//                 'email' => $user->email,
//                 'source'  => $request->stripeToken
//             ));
//         }
//     } else {
//         // Create Customer In Stripe
//         $customer = \Stripe\Customer::create(array(
//             'name' => $user->name,
//             'email' => $user->email,
//             'source'  => $request->stripeToken
//         ));
//     }
   
//     if($customer) {

//         // Convert Price To Cents
//         // $priceCents = round($request->price*100);
//         // Create A Plan
//         // $plan = \Stripe\Plan::create(array(
//         //     "product" => [
//         //         "name" => $request->plan
//         //     ],
//         //     "amount" => $priceCents,
//         //     "currency" => $request->currency,
//         //     "interval" => $request->interval,
//         //     "interval_count" => 1
//         // ));
//         // if($plan) {
//             $productId = Config::get('plans.plan.PRODUCT');
//             $priceId = Config::get('plans.plan.PRICE');

//             // Create Subscription
//             if($couponId) {
//                 $subscription = \Stripe\Subscription::create(array(
//                     "customer" => $customer->id,
//                     "items" => array(
//                         array(
//                             // "plan" => $productId,
//                             "price" => $priceId,
//                         ),
//                     ),
//                     "expand" => ["latest_invoice.payment_intent"],
//                     "coupon" => $couponId,
//                 ));
//             } else {
//                 $subscription = \Stripe\Subscription::create(array(
//                     "customer" => $customer->id,
//                     "items" => array(
//                         array(
//                             // "plan" => $productId,
//                             "price" => $priceId,
//                         ),
//                     ),
//                     "expand" => ["latest_invoice.payment_intent"],
//                 ));
//             }

//             if($subscription) {
//                 // Retrieve Subscription Data
//                 $subsData = $subscription->jsonSerialize();
//                 // Store Step One Data In Database
//                 $user->customer_id = $customer->id;
//                 $user->plan_id = $priceId;
//                 $user->subscription_id = $subsData['id'];
//                 $user->is_subscribe = $request->is_subscribe;
//                 $user->plan_amount = '19.99'; //$request->price;
//                 $user->plan_amount_currency = 'USD'; //$request->currency;
//                 $user->plan_interval = 'month'; //$request->interval;
//                 $user->status = $subsData['status'];
//                 $user->save();
//                 if($subsData['status'] == 'active') {
//                     return 'success';
//                 }

//                 // Check The Subscription Activation Is In Complete
//                 if($subsData['status'] == 'incomplete') {
//                     $latestInvoice = $subsData['latest_invoice'];
//                     if($latestInvoice['payment_intent']) {
//                         $paymentIntent = $latestInvoice['payment_intent'];
//                         if($paymentIntent['status'] == 'requires_action') {
//                             return $paymentIntent['client_secret'];
//                             // return redirect()->back()->with('client_secret', $paymentIntent['client_secret']);
//                         }
//                     }
//                 }
//                 return 'success';
//             }
//         // }
//     }
// }

/**
 * Author Ganesh
 * Updated stripe payment funtion  
 *created at :- 2022-29-09
 */

function stripeSubscription($user, $request, $couponId, $priceId) 
{
    // Set Stripe API Key
    \Stripe\Stripe::setApiKey(config("services.stripe.secret"));

    // Check Customer Exist Than Delete It
    if($user->customer_id) 
    {
        // Retrive Customer From Stripe
        $stripe = new \Stripe\StripeClient(config("services.stripe.secret"));
        
        $customer = $stripe->customers->retrieve($user->customer_id, []);
        
        // $stripe->customers->delete($user->customer_id, []);
        
        if(isset($customer->id) && $customer->id) 
        {
            // Update Existing Customer Source
            $customer = $stripe->customers->update($customer->id, ['source'  => $request->stripeToken]);
        }
        else 
        {
            // Create New Customer In Stripe
            $customer = \Stripe\Customer::create(array(
                'name' => $user->name,
                'email' => $user->email,
                'source'  => $request->stripeToken
            ));
        }
    } 
    else 
    {
        // Create Customer In Stripe
        $customer = \Stripe\Customer::create(array(
            'name' => $user->name,
            'email' => $user->email,
            'source'  => $request->stripeToken
        ));
    }
   
    if($customer) 
    {
        //echo 'yes';
        // Create Subscription
        // if($couponId) {
        //     $subscription = \Stripe\Subscription::create(array(
        //         "customer" => $customer->id,
        //         "items" => array(
        //             array(
        //                 // "plan" => $productId,
        //                 "price" => $priceId,
        //             ),
        //         ),
        //         "expand" => ["latest_invoice.payment_intent"],
        //         "coupon" => $couponId,
        //     ));
        // } else {
        //     $subscription = \Stripe\Subscription::create(array(
        //         "customer" => $customer->id,
        //         "items" => array(
        //             array(
        //                 // "plan" => $productId,
        //                 "price" => $priceId,
        //             ),
        //         ),
        //         "expand" => ["latest_invoice.payment_intent"],
        //     ));
        // }
        
        if($couponId) {
            $subscription = \Stripe\Subscription::create([
                "customer" => $customer->id,
            // 'collection_method'=>'send_invoice',
            // 'days_until_due'=>'0',
                //'receipt_email'=>'bkalyani1998@gmail.com',
                "items" => array(
                    array(
                        "price" => $priceId->plan_id,
                    ),
                ),
            "expand" => ["latest_invoice.payment_intent"],
            "coupon" => $couponId,
            ]);
        }
        else
        {
            $subscription = \Stripe\Subscription::create([
                "customer" => $customer->id,
            // 'collection_method'=>'send_invoice',
            // 'days_until_due'=>'0',
                //'receipt_email'=>'bkalyani1998@gmail.com',
                "items" => array(
                    array(
                        "price" => $priceId->plan_id,
                    ),
                ),
            "expand" => ["latest_invoice.payment_intent"]
            ]);
        }    



            if($subscription) {

                 // Retrieve Subscription Data
                 $subsData = $subscription->jsonSerialize();

                // echo "<pre>";
                // print_r($subsData['latest_invoice']['invoice_pdf']);die;
                if(($subsData['status'] == 'active'))
                {   
                    // Store Step One Data In Database
                    $user->customer_id = $customer->id;
                    $user->plan_id = $priceId->plan_id;
                    $user->plan_subscription_id = $subsData['id'];
                    $user->is_subscribe = $request->is_subscribe;
                    $user->plan_amount = $request->price;
                    // $user->payment_status = 1;
                    $user->plan_amount_currency = $request->currency;
                    $user->plan_interval = 'month';
                    $user->status = $subsData['status'];
                    $user->save();

                    if($subscription->latest_invoice->payment_intent->charges->data)
                    {
                        // save subscription details
                        $student = new StudentSubscription;
                        $student->student_id = Auth::id();
                        $student->subscription_id = $request->plan;
                        $student->price = $subsData['latest_invoice']['amount_paid'] / 100;
                        $student->receipt_url = $subsData['latest_invoice']['invoice_pdf'];
                        $student->plan_subscription_id = $subscription->id;
                        $student->dispute_flag = $subscription->latest_invoice->payment_intent->charges->data[0]->disputed;
                        $student->dispute_id = $subscription->latest_invoice->payment_intent->charges->data[0]->dispute;
                        $student->plan_subscription_id = $subscription->id;
                        $student->subscription_end_date = date('Y-m-d', $subscription->current_period_end);
                        $student->status = $subscription->latest_invoice->payment_intent->charges->data[0]->status;
                        $student->save();

                        // save card details 
                        $payment = new PaymentDetails;
                        $payment->student_id = Auth::id();
                        $payment->card_number = $subscription->latest_invoice->payment_intent->charges->data[0]->source->last4;
                        $payment->brand = $subscription->latest_invoice->payment_intent->charges->data[0]->source->brand;
                        $payment->exp_month = $subscription->latest_invoice->payment_intent->charges->data[0]->source->exp_month;
                        $payment->exp_year = $subscription->latest_invoice->payment_intent->charges->data[0]->source->exp_year;
                        $payment->save();
                    } 

                    if($subsData['status'] == 'active') {
                        $user->payment_status = 1;
                        $user->save();
                        return 'success';
                    }

                    // Check The Subscription Activation Is In Complete
                    if($subsData['status'] == 'incomplete') {
                        $latestInvoice = $subsData['latest_invoice'];
                        if($latestInvoice['payment_intent']) {
                            $paymentIntent = $latestInvoice['payment_intent'];
                            if($paymentIntent['status'] == 'requires_action') {
                                return $paymentIntent['client_secret'];
                                // return redirect()->back()->with('client_secret', $paymentIntent['client_secret']);
                            }
                        }
                    }
                }

                if(($subsData['status'] == 'incomplete'))
                {  
                    $user->payment_failed_date = date("Y-m-d");
                    $user->payment_failed_reminder = "0";
                    $user->save();

                    $template = SendgridTemplate::where('id',28)->first();

                    $template_id = "d-".$template->template_id;   

                    $email = new \SendGrid\Mail\Mail();
    
                    $email->setFrom("admin@free.martialartszen.com","MartialArtsZen");
                    $email->setSubject('Try MartialArtsZen.com using this referral');
                    $email->addTo($user->email);
                    $email->addContent("text/html","Join me and improve your skills in various disciplines");
                    $email->addDynamicTemplateDatas([
                        "first_name"=>$user->firstname,
                        "default"=>"Valued customer",
                        "actionUrl"=>route('bronzePlanStripe2')
                        ]);
                    $email->setTemplateId($template_id);
                    
                    $sendgrid = new \SendGrid(env('MAIL_PASSWORD'));
        
                    try{
                        $response = $sendgrid->send($email);
                        print $response->statusCode(). "\n";
                    }
                    catch(Exception $e)
                    {
                        echo "Caught Exception:".$e->getMessage()."\n";
                    } 

                    // Check The Subscription Activation Is In Complete
                    if($subsData['status'] == 'incomplete') {
                        $latestInvoice = $subsData['latest_invoice'];
                        if($latestInvoice['payment_intent']) {
                            $paymentIntent = $latestInvoice['payment_intent'];
                            if($paymentIntent['status'] == 'requires_action') {
                                return $paymentIntent['client_secret'];
                                // return redirect()->back()->with('client_secret', $paymentIntent['client_secret']);
                            }
                        }
                    }
                }
                
            }
        // }
    }
}

function getRegistrationStep($user)
{
    // Check Step One Completed
    if(!$user->plan_amount_currency || !$user->plan_interval) {
        return 'step-one';
    }
    // Check Step Two Completed
    if(!$user->who_will_be_training || !$user->disciplines_in_martial_arts || !$user->stretching_flexibility_spiritual_meditative_arts || !$user->health_and_wellness_guidance || !$user->all_fitness_including) {
        //return 'step-two';
    }
    // Check Step Three Completed
    if(!$user->age_group || !$user->gender || !$user->fitness || !$user->preferred_language) {
        return 'step-three';
    }
    // Check Step Four Completed
    if(!$user->instructor_gender || !$user->preferred_training_style) {
        return 'step-four';
    }
    return '';
}

// Store Student Data In User Database Table
function registerStudent($request, $type) {

    $name = $request->firstname.' '.$request->lastname;
    if($type == 'normal') {
        $user = User::create([
            'name' => $name,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'request_type' => $type,
        ]);
    } else {
        $user = User::create([
            'name' => $name,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'plan_amount' => $request->price,
            'plan_amount_currency' => $request->currency,
            'plan_interval' => ($type == 'free') ? $request->interval : '',
            'is_subscribe' => $request->is_subscribe,
            'request_type' => $type,
        ]);
    }

    event(new Registered($user));
    Auth::login($user);
    return;
}

// Stripe Create Customer, Plan And Subscritpion
function stripeBronzeSubscription($user, $request, $couponId) {
 
    // Set Stripe API Key
    \Stripe\Stripe::setApiKey(config("services.stripe.secret"));

    // Check Customer Exist Than Delete It
    if($user->customer_id) 
    {
        // Retrive Customer From Stripe
        $stripe = new \Stripe\StripeClient(config("services.stripe.secret"));
        $customer = $stripe->customers->retrieve($user->customer_id, []);
        // $stripe->customers->delete($user->customer_id, []);
        if(isset($customer->id) && $customer->id) {
            // Update Existing Customer Source
            $customer = $stripe->customers->update($customer->id, ['source'  => $request->stripeToken]);
        } else {
            // Create New Customer In Stripe
            $customer = \Stripe\Customer::create(array(
                'name' => $user->name,
                'email' => $user->email,
                'source'  => $request->stripeToken
            ));
        }
    }
    else
    {
        // Create Customer In Stripe
        $customer = \Stripe\Customer::create(array(
            'name' => $user->name,
            'email' => $user->email,
            'source'  => $request->stripeToken
        ));
    }

    // Retrieve Subscription Data
    // $subsData = $subscription->jsonSerialize();
    // Store Step One Data In Database
    $user->customer_id = $customer->id;
    // $user->plan_id = $priceId;
    $user->subscription_id = 1;
    $user->is_subscribe = $request->is_subscribe;
    $user->plan_amount = '1.00'; //$request->price;
    $user->plan_amount_currency = 'USD'; //$request->currency;
    $user->plan_interval = 'lifetime'; //$request->interval;
    // $user->status = $subsData['status'];
    $user->save();
    // if($subsData['status'] == 'active') {
    //     return 'success';
    // }

    return 'success';
    // }
}
