<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use App\Models\Discipline;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class DisciplineController extends Controller
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
        return view("admin.discipline.index");
    }

    /**
     * Get database in datatable
     * Route : instructor/datatable
     * Method : GET
     * @return \Illuminate\View\View
     */
    public function getDatatable(Discipline $discipline)
    {
        $result = $discipline->all();
        return DataTables::of($result)->addIndexColumn()->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.discipline.create_discipline");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Discipline $discipline)
    {
        $this->validate($request, [
            'title' => ['required', 'string', 'max:100', 'unique:disciplines,title,NULL,id,deleted_at,NULL'],
            'description' => ['required', 'string', 'max:500'],
        ]);

        try {
            //upload image
            $input = $request->only(['title', 'description']);
            //store discipline
            $status = $discipline->create($input);
            if ($status) {
                return redirect('admins/discipline')->with("success", "Discipline has been created successfully.");
            }
            return redirect('admins/discipline')->with("error", "Sorry, Something went wrong please try again");
        } catch (\Exception $e) {
            return redirect('admins/discipline')->with('error', $e->getMessage());
        }
    }

    public function edit(Discipline $discipline, $id)
    {
        $data['result'] = $discipline->find($id);
        return view("admin.discipline.edit_discipline", $data);
    }

    public function update(Request $request, Discipline $discipline, $id)
    {
        $this->validate($request, [
            'title' => ['required', 'string', 'max:100', 'unique:disciplines,title,' . $id . ',id,deleted_at,NULL'],
            'description' => ['required', 'string', 'max:500'],
        ]);

            $editDiscipline = $discipline->where('id', $id)->first();

            $input = $request->only(['title', 'description']);
            if ($editDiscipline) {
                $isEdit = $editDiscipline->update($input);
                if ($isEdit) {
                    return redirect('admins/discipline')->with("success", "Discipline has been updated successfully.");
                }
            }
            return redirect('admins/discipline')->with("error", "Sorry, Something went wrong please try again");
    }

    public function delete($id, Discipline $discipline)
    {
        $response = [];
        $dis_delete = $discipline->where('id', $id)->first();
        if ($dis_delete) {
            $dis_delete->delete();
            $response['message'] = "Discipline has been deleted successfully.";
            $response['status'] = true;
        } else {
            $response['message'] = "Discipline does not found!";
            $response['status'] = false;
        }
        return response()->json($response);
    }

    public function uploadphoto(Request $request ,discipline $discipline)
    {
        $validator = Validator::make($request->all(), array(
            'discipline_logo' => 'required|mimes:jpg,jpeg,png,bmp',
            'discipline_id' => 'required'
        ), [
            "discipline_logo.mimes" => "Invalid image file, please upload file with file type (.gif, .jpeg, .png, .jpg, .bmp) only",
            'discipline_logo.required' => 'File is required. Please Select file first'
        ]);

        if ($validator->fails()) {
            $message = $validator->errors()->first();
            return response()->json(['status' => false, 'message' => $message]);
        }
        $id = $request->discipline_id;
        $updatephoto = $discipline->where('id', $id)->first();
        if (empty($updatephoto)) {
            return response()->json([
                'status' => false,
                'message' => 'You have to select some file first then try again'
            ]);
        }

        $fullFileName = $request->file('discipline_logo')->getClientOriginalName();
        $extension = $request->file('discipline_logo')->extension();
        $fileName = File::name($fullFileName);
        $fileName = $id."-discipline-" . time() . ".{$extension}";
        $storagePath = "discipline";
        $path = $request->file('discipline_logo')->storeAs($storagePath, $fileName, 's3');

        $awsUrl = Storage::disk('s3')->url($path);

        if (!empty($updatephoto->photo)) {
            $deletePath = parse_url($updatephoto->discipline_logo)['path'];
            Storage::disk('s3')->delete($deletePath);
        }

        $updatephoto->photo = $awsUrl;
        $updatephoto->save();

        return response()->json([
            'status' => true,
            'message' => 'Your Image uploaded successfully',
            'file_url' => $awsUrl
        ]);

    }
}
