<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Instructor;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;

class InstructorController extends Controller
{
    /**
    * Class Category datatable
    * Route Name : instructor
    * Route : instructor
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function index()
    {
        return view("admin.instructor.index");
    }

    /**
    * Get database in datatable
    * Route : instructor/datatable
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function getDatatable(Instructor $instructor)
    {
       
        $result = $instructor->all();

        return DataTables::of($result)->editColumn('created_at', function ($request) {
            return $request->created_at->format('Y-m-d H:i:s');
        })->make(true);
    }

    /**
    * showinfo of instuctor
    * Route Name: instructorinfo
    * Route : instructor/{id}/{type}
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function showinfo(Instructor $instructor, $id)
    {
        $data['result'] = $instructor->where('id', $id)->first();
        return view("admin.instructor.instructorinfo", $data);
    }

    /**
    * is_approved status for instuctor
    * Route : instructor/{id}/{type}
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function status(Request $request,$id, $type)
    {
        $instructorData = Instructor::find($request->id);
        if ($type == 1) {
            $instructorData->is_approved = 0;
        } else {
            $instructorData->is_approved = 1;

            if(!$instructorData->wistia_project_id) {
                // Create Project In Wistia
                $wistiaProjectId = createWistiaProject($instructorData->name);
                $instructorData->wistia_project_id = $wistiaProjectId;
            }
        }
        $response = [];
        if($instructorData){
            $instructorData->save();
            $response['message'] = "Status has been updated successfully.";
            $response['status'] = true;
        } else {
            $response['message'] = "Something went wrong, please try again later.";
            $response['status'] = false;
        }
        return response()->json($response);
    }
}