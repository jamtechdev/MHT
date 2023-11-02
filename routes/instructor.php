<?php


use App\Http\Controllers\InstructorController;
use Illuminate\Support\Facades\Route;
use Fruitcake\Cors\HandleCors;

// Instructor Routes
Route::middleware('guest')->group(function () {
    Route::get('/instructor_login', [InstructorController::class, 'getInstructorLogin'])->name('instructor_login');
    Route::post('/instructor_login', [InstructorController::class, 'postInstructorLogin']);
    Route::post('instructor_logout', [InstructorController::class, 'instructorLogout'])->name('instructor_logout');
    Route::get('/instructor_forgot_password', [InstructorController::class, 'getForgotPassword'])->name('instructor_forgot_password');
    Route::post('/instructor_forgot_password', [InstructorController::class, 'postForgotPassword']);
    Route::get('/instructor_reset_password/{token}', [InstructorController::class, 'getResetPassword'])->name('instructor_reset_password');
    Route::post('/instructor_reset_password', [InstructorController::class, 'postResetPassword'])->name('post_instructor_reset_password');
    Route::get('/instructor_register', [InstructorController::class, 'create'])->name('instructor_register');
    Route::post('/instructor_register', [InstructorController::class, 'store']);
    Route::get('/instructor_edit/{id}', [InstructorController::class, 'edit'])->name('instructor_edit');
    Route::post('/instructor_edit/{id}', [InstructorController::class, 'update']);
});

Route::middleware(['auth:instructor'])->group(function () {
    Route::get('instructor_dashboard', [InstructorController::class, 'getInstructorDashboard'])->name('instructor_dashboard');
    Route::get('instructor_profile/{id}', [InstructorController::class, 'getInstructorProfile'])->name('instructor_profile');
    Route::get('instructor_profile_edit/{id}', [InstructorController::class, 'getEditInstructorProfile'])->name('instructor_profile_edit');
    Route::post('instructor_profile_edit/{id}', [InstructorController::class, 'updateInstructorProfile'])->name('instructor_profile_edit_post');
    Route::post('instructor/certificate/upload', [InstructorController::class, 'uploadCertificate'])->name('instructor_certificate_upload');
    Route::post('instructor/profile_picture/upload', [InstructorController::class, 'uploadProfilePicture'])->name('instructor_profile_picture_upload');
    Route::post('instructor/banner/upload', [InstructorController::class, 'uploadBanner'])->name('instructor_banner_upload');
    Route::get('instructor_changepassword/{id}', [InstructorController::class, 'getInstructorChangePassword'])->name('instructor_changepassword');
    Route::post('instructor_changepassword/{id}', [InstructorController::class, 'updateInstructorChangePassword'])->name('instructor_changepassword_post');
    Route::get('instructor_settings', [InstructorController::class, 'getInstructorSettings'])->name('instructor_settings');
    Route::get('instructor_dacast', [InstructorController::class, 'dacastVideoAPI'])->name('dacastVideoAPI')->middleware([Fruitcake\Cors\HandleCors::class]);
    Route::get('video-play/{id}', [InstructorController::class, 'dacastVideoPlay'])->name('dacast.video.play')->middleware([Fruitcake\Cors\HandleCors::class]);
    Route::post('instructor-video-upload', [InstructorController::class, 'instructorVideoUpload'])->name('instructor.video.upload');
    Route::get('instructor_biography', [InstructorController::class, 'getInstructorBiographyVideo'])->name('instructor_biography');
    Route::get('instructor_add_biography', [InstructorController::class, 'getInstructorAddBiographyVideo'])->name('instructor_add_biography');
    Route::get('instructor-play-video/{id}', [InstructorController::class, 'instructorPlayVideo'])->name('instructorPlayVideo');
    Route::post('instructor_post_biography', [InstructorController::class, 'getInstructorPostBiographyVideo'])->name('instructor_post_biography');
    Route::get('delete_instructor_biography/{biographyId}', [InstructorController::class, 'deleteInstructorBiography'])->name('delete_instructor_biography');
    Route::post('biographystatus/{class}', [InstructorController::class, 'biographyStatusUpdate'])->name('biographystatus');
    Route::get('editBiographyVideo', [InstructorController::class, 'editBiographyVideo'])->name('editBiographyVideo');
    Route::post('instructor_update_biography', [InstructorController::class, 'updateBiographyVideo'])->name('instructor_update_biography');

    // Start Demonstration
    Route::get('instructor_demonstration', [InstructorController::class, 'getInstructorDemonstrationVideo'])->name('instructor_demonstration');
    Route::get('instructor_add_demonstration', [InstructorController::class, 'getInstructorAddDemonstationVideo'])->name('instructor_add_demonstration');
    Route::post('instructor_post_demonstration', [InstructorController::class, 'getInstructorPostDemonstrationVideo'])->name('instructor_post_demonstration');
    Route::get('delete_instructor_demonstration/{biographyId}', [InstructorController::class, 'deleteInstructorDemonstration'])->name('delete_instructor_demonstration');
    Route::post('demonstrationvideostatus/{class}', [InstructorController::class, 'demonstrationVideoStatusUpdate'])->name('demonstrationvideostatus');
    Route::get('editDemonstrationVideo', [InstructorController::class, 'editDemonstrationVideo'])->name('editDemonstrationVideo');
    Route::post('instructor_update_demonstration', [InstructorController::class, 'updateDemonstrationVideo'])->name('instructor_update_demonstration');
    // End Demonstration

    // Start Recommended Video
    Route::get('instructor_recommended', [InstructorController::class, 'getInstructorRecommendedVideo'])->name('instructor_recommended');
    Route::get('instructor_add_recommneded', [InstructorController::class, 'getInstructorAddRecommendedVideo'])->name('instructor_add_recommneded');
    Route::post('instructor_post_recommended', [InstructorController::class, 'getInstructorPostRecommendedVideo'])->name('instructor_post_recommended');
    Route::get('delete_instructor_recommended/{biographyId}', [InstructorController::class, 'deleteInstructorRecommended'])->name('delete_instructor_recommended');
    Route::post('recommendedvideostatus/{class}', [InstructorController::class, 'recommendedVideoStatusUpdate'])->name('recommendedvideostatus');
    // End Recommended Video

    // Start add videos routes
    Route::get('instructor_videos', [InstructorController::class, 'getInstructorVideos'])->name('instructor_videos');
    Route::get('instructor_add_videos', [InstructorController::class, 'getInstructorAddVideos'])->name('instructor_add_videos');
    Route::post('instructor_post_video', [InstructorController::class, 'getInstructorPostVideo'])->name('instructor_post_video');
    Route::get('videos_datatable', [InstructorController::class, 'getVideoDatatable'])->name('videos_datatable');
    Route::delete('video/{class}', [InstructorController::class, 'deleteVideo'])->name('deleteVideo');
    Route::get('video/{class}/edit', [InstructorController::class, 'editVideo'])->name('editVideo');
    Route::post('instructor_update_video', [InstructorController::class, 'updateVideo'])->name('instructor_update_video');
    Route::get('getSubCourse/{class}', [InstructorController::class, 'getSubCourse'])->name('getSubCourse');
    Route::post('markRecommnded/{class}', [InstructorController::class, 'markRecommnded'])->name('markRecommnded');
    // End of add videos routes

    // Start of classes routes
    Route::get('instructor_classes', [InstructorController::class, 'getInstructorClasses'])->name('instructor_classes');
    Route::get('instructor_add_classes', [InstructorController::class, 'getInstructorAddClasses'])->name('instructor_add_classes');
    Route::post('instructor_post_class', [InstructorController::class, 'getInstructorPostClass'])->name('instructor_post_class');
    Route::get('classes_datatable', [InstructorController::class, 'getClassesDatatable'])->name('classes_datatable');
    Route::delete('classes/{class}', [InstructorController::class, 'deleteClasses'])->name('deleteClasses');
    Route::get('class/{class}/edit', [InstructorController::class, 'editClass'])->name('editClass');
    Route::get('class/{class}/getEditClassesVideosDatatable', [InstructorController::class, 'getEditClassesVideosDatatable'])->name('getEditClassesVideosDatatable');
    Route::post('instructor_edit_class', [InstructorController::class, 'editClassDetails'])->name('instructor_edit_class');
    Route::get('class/{class}/classes_videos_datatable', [InstructorController::class, 'getEditClassVideoDatatable'])->name('classes_videos_datatable');
    Route::get('getClassesVideosDatatable', [InstructorController::class, 'getClassesVideosDatatable'])->name('getClassesVideosDatatable');
    Route::post('getSelctedVideos', [InstructorController::class, 'getSelctedVideos'])->name('getSelctedVideos');
    Route::post('markPublished', [InstructorController::class, 'markPublished'])->name('markPublished');
    Route::post('class/{class}/getRemainingVideos', [InstructorController::class, 'getRemainingVideos'])->name('getRemainingVideos');
    Route::get('classPreview/{id}', [InstructorController::class, 'classPreview'])->name('classPreview');
    // End of classes routes

    Route::get('instructor_announcement', [InstructorController::class, 'getInstructorAnnouncement'])->name('instructor_announcement');
    Route::get('instructor_add_announcement', [InstructorController::class, 'getInstructorAddAnnouncement'])->name('instructor_add_announcement');
    Route::get('instructor_reviews', [InstructorController::class, 'getInstructorReviews'])->name('instructor_reviews');
    Route::get('instructor_profile_grade', [InstructorController::class, 'getInstructorProfileGrade'])->name('instructor_profile_grade');
    Route::get('instructor_profile_questions', [InstructorController::class, 'getInstructorProfileQuestions'])->name('instructor_profile_questions');
    Route::get('instructor_profile_add_questions', [InstructorController::class, 'getInstructorProfileAddQuestions'])->name('instructor_profile_add_questions');
    Route::get('instructor_profile_course', [InstructorController::class, 'getInstructorProfileCourse'])->name('instructor_profile_course');
    Route::get('instructor_add_course', [InstructorController::class, 'getInstructorAddCourse'])->name('instructor_add_course');
    Route::post('instructor_add_course', [InstructorController::class, 'postInstructorAddCourse'])->name('post_instructor_add_course');
    Route::get('instructor_edit_course/{courseId}', [InstructorController::class, 'getInstructorEditCourse'])->name('instructor_edit_course');
    Route::post('instructor_edit_course/{courseId}', [InstructorController::class, 'postInstructorEditCourse'])->name('post_instructor_edit_course');
    Route::get('instructor_course_details/{courseId}', [InstructorController::class, 'getInstructorCourseDetails'])->name('instructor_course_details');
    Route::get('instructor_add_course_lession/{courseId}', [InstructorController::class, 'getInstructorAddCourseLession'])->name('instructor_add_course_lession');
    Route::post('instructor_add_course_lession/{courseId}', [InstructorController::class, 'postInstructorAddCourseLession']);
    Route::get('delete_instructor_lession/{lessionId}', [InstructorController::class, 'deleteInstructorLession'])->name('delete_instructor_lession');
    Route::get('delete_instructor_course/{courseId}', [InstructorController::class, 'deleteInstructorCourse'])->name('delete_instructor_course');
});
