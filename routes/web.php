<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DistanceController;


Route::get('/', function () {
    return view('welcome');
});

// Public API endpoint for distance calculation
Route::post('/calculate-distance', [DistanceController::class, 'calculateDistance'])
    ->name('distance.calculate');

// Public API endpoint for enquiry submission
Route::post('/enquiry', [App\Http\Controllers\EnquiryController::class, 'store'])
    ->name('enquiry.store');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

});
