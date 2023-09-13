<?php


use App\Http\Controllers\Auth\SocialiteController;
use Illuminate\Support\Facades\Route;

// Google Routes
Route::get('auth/google', [SocialiteController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [SocialiteController::class, 'handleGoogleCallback']);

// Facebook Routes
Route::get('auth/facebook', [SocialiteController::class, 'redirectToFacebook']);
Route::get('auth/facebook/callback', [SocialiteController::class, 'handleFacebookCallback']);