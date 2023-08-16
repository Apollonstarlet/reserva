<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SuitesController;
use App\Http\Controllers\StripePaymentController;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;

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

//Auth::routes(['verify' => true]);
//Route::get('verify', 'Auth\RegisterController@verifyUser')->name('verify.user');

//Cache Clear
Route::get('clear', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('route:clear');
    return back(); //Return anything
});


Route::get('fresh', function() { Artisan::call('migrate:fresh'); return back();});

// locale route
Route::get('lang/{locale}', 'LanguageController@swap');

// Dashboard Route
Route::get('/', 'DashboardController@Dashboard')->name('dashbord');
Route::post('search', 'SuitesController@Search');
Route::post('booking', 'SuitesController@Booking');
Route::post('stripe', [StripePaymentController::class, 'stripePost'])->name('stripe.post');