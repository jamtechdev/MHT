<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CourseCategoryController;
use App\Http\Controllers\Admin\SubCourseCategoryController;
use App\Http\Controllers\Admin\Auth\ChangePasswordController;
use App\Http\Controllers\Admin\ContactusController;
use App\Http\Controllers\Admin\InstructorController;
use App\Http\Controllers\Admin\DisciplineController;
use App\Http\Controllers\Admin\SubscriptionPlanController;
use App\Http\Controllers\Admin\SubscriptionBenefitsController;
use App\Http\Controllers\Admin\PromocodeController;
use App\Http\Controllers\Admin\BannerChangeController;
use App\Http\Controllers\Admin\AllTabPasswordController;
use App\Http\Controllers\Admin\FaqController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware('is-verified-to-access')->group(function () {
$appRoutes = function () {
    Route::get('/', function () {
        return redirect('admins/dashboard');
    });

    // Authentication Routes...
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [LoginController::class, 'login'])->name('admin.login.post');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    // Auth::routes([
    //     'register' => true, // Registration Routes...
    //     'reset' => true, // Password Reset Routes...
    //     'verify' => true, // Email Verification Routes...
    // ]);

    // Email verification
    // Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
    // Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
    // Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

    Route::middleware(['auth:admin'])->group(function () { // verified

        // Change password
        // Route::get('password/change', 'Auth\ChangePasswordController@showChangePasswordForm')->name('password.change');
        // Route::post('password/change/update', 'Auth\ChangePasswordController@changePassword')->name('password.change.update');
        Route::get('password/change', [ChangePasswordController::class, 'showChangePasswordForm'])->name('password.change');
        Route::post('password/change/update', [ChangePasswordController::class, 'changePassword'])->name('password.change.update');

        Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        // Route::resource('dashboard', DashboardController::class);

        // Route::get('users/datatable', 'UserController@getDatatable');
        // Route::resource('users', 'UserController');
        Route::get('users/datatable', [UserController::class, 'getDatatable'])->name('admmin.user.datatable');
        Route::get('userstatus/{id}/{type}', [UserController::class, 'getUserStatus'])->name('getusertype');
        Route::get('users', [UserController::class, 'index'])->name('users.index');
        // Route::get('users/create', [UserController::class, 'create'])->name('users.create');
        // Route::post('users', [UserController::class, 'store'])->name('admin.users.store');
        Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('users/{user}', [UserController::class, 'update'])->name('admin.users.update');
        Route::delete('users/{user}', [UserController::class, 'destroy'])->name('admin.users.delete');
        Route::get('users/export', [UserController::class, 'exportUsers'])->name('admin.users.export');
        // Route::resource('users', UserController::class);

        // Course Category Routes
        Route::get('coursecategory/datatable', [CourseCategoryController::class, 'getDatatable'])->name('admin.coursecategory.datatable');
        Route::get('coursecategory', [CourseCategoryController::class, 'index'])->name('coursecategory');
        Route::get('coursecategory/create', [CourseCategoryController::class, 'create'])->name('createcoursecategory');
        Route::post('coursecategory', [CourseCategoryController::class, 'store'])->name('admin.coursecategory.store');
        Route::get('coursecategory/{class}/edit', [CourseCategoryController::class, 'edit'])->name('editcoursecategory');
        Route::put('coursecategory/{class}', [CourseCategoryController::class, 'update'])->name('admin.coursecategory.update');
        Route::delete('coursecategory/{class}', [CourseCategoryController::class, 'destroy'])->name('deletecoursecategory');

        // Course Sub Category Routes
        Route::get('coursesubcategory/datatable', [SubCourseCategoryController::class, 'getDatatable'])->name('admin.coursesubcategory.datatable');
        Route::get('coursesubcategory', [SubCourseCategoryController::class, 'index'])->name('coursesubcategory');
        Route::get('coursesubcategory/create', [SubCourseCategoryController::class, 'create'])->name('coursesubcategory');
        Route::post('coursesubcategory', [SubCourseCategoryController::class, 'store'])->name('admin.coursesubcategory.store');
        Route::get('coursesubcategory/{class}/edit', [SubCourseCategoryController::class, 'edit'])->name('editcoursesubcategory');
        Route::put('coursesubcategory/{class}', [SubCourseCategoryController::class, 'update'])->name('admin.coursesubcategory.update');
        Route::delete('coursesubcategory/{class}', [SubCourseCategoryController::class, 'destroy'])->name('deletecoursesubcategory');

        //Subscription Plan Routes
        Route::get('subscriptionplan/datatable', [SubscriptionPlanController::class, 'getDatatable'])->name('admin.subscriptionplan.datatable');
        Route::get('subscriptionplan', [SubscriptionPlanController::class, 'index'])->name('subscriptionplan');
        Route::get('subscriptionplan/create', [SubscriptionPlanController::class, 'create'])->name('createsubscriptionplan');
        Route::post('newSubscription', [SubscriptionPlanController::class, 'store'])->name('admin.newSubscription.store');
        Route::get('subscriptionplan/{class}/edit', [SubscriptionPlanController::class, 'edit'])->name('editsubscriptionplan');
        Route::put('subscriptionplan/{class}', [SubscriptionPlanController::class, 'update'])->name('admin.subscriptionplan.update');
        Route::post('subscriptionplanstatus/{class}', [SubscriptionPlanController::class, 'statusUpdate'])->name('admin.subscriptionplanstatus.update');
        Route::delete('subscriptionplan/{class}', [SubscriptionPlanController::class, 'destroy'])->name('deletesubscriptionplan');

        //Subscription Benefits Routes
        Route::get('subscriptionbenefits', [SubscriptionBenefitsController::class, 'index'])->name('subscriptionbenefits');
        Route::get('subscriptionbenefits/create', [SubscriptionBenefitsController::class, 'create'])->name('createsubscriptionbenefits');
        Route::post('subscriptionbenefit', [SubscriptionBenefitsController::class, 'store'])->name('admin.subscriptionbenefit.store');
        Route::get('benefits/datatable', [SubscriptionBenefitsController::class, 'getDatatable'])->name('admin.benefits.datatable');    
        Route::get('benefits/{class}/edit', [SubscriptionBenefitsController::class, 'edit'])->name('editbenefits');
        Route::put('benefits/{class}', [SubscriptionBenefitsController::class, 'update'])->name('admin.benefits.update');
        Route::delete('benefits/{class}', [SubscriptionBenefitsController::class, 'destroy'])->name('deletebenefits');

        //Promo Code Routes
        Route::get('promocode', [PromocodeController::class, 'index'])->name('promocode');
        Route::get('promocode/create', [PromocodeController::class, 'create'])->name('createpromocode');
        Route::post('promocode', [PromocodeController::class, 'store'])->name('admin.promocode.store');
        Route::get('promocode/datatable', [PromocodeController::class, 'getDatatable'])->name('admin.promocode.datatable');    
        Route::get('promocode/{class}/edit', [PromocodeController::class, 'edit'])->name('editpromocode');
        Route::put('promocode/{class}', [PromocodeController::class, 'update'])->name('admin.promocode.update');
        Route::delete('promocode/{class}', [PromocodeController::class, 'destroy'])->name('deletepromocode');

        //Change Home Page Banner Video Routes
        Route::get('bannerChange', [BannerChangeController::class, 'index'])->name('bannerChange');
        Route::get('banner/create', [BannerChangeController::class, 'create'])->name('createbanner');
        Route::post('createNewBanner', [BannerChangeController::class, 'store'])->name('admin.createNewBanner.store');
        Route::get('banners/datatable', [BannerChangeController::class, 'getDatatable'])->name('admin.banners.datatable');    
        Route::get('banner/{class}/edit', [BannerChangeController::class, 'edit'])->name('editbanner');
        Route::post('bannerUpdate', [BannerChangeController::class, 'updateBanner'])->name('admin.bannerUpdate.update');
        Route::post('bannerstatus/{class}', [BannerChangeController::class, 'statusUpdate'])->name('admin.bannerstatus.update');
        Route::delete('banner/{class}', [BannerChangeController::class, 'destroy'])->name('deletebanner');

        // Instructores Routes
        Route::get('instructor/datatable', [InstructorController::class, 'getDatatable'])->name('admin.instructor.datatable');
        Route::get('instructor', [InstructorController::class, 'index'])->name('instructor.index');
        Route::get('instructor/{id}/info', [InstructorController::class, 'showinfo'])->name('instructor.info');
        Route::get('instructor/{id}/{type}', [InstructorController::class, 'status'])->name('admin.instructor.status');
        Route::get('instructor/display-order', [InstructorController::class, 'instructorDisplayOrder'])->name('admin.instructor.displayorder');
        Route::get('instructor/fetch/discipline/{discipline_id}', [InstructorController::class, 'instructorFetchDisciplineData'])->name('instructor.discipline.fetchdata');
        Route::post('instructor/save-display-order', [InstructorController::class, 'saveDisplayOrder'])->name('instructor.save.display.order');

        //disciplines Routes
        Route::get('discipline/datatable', [DisciplineController::class, 'getDatatable'])->name('admin.discipline.datatable');
        Route::get('discipline', [DisciplineController::class, 'index'])->name('discipline');
        Route::get('discipline/create', [DisciplineController::class, 'create'])->name('creatediscipline');
        Route::post('discipline', [DisciplineController::class, 'store'])->name('admin.discipline.store');
        Route::get('discipline/{id}/edit', [DisciplineController::class, 'edit'])->name('editdiscipline');
        Route::put('discipline/{id}', [DisciplineController::class, 'update'])->name('admin.discipline.update');
        Route::delete('discipline/{id}', [DisciplineController::class, 'delete'])->name('deletediscipline');
        Route::post('discipline/photo/upload', [DisciplineController::class, 'uploadphoto'])->name('discipline.uploadphoto');
        Route::get('discipline/display-order', [DisciplineController::class, 'disciplineDisplayOrder'])->name('admin.discipline.displayorder');
        Route::post('discipline/save-display-order', [DisciplineController::class, 'saveDisplayOrder'])->name('discipline.save.display.order');
        
        // faq
        Route::get('faq/', [FaqController::class, 'index'])->name('faq.index');
        Route::get('faq/create/{parent_id}', [FaqController::class, 'create'])->name('faq.create');
        Route::post('faq/store/faq-heading', [FaqController::class, 'storeFaqHeading'])->name('faq.store.heading.data');
        Route::get('faq/edit/{faq_id}', [FaqController::class, 'editFaqHeading'])->name('faq.edit');
        Route::post('faq/update/faq-heading', [FaqController::class, 'updateFaqHeading'])->name('faq.update.heading.data');
        Route::get('faq/delete/faq-heading/{id}', [FaqController::class, 'deleteFaqHeading'])->name('faq.delete.heading.data');
        Route::post('store-faq-heading', [FaqController::class, 'storeFaq'])->name('store.faq.heading');
        Route::get('faq-edit/{id}', [FaqController::class, 'showEditFaq'])->name('edit.faq.heading');
        Route::post('post-faq-heading', [FaqController::class, 'updateFaq'])->name('post.faq.heading');

        // all tab password
        Route::get('all-tab-password', [AllTabPasswordController::class, 'index'])->name('all.tab.password');
        Route::post('all-tab-password', [AllTabPasswordController::class, 'updatePassword'])->name('post.all.tab.password');
    });
};

    Route::group(array('prefix' => "admins", "namespace" => "Admin", "as" => "admin::"), $appRoutes);
});