<?php

namespace App\Http\Controllers\Admin;

use App\Models\AllTabPassword;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AllTabPasswordController extends Controller
{
    public function index(){
        $tab_password = AllTabPassword::first();
        return view('admin.all_tab_password.index',compact('tab_password'));
    }
    
    public function updatePassword(Request $request){
        
        $request->validate([
            'username' => 'required',
            'password' => 'nullable|min:8',
        ]);

        // dd($request->all());
        if(isset($request->id) and !empty($request->id)){
            $tab_password = AllTabPassword::find($request->id);
            $message = 'All Tab Password updated successfully';
        }
        else{
            $tab_password = new AllTabPassword;
            $message = 'All Tab Password created successfully';
        }

        $tab_password->username = $request->username;
        if($request->password){
            $tab_password->password = Hash::make($request->password);
        }
        $result = $tab_password->save();
        
        if($result){
            return redirect()->back()->with('success', $message);
        }
        else{
            return redirect()->back()->with('error', 'Something went wrong, Please try again');
        }

    }

}
