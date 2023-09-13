<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Front\HomeController;

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

Route::get('/', [HomeController::class, 'showdisciplineimage'])->name('welcome');
Route::get('/schools-and-instructors', [HomeController::class, 'getSchoolAndInstructor'])->name('schools-and-instructors');
Route::get('/schools-and-instructors-detail/{instructorId}', [HomeController::class, 'getSchoolAndInstructorDetail'])->name('schools-and-instructors-detail');
Route::get('/our-class-detail/{classId}', [HomeController::class, 'ourClassDetail'])->name('ourClassDetail');
Route::get('/our-classes', [HomeController::class, 'getOurClasses'])->name('our-classes');
Route::get('/disciplines/{id}', [HomeController::class, 'displayImages'])->name('disciplines');
Route::get('/instructor-wistia-paid-video/{wistia_id}', [HomeController::class, 'playInstructorPaidVideo'])->name('instructor-wistia-paid-video')->middleware('check.login.paid');

Route::get('/paidvideo-login', function (){
    return view('paidvideo-login');
})->name('paidvideo-login');

Route::get('/paidvideo-subscription', function (){
    return view('paidvideo-subscription');
})->name('paidvideo-subscription');

Route::get('/instructor-detail', function () {
    return view("instructor-detail");
})->name('instructor-detail');

Route::get('/faq', function () {
    Session::put('isLandingPage', false);
    return view("faq");
})->name('faq');

Route::get('/terms', function () {
    Session::put('isLandingPage', false);
    return view('terms');
})->name('terms');

Route::get('/privacy-policy', function () {
    Session::put('isLandingPage', false);
    return view('privacy-policy');
})->name('privacy-policy');

require __DIR__.'/auth.php';
require __DIR__.'/socialite.php';
require __DIR__.'/instructor.php';
require __DIR__.'/student.php';