<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseCategory;
use App\Models\SubCourseCategories;
use App\Models\InstructorCourse;
use Yajra\DataTables\DataTables;

class SubCourseCategoryController extends Controller
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
        return view("admin.sub_course_category.index");
    }

    /**
    * Get database in datatable
    * Route : classcategory/datatable
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function getDatatable(SubCourseCategories $subcoursecategory)
    {
        $subcategories = $subcoursecategory->all();

        if($subcategories) {
            foreach ($subcategories as $rs) {
                
                    $main_category = CourseCategory::where('id', $rs->main_category_id)->first();
                    
                    $result[] = array(
                        'id'=>$rs->id,
                        'main_category'=>$main_category->name,
                        'sub_category_name'=>$rs->sub_category_name
                    ); 
                    
                
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
    public function create(CourseCategory $categories)
    {
        $courseCategories = $categories->pluck('name','id');
        return view("admin.sub_course_category.create_subcoursecategory",compact('courseCategories'));
    }

    /**
    * Add Class Category in database
    * Route : classcategory
    * Method : POST
    * @return \Illuminate\View\View
    */
    public function store(Request $request, SubCourseCategories $subcoursecategory)
    {
        $this->validate($request, [
            'sub_category_name' => ['required', 'string', 'max:100', 'unique:sub_course_categories,sub_category_name,NULL,id,deleted_at,NULL'],
            'main_category_id' => ['required']
        ]);

        $input = $request->only(['main_category_id', 'sub_category_name']);
        $add = $subcoursecategory->create($input);

        if ($add) {
            return redirect('admins/coursesubcategory')->with("success", "Sub Course Category has been created successfully");
        }
        return redirect('admins/coursesubcategory')->with("error", "Sorry, Something went wrong please try again");
    }

    /**
    * View Of Edit Class Category Form
    * Route Name : editclasscategory
    * Route : classcategory/{class}/edit
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function edit(CourseCategory $categories,SubCourseCategories $subcoursecategory, $id)
    {
        $data['courseCategories'] = $categories->pluck('name','id');
        $data['result'] = $subcoursecategory->find($id);
        return view("admin.sub_course_category.edit_subcoursecategory", $data);
    }

    /**
    * Update Class Category in database
    * Route : classcategory/{class}
    * Method : PUT
    * @return \Illuminate\View\View
    */
    public function update(Request $request, SubCourseCategories $subcoursecategory, $id)
    {
        $this->validate($request, [
            'sub_category_name' => ['required', 'string', 'max:100', 'unique:sub_course_categories,sub_category_name,NULL,id,deleted_at,NULL'],
            'main_category_id' => ['required']
        ]);

        $input = $request->only(['main_category_id', 'sub_category_name']);

        $editClass = $subcoursecategory->where('id', $id)->first();
        if($editClass)
        {
            $isEdit = $editClass->update($input);
            if($isEdit){
                return redirect('admins/coursesubcategory')->with("success", "Sub Course Category has been updated successfully.");
            }
        }

        return redirect('admins/coursesubcategory')->with("error", "Sorry, Something went wrong please try again");
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