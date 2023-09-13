<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseCategory;
use App\Models\InstructorCourse;
use App\Models\Promocode;
use Yajra\DataTables\DataTables;

class PromocodeController extends Controller
{
    /**
    * Author Ganesh
    * View Of Promocode Index Page
    * Route : promocode
    * Method : GET
    *Created at :- 02-07-2022
    * @return \Illuminate\View\View
    */
    public function index()
    {
        return view("admin.promocode.index");
    }

    /**
    * Author Ganesh 
    * Get Promocodes
    * Route : promocode/datatable
    *Created at :- 02-07-2022
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function getDatatable(Promocode $promocode)
    {
        $result = $promocode->all();

        return DataTables::of($result)->addIndexColumn()->make(true);
    }

    /**
    * Author Ganesh 
    * View Of Create Promocode Form
    * Route : promocode/create
    *Created at :- 02-07-2022
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function create()
    {
        return view("admin.promocode.create_promocode");
    }

   /**
    * Author Ganesh 
    * Create promocode
    * Route : createsubscriptionplan
    *Created at :- 02-07-2022
    * Method : POST
    * @return \Illuminate\View\View
    */
    public function store(Request $request, Promocode $promocode)
    {
        $this->validate($request, [
            'promocode' => ['required'],
            'price_type' => ['required'],
            'value' => ['required'],
        ]);


        \Stripe\Stripe::setApiKey(config("services.stripe.secret"));

        $stripe = new \Stripe\StripeClient(config("services.stripe.secret"));

        if($request->input('price_type') == 1)
        {
            $result = $stripe->coupons->create([
                'name'=> $request->input('promocode'),   
                'percent_off' => $request->input('value'),
                'duration' => 'once'
                ]);
        }
        else
        {
            $result = $stripe->coupons->create([
                'name'=> $request->input('promocode'),   
                'amount_off' => $request->input('value') *  100,
                'duration' => 'once',
                'currency' => 'USD'
                ]);
        }
        
        if($result)
        {
            $promocode->promocode = $request->input('promocode');
            $promocode->price_type = $request->input('price_type');
            $promocode->value = $request->input('value');
            $promocode->promocode_id = $result->id;
            $add = $promocode->save();
    
            if ($add) {
                return redirect('admins/promocode')->with("success", "Promocode has been created successfully");
            }
        }
        else
        {
            return redirect('admins/promocode')->with("error", "Sorry, Something went wrong please try again");
        }
    }

    /**
    * Author Ganesh 
    * get promocode
    * Route : promocode/{class}/edit
    *Created at :- 02-07-2022
    * Method : GET
    * @return \Illuminate\View\View
    */

    public function edit(Promocode $promocode, $id)
    {
        $data['result'] = $promocode->find($id);
        return view("admin.promocode.edit_promocode", $data);
    }

    /**
    * Author Ganesh 
    * update promocode
    * Route : promocode/{class}
    *Created at :- 02-07-2022
    * Method : PUT
    * @return \Illuminate\View\View
    */
    public function update(Request $request, Promocode $promocode, $id)
    {
        $this->validate($request, [
            'promocode' => ['required'],
            'value' => ['required'],
        ]);

        $promocode = $promocode->find($id);

        \Stripe\Stripe::setApiKey(config("services.stripe.secret"));

        $stripe = new \Stripe\StripeClient(config("services.stripe.secret"));
        

            $result = $stripe->coupons->update(
                $promocode->promocode_id,
                [
                    'name'=> $request->input('promocode'),   
                ]);

        if($result)
        {
            $promocode->promocode = $request->input('promocode');
            $promocode->value = $request->input('value');
            $isEdit = $promocode->update();

            if($isEdit){
                return redirect('admins/promocode')->with("success", "Promocode has been updated successfully.");
            }
        }
        else
        {
            return redirect('admins/promocode')->with("error", "Sorry, Something went wrong please try again");
        }
    }

    /**
    * Author Ganesh 
    * Delete promocode
    * Route : promocode/{class}
    * Method : DELETE
    * Created at :- 02-07-2022
    * @return \Illuminate\View\View
    */
    public function destroy(Promocode $promocode, $id)
    {
        $response = [];

        $data = $promocode->where('id', $id)->first();
        if ($data) {

            \Stripe\Stripe::setApiKey(config("services.stripe.secret"));

            $stripe = new \Stripe\StripeClient(config("services.stripe.secret"));

            $result = $stripe->coupons->delete($data->promocode_id, []);
            
            if($result)
            {
                $data->delete();
                $response['message'] = "Promocode has been deleted successfully.";
                $response['status'] = true;
            }
            else {
                $response['message'] = "Something went wrong";
                $response['status'] = false;
            }

        
        } else {
            $response['message'] = "Promocode does not found!";
            $response['status'] = false;
        }
        
        return response()->json($response);
    }
}