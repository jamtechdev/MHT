<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;
use Excel;

class UserController extends Controller
{
    public function __construct(User $model)
    {
        $this->middleware('permission:user_view', ['only' => ['index', 'getDatatable']]);
        $this->middleware('permission:user_add', ['only' => ['create', 'store']]);
        $this->middleware('permission:user_edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:user_delete', ['only' => ['destroy']]);

        $this->moduleName = "Students";
        $this->moduleRoute = url(config('settings.ADMIN_PREFIX') . 'users');
        $this->moduleView = "users";
        $this->model = $model;

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
        return view("admin.$this->moduleView.index");
    }

    public function getDatatable(Request $request)
    {
        $result = $this->model->select(
            'id',
            'name',
            'firstname',
            'lastname',
            'email',
            'phone',
            'is_block',
            'request_type',
            'created_at',
            'email_verified_at'
        );
        // Filter User Type
        if ($request->has('filterAllValue')){
            $filterAllValue = $request->get('filterAllValue', '');
            if ($filterAllValue == 'all'){
                $result = $this->model->all();
            }
        }

        if ($request->has('filterStatusValue')){
            $filterStatusValue = $request->get('filterStatusValue', '');
            if ($filterStatusValue == "unblock") {
                $result = $this->model->where("is_block", "=", "0");
            } else if ($filterStatusValue == "block") {
                $result = $this->model->where("is_block", "=", "1");
            }
        }

        if ($request->has('filterRequestValue')) {
            $filterRequestValue = $request->get('filterRequestValue', '');
            if ($filterRequestValue == "free") {
                $result = $this->model->where("request_type", "=", "free");
            } else if ($filterRequestValue == "paid"){
                $result = $this->model->where("request_type", ['normal', 'register', 'register499']);
            }
        }

        if ($request->has('filterIsVerifiedValue')) {
            $filterIsVerifiedValue = $request->get('filterIsVerifiedValue', '');
            if ($filterIsVerifiedValue == "verified") {
                $result = $this->model->whereNotNull("email_verified_at");
            } else if ($filterIsVerifiedValue == "pending") {
                $result = $this->model->whereNull("email_verified_at");
            }
        }

        if ($request->has('filterStatusValue') && $request->has('filterRequestValue')) {
            $filterStatusValue = $request->get('filterStatusValue', '');
            $filterRequestValue = $request->get('filterRequestValue', '');
            if($filterStatusValue == "unblock" && $filterRequestValue == "free"){
                $result = $this->model->where("is_block", "=", "0")->where("request_type", "=", "free");
            } else if ($filterStatusValue == "unblock" && $filterRequestValue == "paid"){
                $result = $this->model->where("is_block", "=", "0")->where("request_type", ['normal', 'register', 'register499']);
            } else if($filterStatusValue == "block" && $filterRequestValue == "free"){
                $result = $this->model->where("is_block", "=", "1")->where("request_type", "=", "free");
            } else if ($filterStatusValue == "block" && $filterRequestValue == "paid"){
                $result = $this->model->where("is_block", "=", "1")->where("request_type", ['normal', 'register', 'register499']);
            }
        }

        if ($request->has('filterStatusValue') && $request->has('filterIsVerifiedValue')){
            $filterStatusValue = $request->get('filterStatusValue', '');
            $filterIsVerifiedValue = $request->get('filterIsVerifiedValue', '');
            if ($filterStatusValue == "unblock" && $filterIsVerifiedValue == "verified") {
                $result = $this->model->where("is_block", "=", "0")->whereNotNull("email_verified_at");
            } else if ($filterStatusValue == "unblock" && $filterIsVerifiedValue == "pending"){
                $result = $this->model->where("is_block", "=", "0")->whereNull("email_verified_at");
            } else if ($filterStatusValue == "block" && $filterIsVerifiedValue == "verified") {
                $result = $this->model->where("is_block", "=", "1")->whereNotNull("email_verified_at");
            } else if ($filterStatusValue == "block" && $filterIsVerifiedValue == "pending"){
                $result = $this->model->where("is_block", "=", "1")->whereNull("email_verified_at");
            }
        }

        if ($request->has('filterRequestValue') && $request->has('filterIsVerifiedValue')){
            $filterRequestValue = $request->get('filterRequestValue', '');
            $filterIsVerifiedValue = $request->get('filterIsVerifiedValue', '');
            if($filterRequestValue == "free" && $filterIsVerifiedValue == "verified"){
                $result = $this->model->where("request_type", "=", "free")->whereNotNull("email_verified_at");
            } else if ($filterRequestValue == "paid" && $filterIsVerifiedValue == "verified"){
                $result = $this->model->where("request_type", ['normal', 'register', 'register499'])->whereNotNull("email_verified_at");
            } else if ($filterRequestValue == "free" && $filterIsVerifiedValue == "pending"){
                $result = $this->model->where("request_type", "=", "free")->whereNull("email_verified_at");
            } else if ($filterRequestValue == "paid" && $filterIsVerifiedValue == "pending"){
                $result = $this->model->where("request_type", ['normal', 'register', 'register499'])->whereNull("email_verified_at");
            }
        }

        if ($request->has('filterStatusValue') && $request->has('filterRequestValue') && $request->has('filterIsVerifiedValue')) {
            $filterStatusValue = $request->get('filterStatusValue', '');
            $filterRequestValue = $request->get('filterRequestValue', '');
            $filterIsVerifiedValue = $request->get('filterIsVerifiedValue', '');
            if ( $filterStatusValue == "unblock" && $filterRequestValue == "free" && $filterIsVerifiedValue == "verified") {
                $result = $this->model->where("is_block", "=", "0")->where("request_type", "=", "free")->whereNotNull("email_verified_at");
            } else if ( $filterStatusValue == "unblock" && $filterRequestValue == "paid" && $filterIsVerifiedValue == "verified") {
                $result = $this->model->where("is_block", "=", "0")->where("request_type", ['normal', 'register', 'register499'])->whereNotNull("email_verified_at");
            } else if ( $filterStatusValue == "unblock" && $filterRequestValue == "free" && $filterIsVerifiedValue == "pending") {
                $result = $this->model->where("is_block", "=", "0")->where("request_type", "=", "free")->whereNull("email_verified_at");
            } else if ( $filterStatusValue == "unblock" && $filterRequestValue == "paid" && $filterIsVerifiedValue == "pending") {
                $result = $this->model->where("is_block", "=", "1")->where("request_type", ['normal', 'register', 'register499'])->whereNull("email_verified_at");
            } else if ( $filterStatusValue == "block" && $filterRequestValue == "free" && $filterIsVerifiedValue == "verified") {
                $result = $this->model->where("is_block", "=", "1")->where("request_type", "=", "free")->whereNotNull("email_verified_at");
            } else if ( $filterStatusValue == "block" && $filterRequestValue == "paid" && $filterIsVerifiedValue == "verified") {
                $result = $this->model->where("is_block", "=", "1")->where("request_type", ['normal', 'register', 'register499'])->whereNotNull("email_verified_at");
            } else if ( $filterStatusValue == "block" && $filterRequestValue == "free" && $filterIsVerifiedValue == "pending") {
                $result = $this->model->where("is_block", "=", "1")->where("request_type", "=", "free")->whereNull("email_verified_at");
            } else if ( $filterStatusValue == "block" && $filterRequestValue == "paid" && $filterIsVerifiedValue == "pending") {
                $result = $this->model->where("is_block", "=", "1")->where("request_type", ['normal', 'register', 'register499'])->whereNull("email_verified_at");
            }
        }

        return DataTables::of($result)->make(true);
    }

    /**
     * block/unblock user from action.
     * Route Name : getusertype
     * Route : users/{id}/{type}
     * @return \Illuminate\Http\Response
     */
    public function getUserStatus(Request $request, $id, $type)
    {
        $status = $this->model->find($id);
        if ($type == 1) {
            $status->is_block = 0;
        } else {
            $status->is_block = 1;
        }
        $status->save();
        $request->session()->flash("massege", "Status updated successfuly");
        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.general.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'firstname' => ['required', 'string', 'max:100'],
            'lastname' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', 'max:12'],
            'age_group' => ['required'],
            'gender' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'profile_picture' => ['required', 'max:500', 'mimes:jpg, jpeg, png']

        ]);
        $profile_picture = $request->file('profile_picture')->store('public/student/profile_picture');
        $input = $request->only(['firstname', 'lastname', 'email', 'phone', 'age_group', 'gender']);
        $input['password'] = Hash::make($request->password);
        $input['name'] = $request->firstname . ' ' . $request->lastname;
        $input['profile_picture'] = $profile_picture;
        try {
            $status = $this->model->create($input);
            if ($status) {
                return redirect($this->moduleRoute)->with("success", $this->moduleName . " Created Successfully");
            }
            return redirect($this->moduleRoute)->with("error", "Sorry, Something went wrong please try again");
        } catch (\Exception $e) {
            return redirect($this->moduleRoute)->with('error', $e->getMessage());
        }
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
        $data['result'] = $this->model->where('id', $id)->first();
        return view("admin.general.edit", $data);
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
        $this->validate($request, [
            'firstname' => ['required', 'string', 'max:100'],
            'lastname' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id],
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', 'max:12'],
            'age_group' => ['required'],
            'gender' => ['required'],
            'profile_picture' => ['required', 'max:500', 'mimes:jpg, jpeg, png']
        ]);

        $user = $this->model->where('id', $id)->first();

        $profile_picture = $request->file('profile_picture')->store('public/student/profile_picture');

        if (Storage::exists($user->profile_picture)) {
            Storage::delete($user->profile_picture);
        }
        $input = $request->only(['firstname', 'lastname', 'email', 'phone', 'age_group', 'gender']);
        $input['name'] = $request->firstname . ' ' . $request->lastname;
        $input['profile_picture'] = $profile_picture;

        if ($user) {
            $status = $user->update($input);
            if ($status) {
                return redirect($this->moduleRoute)->with("success", $this->moduleName . " Updated Successfully");
            }
        }
        return redirect($this->moduleRoute)->with("error", "Sorry, Something went wrong please try again");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = [];
        $data = $this->model->where('id', $id)->first();
        if ($data) {
            $data->delete();
            if (Storage::exists($data->profile_picture)) {
                Storage::delete($data->profile_picture);
            }
            $response['message'] = $this->moduleName . " Deleted.";
            $response['status'] = true;
        } else {
            $response['message'] = $this->moduleName . " not Found!";
            $response['status'] = false;
        }
        return response()->json($response);
    }

    /**
    * User Export to Excel
    * Route : users/export
    * Route Name : admin.users.export
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function exportUsers() {
        $filename = "Users-".time().".xlsx";
        return Excel::download(new UsersExport, $filename);
    }
}
