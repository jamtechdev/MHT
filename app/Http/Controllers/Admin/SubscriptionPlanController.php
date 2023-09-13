<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseCategory;
use App\Models\InstructorCourse;
use App\Models\SubscriptionBenefit;
use App\Models\SubscriptionPlan;
use Yajra\DataTables\DataTables;
use Stripe\Plan;
use Stripe\Product;

class SubscriptionPlanController extends Controller
{
    /**
    * Author Ganesh
    * View Of Subscription Plan Index Page
    * Route : subscriptionplan
    * Method : GET
    *Created at :- 29-06-2022
    * @return \Illuminate\View\View
    */
    public function index()
    {
        return view("admin.subscription_plan.index");
    }

    /**
    * Author Ganesh 
    * Get Subscriptions Plans
    * Route : subscriptionplan/datatable
    *Created at :- 01-07-2022
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function getDatatable(SubscriptionPlan $subscriptionplan, SubscriptionBenefit $subscriptionbenefit)
    {
        $plans = $subscriptionplan->all();

        $result = array();

        if(!empty($plans))
        {
            foreach($plans as $p)
            {
                $validity_type = "";

                if($p->validity_type == 1)
                {
                    $validity_type = "Day";
                }
                if($p->validity_type == 2)
                {
                    $validity_type = "Month";
                }
                if($p->validity_type == 3)
                {
                    $validity_type = "Year";
                }
                if($p->validity_type == 4)
                {
                    $validity_type = "Lifetime";
                }

                $explode_benefits = explode(",",$p->benefits);

                $benefits = array();

                if(!empty($explode_benefits))
                {
                    foreach($explode_benefits as $b)
                    {
                        if($b != NULL)
                        {
                            $data = $subscriptionbenefit->where('id',$b)->first();

                            if($data)
                            {
                                $benefits[] = $data->benefit;
                            }
                            
                        }
                        
                    }
                }
                
                if($p->validity_type != 4 )
                { 
                    $val = $p->validity." ".$validity_type; 
                }else{
                    $val = $validity_type;
                }
                
                $result[] = array(
                                    'id' => $p->id,    
                                    'plan_name' => $p->plan_name,
                                    'price' => $p->price,
                                    'validity' => $val,
                                    'benefits' => implode(",",$benefits),
                                    'description' => $p->description,
                                    'status' => $p->status
                );    
            }
        }
        
        //print_r($result);die;
        return DataTables::of($result)->addIndexColumn()->make(true);
    }

    /**
    * Author Ganesh 
    * View Of Create Subscription Plan Form
    * Route : subscriptionplan/create
    *Created at :- 29-06-2022
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function create(SubscriptionBenefit $benefits)
    {
        //echo $benefits;
        $benefits = $benefits->pluck('benefit','id');
        //echo $benefits;
    
        return view("admin.subscription_plan.create_subscription",compact('benefits'));
    }

   /**
    * Author Ganesh 
    * Create subscription plan
    * Route : createsubscriptionplan
    *Created at :- 01-07-2022
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function store(Request $request, SubscriptionPlan $subscriptionplan)
    {
        $this->validate($request, [
            'plan_name' => ['required', 'string'],
            'price' => ['required'],
            'validity_number' => ['required'],
            'validity_type' => ['required'],
            'benefits' => ['required'],
            'description' => ['required']
        ]);

        $benefits = implode(",",$request->benefits);

        

        /**Author kalyani
         * code for plan creation on stripe
         */
        // To create plan on stripe
         \Stripe\Stripe::setApikey(env('STRIPE_SECRET'));

         if($request->input('validity_type')==1)
         {
            $interval='day';
         }

         if($request->input('validity_type')==2)
         {
            $interval='month';
         }

         if($request->input('validity_type')==3)
         {
            $interval='year';
         }

         if($request->input('validity_type')==4)
         {
            $interval='lifetime';
         }

         //echo $request->validity_number;
         $amount=$request->price*100;
            try{
                    $plan=Plan::create([
                        "amount"=>$amount,
                        "currency"=>"usd",
                        "interval"=>$interval,
                        "interval_count"=>$request->input('validity_number'),
                        "product"=>[
                            'name'=>$request->plan_name,
                        ],
                    ]);
                    //return $plan;
            }
            catch(Exception $e)
            {
                return $e->getMessage();
            }

                   
            
            
        //end code

        $subscriptionplan->plan_name = $request->input('plan_name');
        $subscriptionplan->price = $request->input('price');
        $subscriptionplan->validity = $request->input('validity_number');
        $subscriptionplan->validity_type = $request->input('validity_type');
        $subscriptionplan->description = $request->input('description');
        $subscriptionplan->benefits = $benefits;
        $subscriptionplan->plan_id=$plan->id;
        $subscriptionplan->product_id=$plan->product;
        $add = $subscriptionplan->save();


        if ($add) {
            return redirect('admins/subscriptionplan')->with("success", "Subscription plan has been created successfully");
        }
        return redirect('admins/subscriptionplan')->with("error", "Sorry, Something went wrong please try again");
    }

    /**
    * Author Ganesh 
    * get subscription plan
    * Route : subscriptionplan/{class}/edit
    *Created at :- 01-07-2022
    * Method : GET
    * @return \Illuminate\View\View
    */

    public function edit(SubscriptionPlan $subscriptionplan,SubscriptionBenefit $benefits, $id)
    {
        $data['result'] = $subscriptionplan->find($id);
        $benefits = $benefits->pluck('benefit','id');
        $data['benefits'] = $benefits;
        return view("admin.subscription_plan.edit_plan", $data);
    }

    /**
    * Author Ganesh 
    * update subscription plan
    * Route : subscriptionplan/{class}
    *Created at :- 01-07-2022
    * Method : PUT
    * @return \Illuminate\View\View
    */
    public function update(Request $request, SubscriptionPlan $subscriptionplan, $id)
    {
        $this->validate($request, [
            'plan_name' => ['required', 'string'],
            'price' => ['required'],
            'validity_number' => ['required'],
            'validity_type' => ['required'],
            'benefits' => ['required'],
            'description' => ['required']
        ]);

        $benefits = implode(",",$request->benefits);

        $subscriptionplan = $subscriptionplan->find($id);
        $subscriptionplan->plan_name = $request->input('plan_name');
        $subscriptionplan->price = $request->input('price');
        $subscriptionplan->validity = $request->input('validity_number');
        $subscriptionplan->validity_type = $request->input('validity_type');
        $subscriptionplan->description = $request->input('description');
        $subscriptionplan->benefits = $benefits;
        $isEdit = $subscriptionplan->update();

        
        /** Author:kalyani
         * Update plans on stripe
         * created at :29/07/2022
         */
        \Stripe\Stripe::setApikey(env('STRIPE_SECRET'));

        $plan_id=$subscriptionplan->plan_id;
        $product_id=$subscriptionplan->product_id;
        
        $amount=$request->input('price')*100;
        $plan=$request->input('plan_name');

        if($request->input('validity_type')==1)
         {
            $interval='day';
         }

         if($request->input('validity_type')==2)
         {
            $interval='month';
         }

         if($request->input('validity_type')==3)
         {
            $interval='year';
         }

         if($request->input('validity_type')==4)
         {
            $interval='lifetime';
         }

        try{

            \Stripe\Stripe::setApiKey(config("services.stripe.secret"));

            $stripe = new \Stripe\StripeClient(config("services.stripe.secret"));
            

            $create_new_price = $stripe->prices->create([
                'unit_amount' => $amount,
                'currency' => 'usd',
                'recurring' => ['interval' => $interval],
                'product' => $product_id,
            ]);

            if($create_new_price)
            {
                $subscriptionplan->plan_id = $create_new_price->id;
                $isEdit = $subscriptionplan->update();
            }
            else
            {
                return back()->with("error", "Sorry, Something went wrong please try again");
            }
        }
        catch(Exception $e)
        {
            return $e->getMessage();
        }
        // return $stripe_update_data;

        /**Author:kalyani
         * Code end here
         */

        if($isEdit){
            return redirect('admins/subscriptionplan')->with("success", "Subscription plan has been updated successfully.");
        }
        return redirect('admins/subscriptionplan')->with("error", "Sorry, Something went wrong please try again");
    }

    /**
    * Author Ganesh 
    * Delete subscription plan
    * Route : benefits/{class}
    * Method : DELETE
    * Created at :- 01-07-2022
    * @return \Illuminate\View\View
    */
    public function destroy(SubscriptionPlan $subscriptionplan, $id)
    {
        $response = [];

        $data = $subscriptionplan->where('id', $id)->first();
        if ($data) {
            $data->delete();
            $response['message'] = "Subscription plan has been deleted successfully.";
            $response['status'] = true;
        } else {
            $response['message'] = "Course Category does not found!";
            $response['status'] = false;
        }
        
        return response()->json($response);
    }

    /**
    * Author Ganesh 
    * update subscription plan
    * Route : subscriptionplanstatus/{class}
    *Created at :- 02-08-2022
    * Method : POST
    * @return \Illuminate\View\View
    */
    public function statusUpdate(Request $request, SubscriptionPlan $subscriptionplan, $id)
    {

        $subscriptionplan = $subscriptionplan->find($id);
        $subscriptionplan->status = $request->value;
        $isEdit = $subscriptionplan->update();

        if($isEdit){
            $responseData = array('success'=>'1','message'=>"Subscription plan status has been changed successfully.");
            return $responseData; //redirect('admins/subscriptionplan')->with("success", "Subscription plan status has been changed successfully.");
        }

        $responseData = array('success'=>'0','message'=>"Sorry, Something went wrong please try again");
        return $responseData; 
        //redirect('admins/subscriptionplan')->with("error", "Sorry, Something went wrong please try again");
    }
}