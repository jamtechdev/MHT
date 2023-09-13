<?php

use Illuminate\Support\Facades\Route;
use Modules\Contactus\Http\Controllers\Admin\ContactusController;
use Modules\Contactus\Http\Controllers\front\ContactController;

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

Route::prefix('contactus')->group(function () {
    // Route::get('/', 'ContactusController@index');
    Route::get('/', [ContactController::class, 'index1']);
});

Route::group(['middleware' => ['web'], 'as' => 'contact-front::'], function () {
    Route::get('/contactus', [ContactController::class, 'view'])->name('contact-us');
    Route::post('/contactus', [ContactController::class, 'create'])->name('contact-send');
});

// dd(config('contactus.authGuard'));
Route::group(array('middleware' => ['auth:' . config('contactus.authGuard')], 'prefix' => config('contactus.routePrefix'), "namespace" => "Admin", 'as' => 'contactus::'), function () {
    Route::get('/Contactus/datatable', 'ContactusController@getDatatable');
    Route::get('/contact', [ContactusController::class, 'index'])->name('admin.contact.index');
});
