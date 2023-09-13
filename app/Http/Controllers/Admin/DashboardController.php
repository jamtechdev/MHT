<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\User;
use App\Models\Instructor;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->moduleName = "Dashboard";
        $this->moduleRoute = url(config('settings.ADMIN_PREFIX') . 'dashboard');
        $this->moduleView = "dashboard";
        // $this->model = $model;

        View::share('module_name', $this->moduleName);
        View::share('module_route', $this->moduleRoute);
        View::share('module_view', $this->moduleView);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statisticsData = [];
        $statisticsData['totalStudent'] = User::count();
        $statisticsData['totalFreeStudent'] = User::where('request_type', '=', 'Free')->count();
        $statisticsData['totalPaidStudent'] = User::whereIn('request_type', ['normal', 'register', 'register499'])->count();
        $statisticsData['totalVerifiedStudent'] = User::whereNotNull('email_verified_at')->count();
        $statisticsData['totalPendingStudent'] = User::whereNull("email_verified_at")->count();
        $statisticsData['totalInstructor'] = Instructor::count();
        return view("admin.$this->moduleView.index", compact('statisticsData'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
