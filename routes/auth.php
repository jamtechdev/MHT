<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {
    Route::get('/studentregister', [RegisteredUserController::class, 'create'])->name('studentregister');
    Route::post('/studentregister', [RegisteredUserController::class, 'store']);

    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('student.login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);

    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
    //Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::get('/reset-password', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.update');
});

Route::middleware(['auth'])->group(function () {
    // Register Step Routes
    Route::get('/step-one', [RegisteredUserController::class, 'getRegisterStepOne'])->name('step-one');
    Route::post('/post-step-one', [RegisteredUserController::class, 'postRegisterStepOne'])->name('post-step-one');
    Route::post('/post-plan-register', [RegisteredUserController::class, 'postPlanRegister'])->name('post-plan-register');
    Route::get('/step-two', [RegisteredUserController::class, 'getRegisterStepTwo'])->name('step-two');
    Route::post('/post-step-two', [RegisteredUserController::class, 'postRegisterStepTwo'])->name('post-step-two');
    Route::get('/step-three', [RegisteredUserController::class, 'getRegisterStepThree'])->name('step-three');
    Route::post('/post-step-three', [RegisteredUserController::class, 'postRegisterStepThree'])->name('post-step-three');
    Route::get('/step-four', [RegisteredUserController::class, 'getRegisterStepFour'])->name('step-four');
    Route::post('/post-step-four', [RegisteredUserController::class, 'postRegisterStepFour'])->name('post-step-four');

    /**
    * Author Ganesh
    * Created at :- 28-06-2022 
    * Created routes for store data on select when register user
    */
    
    Route::post('/who_will_be_training', [RegisteredUserController::class, 'whoWillBeTraining'])->name('who_will_be_training');
    Route::post('/disciplines_in_martial_arts', [RegisteredUserController::class, 'disciplinesInMartialArts'])->name('disciplines_in_martial_arts');
    Route::post('/stretching_flexibility_spiritual_meditative_arts', [RegisteredUserController::class, 'stretchingFlexibilitySpiritualMeditativeArts'])->name('stretching_flexibility_spiritual_meditative_arts');
    Route::post('/health_and_wellness_guidance', [RegisteredUserController::class, 'healthAndWellnessGuidance'])->name('health_and_wellness_guidance');
    Route::post('/all_fitness_including', [RegisteredUserController::class, 'allFitnessIncluding'])->name('all_fitness_including');
    Route::post('/age_group', [RegisteredUserController::class, 'ageGroup'])->name('age_group');
    Route::post('/gender', [RegisteredUserController::class, 'gender'])->name('gender');
    Route::post('/fitness', [RegisteredUserController::class, 'fitness'])->name('fitness');
    Route::post('/preferred_language', [RegisteredUserController::class, 'preferredLanguage'])->name('preferred_language');
    Route::post('/instructor_gender', [RegisteredUserController::class, 'instructorGender'])->name('instructor_gender');
    Route::post('/preferred_training_style', [RegisteredUserController::class, 'preferredTrainingStyle'])->name('preferred_training_style');
    Route::post('/instructor_experience', [RegisteredUserController::class, 'instructorExperience'])->name('instructor_experience');
});

// Video Routes
Route::get('/instructor-video', [HomeController::class, 'getInstructorVideos'])->name('instructor-video');
Route::get('/instructor-wistia-free-video/{id}/{name}', [HomeController::class, 'playInstructorFreeVideo'])->name('instructor-wistia-free-video');

// Free Landing Page Routes
Route::get('/softRegister', [RegisteredUserController::class, 'createFreeAccount'])->name('softRegister');
Route::post('/free', [RegisteredUserController::class, 'storeFreeAccount']);


Route::get('/referral_register', [RegisteredUserController::class, 'createFreeAccount'])->name('referral_register');
// 499 Landing Page Routes
// Route::get('/register-499', [RegisteredUserController::class, 'create499Account'])->name('register499');
// Route::post('/register-499', [RegisteredUserController::class, 'store499Account']);

// Register Landing Page Routes
Route::get('/register', [RegisteredUserController::class, 'createRegisterAccount'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'storeRegisterAccount']);

// Maz Free Routes
Route::get('/maz', [RegisteredUserController::class, 'createMazFreeAccount'])->name('maz');

Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])->middleware('auth')->name('verification.notice');
Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])->name('verification.verify'); //'auth',

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');
Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])->middleware('auth')->name('password.confirm');
Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])->middleware('auth');
// Stripe Webhook Routes
Route::post('/stripe_events', [RegisteredUserController::class, 'paymentStatus'])->name('stripe_events');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout');