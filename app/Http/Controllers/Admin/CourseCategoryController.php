<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseCategory;
use App\Models\InstructorCourse;
use Yajra\DataTables\DataTables;

class CourseCategoryController extends Controller
{
    /**
    * Class Category datatable
    * Route Name : classcategory
    * Route : classcategory
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function index()
    {
        return view("admin.course_category.index");
    }

    /**
    * Get database in datatable
    * Route : classcategory/datatable
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function getDatatable(CourseCategory $coursecategory)
    {
        $result = $coursecategory->all();
        if($result) {
            foreach ($result as $rs) {
                if($rs->id) {
                    if(InstructorCourse::where('course_category_id', '=', $rs->id)->count()) {
                        $rs->isDeleted = 0;
                    } else {
                        $rs->isDeleted = 1;
                    }
                }
            }
        }
        return DataTables::of($result)->addIndexColumn()->make(true);
    }

    /**
    * View Of Create Class Category Form
    * Route Name : createclasscategory
    * Route : classcategory/datatable
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function create()
    {
        return view("admin.course_category.create_coursecategory");
    }

    /**
    * Add Class Category in database
    * Route : classcategory
    * Method : POST
    * @return \Illuminate\View\View
    */
    public function store(Request $request, CourseCategory $coursecategory)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:100', 'unique:course_categories,name,NULL,id,deleted_at,NULL'],
            'description' => ['required']
        ]);

        $input = $request->only(['name', 'description']);
        $add = $coursecategory->create($input);

        if ($add) {
            return redirect('admins/coursecategory')->with("success", "Course Category has been created successfully");
        }
        return redirect('admins/coursecategory')->with("error", "Sorry, Something went wrong please try again");
    }

    /**
    * View Of Edit Class Category Form
    * Route Name : editclasscategory
    * Route : classcategory/{class}/edit
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function edit(CourseCategory $coursecategory, $id)
    {
        $data['result'] = $coursecategory->find($id);
        return view("admin.course_category.edit_coursecategory", $data);
    }

    /**
    * Update Class Category in database
    * Route : classcategory/{class}
    * Method : PUT
    * @return \Illuminate\View\View
    */
    public function update(Request $request, CourseCategory $coursecategory, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:100', 'unique:course_categories,name,'.$id.',id,deleted_at,NULL'],
            'description' => ['required']
        ]);

        $input = $request->only(['name', 'description']);

        $editClass = $coursecategory->where('id', $id)->first();
        if($editClass)
        {
            $isEdit = $editClass->update($input);
            if($isEdit){
                return redirect('admins/coursecategory')->with("success", "Course Category has been updated successfully.");
            }
        }
        return redirect('admins/coursecategory')->with("error", "Sorry, Something went wrong please try again");
    }

     /**
    * Delete Class Category
    * Route Name : deleteclasscategory
    * Route : classcategory/{class}
    * Method : DELETE
    * @return \Illuminate\View\View
    */
    public function destroy(CourseCategory $coursecategory, $id)
    {
        $response = [];
        if(InstructorCourse::where('course_category_id', '=', $id)->count()) {
            $response['message'] = "You can't delete this course category";
            $response['status'] = false;
        } else {
            $data = $coursecategory->where('id', $id)->first();
            if ($data) {
                $data->delete();
                $response['message'] = "Course Category has been deleted successfully.";
                $response['status'] = true;
            } else {
                $response['message'] = "Course Category does not found!";
                $response['status'] = false;
            }
        }
        return response()->json($response);
    }
}