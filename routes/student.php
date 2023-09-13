<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\CronController;
use App\Http\Controllers\StripePaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\BuyPlanController;
use App\Models\SubscriptionPlan;
use App\Models\SubscriptionBenefit;
use App\Models\User;


// Student Routes
Route::middleware(['guest'])->group(function () {
    Route::get('/student-register-step-one', [StudentController::class, 'getStudentRegisterStepOne'])->name('student.register.step.one');
    Route::post('/post-student-register-step-one', [StudentController::class, 'postStudentRegisterStepOne'])->name('post.student.register.step.one');
    Route::get('/student-register-step-two', [StudentController::class, 'getStudentRegisterStepTwo'])->name('student.register.step.two');
    Route::post('/post-student-register-step-two', [StudentController::class, 'postStudentRegisterStepTwo'])->name('post.student.register.step.two');
    Route::get('/student-register-step-three', [StudentController::class, 'getStudentRegisterStepThree'])->name('student.register.step.three');
    Route::post('/post-student-register-step-three', [StudentController::class, 'postStudentRegisterStepThree'])->name('post.student.register.step.three');
    Route::get('/studentregisterstepfour', [StudentController::class, 'getStudentRegisterStepFour'])->name('studentregisterstepfour');
    Route::post('/studentregisterstepfour', [StudentController::class, 'postStudentRegisterStepFour']);
});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', [StudentController::class, 'getStudentDashboard'])->middleware('check.step.complete')->name('dashboard');

    // Route::get('student_profile/{id}', [StudentController::class, 'getStudentProfile'])->name('student_profile');
    
    /**
     * Author Ganesh
     * Removed user id's from url for security
     * Created At :- 2022-08-12
    */
    
    Route::get('student_profile', [StudentController::class, 'getStudentProfile'])->name('student_profile');
    Route::get('student_profile_edit', [StudentController::class, 'getEditStudentProfile'])->name('student_profile_edit');
    Route::post('student_profile_edit', [StudentController::class, 'updateStudentProfile'])->name('student_profile_edit_post');
    Route::get('student_changepassword', [StudentController::class, 'getStudentChangePassword'])->name('student_changepassword');
    Route::post('student_changepassword', [StudentController::class, 'updateStudentChangePassword'])->name('student_changepassword_post');
    Route::get('student_enroll/{id}', [StudentController::class, 'getStudentEnroll'])->name('student_enroll');
    Route::get('student_wishlist/{id}', [StudentController::class, 'getStudentWishlist'])->name('student_wishlist');
    Route::get('student_belt/{id}', [StudentController::class, 'getStudentBelt'])->name('student_belt');
    Route::get('student_history/{id}', [StudentController::class, 'getStudentHistory'])->name('student_history');
    Route::get('student_settings/{id}', [StudentController::class, 'getStudentSettings'])->name('student_settings');
    Route::get('student_cancel_subscription', [StudentController::class, 'cancelSubscription'])->name('student_cancel_subscription');
    Route::post('student_upgrade_plan', [StudentController::class, 'upgradePlan'])->name('student_upgrade_plan');

    Route::get('student_subscription_manage', [StudentController::class, 'getStudentSubscription'])->name('student_subscription_manage');
    Route::get('student_manage_payment_methods', [StudentController::class, 'getManagePaymentMethods'])->name('student_manage_payment_methods');
    Route::get('student_subscription_history/{id}', [StudentController::class, 'getStudentSubscriptionHistory'])->name('student_subscription_history');
    Route::get('changePlanPage', [StudentController::class, 'changePlanPage'])->name('changePlanPage');
    Route::post('verifyPromocode', [StudentController::class, 'verifyPromocode'])->name('verifyPromocode');
    Route::post('cancelUpgradePlan', [StudentController::class, 'cancelUpgradePlan'])->name('cancelUpgradePlan');

    Route::get('/bronzePlanStripe', function (){

        Session::pull("sendUpgradeConfirmEmail");

        if(request()->sendUpgradeConfirmEmail)
        {
            Session::pull("sendUpgradeConfirmEmail");
            Session::put("sendUpgradeConfirmEmail",request()->sendUpgradeConfirmEmail);

            $sendUpgradeConfirmEmail = request()->sendUpgradeConfirmEmail;
        }
        else
        {
            Session::pull("sendUpgradeConfirmEmail");
            Session::put("sendUpgradeConfirmEmail",0);
        }

        $benefits = array();

        if(request()->lastPage)
        {
            Session::pull("lastPage");
            
            Session::put('lastPage',request()->lastPage);
        }
        
        if(request()->planId)
        {
            $planDetails = SubscriptionPlan::where('id',request()->planId)->first();

            $planBenefits = explode(",",$planDetails->benefits);

            $benefits = array();

            if(!empty($planBenefits))
            {
                foreach($planBenefits as $benefit)
                {
                    $benefitTitle = SubscriptionBenefit::where('id',$benefit)->first();

                    if($benefitTitle)
                    {
                        $benefits[] = $benefitTitle->benefit;
                    }
                
                }
            }

            User::where('id',Auth::id())->update([ 
                'subscription_id'=>request()->planId,
                'payment_status'=>0,
                'payment_reminder'=>0,
                'upgrade_plan'=>1,
                'plan_upgraded_date'=>date("Y-m-d")
            ]);
        }
        else
        {
            $planDetails = SubscriptionPlan::where('id',2)->first();
        }
        
        $ifPaymentFail = 0; 
        
        return view('bronzePlanStripe',compact('planDetails','benefits','ifPaymentFail'));
    })->name('bronzePlanStripe');

    Route::post('sendReferralEmail', [StudentController::class, 'sendReferralEmail'])->name('sendReferralEmail');
    Route::post('changeIsFirstTimeUserFlag', [StudentController::class, 'changeIsFirstTimeUserFlag'])->name('changeIsFirstTimeUserFlag');
    Route::post('changeAnyoneAcceptsReferralFlag', [StudentController::class, 'changeAnyoneAcceptsReferralFlag'])->name('changeAnyoneAcceptsReferralFlag');

    /** Autho kalyani
    * cancel plan
    */

Route::post('plan_cancel',[StudentController::class,'plan_cancel'])->name('plan_cancel');
});

Route::get('changePlan/{id}', [StudentController::class, 'changePlan'])->name('changePlan');
Route::post('acceptPlan', [StudentController::class, 'acceptPlan'])->name('acceptPlan');

/**
 * Autho Ganesh
 * CRON routes to send reminder emails
 */

Route::get('sendVerifyEmailReminder', [CronController::class, 'sendVerifyEmailReminder'])->name('sendVerifyEmailReminder');
Route::get('sendSignUpReminder', [CronController::class, 'sendSignUpReminder'])->name('sendSignUpReminder');
Route::get('sendNewSiteLaunchReminder', [CronController::class, 'sendNewSiteLaunchReminder'])->name('sendNewSiteLaunchReminder');
Route::get('sendRedeemPromotionReminder', [CronController::class, 'sendRedeemPromotionReminder'])->name('sendRedeemPromotionReminder');
Route::get('sendReferralEmailReminder', [CronController::class, 'sendReferralEmailReminder'])->name('sendReferralEmailReminder');
Route::get('sendUpgradePlanEmail', [CronController::class, 'sendUpgradePlanEmail'])->name('sendUpgradePlanEmail');
Route::get('sendSoftVerifyEmailReminder', [CronController::class, 'sendSoftVerifyEmailReminder'])->name('sendSoftVerifyEmailReminder');
Route::get('sendPaymentReminder',[CronController::class,'sendPaymentReminder'])->name('sendPaymentReminder');
Route::get('getStudentSubscriptionData',[CronController::class,'getStudentSubscriptionData'])->name('getStudentSubscriptionData');
Route::get('downgradeSubscriptionPlan',[CronController::class,'downgradeSubscriptionPlan'])->name('downgradeSubscriptionPlan');
Route::get('sendPaymentFailureReminder',[CronController::class,'sendPaymentFailureReminder'])->name('sendPaymentFailureReminder');
Route::get('sendReferralEmail',[CronController::class,'sendReferralEmail'])->name('sendReferralEmail');

/**
* Author:kalyani
* CRON routes to send reminder emails after 30 days who did not login
* CRON routes to send reminder to free site user for payment
* CRON routes to send payment reminder after signup if payment not done
* Create at:03/10/2022
*/

Route::get('sendLoginMail',[CronController::class,'sendLoginMail'])->name('sendLoginMail');
ROute::get('sendReminderFreeSiteForPayment',[CronController::class,'sendReminderFreeSiteForPayment'])->name('sendReminderFreeSiteForPayment');

/**
* code end
*/


Route::get('stripe', [StripePaymentController::class, 'stripe'])->name('stripe');
Route::post('stripe', [StripePaymentController::class, 'stripePost'])->name('stripe.post');


Route::get('acceptBronzPlan', [StudentController::class, 'acceptBronzPlan'])->name('acceptBronzPlan');
Route::post('acceptBronzePlan', [StudentController::class, 'acceptBronzPlan'])->name('acceptBronzePlan');
Route::post('searchVideos', [StudentController::class, 'searchVideos'])->name('searchVideos');

Route::post('/instructor-video', [HomeController::class, 'getInstructorVideos'])->name('instructor-video1');
Route::post('/getSearchText', [HomeController::class, 'getSearchText'])->name('getSearchText');
Route::post('/updateStepTwoVisitStatus', [StudentController::class, 'updateStepTwoVisitStatus'])->name('updateStepTwoVisitStatus');
Route::post('/updateStepThreeVisitStatus', [StudentController::class, 'updateStepThreeVisitStatus'])->name('updateStepThreeVisitStatus');
Route::post('/updateStepFourVisitStatus', [StudentController::class, 'updateStepFourVisitStatus'])->name('updateStepFourVisitStatus');

/**
 * Author Ganesh
 * Route for buy new plan
 * Created at : 2022-07-26
 */

Route::get('buyPlan/{id}', [BuyPlanController::class, 'buyPlan'])->name('buyPlan');
Route::post('stripePayment', [BuyPlanController::class, 'stripePayment'])->name('stripePayment');
Route::get('email_form', [StudentController::class, 'emailForm'])->name('email_form');
Route::post('contactUsForm', [StudentController::class, 'contactUsForm'])->name('contactUsForm');
Route::post('contactUsForm1', [StudentController::class, 'contactUsForm1'])->name('contactUsForm1');
Route::post('getInstructorsOfCurrrentDiscipline', [StudentController::class, 'getInstructorsOfCurrrentDiscipline'])->name('getInstructorsOfCurrrentDiscipline');
Route::get('playInstructorVideo', [StudentController::class, 'playInstructorVideo'])->name('playInstructorVideo');
Route::get('bronzePlanStripe1', [StudentController::class, 'getBronzePlanForm'])->name('bronzePlanStripe1');



Route::get('instructorBeltification', [StudentController::class, 'instructorBeltification'])->name('instructorBeltification');
Route::get('createNewBelt', [StudentController::class, 'createNewBelt'])->name('createNewBelt');
Route::get('viewBeltDetails', [StudentController::class, 'viewBeltDetails'])->name('viewBeltDetails');
Route::get('editBeltDetails', [StudentController::class, 'editBeltDetails'])->name('editBeltDetails');
Route::get('beltGradeDashboard', [StudentController::class, 'beltGradeDashboard'])->name('beltGradeDashboard');
Route::get('gradeBeltTest', [StudentController::class, 'gradeBeltTest'])->name('gradeBeltTest');

Route::get('studentBeltification', [StudentController::class, 'studentBeltification'])->name('studentBeltification');
Route::get('studentSubmitedTest', [StudentController::class, 'studentSubmitedTest'])->name('studentSubmitedTest');
Route::get('beltTestResult', [StudentController::class, 'beltTestResult'])->name('beltTestResult');
Route::get('submitBeltTest', [StudentController::class, 'submitBeltTest'])->name('submitBeltTest');
Route::get('beltSearch', [StudentController::class, 'beltSearch'])->name('beltSearch');
Route::get('beltificationDashboard', [StudentController::class, 'beltificationDashboard'])->name('beltificationDashboard');


Route::get('/bronzePlanStripe2', function (){
    $benefits = array();

    if(Auth::user())
    {
        Session::pull("lastPage");
        
        Session::put('lastPage','student_subscription_manage');

        $planDetails = SubscriptionPlan::where('id',Auth::user()->subscription_id)->first();

        $benefits = array();

        if(!empty($planBenefits))
        {
            foreach($planBenefits as $benefit)
            {
                $benefitTitle = SubscriptionBenefit::where('id',$benefit)->first();

                if($benefitTitle)
                {
                    $benefits[] = $benefitTitle->benefit;
                }
            
            }
        }
        $ifPaymentFail = 1; 
        return view('bronzePlanStripe',compact('planDetails','benefits','ifPaymentFail'));
    }
    else
    {
        Session::put("call_from","bronzePlanStripe2");
        return redirect('login');
    }
})->name('bronzePlanStripe2');