<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubscriptionBenefit;
use App\Models\InstructorCourse;
use Yajra\DataTables\DataTables;

class SubscriptionBenefitsController extends Controller
{
    /**
    * Author Ganesh
    * View Of Subscription Benefits Index Page
    * Route : subscriptionbenefits
    * Method : GET
    *Created at :- 30-06-2022
    * @return \Illuminate\View\View
    */
    public function index()
    {
        return view("admin.subscription_benefits.index");
    }

    /**
    * Author Ganesh  
    * Get benefits from data
    * Route : classcategory/datatable
    * Method : GET
    */
    public function getDatatable(SubscriptionBenefit $benefits)
    {
        $result = $benefits->all();

        return DataTables::of($result)->addIndexColumn()->make(true);
    }

    /**
    * Author Ganesh 
    * View Of Create Subscription Benefits Form
    * Route : subscriptionplan/create
    *Created at :- 30-06-2022
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function create()
    {
        return view("admin.subscription_benefits.create_subscription_benefits");
    }

    /**
    * Author Ganesh 
    * Add  subscription benefit in database
    * Route : subscriptionbenefit
    * Method : POST
    * Created at :- 30-06-2022
    * @return \Illuminate\View\View
    */
    public function store(Request $request,SubscriptionBenefit $createbenefit)
    {
        $this->validate($request, [
            'benefit' => ['required'],
        ]);

        $input = $request->only(['benefit']);
        $add = $createbenefit->create($input);

        if ($add) {
            return redirect('admins/subscriptionbenefits')->with("success", "Benefit has been created successfully");
        }
        return redirect('admins/subscriptionbenefits')->with("error", "Sorry, Something went wrong please try again");
    }

    /**
    * View Of Edit Benefit
    * Route : benefits/{class}/edit
    * Method : GET
    * Created at :- 30-06-2022
    * @return \Illuminate\View\View
    */
    public function edit(SubscriptionBenefit $benefits, $id)
    {
        $data['result'] = $benefits->find($id);
        return view("admin.subscription_benefits.edit_benefit", $data);
    }

    /**
    * Author Ganesh 
    * Update benefit database
    * Route : benefits/{class}
    * Method : PUT
    * Created at :- 30-06-2022
    * @return \Illuminate\View\View
    */
    public function update(Request $request, SubscriptionBenefit $benefits, $id)
    {
        $this->validate($request, [
            'benefit' => ['required'],
        ]);

        $input = $request->only(['benefit']);

        $editClass = $benefits->where('id', $id)->first();
        if($editClass)
        {
            $isEdit = $editClass->update($input);
            if($isEdit){
                return redirect('admins/subscriptionbenefits')->with("success", "Benefit has been updated successfully.");
            }
        }
        return redirect('admins/subscriptionbenefits')->with("error", "Sorry, Something went wrong please try again");
    }

    /**
    * Author Ganesh 
    * Delete benefit database
    * Route : deletebenefits
    * Method : DELETE
    * Created at :- 30-06-2022
    * @return \Illuminate\View\View
    */
    public function destroy(SubscriptionBenefit $benefits, $id)
    {
        $response = [];

        $data = $benefits->where('id', $id)->first();
        if ($data) {
            $data->delete();
            $response['message'] = "Benefit has been deleted successfully.";
            $response['status'] = true;
        } else {
            $response['message'] = "Benefit does not found!";
            $response['status'] = false;
        }
        
        return response()->json($response);
    }
}