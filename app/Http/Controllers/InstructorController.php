<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\Instructor;
use App\Models\InstructorPasswordReset;
use App\Models\InstructorCourse;
use App\Models\InstructorCourseLession;
use App\Models\InstructorBiographyVideo;
use App\Models\InstructorDemonstrationVideos;
use App\Models\InstructorRecommendedVideos;
use App\Models\InstructorVideos;
use App\Models\InstructorClasses;
use App\Models\ClassesVideos;
use App\Models\CourseCategory;
use App\Models\SubCourseCategories;
use App\Models\Discipline;
use App\Models\ClassVideos;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;
use Mail, Hash, Auth, Storage, Str, Config;
use Carbon\Carbon;
use DB;
use App\Http\Traits\DacastTrait;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class InstructorController extends Controller
{
    use DacastTrait;
    /**
    * Set Auth Guard
    */
    protected function guard()
    {
        return Auth::guard('instructor');
    }

    /**
    * View Instructor Login Page
    * Route Name : instructor_login
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function getInstructorLogin()
    {
        if($this->guard()->user()) {
            return redirect('instructor_dashboard')->with("success", "Welcome to ".$this->guard()->user()->name." dashboard");
        }
        return view('front.instructors.instructor_login');
    }

    /**
    * Instructor Login Process
    * Route Name : instructor_login
    * Method : POST
    * @return Instructor Dashboard
    */
    public function postInstructorLogin(Request $request)
    {
        // Validate Login
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            // 'g-recaptcha-response' => 'required|recaptchav3:instructor_login,0.5',
        ]);

        // Auth Validate
        if ($this->guard()->validate($request->only('email', 'password'))) {
            $instructor = $this->guard()->getLastAttempted();
            // if ($instructor->is_approved) {
                // Attempt Login
                if (! $this->guard()->attempt($request->only('email', 'password'), $request->boolean('remember'))) {
                    throw ValidationException::withMessages([
                        'email' => __('auth.failed'),
                    ]);
                }
                $request->session()->regenerate();
                return redirect('instructor_dashboard')->with("success", "Welcome to ".$instructor->name." dashboard");
            // } else {
            //     return redirect('instructor_login')->with("error", "You must be approved to login.");
            // }
        } else {
            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }
    }

    /**
    * Display Instructor Dashboard Page
    * Route Name : instructor_dashboard
    * Method : GET
    * @return \Illuminate\Http\Response
    */
    public function getInstructorDashboard()
    {
        return view('front.instructors.instructor_dashboard');
    }

    /**
    * Instructor Logout
    * Route Name : instructor_logout
    * Method : POST
    * @return Instructor Login Page
    */
    public function instructorLogout(Request $request)
    {
        $name = $this->guard()->user()->name;
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // return redirect('instructor_login');
        return redirect('instructor_login')->with("success", "Good Bye ".$name." Please Visit Again");
    }

    /**
    * View Register Instructor Page
    * Route Name : instructor_register
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function create()
    {
        $countries = DB::table('countries')->get();
        return view('front.instructors.instructor_register',compact('countries'));
    }

    /**
    * Store Instructor In Database
    * Route Name : instructor_register
    * Method : POST
    * @return \Illuminate\View\View
    */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:250'],
            'email' => ['required', 'string', 'email', 'max:250', 'unique:instructors'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', 'max:12'],
            'address' => ['required', 'string', 'max:250'],
            'city' => ['required', 'string', 'max:50'],
            'state' => ['required', 'string', 'max:50'],
            'zip' => ['required', 'numeric'],
            'country' => ['required', 'string', 'max:50'],
            'school_name' => ['required', 'string', 'max:250'],
            'certificate' => ['required', 'max:500'],
            // 'g-recaptcha-response' => 'required|recaptchav3:instructor_register,0.5',
        ]);

        try {
            // Upload Certificate
            $directoryName = 'localCertificates';
            if(env('APP_URL') == 'https://www.martialartszen.com/') {
                $directoryName = 'certificates';
            }
            // $certificate = $request->file('certificate')->store('public/instructors/certificates');
            $certificate = Storage::disk('s3')->put($directoryName, $request->file('certificate'));
            $certificate = Storage::disk('s3')->url($certificate);
            // Get Inputs
            $input = $request->only(['name', 'email', 'phone', 'address', 'city', 'state', 'zip', 'country', 'school_name']);
            $input['password'] = Hash::make($request->password);
            $input['certificate'] = $certificate;
            // Store Instructor In Database
            $addInstructor = Instructor::create($input);
            if ($addInstructor) {
                return redirect('instructor_register')->with("success", "Instructor Created Successfully");
            } else {
                return redirect('instructor_register')->with("error", "Sorry, Something went wrong please try again");
            }
        } catch (\Exception $e) {
            return redirect('instructor_register')->with('error', $e->getMessage());
        }
    }

    /**
    * View Edit Instructor Page
    * Route Name : instructor_edit
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function edit($id)
    {
        $instructorEditData = Instructor::where('id', '=', $id)->first();
        return view('front.instructors.instructor_edit', $instructorEditData);
    }

    /**
    * Update Instructor In Database
    * Route Name : instructor_edit
    * Method : POST
    * @return \Illuminate\View\View
    */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', 'max:12'],
            'address' => ['required', 'string', 'max:250'],
            'city' => ['required', 'string', 'max:50'],
            'state' => ['required', 'string', 'max:50'],
            'zip' => ['required', 'numeric'],
            'country' => ['required', 'string', 'max:50'],
            'school_name' => ['required', 'string', 'max:250'],
            'certificate' => ['required', 'max:500']
        ]);

        try {
            $instructor = Instructor::where('id', '=', $id)->first();
            // Upload Certificate
            // $certificate = $request->file('certificate')->store('public/instructors/certificates');
            $directoryName = 'localCertificates';
            if(env('APP_URL') == 'https://www.martialartszen.com/') {
                $directoryName = 'certificates';
            }
            $certificate = Storage::disk('s3')->put($directoryName, $request->file('certificate'));
            $certificate = Storage::disk('s3')->url($certificate);
            // Remove Old File
            // if(Storage::exists($instructor->certificate)) {
            //     Storage::delete($instructor->certificate);
            // }
            if (!empty($instructor->certificate)) {
                $deleteCertificatePath = parse_url($instructor->certificate)['path'];
                Storage::disk('s3')->delete($deleteCertificatePath);
            }
            // Get Inputs
            $input = $request->only(['phone', 'address', 'city', 'state', 'zip', 'country', 'school_name']);
            $input['certificate'] = $certificate;
            // Update Instructor In Database
            $editInstructor = $instructor->update($input);
            if ($editInstructor) {
                return redirect('instructor_login')->with("success", "Instructor Updated Successfully");
            } else {
                return redirect('instructor_login')->with("error", "Sorry, Something went wrong please try again");
            }
        } catch (\Exception $e) {
            return Redirect::back()->with('error', $e->getMessage());
        }
    }

    /**
    * View Instructor Profile Page
    * Route Name : instructor_profile
    * Route : instructor_profile/{id}
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function getInstructorProfile($id)
    {
        if($id) {
            $instructorProfileData = Instructor::where('id', '=', $id)->first();
            return view('front.instructors.instructor_profile', compact('instructorProfileData'));
        } else {
            return Redirect::back()->with('error', 'Instructor do not exists');
        }
    }

    /**
    * Get Edit Instructor Profile Page
    * Route Name : instructor_profile_edit
    * Route : instructor_profile_edit/{id}
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function getEditInstructorProfile($id)
    {
        if($id) {
            $instructorProfileData = Instructor::where('id', '=', $id)->first();
            return view('front.instructors.instructor_profile_edit', compact('instructorProfileData'));
        } else {
            return Redirect::back()->with('error', 'Instructor do not exists');
        }
    }

    /**
    * Update Instructor In Database
    * Route Name : instructor_profile_edit
    * Route : instructor_profile_edit/{id}
    * Method : POST
    * @return \Illuminate\View\View
    */
    public function updateInstructorProfile(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'max:250'],
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', 'max:12'],
            'address' => ['required', 'string', 'max:250'],
            'city' => ['required', 'string', 'max:50','regex:/^[a-zA-ZÑñ\s]+$/'],
            'state' => ['required', 'string', 'max:50','regex:/^[a-zA-ZÑñ\s]+$/'],
            'zip' => ['required', 'numeric'],
            'country' => ['required', 'string', 'max:50','regex:/^[a-zA-ZÑñ\s]+$/'],
            'school_name' => ['required', 'string', 'max:250'],
            'native_language' => ['required', 'max:250','regex:/^[a-zA-ZÑñ\s]+$/'],
            'teaching_experience' => ['required'],
            //'certificate' => ['required'],
            // 'photo' => ['max:500']
        ]);

        try {
            // Get Instructor
            $instructor = Instructor::where('id', '=', $id)->first();

            if($instructor->certificate == Null)
            {
                return back()->with("error", "Certificate is required");
            }
            

            $certificate = $photo = '';

            if($request->hasFile('certificate')) {
                //Upload Certificate
                $certificate = $request->file('certificate')->store('public/instructors/certificates');
                //Remove Old File
                if(Storage::exists($instructor->certificate)) {
                    Storage::delete($instructor->certificate);
                }
                $directoryName = 'localCertificates';
                if(env('APP_URL') == 'https://www.martialartszen.com/') {
                    $directoryName = 'certificates';
                }
                $certificate = Storage::disk('s3')->put($directoryName, $request->file('certificate'));
                $certificate = Storage::disk('s3')->url($certificate);
                // Remove Old File
                if (!empty($instructor->certificate)) {
                    $deleteCertificatePath = parse_url($instructor->certificate)['path'];
                    Storage::disk('s3')->delete($deleteCertificatePath);
                }
            }
            if($request->hasFile('photo')) {
                // Upload Photo
                $photo = $request->file('photo')->store('public/instructors/photos');
                // Remove Old Photo
                if(Storage::exists($instructor->photo)) {
                    Storage::delete($instructor->photo);
                }
            }
            // Get Inputs
            $input = $request->only(['name', 'phone', 'address', 'city', 'state', 'zip', 'country', 'school_name', 'native_language']);
            if($certificate != '') {
                $input['certificate'] = $certificate;
            }
            if($photo != '') {
                $input['photo'] = $photo;
            }
            if($request->teaching_experience != '') {
                $input['teaching_experience'] = $request->teaching_experience;
            }
            // Update Instructor In Database
            $editInstructor = $instructor->update($input);
            if ($editInstructor) {
                return redirect('instructor_dashboard')->with("success", "Profile Updated Successfully");
            } else {
                return redirect('instructor_dashboard')->with("error", "Sorry, Something went wrong please try again");
            }
        } catch (\Exception $e) {
            return Redirect::back()->with('error', $e->getMessage());
        }
    }

     /**
    * Update Instructor Certificate
    * Route Name : instructor_certificate_upload
    * Route : instructor/certificate/upload
    * Method : POST
    * @return \Illuminate\View\View
    */
    public function uploadCertificate(Request $request)
    {
        $validator = Validator::make($request->all(), array(
            'instructor_image' => 'required|mimes:jpg,jpeg,png,bmp',
            'instructor_id' => 'required'
        ), [
            "instructor_image.mimes" => "Invalid image file, please upload file with file type (.gif, .jpeg, .png, .jpg, .bmp) only",
            'instructor_image.required' => 'File is required. Please Select file first',
            'instructor_image.max' => 'The certificate must not be greater than 500 kilobytes.',
        ]);

        if ($validator->fails()) {
            $message = $validator->errors()->first();
            return response()->json(['status' => false, 'message' => $message]);
        }
        $id = $request->instructor_id;
        $updatephoto = Instructor::where('id', $id)->first();
        if (empty($updatephoto)) {
            return response()->json([
                'status' => false,
                'message' => 'You have to select some file first then try again'
            ]);
        }

        $fullFileName = $request->file('instructor_image')->getClientOriginalName();
        $extension = $request->file('instructor_image')->extension();
        $fileName = File::name($fullFileName);
        $fileName = $id."-instructor-" . time() . ".{$extension}";
        $storagePath = "InstructorCertificate";
        $path = $request->file('instructor_image')->storeAs($storagePath, $fileName, 's3');

        $awsUrl = Storage::disk('s3')->url($path);

        if (!empty($updatephoto->certificate)) {
            $deletePath = parse_url($updatephoto->certificate)['path'];
            Storage::disk('s3')->delete($deletePath);
        }

        $updatephoto->certificate = $awsUrl;
        $updatephoto->save();

        return response()->json([
            'status' => true,
            'message' => 'Certificate had been updated successfully',
            'file_url' => $awsUrl
        ]);
    }

    /**
    * Update Instructor Profile Picture
    * Route Name : instructor_profile_picture_upload
    * Route : instructor/profile_picture/upload
    * Method : POST
    * @return \Illuminate\View\View
    */
    public function uploadProfilePicture(Request $request)
    {
        // dd($request);
        $validator = Validator::make($request->all(), array(
            'instructor_image' => 'required|mimes:jpg,jpeg,png,bmp',
            'instructor_id' => 'required'
        ), [
            "instructor_image.mimes" => "Invalid image file, please upload file with file type (.gif, .jpeg, .png, .jpg, .bmp) only",
            'instructor_image.required' => 'File is required. Please Select file first',
            'instructor_image.max' => 'The Profile Picture must not be greater than 500 kilobytes.',
            'instructor_image.dimensions' => 'The Profile Picture must be 305*320',
        ]);

        // echo "<pre>";
        // print_r(getImageSize($request->file('instructor_image')));
        
        if ($validator->fails()) {
            $message = $validator->errors()->first();
            return response()->json(['status' => false, 'message' => $message]);
        }
        $id = $request->instructor_id;
        $updatephoto = Instructor::where('id', $id)->first();
        if (empty($updatephoto)) {
            return response()->json([
                'status' => false,
                'message' => 'You have to select some file first then try again'
            ]);
        }

        $fullFileName = $request->file('instructor_image')->getClientOriginalName();
        $extension = $request->file('instructor_image')->extension();
        $fileName = File::name($fullFileName);
        $fileName = $id."-instructor-" . time() . ".{$extension}";
        $storagePath = "InstructorPhoto";
        $path = $request->file('instructor_image')->storeAs($storagePath, $fileName, 's3');

        $awsUrl = Storage::disk('s3')->url($path);

        if (!empty($updatephoto->photo)) {
            $deletePath = parse_url($updatephoto->photo)['path'];
            Storage::disk('s3')->delete($deletePath);
        }

        $updatephoto->photo = $awsUrl;
        $updatephoto->save();

        return response()->json([
            'status' => true,
            'message' => 'Profile Picture had been updated successfully',
            'file_url' => $awsUrl
        ]);
    }

    /**
    * Upload Instructor Banner
    * Route Name : instructor_banner_upload
    * Route : instructor/banner/upload
    * Method : POST
    * @return \Illuminate\View\View
    */
    public function uploadBanner(Request $request)
    {
        // dd($request);
        $validator = Validator::make($request->all(), array(
            'instructor_image' => 'required|mimes:jpg,jpeg,png,bmp',
            'instructor_id' => 'required'
        ), [
            "instructor_image.mimes" => "Invalid image file, please upload file with file type (.gif, .jpeg, .png, .jpg, .bmp) only",
            'instructor_image.required' => 'File is required. Please Select file first',
            'instructor_image.max' => 'The Profile Picture must not be greater than 500 kilobytes.',
        ]);

        if ($validator->fails()) {
            $message = $validator->errors()->first();
            return response()->json(['status' => false, 'message' => $message]);
        }
        $id = $request->instructor_id;
        $uploadInstructorBanner = Instructor::where('id', $id)->first();
        if (empty($uploadInstructorBanner)) {
            return response()->json([
                'status' => false,
                'message' => 'You have to select some file first then try again'
            ]);
        }

        $fullFileName = $request->file('instructor_image')->getClientOriginalName();
        $extension = $request->file('instructor_image')->extension();
        $fileName = File::name($fullFileName);
        $fileName = $id."-instructor-" . time() . ".{$extension}";
        $storagePath = "InstructorBanner";
        $path = $request->file('instructor_image')->storeAs($storagePath, $fileName, 's3');

        $awsUrl = Storage::disk('s3')->url($path);

        if (!empty($uploadInstructorBanner->banner)) {
            $deletePath = parse_url($uploadInstructorBanner->banner)['path'];
            Storage::disk('s3')->delete($deletePath);
        }

        $uploadInstructorBanner->banner = $awsUrl;
        $uploadInstructorBanner->save();

        return response()->json([
            'status' => true,
            'message' => 'Profile Picture had been updated successfully',
            'file_url' => $awsUrl
        ]);
    }

    /**
    * View Instructor Change Password Page
    * Route Name : instructor_changepassword
    * Route : instructor_changepassword/{id}
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function getInstructorChangePassword($id)
    {
        $result = [];
        $result['id'] = $id;
        return view('front.instructors.instructor_changepassword', compact('result'));
    }

    /**
    * Update Instructor Change Password In Database
    * Route Name : instructor_changepassword
    * Route : instructor_changepassword/{id}
    * Method : POST
    * @return \Illuminate\View\View
    */
    public function updateInstructorChangePassword(Request $request, $id)
    {
        $this->validate($request, [
            'currentpassword' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        if($id) {
            $instructor = Instructor::where('id', '=', $id)->first();
            // Check Current Password Match Or Not
            if(!Hash::check($request->currentpassword, $instructor->password)) {
                return Redirect::back()->with("error", "The current password do not match.");
            }

            // Check Current Password And New Password Are Same
            if(Hash::check($request->password, $instructor->password)) {
                return Redirect::back()->with("error", "The current password and new password are should be different.");
            }

            // Update Instructor Password In Database
            $instructor->password = Hash::make($request->password);
            if ($instructor->save()) {
                $this->guard()->logout();
                return redirect('instructor_login')->with("success", "Password has been changed successfully");
            } else {
                return Redirect::back()->with("error", "Sorry, Something went wrong please try again");
            }
        } else {
            return Redirect::back()->with("error", "User do not exists");
        }
    }

    /**
    * View Instructor Forgot Password Page
    * Route Name : instructor_changepassword
    * Route : instructor_forgot_password
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function getForgotPassword()
    {
        return view('front.instructors.instructor_forgot_password');
    }

    /**
    * Send Instructor Forgot Password Link In Mail
    * Route Name : instructor_forgot_password
    * Route : instructor_forgot_password
    * Method : POST
    * @return \Illuminate\View\View
    */
    public function postForgotPassword(Request $request)
    {
        // Set Validation Rules
        $rules = [
            'email' => 'required|string|email|exists:instructors'
        ];
        // Set Custom Messages
        $customMessages = [
            'exists' => 'The :attribute does not exists.'
        ];
        // Validate Form Fields
        $request->validate($rules, $customMessages);
        // Generate Token
        $token = Str::random(64);
        if(InstructorPasswordReset::where('email', '=', $request->email)->count()) {
            // Remove Token In Database Table
            InstructorPasswordReset::where('email', '=', $request->email)->delete();
            // Store Token In Database Table
            InstructorPasswordReset::create([
                'email' => $request->email,
                'token' => $token
            ]);
        } else {
            // Store Token In Database Table
            InstructorPasswordReset::create([
                'email' => $request->email,
                'token' => $token
            ]);
        }
        // Send Reset Password Link In Mail
        $mailDetails = [
            'subject' => 'Reset Password Notification',
            'title' => 'Hello!',
            'body' => 'You are receiving this email because we received a password reset request for your account. <br/><br/>This password reset link will expire in 60 minutes. <br/><br/><a href='.url('instructor_reset_password/'.$token.'?email='.$request->email).'>Click Here To Reset Password</a> <br/><br/>If you did not request a password reset, no further action is required.'
        ];
        \Mail::to($request->email)->send(new \App\Mail\InstructorMail($mailDetails));
        // Return Response
        return back()->with('success', 'We have e-mailed your password reset link!');
    }

    /**
    * View Instructor Reset Password Page
    * Route Name : instructor_reset_password
    * Route : instructor_reset_password/{token}
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function getResetPassword(Request $request)
    {
        return view('front.instructors.instructor_reset_password', ['request' => $request]);
    }

    /**
    * Post Instructor Reset Password Page
    * Route Name : post_instructor_reset_password
    * Route : instructor_reset_password
    * Method : POST
    * @return \Illuminate\View\View
    */
    public function postResetPassword(Request $request)
    {
        // Set Validation Rules
        $rules = [
            'email' => 'required|string|email|max:250|exists:instructors',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required'
        ];
        // Set Custom Messages
        $customMessages = [
            'exists' => 'The :attribute does not exists.'
        ];
        // Validate Reset Password Fields
        $request->validate($rules, $customMessages);
        // Check Token Exist
        $updateInstructorPassword = InstructorPasswordReset::where(['email' => $request->email, 'token' => $request->token])->first();
        if($updateInstructorPassword) {
            // Check Token Expired
            if($updateInstructorPassword->created_at->diffInMinutes(Carbon::now()) < Config::get('auth.passwords.instructors.expire')) {
                // Update Password In Database
                $instructor = Instructor::where('email', $request->email)->update(['password' => Hash::make($request->password)]);
                // Remove Token In Database Table
                InstructorPasswordReset::where('email', '=', $request->email)->delete();
                return redirect('instructor_login')->with("success", "Your password has been changed!");
            } else {
                return back()->withInput()->with('error', 'Token Expired!');
            }
        } else {
            return back()->withInput()->with('error', 'Invalid token!');
        }
    }

    /**
    * View Instructor Announcement Page
    * Route Name : instructor_announcement
    * Route : instructor_announcement/{token}
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function getInstructorAnnouncement()
    {
        return view('front.instructors.instructor_announcement');
    }

     /**
    * View Instructor Announcement Page
    * Route Name : instructor_add_announcement
    * Route : instructor_announcement/{token}
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function getInstructorAddAnnouncement()
    {
        return view('front.instructors.instructor_add_announcement');
    }

    /**
    * View Instructor Announcement Page
    * Route Name : instructor_reviews
    * Route : instructor_reviews/{token}
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function getInstructorReviews(Request $request)
    {
        return view('front.instructors.instructor_reviews', ['request' => $request]);
    }

    /**
    * View Instructor Announcement Page
    * Route Name : instructor_profile_grade
    * Route : instructor_profile_grade/{token}
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function getInstructorProfileGrade(Request $request)
    {
        return view('front.instructors.instructor_profile_grade', ['request' => $request]);
    }

    /**
    * View Instructor Question & Answer Page
    * Route Name : instructor_profile_questions
    * Route : instructor_profile_questions/{token}
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function getInstructorProfileQuestions(Request $request)
    {
        return view('front.instructors.instructor_profile_questions', ['request' => $request]);
    }

    /**
    * View Instructor Add Questions Page
    * Route Name : instructor_profile_add_questions
    * Route : instructor_profile_add_questions/{token}
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function getInstructorProfileAddQuestions(Request $request)
    {
        return view('front.instructors.instructor_profile_add_questions', ['request' => $request]);
    }

    /**
    * View Instructor Announcement Page
    * Route Name : instructor_settings
    * Route : instructor_settings/{token}
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function getInstructorSettings(Request $request)
    {
        return view('front.instructors.instructor_settings', ['request' => $request]);
    }

    /**
    * View Instructor Announcement Page
    * Route Name : instructor_profile_course
    * Route : instructor_profile_course/{token}
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function getInstructorProfileCourse(Request $request)
    {
        $selType = 'All';
        if(isset($request->type) && $request->type != 'All') {
            $selType = $request->type;
        }
        $instructorCourseData = $courseCategoryData = $disciplineData = [];
        if($this->guard()->id()) {
            $disciplineData = Discipline::select('id', 'title')->get();
            $courseCategoryData = CourseCategory::select('id', 'name')->get();
            if($courseCategoryData) {
                foreach ($courseCategoryData as $categoryData) {
                    if($categoryData->id) {
                        $insData['category_name'] = $categoryData->name;
                        $insData['instructorData'] = [];
                        if(isset($request->type) && isset($request->did) && $request->type != 'All') {
                            $instructorData = InstructorCourse::leftJoin('disciplines', 'disciplines.id', '=', 'instructor_courses.discipline_id')->select("instructor_courses.*", "disciplines.photo")->where('instructor_courses.discipline_id', '=', $request->did)->where('instructor_courses.course_category_id', '=', $categoryData->id)->where('instructor_courses.instructor_id', '=', $this->guard()->id())->get();
                        } else {
                            $instructorData = InstructorCourse::leftJoin('disciplines', 'disciplines.id', '=', 'instructor_courses.discipline_id')->select("instructor_courses.*", "disciplines.photo")->where('instructor_courses.course_category_id', '=', $categoryData->id)->where('instructor_courses.instructor_id', '=', $this->guard()->id())->get();
                        }
                        if($instructorData) {
                            $insData['instructorData'] = $instructorData;
                        }
                        array_push($instructorCourseData, $insData);
                    }
                }
            }
        }
        return view('front.instructors.instructor_profile_course', ['disciplineData' => $disciplineData, 'instructorCourseData' => $instructorCourseData, 'selType' => $selType]);
    }

    /**
    * View Instructor Add Course Page
    * Route Name : instructor_add_course
    * Route : instructor_add_course
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function getInstructorAddCourse()
    {
        $courseCategoryData = CourseCategory::select('id', 'name')->get();
        $disciplineData = Discipline::select('id', 'title')->get();
        return view('front.instructors.instructor_add_course', compact('courseCategoryData', 'disciplineData'));
    }

    /**
    * Post Instructor Add Course Page
    * Route Name : instructor_add_course
    * Route : instructor_add_course
    * Method : POST
    * @return \Illuminate\View\View
    */
    public function postInstructorAddCourse(Request $request)
    {
        // Validate Add Course Fields
        $request->validate([
            'name' => 'required|max:50|unique:instructor_courses',
            'course_category_id' => 'required',
            'discipline_id' => 'required',
            'description' => 'required|max:500'
        ]);

        // Get Instructor Course Inputs
        $input = $request->only(['name', 'course_category_id', 'discipline_id', 'description']);
        $input['instructor_id'] = $this->guard()->user()->id;
        // Store Instructor Course In Database
        $addInstructorCourse = InstructorCourse::create($input);
        if($addInstructorCourse) {
            return redirect('instructor_profile_course')->with("success", "Course has been added successfully");
        } else {
            return back()->withInput()->with('error', 'Ooops... Something Went Wrong!');
        }
    }

    /**
    * View Instructor Edit Course Page
    * Route Name : instructor_add_course
    * Route : instructor_add_course/{courseId}
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function getInstructorEditCourse($courseId)
    {
        $courseCategoryData = CourseCategory::select('id', 'name')->get();
        $disciplineData = Discipline::select('id', 'title')->get();
        $editCourseData = InstructorCourse::where('id', '=', $courseId)->first();
        return view('front.instructors.instructor_edit_course', compact('courseCategoryData', 'disciplineData', 'editCourseData'));
    }

    /**
    * Post Instructor Edit Course Page
    * Route Name : instructor_edit_course
    * Route : instructor_edit_course/{courseId}
    * Method : POST
    * @return \Illuminate\View\View
    */
    public function postInstructorEditCourse(Request $request, $courseId)
    {
        // Validate Add Course Fields
        $request->validate([
            'name' => 'required|max:50|unique:instructor_courses,name,'.$courseId,
            'course_category_id' => 'required',
            'discipline_id' => 'required',
            'description' => 'required|max:500'
        ]);

        $editInstructorCourse = InstructorCourse::where('id', '=', $courseId)->first();
        // Get Instructor Course Inputs
        $input = $request->only(['name', 'course_category_id', 'discipline_id', 'description']);
        $input['instructor_id'] = $this->guard()->user()->id;
        // Edit Instructor Course In Database
        $editCourse = $editInstructorCourse->update($input);
        if($editCourse) {
            return redirect('instructor_profile_course')->with("success", "Course has been updated successfully");
        } else {
            return back()->withInput()->with('error', 'Ooops... Something Went Wrong!');
        }
    }

    /**
    * View Instructor Course Detail Page
    * Route Name : instructor_course_details
    * Route : instructor_course_details/{courseId}
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function getInstructorCourseDetails($courseId)
    {
        $instructorCourseData = [];
        $instructorCourseLessionData = [];
        if($courseId) {
            $instructorCourseData = InstructorCourse::leftJoin('disciplines', 'disciplines.id', '=', 'instructor_courses.discipline_id')->leftJoin('course_categories', 'course_categories.id', '=', 'instructor_courses.course_category_id')->leftJoin('instructors', 'instructors.id', '=', 'instructor_courses.instructor_id')->select("instructor_courses.*", "disciplines.title", "disciplines.photo", "course_categories.name as categoryName", "instructors.name as instructorName")->where('instructor_courses.id', '=', $courseId)->first();
            $instructorCourseLessionData = InstructorCourseLession::where('instructor_course_id', '=', $courseId)->get();
        }
        return view('front.instructors.instructor_course_details', compact('instructorCourseData', 'instructorCourseLessionData'));
    }

    /**
    * View Instructor Add Course Lession Page
    * Route Name : instructor_add_course_lession
    * Route : instructor_add_course_lession/{courseId}
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function getInstructorAddCourseLession($courseId)
    {
        $projectId = '';
        // Check Instructor Wiastia Project Id Is Exist
        if($this->guard()->user()->wistia_project_id) {
            $projectId = $this->guard()->user()->wistia_project_id;
        } else {
            // Create Instructor Wiastia Project Id
            $wistiaProjectId = createWistiaProject($this->guard()->user()->name);
            $instructorData = Instructor::where('id', '=', $this->guard()->user()->id)->first();
            $instructorData->wistia_project_id = $wistiaProjectId;
            $instructorData->save();
            $projectId = $wistiaProjectId;
        }
        return view('front.instructors.instructor_add_course_lession', compact('courseId', 'projectId'));
    }

    /**
    * Post Instructor Add Course Lession Page
    * Route Name : instructor_add_course_lession
    * Route : instructor_add_course_lession/{courseId}
    * Method : POST
    * @return \Illuminate\View\View
    */
    public function postInstructorAddCourseLession(Request $request, $courseId)
    {
        // Validate Add Course Lession Fields
        $request->validate([
            'title' => 'required|max:50|unique:instructor_course_lessions',
            'description' => 'required|max:500',
            // 'lession_video_path' => 'required|max:2000'
        ]);

        // If Video Not Uploaded Then
        if(!$request->video_id) {
            return back()->withInput()->with('error', 'Lession video is required');
        }

        // Upload Course Lession Video
        // $lessionVideoPath = $request->file('lession_video_path')->store('public/instructors/lessions');
        // Get Instructor Course Lession Inputs
        $input = $request->only(['title', 'description', 'lession_thumbnail', 'video_id', 'video_name', 'video_duration']);
        $input['instructor_id'] = $this->guard()->user()->id;
        $input['instructor_course_id'] = $courseId;
        // $input['lession_video_path'] = $lessionVideoPath;
        // Store Instructor Course Lession In Database
        $addInstructorCourse = InstructorCourseLession::create($input);
        if($addInstructorCourse) {
            return redirect('instructor_profile_course')->with("success", "Course lession has been added successfully");
        } else {
            return back()->withInput()->with('error', 'Ooops... Something Went Wrong!');
        }
    }

    /**
    * Delete Instructor Lession
    * Route Name : delete_instructor_lession
    * Route : delete_instructor_lession/{lessionId}
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function deleteInstructorLession($lessionId)
    {
        if($lessionId) {
            $courseLessionData = InstructorCourseLession::select('instructor_course_id', 'video_id')->where('id', '=', $lessionId)->first();
            if($courseLessionData) {
                if($courseLessionData['video_id']) {
                    // Delete Video From Wistia
                    $result = deleteWistiaVideo($courseLessionData['video_id']);
                    if(isset($result['status']) && $result['status'] == 'ready') {
                        if(InstructorCourseLession::destroy($lessionId)) {
                            return back()->with("success", "Course lession has been deleted successfully");
                        }
                    } else {
                        return back()->with('error', 'Oops... Something went wrong.');
                    }
                }
            } else {
                return back()->with('error', 'Oops... Course lession does not exist');
            }
        }
    }

    /**
    * Delete Instructor Course
    * Route Name : delete_instructor_course
    * Route : delete_instructor_course/{courseId}
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function deleteInstructorCourse($courseId)
    {
        if($courseId) {
            // Delete Instructor Course Lession
            $courseLessionData = InstructorCourseLession::select('id', 'video_id')->where('instructor_course_id', '=', $courseId)->get();
            if($courseLessionData) {
                foreach ($courseLessionData as $clData) {
                    if($clData->video_id) {
                        // Delete Video From Wistia
                        $result = deleteWistiaVideo($clData->video_id);
                        if(isset($result['status']) && $result['status'] == 'ready') {
                            InstructorCourseLession::destroy($clData->id);
                        }
                    }
                }
            }
            // Delete Instructor Course
            if(InstructorCourse::destroy($courseId)) {
                return back()->with("success", "Course has been deleted successfully");
            }
        } else {
            return back()->with('error', 'Oops... Course does not exist');
        }
    }

    /**
    * View Instructor Biography Video Page
    * Route Name : instructor_biography
    * Route : instructor_biography
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function getInstructorBiographyVideo()
    {
        if($this->guard()->user()->dacast_folder_id) {
            // dd('if', $this->guard()->user()->dacast_folder_id, $this->guard()->user());
            $folderId = $this->guard()->user()->dacast_folder_id;

            // check if folder is already exists
            $dacastFolderDetails = $this->getFolderDataOnDacast($folderId);
            // dd($folderId, $dacastFolderDetails);
            if(isset($dacastFolderDetails['status']) and ($dacastFolderDetails['status'] == 'error')){
                $dacastFolderId = $this->createFolderOnDacast($this->createFolderName(Auth::user()->name, Auth::user()->id));
                // dd($dacastFolderId, Auth::user()->name);
                if(isset($dacastFolderId['status']) and ($dacastFolderId['status'] == 'success')){
                    Auth::user()->dacast_folder_id = $dacastFolderId['data']['id'];
                    Auth::user()->dacast_path = $dacastFolderId['data']['path'];
                    Auth::user()->update();
                }
                else{
                    echo "Folder already exists on Dacast";
                }
            }
            // dd($folderDetails);
        }
        else{
            
            // Create Instructor Dacast folder Id
            $dacastFolderId = $this->createFolderOnDacast($this->createFolderName(Auth::user()->name, Auth::user()->id));
            if(!isset($dacastFolderId['data']['message'])){
                Auth::user()->dacast_folder_id = $dacastFolderId['data']['id'];
                Auth::user()->dacast_path = $dacastFolderId['data']['path'];
                Auth::user()->update();
                $folderId = $dacastFolderId['data']['id'];
            }
            // $instructorData = Instructor::where('id', '=', $this->guard()->user()->id)->first();
            // $instructorData->wistia_project_id = $wistiaProjectId;
            // $instructorData->save();

        }
        $instructorBiographyVideoData = InstructorBiographyVideo::where('instructor_id', '=', $this->guard()->user()->id)->get();
        // dd($instructorBiographyVideoData,$this->guard()->user());
        return view('front.instructors.instructor_biography_video', compact('instructorBiographyVideoData'));
    }

    /**
    * View Instructor Add Biography Video Page
    * Route Name : instructor_add_biography
    * Route : instructor_add_biography
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function getInstructorAddBiographyVideo()
    {
        // $projectId = '';

        $folderId = '';
        // Check Instructor Wiastia Project Id Is Exist
        // dd($this->guard()->user());
        if(!$this->guard()->user()->dacast_folder_id) {
            // Create Instructor Dacast folder Id
            $dacastFolderId = $this->createFolderOnDacast($this->createFolderName(Auth::user()->name, Auth::user()->id));
            if(!isset($dacastFolderId['data']['message'])){
                Auth::user()->dacast_folder_id = $dacastFolderId['data']['id'];
                Auth::user()->dacast_path = $dacastFolderId['data']['path'];
                Auth::user()->update();
            }
        }

        if(!$this->guard()->user()->bio_id_path){
            $bio = $this->createSubFolderOnDacast($this->guard()->user()->dacast_path,'Bio_videos');
            // dd($bio);
            if(!isset($bio['data']['message'])){
                Auth::user()->bio_id_path = $bio['data']['id'].'-'.$bio['data']['path'];
                Auth::user()->update();
            }
        }

        // dd($folderId, $this->guard()->user());

        // if($this->guard()->user()->wistia_project_id) {
        //     $projectId = $this->guard()->user()->wistia_project_id;
        // } else {
        //     // Create Instructor Wiastia Project Id
        //     $wistiaProjectId = createWistiaProject($this->guard()->user()->name);
        //     $instructorData = Instructor::where('id', '=', $this->guard()->user()->id)->first();
        //     $instructorData->wistia_project_id = $wistiaProjectId;
        //     $instructorData->save();
        //     $projectId = $wistiaProjectId;
        // }

        return view('front.instructors.instructor_add_biography_video', compact('folderId'));
    }

    /**
    * Post Instructor Add Biography Video Page
    * Route Name : instructor_post_biography
    * Route : instructor_post_biography
    * Method : POST
    * @return \Illuminate\View\View
    */
    public function getInstructorPostBiographyVideo(Request $request)
    {
        set_time_limit(0);
        // dd($request->all());

        $createBio = array();
        $uploaded_video_id = "";
        $flag = 0;
        // Validate Add Biography Video Fields
        $request->validate([
            // 'title' => 'required|max:50|unique:instructor_biography_videos',
            'title' => 'required|max:50',
            'description' => 'required|max:500',
            'bio_video_file' => 'required'
        ]);

        $checkTitle = InstructorBiographyVideo::where('title','=',$request->title)->where('deleted_at',NULL)->first();

        if($checkTitle)
        {
            return response()->json(array('status' => 'error', 'message' => 'The title has already been taken'));
        }

        // If Video Not Uploaded Then
        // if(!$request->video_id) {
        //     return back()->withInput()->with('error', 'Biography video is required');
        // }

        $image = $request->file('bio_video_file');
        $customName = $this->createFolderName(Auth::user()->name, Auth::user()->id) . '-' . time() . '.' . $image->getClientOriginalExtension(); // Define your custom name

        $path = $image->move(public_path('videos'), $customName);

        $video = $this->createVideoOnDacast(base_path("public/videos/".$customName));

        while(true){
            $getCurrentVideoUploaded = $this->getVideoDetailByTitle("public/videos/".$customName);
            if(isset($getCurrentVideoUploaded['data']['data']) and (count($getCurrentVideoUploaded['data']['data']) > 0)){
                // dd($getCurrentVideoUploaded);
                $getCurrentVideoUploaded = $getCurrentVideoUploaded['data']['data'][0];
                
                $updateVideo = array(
                    'title' => $request->title,
                    'description' => $request->description,
                    'online' => true,
                );
                $update = $this->updateVideoOnDacast($getCurrentVideoUploaded['original_id'], $updateVideo);

                $uploaded_video_id = $getCurrentVideoUploaded['original_id'];

                $createBio = [
                    'instructor_id' => $this->guard()->user()->id,
                    'title' => $request->title,
                    'video_name' => $request->title,
                    'video_thumbnail' => isset($getCurrentVideoUploaded['pictures']['thumbnail'][0]) ? $getCurrentVideoUploaded['pictures']['thumbnail'][0] : NULL,
                    'video_id' => $getCurrentVideoUploaded['original_id'],
                    'video_duration' => $getCurrentVideoUploaded['duration'],
                    'dacast_video_asset_id' => $getCurrentVideoUploaded['asset_id'],
                    'description' => $request->description,
                    'is_dacast_video' => 1,
                    'status' => 1,
                ];

                if($this->guard()->user()->bio_id_path){
                    
                    // extract folder id
                    $folder_id = explode('-',$this->guard()->user()->bio_id_path)[0];
                    
                    // movie video to folder 
                    $move_to_bio = $this->addContentToFolderOnDacast($uploaded_video_id,array($folder_id));

                    // create bio
                    $addInstructorBiographyVideo = InstructorBiographyVideo::create($createBio);

                    InstructorBiographyVideo::where('id','!=',$addInstructorBiographyVideo->id)->update(['status'=>"0"]);
                    $this->deletePublicVideos($customName);
                    return response()->json(array('status' => 'success', 'message' => 'Biography video has been added successfully'));
                }
                else{
                    return response()->json(array('status' => 'error', 'message' => 'Ooops... Something Went Wrong!'));
                }
                break;
            }
        }

        $fileToDelete = public_path('videos/'.$customName);
        // dd($fileToDelete);
        if (file_exists($fileToDelete)) {
            unlink($fileToDelete);
        }

        // dd('file uploaded successfully');

        // // Get Instructor Biography Video Inputs
        // // $input = $request->only(['title', 'description', 'video_thumbnail', 'video_id', 'video_name', 'video_duration','status']);
        // // $input['instructor_id'] = $this->guard()->user()->id;
        // // Store Instructor Biography Video In Database
        // $addInstructorBiographyVideo = InstructorBiographyVideo::create($createBio);

        // if($addInstructorBiographyVideo) {
        //     InstructorBiographyVideo::where('id','!=',$addInstructorBiographyVideo->id)->update(['status'=>"0"]);
        //     return redirect('instructor_biography')->with("success", "Biography video has been added successfully");
        // } else {
        //     return back()->withInput()->with('error', 'Ooops... Something Went Wrong!');
        // }
    }

    /**
    * Delete Instructor Biography Video
    * Route Name : delete_instructor_biography
    * Route : delete_instructor_biography/{biographyId}
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function deleteInstructorBiography($biographyId)
    {
        if($biographyId) {
            $biographyVideoData = InstructorBiographyVideo::select('video_id')->where('id', '=', $biographyId)->first();
            if($biographyVideoData) {
                if($biographyVideoData['video_id']) {
                    // Delete Video From Wistia
                    //$result = deleteWistiaVideo($biographyVideoData['video_id']);
                    //if(isset($result['status']) && $result['status'] == 'ready') {
                        if(InstructorBiographyVideo::where('id',$biographyId)->delete()) {
                            return back()->with("success", "Biography video has been deleted successfully");
                        }
                    // } else {
                    //     return back()->with('error', 'Oops... Something went wrong.');
                    // }
                }
            } else {
                return back()->with('error', 'Oops... Biography video does not exist');
            }
        }
    }

    /**
    * View Instructor Demonstration Video Page
    * Route Name : instructor_demonstration
    * Route : instructor_demonstration
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function getInstructorDemonstrationVideo()
    {
        if($this->guard()->user()->dacast_folder_id) {
            // dd('if', $this->guard()->user()->dacast_folder_id, $this->guard()->user());
            $folderId = $this->guard()->user()->dacast_folder_id;

            // check if folder is already exists
            $dacastFolderDetails = $this->getFolderDataOnDacast($folderId);
            // dd($folderId, $dacastFolderDetails);
            if(isset($dacastFolderDetails['status']) and ($dacastFolderDetails['status'] == 'error')){
                $dacastFolderId = $this->createFolderOnDacast($this->createFolderName(Auth::user()->name, Auth::user()->id));
                // dd($dacastFolderId, Auth::user()->name);
                if(isset($dacastFolderId['status']) and ($dacastFolderId['status'] == 'success')){
                    Auth::user()->dacast_folder_id = $dacastFolderId['data']['id'];
                    Auth::user()->dacast_path = $dacastFolderId['data']['path'];
                    Auth::user()->update();
                }
                else{
                    echo "Folder already exists on Dacast";
                }
            }
            // dd($folderDetails);
        }
        else{
            
            // Create Instructor Dacast folder Id
            $dacastFolderId = $this->createFolderOnDacast($this->createFolderName(Auth::user()->name, Auth::user()->id));
            if(!isset($dacastFolderId['data']['message'])){
                Auth::user()->dacast_folder_id = $dacastFolderId['data']['id'];
                Auth::user()->dacast_path = $dacastFolderId['data']['path'];
                Auth::user()->update();
                $folderId = $dacastFolderId['data']['id'];
            }

        }
        $instructorDemonstrationVideoData = InstructorDemonstrationVideos::where('instructor_id', '=', $this->guard()->user()->id)->get();
        return view('front.instructors.instructor_demonstartion_video', compact('instructorDemonstrationVideoData'));
    }


    /**
    * View Instructor Add Demonstration Video Page
    * Route Name : instructor_add_demonstration
    * Route : instructor_add_demonstration
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function getInstructorAddDemonstationVideo()
    {
        // $projectId = '';
        // // Check Instructor Wiastia Project Id Is Exist
        // if($this->guard()->user()->wistia_project_id) {
        //     $projectId = $this->guard()->user()->wistia_project_id;
        // } else {
        //     // Create Instructor Wiastia Project Id
        //     $wistiaProjectId = createWistiaProject($this->guard()->user()->name);
        //     $instructorData = Instructor::where('id', '=', $this->guard()->user()->id)->first();
        //     $instructorData->wistia_project_id = $wistiaProjectId;
        //     $instructorData->save();
        //     $projectId = $wistiaProjectId;
        // }

        $folderId = '';
        // Check Instructor Wiastia Project Id Is Exist
        // dd($this->guard()->user());
        if(!$this->guard()->user()->dacast_folder_id) {
            // Create Instructor Dacast folder Id
            $dacastFolderId = $this->createFolderOnDacast($this->createFolderName(Auth::user()->name, Auth::user()->id));
            if(!isset($dacastFolderId['data']['message'])){
                Auth::user()->dacast_folder_id = $dacastFolderId['data']['id'];
                Auth::user()->dacast_path = $dacastFolderId['data']['path'];
                Auth::user()->update();
            }
        }

        if(!$this->guard()->user()->demo_id_path){
            // create Demonstration video folder
            $demo = $this->createSubFolderOnDacast($this->guard()->user()->dacast_path,'Demo_videos');
            if(!isset($demo['data']['message'])){
                Auth::user()->demo_id_path = $demo['data']['id'].'-'.$demo['data']['path'];
                Auth::user()->update();
            }
        }

        return view('front.instructors.instructor_add_demonstration_video');
    }

    /**
    * Post Instructor Add Demonstration Video Page
    * Route Name : instructor_post_demonstration
    * Route : instructor_post_demonstration
    * Method : POST
    * @return \Illuminate\View\View
    */
    public function getInstructorPostDemonstrationVideo(Request $request)
    {
        set_time_limit(0);

        $createDemo = array();
        $uploaded_video_id = "";
        // Validate Add Demonstration Video Fields
        $request->validate([
            'title' => 'required|max:50',
            'demo_video_file' => 'required',
        ]);

        $checkTitle = InstructorDemonstrationVideos::where('title','=',$request->title)->where('deleted_at',NULL)->first();

        if($checkTitle)
        {
            return response()->json(array('status' => 'error', 'message' => 'The title has already been taken'));
        }

        $image = $request->file('demo_video_file');
        $customName = $this->createFolderName(Auth::user()->name, Auth::user()->id) . '-' . time() . '.' . $image->getClientOriginalExtension(); // Define your custom name

        $path = $image->move(public_path('videos'), $customName);

        $video = $this->createVideoOnDacast(base_path("public/videos/".$customName));

        while(true){
            $getCurrentVideoUploaded = $this->getVideoDetailByTitle("public/videos/".$customName);
            if(isset($getCurrentVideoUploaded['data']['data']) and (count($getCurrentVideoUploaded['data']['data']) > 0)){
                // dd($getCurrentVideoUploaded);
                $getCurrentVideoUploaded = $getCurrentVideoUploaded['data']['data'][0];
                
                $updateVideo = array(
                    'title' => $request->title,
                    'online' => true,
                );
                $update = $this->updateVideoOnDacast($getCurrentVideoUploaded['original_id'], $updateVideo);

                $uploaded_video_id = $getCurrentVideoUploaded['original_id'];

                $createDemo = [
                    'instructor_id' => $this->guard()->user()->id,
                    'title' => $request->title,
                    'video_name' => $request->title,
                    'video_thumbnail' => NULL,
                    'video_id' => $getCurrentVideoUploaded['original_id'],
                    'video_duration' => $getCurrentVideoUploaded['duration'],
                    'dacast_video_asset_id' => $getCurrentVideoUploaded['asset_id'],
                    'description' => $request->description,
                    'is_dacast_video' => 1,
                    'status' => 1,
                ];

                if($this->guard()->user()->demo_id_path){
                    
                    // extract folder id
                    $folder_id = explode('-',$this->guard()->user()->demo_id_path)[0];
                    
                    // movie video to folder 
                    $move_to_bio = $this->addContentToFolderOnDacast($uploaded_video_id,array($folder_id));

                    // create bio
                    $addInstructorDemonstrationVideo = InstructorDemonstrationVideos::create($createDemo);

                    InstructorDemonstrationVideos::where('id','!=',$addInstructorDemonstrationVideo->id)->update(['status'=>"0"]);
                    $this->deletePublicVideos($customName);
                    return response()->json(array('status' => 'success', 'message' => 'Demonstration video has been added successfully'));
                }
                else{
                    return response()->json(array('status' => 'error', 'message' => 'Ooops... Something Went Wrong!'));
                }
                break;
            }
        }

        

        // // If Video Not Uploaded Then
        // if(!$request->video_id) {
        //     return back()->withInput()->with('error', 'Demonstration video is required');
        // }

        // // Get Instructor Demonstration Video Inputs
        // $input = $request->only(['title', 'video_thumbnail', 'video_id', 'video_name', 'video_duration','status']);
        // $input['instructor_id'] = $this->guard()->user()->id;
        // // Store Instructor Demonstration Video In Database
        // $addInstructorDemonstrationVideo = InstructorDemonstrationVideos::create($input);
        // if($addInstructorDemonstrationVideo) {
        //     return redirect('instructor_demonstration')->with("success", "Demonstration video has been added successfully");
        // } else {
        //     return back()->withInput()->with('error', 'Ooops... Something Went Wrong!');
        // }
    }

    /**
    * Delete Instructor Demonstration Video
    * Route Name : delete_instructor_demonstration
    * Route : delete_instructor_demonstration/{biographyId}
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function deleteInstructorDemonstration($demonstrationId)
    {   
        if($demonstrationId) {
            $demonstrationVideoData = InstructorDemonstrationVideos::select('video_id')->where('id', '=', $demonstrationId)->first();
            if($demonstrationVideoData) {
                if($demonstrationVideoData['video_id']) {
                    // Delete Video From Wistia
                    // $result = deleteWistiaVideo($demonstrationVideoData['video_id']);
                    // if(isset($result['status']) && $result['status'] == 'ready') {
                        if(InstructorDemonstrationVideos::where('id',$demonstrationId)->delete()) {
                            return back()->with("success", "Demonstration video has been deleted successfully");
                        }
                    // } else {
                    //     return back()->with('error', 'Oops... Something went wrong.');
                    // }
                }
            } else {
                return back()->with('error', 'Oops... Demonstration video does not exist');
            }
        }
    }

    /**
    * Author Ganesh 
    * update demonstration video status
    * Route : demonstrationvideostatus/{class}
    *Created at :- 11-09-2022
    * Method : POST
    * @return \Illuminate\View\View
    */
    public function demonstrationVideoStatusUpdate(Request $request,InstructorDemonstrationVideos $demovideos, $id)
    {
        $demovideos = $demovideos->find($id);
        $demovideos->status = $request->value;
        $isEdit = $demovideos->update();

        if($isEdit){
            if($request->value == 0)
            {
                $responseData = array('success'=>'1','message'=>"Video status has been changed successfully to OFF.");
            }
            else
            {
                $responseData = array('success'=>'1','message'=>"Video status has been changed successfully to ON.");
            }
           
            return $responseData; //redirect('admins/subscriptionplan')->with("success", "Subscription plan status has been changed successfully.");
        }

        $responseData = array('success'=>'0','message'=>"Sorry, Something went wrong please try again");
        return $responseData; 
        //redirect('admins/subscriptionplan')->with("error", "Sorry, Something went wrong please try again");
    }

    /**
    * Author Ganesh 
    * update biography video status
    * Route : biographystatus/{class}
    *Created at :- 09-09-2022
    * Method : POST
    * @return \Illuminate\View\View
    */
    public function biographyStatusUpdate(Request $request,InstructorBiographyVideo $biographyVideo, $id)
    {
        if($request->value == 1)
        {
            DB::table('instructor_biography_videos')->where('instructor_id',$this->guard()->user()->id)->update(['status' => 0]);
        }


        $biographyVideo = $biographyVideo->find($id);
        $biographyVideo->status = $request->value;
        $isEdit = $biographyVideo->update();

        if($isEdit){
            if($request->value == 0)
            {
                $responseData = array('success'=>'1','message'=>"Video status has been changed successfully to OFF.");
            }
            else
            {
                $responseData = array('success'=>'1','message'=>"Video status has been changed successfully to ON.");
            }
            
            return $responseData; //redirect('admins/subscriptionplan')->with("success", "Subscription plan status has been changed successfully.");
        }

        $responseData = array('success'=>'0','message'=>"Sorry, Something went wrong please try again");
        return $responseData; 
        //redirect('admins/subscriptionplan')->with("error", "Sorry, Something went wrong please try again");
    }

    /**
    * View Instructor Video Page
    * Route Name : instructor_videos
    * Route : instructor_videos
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function getInstructorVideos()
    {
        if($this->guard()->user()->dacast_folder_id) {
            // dd('if', $this->guard()->user()->dacast_folder_id, $this->guard()->user());
            $folderId = $this->guard()->user()->dacast_folder_id;

            // check if folder is already exists
            $dacastFolderDetails = $this->getFolderDataOnDacast($folderId);
            // dd($folderId, $dacastFolderDetails);
            if(isset($dacastFolderDetails['status']) and ($dacastFolderDetails['status'] == 'error')){
                $dacastFolderId = $this->createFolderOnDacast($this->createFolderName(Auth::user()->name, Auth::user()->id));
                // dd($dacastFolderId, Auth::user()->name);
                if(isset($dacastFolderId['status']) and ($dacastFolderId['status'] == 'success')){
                    Auth::user()->dacast_folder_id = $dacastFolderId['data']['id'];
                    Auth::user()->dacast_path = $dacastFolderId['data']['path'];
                    Auth::user()->update();
                }
                else{
                    echo "Folder already exists on Dacast";
                }
            }
            // dd($folderDetails);
        }
        else{
            
            // Create Instructor Dacast folder Id
            $dacastFolderId = $this->createFolderOnDacast($this->createFolderName(Auth::user()->name, Auth::user()->id));
            if(!isset($dacastFolderId['data']['message'])){
                Auth::user()->dacast_folder_id = $dacastFolderId['data']['id'];
                Auth::user()->dacast_path = $dacastFolderId['data']['path'];
                Auth::user()->update();
                $folderId = $dacastFolderId['data']['id'];
            }
            // $instructorData = Instructor::where('id', '=', $this->guard()->user()->id)->first();
            // $instructorData->wistia_project_id = $wistiaProjectId;
            // $instructorData->save();

        }
        $instructorVideoData = InstructorVideos::where('instructor_id', '=', $this->guard()->user()->id)->get();
        // dd($instructorVideoData);
        return view('front.instructors.instructor_videos', compact('instructorVideoData'));
    }

    /**
    * View Instructor Add Video Page
    * Route Name : instructor_add_videos
    * Route : instructor_add_videos
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function getInstructorAddVideos()
    {
        $projectId = '';
        // Check Instructor Wiastia Project Id Is Exist
        // if($this->guard()->user()->wistia_project_id) {
        //     $projectId = $this->guard()->user()->wistia_project_id;
        // } else {
        //     // Create Instructor Wiastia Project Id
        //     $wistiaProjectId = createWistiaProject($this->guard()->user()->name);
        //     $instructorData = Instructor::where('id', '=', $this->guard()->user()->id)->first();
        //     $instructorData->wistia_project_id = $wistiaProjectId;
        //     $instructorData->save();
        //     $projectId = $wistiaProjectId;
        // }

        if(!$this->guard()->user()->dacast_folder_id) {
            // Create Instructor Dacast folder Id
            $dacastFolderId = $this->createFolderOnDacast($this->createFolderName(Auth::user()->name, Auth::user()->id));
            if(!isset($dacastFolderId['data']['message'])){
                Auth::user()->dacast_folder_id = $dacastFolderId['data']['id'];
                Auth::user()->dacast_path = $dacastFolderId['data']['path'];
                Auth::user()->update();
            }
        }

        if(!$this->guard()->user()->teach_id_path){
            $teach = $this->createSubFolderOnDacast($this->guard()->user()->dacast_path,'Teach_videos');
            // dd($teach);
            if(!isset($teach['data']['message'])){
                Auth::user()->teach_id_path = $teach['data']['id'].'-'.$teach['data']['path'];
                Auth::user()->update();
            }
        }

        $mainCourseCategories = CourseCategory::where('id','!=',5)->get();

        $disciplineData = Discipline::select('id', 'title')->get();

        return view('front.instructors.instructor_add_video', compact('projectId','mainCourseCategories','disciplineData'));
    }

    /**
    * Post Instructor Add Video
    * Route Name : instructor_post_video
    * Route : instructor_post_video
    * Method : POST
    * @return \Illuminate\View\View
    */

    public function getInstructorPostVideo(Request $request)
    {
        set_time_limit(0);
        // dd($request->all());
        // Validate Add Demonstration Video Fields
        $request->validate([
            'title' => 'required|max:50',
            'main_course_category_id'=>'required',
            'discipline_id'=>'required',
            'teach_video_file'=>'required',
        ]);

        $checkTitle = InstructorVideos::where('title','=',$request->title)->where('deleted_at',NULL)->first();

        if($checkTitle)
        {
            return back()->withInput()->with('error', 'The title has already been taken');
        }

        // If Video Not Uploaded Then
        // if(!$request->video_id) {
        //     return back()->withInput()->with('error', 'video is required');
        // }

        $createTeach = array();
        $uploaded_video_id = "";

        $image = $request->file('teach_video_file');
        $customName = $this->createFolderName(Auth::user()->name, Auth::user()->id) . '-' . time() . '.' . $image->getClientOriginalExtension(); // Define your custom name

        $path = $image->move(public_path('videos'), $customName);

        $video = $this->createVideoOnDacast(base_path("public/videos/".$customName));

        while(true){
            $getCurrentVideoUploaded = $this->getVideoDetailByTitle("public/videos/".$customName);
            if(isset($getCurrentVideoUploaded['data']['data']) and (count($getCurrentVideoUploaded['data']['data']) > 0)){
                // dd($getCurrentVideoUploaded);
                $getCurrentVideoUploaded = $getCurrentVideoUploaded['data']['data'][0];
                
                $updateVideo = array(
                    'title' => $request->title,
                    'description' => isset($request->description) ? $request->description : 'Teaching Description',
                    'online' => true,
                );
                $update = $this->updateVideoOnDacast($getCurrentVideoUploaded['original_id'], $updateVideo);

                $uploaded_video_id = $getCurrentVideoUploaded['original_id'];

                $createTeach = [
                    'instructor_id' => $this->guard()->user()->id,
                    'title' => $request->title,
                    'main_course_category_id' => $request->main_course_category_id,
                    'discipline_id' => $request->discipline_id,
                    'video_name' => $request->title,
                    'video_thumbnail' => isset($getCurrentVideoUploaded['pictures']['thumbnail'][0]) ? $getCurrentVideoUploaded['pictures']['thumbnail'][0] : NULL,
                    'video_id' => $getCurrentVideoUploaded['original_id'],
                    'video_duration' => $getCurrentVideoUploaded['duration'],
                    'dacast_video_asset_id' => $getCurrentVideoUploaded['asset_id'],
                    'is_dacast_video' => 1,
                    'status' => 1,
                ];

                if($this->guard()->user()->teach_id_path){
                    
                    // extract folder id
                    $folder_id = explode('-',$this->guard()->user()->teach_id_path)[0];
                    
                    // move video to folder 
                    $move_to_bio = $this->addContentToFolderOnDacast($uploaded_video_id,array($folder_id));

                    // create bio
                    $instructorVideos = InstructorVideos::create($createTeach);

                    InstructorBiographyVideo::where('id','!=',$instructorVideos->id)->update(['status'=>"0"]);
                    $this->deletePublicVideos($customName);
                    // return response()->json(array('status' => 'success', 'message' => 'Biography video has been added successfully'));
                    return redirect()->route('instructor_videos')->with('success', 'Teaching video has been added successfully');
                }
                else{
                    return redirect()->back()->with('error', 'Ooops... Something Went Wrong!');
                }
                break;
            }
        }

        // Get Instructor Demonstration Video Inputs
        // $input = $request->only(['title','main_course_category_id','discipline_id','video_thumbnail', 'video_id', 'video_name', 'video_duration','status']);
        // $input['instructor_id'] = $this->guard()->user()->id;
        // // Store Instructor Demonstration Video In Database
        // $addInstructorDemonstrationVideo = InstructorVideos::create($input);
        // if($addInstructorDemonstrationVideo) {
        //     return redirect('instructor_videos')->with("success", "Video has been added successfully");
        // } else {
        //     return back()->withInput()->with('error', 'Ooops... Something Went Wrong!');
        // }
    }

    /**
    * Author Ganesh 
    * Get Videos
    * Route : videos/datatable
    *Created at :- 12-09-2022
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function getVideoDatatable(InstructorVideos $videos)
    {
        $banners = $videos->where('instructor_id', '=', $this->guard()->user()->id)->orderBy('id','DESC')->get();

        $result = array();

        if(!empty($banners))
        {
            foreach($banners as $b)
            {   
                $courseCategory = CourseCategory::where('id',$b->main_course_category_id)->first();

                $discipline = Discipline::where('id',$b->discipline_id)->first();

                $result[] = array(
                                    'id' => $b->id,   
                                    'course_category' => $courseCategory['name'], 
                                    'discipline' => $discipline->title,
                                    'banner_id' => $b->title,
                                    'thumbnail' => $b->video_thumbnail,
                                    'recommended_flag' => $b->recommended_flag,
                                    'status' => $b->status
                );    
            }
        }
        // print_r($result);die;
        //print_r($result);die;
        return DataTables::of($result)->addIndexColumn()->make(true);
    }

    /**
    * Author Ganesh 
    * Delete Video
    * Route : video/{class}
    *Created at :- 12-09-2022
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function deleteVideo(InstructorVideos $videos,$id)
    {
  
        $data = $videos->where('id', $id)->first();
        if ($data) {

           // $result = deleteWistiaVideo($data['video_id']);

            $data->delete();
            $response['message'] = "Video has been deleted successfully.";
            $response['status'] = true;
        } else {
            $response['message'] = "Video does not found!";
            $response['status'] = false;
        }
        
        return response()->json($response);
    }

    /**
    * Author Ganesh 
    * get edit Video page
    * Route : video/{class}/edit
    *Created at :- 12-09-2022
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function editVideo($id)
    {
     
        $projectId = $this->guard()->user()->wistia_project_id;
        $title = "";
        $courseCategoryId = "";
        $disciplineId = "";

        $courseCategorys = CourseCategory::all();

        $disciplines = Discipline::all();

        $videoData = InstructorVideos::where('id',$id)->first();

        if($videoData)
        {
            $title = $videoData->title;
            $courseCategoryId = $videoData->main_course_category_id;
            $disciplineId = $videoData->discipline_id;
        }
        return view("front.instructors.instructors_edit_video",compact('projectId','title','courseCategoryId','disciplineId','courseCategorys','disciplines','videoData'));
    }

    /**
    * Author Ganesh 
    * Update Video 
    * Route : video/{class}/edit
    *Created at :- 12-09-2022
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function updateVideo(Request $request, InstructorVideos $videos)
    {
        // dd($request->all());
        set_time_limit(0);
        // Validate Add Demonstration Video Fields
        $request->validate([
            'title' => 'required|max:50',
            'main_course_category_id'=>'required',
            'discipline_id'=>'required',
        ]);

        $title = $request->title;
        $videos = $videos->find($request->id);
        $videos->main_course_category_id = $request->main_course_category_id;
        

        if($request->hasFile('teach_video_file')){
            $image = $request->file('teach_video_file');
            $customName = $this->createFolderName(Auth::user()->name, Auth::user()->id) . '-' . time() . '.' . $image->getClientOriginalExtension(); // Define your custom name

            $path = $image->move(public_path('videos'), $customName);

            $video = $this->createVideoOnDacast(base_path("public/videos/".$customName));
            while(true){
                $getCurrentVideoUploaded = $this->getVideoDetailByTitle("public/videos/".$customName);
                if(isset($getCurrentVideoUploaded['data']['data']) and (count($getCurrentVideoUploaded['data']['data']) > 0)){
                    // dd($getCurrentVideoUploaded);
                    $video = $this->deleteVideoByID($videos['video_id']);
                    $getCurrentVideoUploaded = $getCurrentVideoUploaded['data']['data'][0];
                    
                    $updateVideo = array(
                        'title' => $request->title,
                        'description' => isset($request->description) ? $request->description : 'Test Description',
                        'online' => true,
                    );
                    $update = $this->updateVideoOnDacast($getCurrentVideoUploaded['original_id'], $updateVideo);
                    // dd($update);
                    $uploaded_video_id = $getCurrentVideoUploaded['original_id'];
    
    
                    if($this->guard()->user()->teach_id_path){
                        
                        // extract folder id
                        $folder_id = explode('-',$this->guard()->user()->teach_id_path)[0];
                        
                        // movie video to folder 
                        $move_to_bio = $this->addContentToFolderOnDacast($uploaded_video_id,array($folder_id));
                        $videos->title =  $request->title;
                        $videos->main_course_category_id =  $request->main_course_category_id;
                        $videos->discipline_id =  $request->discipline_id;
                        $videos->video_name =  $request->title;
                        $videos->video_id =  $getCurrentVideoUploaded['original_id'];
                        $videos->dacast_video_asset_id =  $getCurrentVideoUploaded['asset_id'];
                        $videos->video_duration =  $getCurrentVideoUploaded['duration'];
                        $videos->video_thumbnail =  isset($getCurrentVideoUploaded['pictures']['thumbnail'][0]) ? $getCurrentVideoUploaded['pictures']['thumbnail'][0] : NULL;
                        $isEdit = $videos->update();
                        
                        $this->deletePublicVideos($customName);
                    }
                    else{
                        $isEdit = $videos->update();
                    }
                    break;
                }
            }
        }
        else{
            // if($videos->title !=  $request->title){
            //     $updateVideo['title'] = $request->title;
            // }
            
            // if($videos->description !=  $request->description){
            //     $updateVideo['description'] = $request->description;
            // }

            // dd($videos->title !=  $title, $videos->title ,  $title);
            if(($videos->title !=  $title)){

                $updateVideo = array(
                    'title' => $title,
                    'online' => true,
                );
                $update = $this->updateVideoOnDacast($videos['video_id'], $updateVideo);
                // dd($update, $videos['video_id']);
                $videos->title =  $title;
                $videos->main_course_category_id =  $request->main_course_category_id;
                $videos->discipline_id =  $request->discipline_id;
                $isEdit = $videos->update();
            }
            else{
                $isEdit = $videos->update();
            }
        }

        if($isEdit)
        {
            return redirect('instructor_videos')->with("success", "Teaching video has been updated successfully");
        } else {
            return back()->withInput()->with('error', 'Ooops... Something Went Wrong!');
        }

        // If Video Not Uploaded Then
        // if(!$request->video_id) {
        //     return back()->withInput()->with('error', 'video is required');
        // }

        // $videos = $videos->find($request->id);
        // $videos->main_course_category_id =  $request->main_course_category_id;
        // $videos->discipline_id =  $request->discipline_id;
        // $videos->title =  $request->title;
        // $videos->video_name =  $request->video_name;
        // $videos->video_thumbnail =  $request->video_thumbnail;
        // $videos->video_id =  $request->video_id;
        // $videos->video_duration =  $request->video_duration;
        // $isEdit = $videos->update();

        // if($isEdit)
        // {
        //     return redirect('instructor_videos')->with("success", "Video has been updated successfully");
        // } else {
        //     return back()->withInput()->with('error', 'Ooops... Something Went Wrong!');
        // }
    }

    /**
    * Author Ganesh 
    * update recommeded flag
    * Route : markRecommnded/{class}
    *Created at :- 19-09-2022
    * Method : POST
    * @return \Illuminate\View\View
    */
    public function markRecommnded(Request $request, InstructorVideos $videos, $id)
    {
        $videos = $videos->find($id);
        $videos->recommended_flag = $request->value;
        $isEdit = $videos->update();

        if($isEdit){
            if($request->value == 1)
            {
                $responseData = array('success'=>'1','message'=>"Video has been added to recommended videos successfully.");
            }
            else
            {
                $responseData = array('success'=>'1','message'=>"Video has been removed from recommended videos successfully.");
            }
          
            return $responseData; //redirect('admins/subscriptionplan')->with("success", "Subscription plan status has been changed successfully.");
        }

        $responseData = array('success'=>'0','message'=>"Sorry, Something went wrong please try again");
        return $responseData; 
        //redirect('admins/subscriptionplan')->with("error", "Sorry, Something went wrong please try again");
    }

     /**
    * View Instructor Classes Page
    * Route Name : instructor_classes
    * Route : instructor_classes
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function getInstructorClasses()
    {
        $instructorVideoData = InstructorClasses::where('instructor_id', '=', $this->guard()->user()->id)->get();
        return view('front.instructors.instructor_classes', compact('instructorVideoData'));
    }

    /**
    * View Instructor Add Classes Page
    * Route Name : instructor_add_classes
    * Route : instructor_add_classes
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function getInstructorAddClasses()
    {
        $mainCourseCategories = CourseCategory::where('id','!=',1)->where('id','!=',5)->get();

        $disciplineData = Discipline::select('id', 'title')->get();
        return view('front.instructors.instructor_add_classes',compact('mainCourseCategories','disciplineData'));
    }

     /**
    * Post Instructor Add Class
    * Route Name : instructor_post_class
    * Route : instructor_post_class
    * Method : POST
    * @return \Illuminate\View\View
    */

    public function getInstructorPostClass(Request $request)
    {
        // Validate Add Demonstration Video Fields
        $request->validate([
            'class_name' => 'required',
            'level' => 'required',
            'discipline' => 'required',
            'videos' => 'required'
        ],
        [
            'class_name.required' => 'Please enter class name',
            'level.required' => 'Please select level',
            'discipline.required' => 'Please select discipline',
            'videos.required' => 'Please select videos'

        ]);

        // Get Instructor Classes Inputs
        $class = new InstructorClasses();
        
        $result = $class->instructor_id = $this->guard()->user()->id;
        $class->class_name = $request->class_name;
        $class->main_category_id = $request->level;
        $class->discipline_id = $request->discipline;
        $result = $class->save();

        if(!empty($request->videos))
        {
            foreach($request->videos as $v)
            {
                $class_videos = new ClassVideos();
                $class_videos->class_id = $class->id;
                $class_videos->video_id = $v;
                $class_videos->save();
            }
        }

        if ($result) {
            $response['message'] = "Class has been created successfully.";
            $response['status'] = true;
        } else {
            $response['message'] = "Class does not found!";
            $response['status'] = false;
        }
        
        return response()->json($response);
    }

    /**
    * Author Ganesh 
    * Get Classes
    * Route : classes/datatable
    *Created at :- 13-09-2022
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function getClassesDatatable(InstructorClasses $class)
    {
        $classes = $class->where('instructor_id', '=', $this->guard()->user()->id)->get();

        $result = array();

        if(!empty($classes))
        {
            foreach($classes as $c)
            {
                $level = CourseCategory::where('id', $c->main_category_id)->first();

                $disciplines = Discipline::where('id', $c->discipline_id)->first();

                $result[] = array(
                                    'id' => $c->id,    
                                    'class_id' => $c->class_name,
                                    'level' => $level->name,
                                    'discipline' => $disciplines->title,
                                    'preview' => route('classPreview',$c->id),
                                    'publish' => $c->publish
                );    
            }
        }
        // print_r($result);die;
        //print_r($result);die;
        return DataTables::of($result)->addIndexColumn()->make(true);
    }


    /**
    * Author Ganesh 
    * Delete Class
    * Route : classes/{class}
    *Created at :- 13-09-2022
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function deleteClasses(InstructorClasses $classes, $id)
    {
        $data = $classes->where('id', $id)->first();
        if ($data) {
            $data->delete();
            $response['message'] = "Class has been deleted successfully.";
            $response['status'] = true;
        } else {
            $response['message'] = "Class does not found!";
            $response['status'] = false;
        }
        
        return response()->json($response);
    }

    /**
    * Author Ganesh 
    * get edit Class page
    * Route : class/{class}/edit
    *Created at :- 13-09-2022
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function editClass($id)
    {
        $classDetails = InstructorClasses::where('id',$id)->first();

        $mainCourseCategories = CourseCategory::where('id','!=',1)->get();

        $disciplineData = Discipline::select('id', 'title')->get();

        $selectedAllVideos = ClassVideos::where('class_id',$id)->orderBy('id','ASC')->get();

        $selectedVideos = array();

        if(!empty($selectedAllVideos))
        {
            foreach($selectedAllVideos as $videos)
            {
                $videoDetails = InstructorVideos::where('id',$videos->video_id)->first();

                $selectedVideos[] = array(
                    'id'=>$videoDetails->id,
                    'video_thumbnail'=> $videoDetails->video_thumbnail
                );
            }
        }

        return view("front.instructors.instructors_edit_class",compact('mainCourseCategories','disciplineData','classDetails','selectedVideos'));
    }

     /**
    * Author Ganesh 
    * get edit Class page
    * Route : class/{class}/edit
    *Created at :- 13-09-2022
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function classPreview($classId)
    {
        // $user = User::where('id',Auth::id())->first();

        // $isDisputedUser = "";

        // if($user)
        // {
        //     $disputedPayments = StudentSubscription::where('student_id',Auth::id())->where('dispute_flag',1)->where('plan_subscription_id',$user->plan_subscription_id)->first();
            
        //     if($disputedPayments)
        //     {
        //         $isDisputedUser = "Disputed";
        //     }
        // }

        $classData = InstructorClasses::where('id', '=', $classId)->first();
        
        $instructorClassVideos = [];
        
        $firstVedio = "";

        $firstVedioDetails = ClassVideos::where('class_id',$classId)->orderBy('id','ASC')->first();

        if($firstVedioDetails)
        {
            $firstVedio =  InstructorVideos::where('id',$firstVedioDetails->video_id)->first();
        }
        
        $remainingVideos = ClassVideos::where('class_id',$classId)->get();

        if(!empty($remainingVideos))
        {
            foreach($remainingVideos as $dv)
            {
                $vedioDetails =  InstructorVideos::where('id',$dv->video_id)->first();

                $instructorClassVideos[] = array(
                    'id'=>$vedioDetails['id'],
                    'title'=>$vedioDetails['title'],
                    'photo'=>$vedioDetails['video_thumbnail'],
                    'name'=>$vedioDetails['title'],
                    'video_id'=>$vedioDetails['video_id'],
                    'video_duration'=>$vedioDetails['video_duration']
                );

            }
        }

        $disciplineDetails = Discipline::where('id',$classData->discipline_id)->first();

        return view("front.instructors.classPreview", compact('instructorClassVideos', 'firstVedio', 'classData', 'disciplineDetails'));
    }

    /**
    * Author Ganesh 
    * Get Class Videos
    * Route : classVideos/datatable
    *Created at :- 13-09-2022
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function getEditClassVideoDatatable(ClassesVideos $classvideos, InstructorVideos $videos)
    {
        $class_id = request()->segment(2);
        $videos = $videos->where('instructor_id', '=', $this->guard()->user()->id)->get();

        $instructorClassvideos = $classvideos->where('instructor_id', '=', $this->guard()->user()->id)->where('class_id', '=', $class_id)->get();

        $result = array();

        if(!empty($banners))
        {
            foreach($banners as $b)
            {   
                $result[] = array(
                                    'id' => $b->id,    
                                    'banner_id' => $b->title,
                                    'thumbnail' => $b->video_thumbnail,
                                    'is_selected' => 1
                );    
            }
        }

        return DataTables::of($result)->addIndexColumn()->make(true);
    }

    /**
    * View Instructor Recommended Video Page
    * Route Name : instructor_recommended
    * Route : instructor_recommended
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function getInstructorRecommendedVideo()
    {
        $instructorRecommendedVideoData = InstructorRecommendedVideos::where('instructor_id', '=', $this->guard()->user()->id)->get();
        return view('front.instructors.instructor_recommnded_video', compact('instructorRecommendedVideoData'));
    }

    /**
    * View Instructor Add Recommended Video Page
    * Route Name : instructor_add_recommneded
    * Route : instructor_add_recommneded
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function getInstructorAddRecommendedVideo()
    {
        $projectId = '';
        // Check Instructor Wiastia Project Id Is Exist
        if($this->guard()->user()->wistia_project_id) {
            $projectId = $this->guard()->user()->wistia_project_id;
        } else {
            // Create Instructor Wiastia Project Id
            $wistiaProjectId = createWistiaProject($this->guard()->user()->name);
            $instructorData = Instructor::where('id', '=', $this->guard()->user()->id)->first();
            $instructorData->wistia_project_id = $wistiaProjectId;
            $instructorData->save();
            $projectId = $wistiaProjectId;
        }
        return view('front.instructors.instructor_add_recommended_video', compact('projectId'));
    }

    /**
    * Post Instructor Add Recommended Video Page
    * Route Name : instructor_post_recommended
    * Route : instructor_post_recommended
    * Method : POST
    * @return \Illuminate\View\View
    */
    public function getInstructorPostRecommendedVideo(Request $request)
    {
        // Validate Add Demonstration Video Fields
        $request->validate([
            'title' => 'required|max:50|unique:instructor_recommended_videos',
        ]);

        // If Video Not Uploaded Then
        if(!$request->video_id) {
            return back()->withInput()->with('error', 'Recommended video is required');
        }

        // Get Instructor Demonstration Video Inputs
        $input = $request->only(['title', 'video_thumbnail', 'video_id', 'video_name', 'video_duration','status']);
        $input['instructor_id'] = $this->guard()->user()->id;
        // Store Instructor Demonstration Video In Database
        $addInstructorRecommnededVideo = InstructorRecommendedVideos::create($input);
        if($addInstructorRecommnededVideo) {
            return redirect('instructor_recommended')->with("success", "Recommended video has been added successfully");
        } else {
            return back()->withInput()->with('error', 'Ooops... Something Went Wrong!');
        }
    }

     /**
    * Delete Instructor Recommended Video
    * Route Name : delete_instructor_recommended
    * Route : delete_instructor_recommended/{biographyId}
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function deleteInstructorRecommended($demonstrationId)
    {   
        if($demonstrationId) {
            $demonstrationVideoData = InstructorRecommendedVideos::select('video_id')->where('id', '=', $demonstrationId)->first();
            if($demonstrationVideoData) {
                if($demonstrationVideoData['video_id']) {
                    // Delete Video From Wistia
                    // $result = deleteWistiaVideo($demonstrationVideoData['video_id']);
                    // if(isset($result['status']) && $result['status'] == 'ready') {
                        if(InstructorRecommendedVideos::where('id',$demonstrationId)->delete()) {
                            return back()->with("success", "Recommended video has been deleted successfully");
                        }
                    // } else {
                    //     return back()->with('error', 'Oops... Something went wrong.');
                    // }
                }
            } else {
                return back()->with('error', 'Oops... Recommneded video does not exist');
            }
        }
    }

     /**
    * Author Ganesh 
    * update recommended video status
    * Route : recommendedvideostatus/{class}
    *Created at :- 14-09-2022
    * Method : POST
    * @return \Illuminate\View\View
    */
    public function recommendedVideoStatusUpdate(Request $request,InstructorRecommendedVideos $recommendvideos, $id)
    {
        $recommendvideos = $recommendvideos->find($id);
        $recommendvideos->status = $request->value;
        $isEdit = $recommendvideos->update();

        if($isEdit){
            $responseData = array('success'=>'1','message'=>"Video status has been changed successfully.");
            return $responseData; //redirect('admins/subscriptionplan')->with("success", "Subscription plan status has been changed successfully.");
        }

        $responseData = array('success'=>'0','message'=>"Sorry, Something went wrong please try again");
        return $responseData; 
        //redirect('admins/subscriptionplan')->with("error", "Sorry, Something went wrong please try again");
    }

    /**
    * Author Ganesh 
    * Get sub courses list
    * Route : getSubCourse/{class}
    *Created at :- 15-09-2022
    * Method : POST
    * @return \Illuminate\View\View
    */
    public function getSubCourse($id)
    {
        $subCourses = SubCourseCategories::where('main_category_id',$id)->get();
        
        return response()->json($subCourses);
    }

    /**
    * Author Ganesh 
    * get edit demonstarion Video page
    * Route : editDemonstrationVideo
    *Created at :- 29-10-2022
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function editDemonstrationVideo(Request $request)
    {
        $projectId = $this->guard()->user()->wistia_project_id;
        $title = "";
        $courseCategoryId = "";
        $disciplineId = "";

        $courseCategorys = CourseCategory::all();

        $disciplines = Discipline::all();

        $videoData = InstructorDemonstrationVideos::where('id',$request->video_id)->first();

        if($videoData)
        {
            $title = $videoData->title;
            $courseCategoryId = $videoData->main_course_category_id;
            $disciplineId = $videoData->discipline_id;
        }

        return view("front.instructors.instructors_edit_demonstration_video",compact('projectId','title','courseCategoryId','disciplineId','courseCategorys','disciplines','videoData'));
    }

    /**
    * Update Instructor Demonstration Video
    * Route Name : instructor_update_demonstration
    * Route : instructor_update_demonstration
    * Method : POST
    * @return \Illuminate\View\View
    */
    public function updateDemonstrationVideo(Request $request)
    {

        set_time_limit(0);
        // Validate Add Demonstration Video Fields
        $request->validate([
            'title' => 'required|max:50',
        ]);

        // dd($request->all());
        // Validate Add Demonstration Video Fields
        // $request->validate([
        //     'title' => 'required|max:50',
        //     'description' => 'required|max:50',
        // ]);

        // // If Video Not Uploaded Then
        // if(!$request->video_id) {
        //     return back()->withInput()->with('error', 'video is required');
        // }

        $title = $request->title;
        $description = $request->description;

        $videos = InstructorDemonstrationVideos::find($request->id);

        // dd($request->all(), $videos->toArray(), $videos['video_id']);
        

        if($request->hasFile('demo_video_file')){
            $image = $request->file('demo_video_file');
            $customName = $this->createFolderName(Auth::user()->name, Auth::user()->id) . '-' . time() . '.' . $image->getClientOriginalExtension(); // Define your custom name

            $path = $image->move(public_path('videos'), $customName);

            $video = $this->createVideoOnDacast(base_path("public/videos/".$customName));
            while(true){
                $getCurrentVideoUploaded = $this->getVideoDetailByTitle("public/videos/".$customName);
                if(isset($getCurrentVideoUploaded['data']['data']) and (count($getCurrentVideoUploaded['data']['data']) > 0)){
                    // dd($getCurrentVideoUploaded);
                    
                    // delete video
                    $video = $this->deleteVideoByID($videos['video_id']);

                    $getCurrentVideoUploaded = $getCurrentVideoUploaded['data']['data'][0];
                    
                    $updateVideo = array(
                        'title' => $request->title,
                        'description' => $request->description,
                        'online' => true,
                    );
                    $update = $this->updateVideoOnDacast($getCurrentVideoUploaded['original_id'], $updateVideo);
                    // dd($update);
                    $uploaded_video_id = $getCurrentVideoUploaded['original_id'];
    
    
                    if($this->guard()->user()->demo_id_path){
                        
                        // extract folder id
                        $folder_id = explode('-',$this->guard()->user()->demo_id_path)[0];
                        
                        // movie video to folder 
                        $move_to_bio = $this->addContentToFolderOnDacast($uploaded_video_id,array($folder_id));
                        $videos->title =  $request->title;
                        $videos->video_name =  $request->title;
                        $videos->video_id =  $getCurrentVideoUploaded['original_id'];
                        $videos->dacast_video_asset_id =  $getCurrentVideoUploaded['asset_id'];
                        $videos->video_duration =  $getCurrentVideoUploaded['duration'];
                        $videos->video_thumbnail =  isset($getCurrentVideoUploaded['pictures']['thumbnail'][0]) ? $getCurrentVideoUploaded['pictures']['thumbnail'][0] : NULL;
                        $isEdit = $videos->update();
                        
                        $this->deletePublicVideos($customName);
                    }
                    else{
                        $isEdit = $videos->update();
                    }
                    break;
                }
            }
        }
        else{
            if(($videos->title !=  $title)){

                $updateVideo = array(
                    'title' => $title,
                    'online' => true,
                );
                $update = $this->updateVideoOnDacast($videos['video_id'], $updateVideo);
                $videos->title =  $title;
                $isEdit = $videos->update();
            }
            else{
                $isEdit = $videos->update();
            }
        }

        // If Video Not Uploaded Then
        // if(!$request->video_id) {
        //     return back()->withInput()->with('error', 'video is required');
        // }

        // $videos = InstructorDemonstrationVideos::find($request->id);
        // $videos->title =  $request->title;
        // $videos->video_name =  $request->video_name;
        // $videos->video_thumbnail =  $request->video_thumbnail;
        // $videos->video_id =  $request->video_id;
        // $videos->video_duration =  $request->video_duration;
        // $isEdit = $videos->update();

        if($isEdit)
        {
            return redirect('instructor_demonstration')->with("success", "Demonstration video has been updated successfully");
        } else {
            return back()->withInput()->with('error', 'Ooops... Something Went Wrong!');
        }
    }

      /**
    * Author Ganesh 
    * get edit biography Video page
    * Route : editBiographyVideo
    *Created at :- 29-10-2022
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function editBiographyVideo(Request $request)
    {
        $projectId = $this->guard()->user()->wistia_project_id;
        $title = "";
        $courseCategoryId = "";
        $disciplineId = "";

        $courseCategorys = CourseCategory::all();

        $disciplines = Discipline::all();

        $videoData = InstructorBiographyVideo::where('id',$request->video_id)->first();

        if($videoData)
        {
            $title = $videoData->title;
            $courseCategoryId = $videoData->main_course_category_id;
            $disciplineId = $videoData->discipline_id;
        }

        return view("front.instructors.instructors_edit_biography_video",compact('projectId','title','courseCategoryId','disciplineId','courseCategorys','disciplines','videoData'));
    }

    /**
    * Update Instructor Biography Video
    * Route Name : instructor_update_biography
    * Route : instructor_update_biography
    * Method : POST
    * @return \Illuminate\View\View
    */
    public function updateBiographyVideo(Request $request)
    {

        set_time_limit(0);
        // dd($request->all());
        // Validate Add Demonstration Video Fields
        $request->validate([
            'title' => 'required|max:50',
            'description' => 'required|max:50',
        ]);

        // // If Video Not Uploaded Then
        // if(!$request->video_id) {
        //     return back()->withInput()->with('error', 'video is required');
        // }

        $title = $request->title;
        $description = $request->description;

        $videos = InstructorBiographyVideo::find($request->id);

        // dd($request->all(), $videos->toArray(), $videos['video_id']);
        

        if($request->hasFile('bio_video_file')){
            $image = $request->file('bio_video_file');
            $customName = $this->createFolderName(Auth::user()->name, Auth::user()->id) . '-' . time() . '.' . $image->getClientOriginalExtension(); // Define your custom name

            $path = $image->move(public_path('videos'), $customName);

            $video = $this->createVideoOnDacast(base_path("public/videos/".$customName));
            while(true){
                $getCurrentVideoUploaded = $this->getVideoDetailByTitle("public/videos/".$customName);
                if(isset($getCurrentVideoUploaded['data']['data']) and (count($getCurrentVideoUploaded['data']['data']) > 0)){
                    // dd($getCurrentVideoUploaded);
                    $video = $this->deleteVideoByID($videos['video_id']);
                    $getCurrentVideoUploaded = $getCurrentVideoUploaded['data']['data'][0];
                    
                    $updateVideo = array(
                        'title' => $request->title,
                        'description' => $request->description,
                        'online' => true,
                    );
                    $update = $this->updateVideoOnDacast($getCurrentVideoUploaded['original_id'], $updateVideo);
                    // dd($update);
                    $uploaded_video_id = $getCurrentVideoUploaded['original_id'];
    
    
                    if($this->guard()->user()->bio_id_path){
                        
                        // extract folder id
                        $folder_id = explode('-',$this->guard()->user()->bio_id_path)[0];
                        
                        // movie video to folder 
                        $move_to_bio = $this->addContentToFolderOnDacast($uploaded_video_id,array($folder_id));
                        $videos->title =  $request->title;
                        $videos->description =  $request->description;
                        $videos->video_name =  $request->title;
                        $videos->video_id =  $getCurrentVideoUploaded['original_id'];
                        $videos->dacast_video_asset_id =  $getCurrentVideoUploaded['asset_id'];
                        $videos->video_duration =  $getCurrentVideoUploaded['duration'];
                        $videos->video_thumbnail =  isset($getCurrentVideoUploaded['pictures']['thumbnail'][0]) ? $getCurrentVideoUploaded['pictures']['thumbnail'][0] : NULL;
                        $isEdit = $videos->update();
                        
                        $this->deletePublicVideos($customName);
                    }
                    else{
                        $isEdit = $videos->update();
                    }
                    break;
                }
            }
        }
        else{
            // if($videos->title !=  $request->title){
            //     $updateVideo['title'] = $request->title;
            // }
            
            // if($videos->description !=  $request->description){
            //     $updateVideo['description'] = $request->description;
            // }

            // dd($videos->title !=  $title, $videos->title ,  $title);
            if(($videos->title !=  $title) or ($videos->description !=  $description)){

                $updateVideo = array(
                    'title' => $title,
                    'description' => $description,
                    'online' => true,
                );
                $update = $this->updateVideoOnDacast($videos['video_id'], $updateVideo);
                // dd($update, $videos['video_id']);
                $videos->title =  $title;
                $videos->description =  $description;
                $isEdit = $videos->update();
            }
            else{
                $isEdit = $videos->update();
            }
        }

        if($isEdit)
        {
            return redirect('instructor_biography')->with("success", "Biography video has been updated successfully");
        } else {
            return back()->withInput()->with('error', 'Ooops... Something Went Wrong!');
        }
    }

    /**
    * Author Ganesh 
    * Get Videos
    * Route : videos/datatable
    *Created at :- 09-12-2022
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function getClassesVideosDatatable1(InstructorVideos $videos, Request $request)
    {
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length");
        
        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; 

        $banners = $videos->where('instructor_id', '=', $this->guard()->user()->id)->where('main_course_category_id',$request->level)->where('discipline_id',$request->discipline)->get();

        $totalRecords = count($banners);
        $totalRecordswithFilter = 12;

        $result = array();

        if(!empty($banners))
        {
            foreach($banners as $b)
            {   
                $result[] = array(
                                    'select' => $b->id,   
                                    'id' => $b->id,   
                                    'banner_id' => $b->title,
                                    'thumbnail' => isset($b->video_thumbnail) ? $b->video_thumbnail : '',
                );    
            }
        }

        $ap_data = [];
        foreach($result as $key => $item){
        $ap_item = [];
        $ap_item[] = $item['select'];
        $ap_item[] = $item['id'];
        $ap_item[] = $item['banner_id'];
        // $ap_item[] = $item['Product_Type'];
        $ap_item[] = $item['thumbnail'];
        array_push($ap_data, $ap_item);
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "data" => $ap_data
         );

        return json_encode($response);
        // print_r($result);die;
        //print_r($result);die;
        // return DataTables::of($result)->addIndexColumn()->make(true);
    }

    public function getClassesVideosDatatable(InstructorVideos $videos, Request $request)
    {
        // DB::table('change_price')->truncate();

        ## Read value
        // $draw = $request->get('draw');
        // $start = $request->get("start");
        // $rowperpage = $request->get("length"); // Rows display per page;
    
        // $columnIndex_arr = $request->get('order');
        // $columnName_arr = $request->get('columns');
        //$order_arr = $request->get('order');
        $search_arr = $request->get('search');

        // $columnIndex = $columnIndex_arr[0]['column']; // Column index
        // $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        // $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value

        $banners = $videos->where('instructor_id', '=', $this->guard()->user()->id)->where('main_course_category_id',$request->level)->where('discipline_id',$request->discipline)->get();

        $totalRecords =  count($banners);
        $totalRecordswithFilter = count($banners);

        if(empty($searchValue)){
            $rows =  $videos->where('instructor_id', '=', $this->guard()->user()->id)->where('main_course_category_id',$request->level)->where('discipline_id',$request->discipline)->get()->toArray();
        }
        else{
            $rows = $videos->where('instructor_id', '=', $this->guard()->user()->id)->where('main_course_category_id',$request->level)->where('discipline_id',$request->discipline)->where('title','like','%'.$searchValue.'%')->get()->toArray();

            
            
            $totalRecordswithFilter = count($rows);   
        }
        
        $data_arr = array();    

        if(!empty($rows))
        {
            $i=1;
            foreach($rows as $r)
            {
                $data_arr[] = array(
                    "select"=> $r['id'],
                    "title"=>$r['title'],
                    "thumbnail" => '<img src="'.$r['video_thumbnail'].'" style="height:50px;width:100px;">',
                  );
                
                  $i++;
            }
        }

        $data = [];
            $ap_data = [];
            foreach($data_arr as $key => $item){
            $ap_item = [];
            $ap_item[] = $item['select'];
            $ap_item[] = $item['title'];
            $ap_item[] = $item['thumbnail'];
            array_push($ap_data, $ap_item);
            }
            
        $response = array(
            // "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "data" => $ap_data
         );

        return json_encode($response);
    }

    public function getEditClassesVideosDatatable(InstructorVideos $videos, Request $request)
    {
        // DB::table('change_price')->truncate();

        ## Read value
        // $draw = $request->get('draw');
        // $start = $request->get("start");
        // $rowperpage = $request->get("length"); // Rows display per page;
    
        // $columnIndex_arr = $request->get('order');
        // $columnName_arr = $request->get('columns');
        //$order_arr = $request->get('order');
        $search_arr = $request->get('search');

        // $columnIndex = $columnIndex_arr[0]['column']; // Column index
        // $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        // $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value

        $selectedVideos = [];

        $selectedAllVideos = ClassVideos::select('video_id')->where('class_id',$request->classId)->get();
        
        if(!empty($selectedAllVideos))
        {
            foreach($selectedAllVideos as $vid)
            {
                array_push($selectedVideos,$vid->video_id);
            }
        }

        //$banners = $videos->whereNotIn('id',$selectedVideos)->where('instructor_id', '=', $this->guard()->user()->id)->where('main_course_category_id',$request->level)->where('discipline_id',$request->discipline)->get();
        $banners = $videos->where('instructor_id', '=', $this->guard()->user()->id)->where('main_course_category_id',$request->level)->where('discipline_id',$request->discipline)->get();

        $totalRecords =  count($banners);
        $totalRecordswithFilter = count($banners);

        if(empty($searchValue)){
            $rows =  $videos->where('instructor_id', '=', $this->guard()->user()->id)->where('main_course_category_id',$request->level)->where('discipline_id',$request->discipline)
                // ->skip($start)
                // ->take($rowperpage)
                // ->toSQL();
                ->get()
                ->toArray();
            // print_r($rows );die;    
        }
        else{
            $rows = $videos
            ->where('instructor_id', '=', $this->guard()->user()->id)
            ->where('main_course_category_id',$request->level)
            ->where('discipline_id',$request->discipline)
            ->where('title','like','%'.$searchValue.'%')
            ->get()
            ->toArray();

            
            
            $totalRecordswithFilter = count($rows);   
        }
        
        $data_arr = array();    

        if(!empty($rows))
        {
            $i=1;
            foreach($rows as $r)
            {
                $data_arr[] = array(
                    "select"=> $r['id'],
                    "title"=>$r['title'],
                    "thumbnail" => '<img src="'.$r['video_thumbnail'].'" style="height:50px;width:100px;">',
                  );
                
                  $i++;
            }
        }

        $data = [];
            $ap_data = [];
            foreach($data_arr as $key => $item){
            $ap_item = [];
            $ap_item[] = $item['select'];
            $ap_item[] = $item['title'];
            $ap_item[] = $item['thumbnail'];
            array_push($ap_data, $ap_item);
            }
            
        $response = array(
            // "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "data" => $ap_data
         );

        return json_encode($response);
    }

    public function getSelctedVideos(InstructorVideos $videos,Request $request)
    {
        $videos = $request->videos;

        $result = array();

        if(!empty($videos))
        {
            foreach($videos as $v)
            {
                $result[] = InstructorVideos::select('id','video_thumbnail','title')->where('id', '=', $v)->first();
            }
        }
        
        return json_encode($result);
    }

    public function markPublished(Request $request, InstructorClasses $class)
    {   
        $classes = $class->find($request->id);
        $classes->publish = $request->value;
        $isEdit = $classes->update();

        if($isEdit){
            if($request->value == 1)
            {
                $responseData = array('success'=>'1','message'=>"Class has been published successfully.");
            }
            else
            {
                $responseData = array('success'=>'1','message'=>"Class has been unpublished successfully.");
            }
          
            return $responseData; //redirect('admins/subscriptionplan')->with("success", "Subscription plan status has been changed successfully.");
        }

        $responseData = array('success'=>'0','message'=>"Sorry, Something went wrong please try again");
        return $responseData; 
        //redirect('admins/subscriptionplan')->with("error", "Sorry, Something went wrong please try again");
    }

    public function editClassDetails(InstructorClasses $classes, Request $request)
    {
        // Validate Add Demonstration Video Fields
        $request->validate([
            'class_name' => 'required',
            'level' => 'required',
            'discipline' => 'required',
            'videos' => 'required',
            'classId' => 'required'
        ],
        [
            'class_name.required' => 'Please enter class name',
            'level.required' => 'Please select level',
            'discipline.required' => 'Please select discipline',
            'videos.required' => 'Please select videos'

        ]);


        $class = $classes->find($request->classId);
        $class->class_name = $request->class_name;
        $class->main_category_id = $request->level;
        $class->discipline_id = $request->discipline;
        $isEdit = $class->update();

        if($isEdit)
        {
            ClassVideos::where('class_id',$request->classId)->delete();

            if(!empty($request->videos))
            {
                foreach($request->videos as $v)
                {
                    $class_videos = new ClassVideos();
                    $class_videos->class_id = $class->id;
                    $class_videos->video_id = $v;
                    $class_videos->save();
                }
            }
        }

       

        if ($isEdit) {
            $response['message'] = "Class has been updated successfully.";
            $response['status'] = true;
        } else {
            $response['message'] = "Class does not found!";
            $response['status'] = false;
        }
        
        return response()->json($response);
    }

    public function getRemainingVideos(InstructorClasses $classes, Request $request)
    {
        $result = ClassVideos::where('class_id',$request->classId)->where('video_id',$request->videoId)->delete();

        if ($result) {
            //$response['message'] = "Class has been updated successfully.";
            $response['status'] = true;
        } else {
            //$response['message'] = "Class does not found!";
            $response['status'] = false;
        }
        
        return response()->json($response);
    }

    public function dacastVideoAPI(Request $request){

        set_time_limit(0);

        $page = $request->page ?? 1;
        $limit = $request->limit ?? 10;
        $videos = $this->listVideoOnDacast($page, $limit);
        // dd($videos);
        if(!Auth::user()->dacast_folder_id){
            $data = $this->createFolderOnDacast($this->createFolderName(Auth::user()->name, Auth::user()->id));
            if(!isset($data['data']['message'])){
                Auth::user()->dacast_folder_id = $data['data']['id'];
                Auth::user()->dacast_path = $data['data']['path'];
                Auth::user()->update();
            }
        }

        if(!Auth::user()->bio_id_path){
            $bio = $this->createSubFolderOnDacast(Auth::user()->dacast_path,'Bio_videos');
            // dd($bio);
            if(!isset($bio['data']['message'])){
                Auth::user()->bio_id_path = $bio['data']['id'].'-'.$bio['data']['path'];
                Auth::user()->update();
            }
            // dd($bio);
        }

        if(!Auth::user()->demo_id_path){
            $demo = $this->createSubFolderOnDacast(Auth::user()->dacast_path,'Demo_videos');
            if(!isset($demo['data']['message'])){
                Auth::user()->demo_id_path = $demo['data']['id'].'-'.$demo['data']['path'];
                Auth::user()->update();
            }
            // dd($bio);
        }

        if(!Auth::user()->teach_id_path){
            $teach = $this->createSubFolderOnDacast(Auth::user()->dacast_path,'Teach_videos');
            if(!isset($teach['data']['message'])){
                Auth::user()->teach_id_path = $teach['data']['id'].'-'.$teach['data']['path'];
                Auth::user()->update();
            }
            // dd($bio);
        }

        return view('front.instructors.instructor_dacast', compact('videos'));
    }

    public function instructorVideoUpload(Request $request){
        // dd($request->all());

        // $dacast_videos = $this->listVideoOnDacast();
        // dd($dacast_videos);
        set_time_limit(0);

        if ($request->hasFile('video')) {
            $image = $request->file('video');
            $customName = $this->createFolderName(Auth::user()->name, Auth::user()->id) . '-' . time() . '.' . $image->getClientOriginalExtension(); // Define your custom name

            $path = $image->move(public_path('videos'), $customName);

            // $video_title = $this->extractVideoTitle(basename($customName));
            // if(!$video_title){
            //     $videl_title = $customName;
            // }

            $video = $this->createVideoOnDacast(base_path("public/videos/".$customName));
            // dd($video, $videl_title);
            // $get_video_detail = $this->getVideoDetailByTitle(base_path("public/videos/".$customName));
            
            // $video_title = $this->extractVideoTitle(basename($customName));
            // dd(basename($customName), $video_title);
            // if($video_title){
                // }
            

            while(true){
                $getCurrentVideoUploaded = $this->getVideoDetailByTitle("public/videos/".$customName);
                if(isset($getCurrentVideoUploaded['data']['data']) and (count($getCurrentVideoUploaded['data']['data']) > 0)){
                    // dd($getCurrentVideoUploaded);
                    $getCurrentVideoUploaded = $getCurrentVideoUploaded['data']['data'][0];
                    
                    $updateVideo = array(
                        'title' => $customName,
                        'description' => 'Description of the video uploaded',
                        'online' => true,
                    );
                    $update = $this->updateVideoOnDacast($getCurrentVideoUploaded['original_id'], $updateVideo);
                    break;
                }
            }

            dd($getCurrentVideoUploaded,2702);
            
            $fileToDelete = public_path('videos/'.$customName);
            // dd($fileToDelete);
            if (file_exists($fileToDelete)) {
                unlink($fileToDelete);
            }
            if(isset($video[1]['status']) and (isset($video[1]['status']) == 'success')){
                return response()->json(array('status' => 'success', 'message' =>'video uploaded successfully'));
            }
            else{
                return response()->json(array('status' => 'error', 'message' =>$video[1]['data']));
            }
        }

    }

    public function dacastVideoPlay($id){
        $video = $this->getVideoDetailByID($id);
        // dd($video);

        if(isset($video['status']) and ($video['status'] == 'error')){
            return redirect()->back()->with('error', $video['data']);
        }
        else{
            $video = $video['data'];
            // dd($this->extractVideoTitle($this->createFolderName(Auth::user()->name, Auth::user()->id) . '-' . time()));
            if (strpos($video['title'], 'public/videos') !== false) {
                // dd('f', $this->createFolderName(Auth::user()->name, Auth::user()->id) . '-' . time());
                $video_update = $this->updateVideoTitleByID($video['id'], $this->createFolderName(Auth::user()->name, Auth::user()->id) . '-' . time());
            }
            
            // dd($video);
            return view('front.instructors.instructor_dacast_play', compact('video'));
        }
    }
    
    public function createFolderName($name,$user_id){
        $folder_parts = explode(" ", $name);
        if (count($folder_parts) > 0) {
            return $folder_parts[0].'_'.$user_id;
        } else {
            return 'folder_'.time();
        }
    }

    public function extractVideoTitle($filename){
        // Use preg_match to extract the desired data
        if (preg_match('#public/videos/([^/]+)#', $filename, $matches)) {
            return $matches[0];
        } else {
            return false;
        }
    }

    public function deletePublicVideos($customName){
        $fileToDelete = public_path('videos/'.$customName);
        // dd($fileToDelete);
        if (file_exists($fileToDelete)) {
            unlink($fileToDelete);
        }
    }

}