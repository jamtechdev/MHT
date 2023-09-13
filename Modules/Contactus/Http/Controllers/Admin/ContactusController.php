<?php

namespace Modules\Contactus\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Modules\Contactus\Entities\Contact;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ContactusController extends Controller
{
    public function __construct(contact $model)
    {
        $this->middleware('permission:contact_view', ['only' => ['index', 'getDatatable']]);
        $this->middleware('permission:contact_add', ['only' => ['create', 'store']]);
        $this->middleware('permission:contact_edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:contact_delete', ['only' => ['destroy']]);

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
    public function index()
    {
        return view('contactus::admin.index');
    }

    public function getDatatable(Request $request)
    {
        $data = Contact::get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->make(true);
    }
    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('contactus::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('contactus::edit');
    }


    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }

    // public function contact()
    // {
    //     return view('front.contact-us');
    // }
}
