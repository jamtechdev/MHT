<?php
   
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use App\Models\SubscriptionPlan;
use App\Models\SubscriptionBenefit;
use App\Models\StudentSubscription;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Session;
use Stripe;
use Auth;
   
class BuyPlanController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Author Ganesh 
     * To get payment page as per plan
     * Route : buyPlan 
     * Created at : 2022-07-26
     */ 

    public function buyPlan(Request $request)
    {
        $user = User::where('id', Auth::id())->first();

        $plan_id = $request->id;

        $subscriptionData = SubscriptionPlan::where('id', '=', $plan_id)->first();

        $allBenefits = SubscriptionBenefit::get();

        $result = array();

        if($subscriptionData)
        {
            $validity_type = ""; 

            if($subscriptionData->validity_type == 1)
            {
                $validity_type = $subscriptionData->validity." "."Day";
            }
            if($subscriptionData->validity_type == 2)
            {
                $validity_type = $subscriptionData->validity." "."Month";
            }
            if($subscriptionData->validity_type == 3)
            {
                $validity_type = $subscriptionData->validity." "."Year";
            } 
            if($subscriptionData->validity_type == 4)
            {
                $validity_type = "Lifetime";
            }       

            $result = array(
                        'plan_id'=>$subscriptionData->id,
                        'plan_name'=>$subscriptionData->plan_name,
                        'price'=>$subscriptionData->price,
                        'validity'=>$validity_type,
                        'plan_benefits'=>$subscriptionData->benefits,
                        'all_benefits'=>$allBenefits,
                        'credit_card_number'=>$user->credit_card_number,
                        'credit_card_expiry_date'=>$user->credit_card_expiry_date,
                        'credit_card_type'=>$user->credit_card_type
                    );
        }

        return view('buyNewPlan',compact('result'));
    }
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Author Ganesh 
     * Buy plan stripe payment
     * Route : buyPlan 
     * Created at : 2022-07-26
     */ 
    public function stripePayment(Request $request)
    {
     
        try{
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $result = Stripe\Charge::create ([
                    "amount" => $request->price * 100,
                    "currency" => "usd",
                    "source" => $request->stripeToken,
                    "description" => "Buy plan" 
            ]);

            if($result->status == "succeeded")
            {
                $student = new StudentSubscription;
                $student->student_id = Auth::id();
                $student->subscription_id = $request->plan_id;
                $student->save();

                User::where('id', '=', Auth::id())->update(['subscription_id'=>$request->plan_id,'credit_card_number'=>$result->payment_method_details->card->last4,'credit_card_expiry_date'=>$result->payment_method_details->card->exp_month."/".$result->payment_method_details->card->exp_year,'credit_card_type'=>$result->payment_method_details->card->brand]);

                Session::flash('success', 'Subscription Plan Updated Successfully!');
            
                return Redirect::route('student_subscription_manage',Auth::id());
            }
            else
            {
                return back();
            }
           
        }catch(Exception $e)
        {
            return back();
        }
        
    }
}