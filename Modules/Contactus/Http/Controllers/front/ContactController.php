<?php

namespace Modules\Contactus\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Modules\Contactus\Entities\Contact;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Rules\Captcha;

class ContactController extends Controller
{
    public function __construct(contact $model)
    {
        $this->middleware('permission:contact_view', ['only' => ['index', 'getDatatable']]);

        $this->moduleName = config('contactus.name');
        $this->moduleRoute = url(config('contactus.routePrefix') . '/Contactus');
        $this->moduleView = "contactus";
        $this->model = $model;

        View::share('module_name', $this->moduleName);
        View::share('module_route', $this->moduleRoute);
        View::share('module_view', $this->moduleView);
    }

    /**
    * Display a listing of the resource.
    * @return Renderable
    */
    public function index1()
    {
        return "Welcome to contactus page";
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function view()
    {
        return view('contactus::front.contact-us');
    }


    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Request $request)
    {
        $request->validate([
            'email' => 'required|email|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'question_regarding' => 'required',
            'name' => 'required|max:255',
            'message' => 'required|max:255',
            'question_file'=>'max:255',
            'g-recaptcha-response' => 'required|recaptchav3:contactus,0.5',
        ],[
            'question_regarding.required' => 'The query field is required.',
            'name.required' => 'The subject field is required.',
            'message.required' => 'The description field is required.',
            'g-recaptcha-response.recaptchav3' => 'Invalid captcha, Please try again.'
        ]);

        $input = $request->only(['name', 'email', 'question_regarding', 'message']);

        if($request->question_file != ''){
            $question_file = $request->file('question_file')->store('public/contactus/question_file');
            $input['question_file'] = $question_file;
        }

        try {
            $status = Contact::create($input);
            if ($status) {
                return redirect("/contactus")->with("success", "Thank you");
            }
            return redirect("/contactus")->with("error", "Sorry, Something went wrong please try again");
        }
        catch (\Exception $e) {
                return redirect("/contactus")->with('error', $e->getMessage());
        }
    }
}
